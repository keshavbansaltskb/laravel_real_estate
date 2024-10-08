<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Admins;
use App\Models\Properties;
use App\Models\Images;
use App\Models\Message;
use App\Models\City;
use App\Models\State;
class Admin extends Controller
{
    public function login(){
        $response = new Response();
        $response = Response(view("Admin/welcome")); 
        $response->withCookie(cookie("user","",-1));
        return $response;
    }

    public function action(Request $request){
        $request->validate(
            [
                "email"=>"required",
                "password"=>"required"
            ]
        );
        $email = $request["email"];
        $password = $request["password"];
        $data = Admins::find($email);
        if($data!=""){
            $matchpassword = $data->password;
            if($matchpassword == $password){
                $response = new Response();
                $response = Response('<script> window.location = "dashboard";</script>');  
                $response->withCookie(cookie("user",$email,60*24*7*30));
                $request->session()->put("login",$email);
                return $response;
            }
            else{
                return redirect("/Admin/login")->with(["error"=>"Password Not Match"]);
            }    
        }
        else{
            return redirect("/Admin/login")->with(["error"=>"Email Not Found"]);
        }
    }

    public function dash(Request $request){
        $email=$request->cookie("user");
        if(strlen($email)>0){
            return view("Admin/dashboard");
        }
        else{
            return redirect("/Admin/login")->with(["error"=>"You Are Not Login"]);
        }
    }

    public function message(Request $request){
        $email=$request->cookie("user");
        if(strlen($email)>0){
            $message = Message::paginate(2); 
            return view("Admin/message",["message"=>$message]);
        }
        else{
            return redirect("/Admin/login")->with(["error"=>"You Are Not Login"]);
        }
    }
    public function property(Request $request){
        $email = $request->cookie("user");
        if (strlen($email) > 0) {
            $property = Properties::paginate(6); 
            return view("Admin/property", ["property" => $property]);
        } else {
            return redirect("/Admin/login")->with(["error" => "You Are Not Login"]);
    }
    }
    public function changepassword(Request $request){
        $email=$request->cookie("user");
        if(strlen($email)>0){
            return view("Admin/changepassword");
        }
        else{
            return redirect("/Admin/login")->with(["error"=>"You Are Not Login"]);
        }
    }

    public function demo(Request $request){
        return view("/Admin/demo");
    }
    public function uploadproperty(Request $request){
        // Validate incoming request
        $request->validate([
            'propertyType' => 'required',
            'propertyCategory' => 'required',
            'area' => 'required|integer|min:50',
            'unit' => 'required',
            'amount' => 'required|numeric',
            'amountType' => 'required',
            'propertyFor' => 'required',
            'bhk' => 'required|integer',
            'state' => 'required',
            'city' => 'required',
            'description' => 'required',
            'uploaderName' => 'required',
            'uploaderEmail' => 'required|email',
            'uploaderPhone' => 'required|numeric',
            'uploaderAddress' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validate image
        ]);

        // Generate unique code
        $maxsn = Properties::all();
        $sn = $maxsn->max('sn') + 1;
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        shuffle($characters);
        $code = substr(implode($characters), 0, 6) . "_$sn";

        // Handle file upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $code . ".jpg";
            $target = public_path('/images');
            $image->move($target, $name);

            // Create directory for property images if not exists
            $directory = $target . '/' . $code;
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
        }

        // Fetch state and city names
        $state = State::where('id', $request->input('state'))->first()->name;
        $city = City::where('id', $request->input('city'))->first()->name;

        // Save property details
        $details = new Properties;
        $details->sn = $sn;
        $details->code = $code;
        $details->rcode = $code;
        $details->property = $request->input('propertyType');
        $details->category = $request->input('propertyCategory');
        $details->area = $request->input('area');
        $details->unit = $request->input('unit');
        $details->amount = $request->input('amount');
        $details->amounttype = $request->input('amountType');
        $details->propertyfor = $request->input('propertyFor');
        $details->description = $request->input('description');
        $details->bhk = $request->input('bhk');
        $details->state = $state;
        $details->city = $city;
        $details->uploaderaddress = $request->input('uploaderAddress');
        $details->uploaderemail = $request->input('uploaderEmail');
        $details->uploaderphone = $request->input('uploaderPhone');
        $details->uploader = $request->input('uploaderName');
        $details->save();
        return response()->json(['code' => $code]);   
    }

    public function uploadnextimage(Request $request){
        $a=array();
		for($i='A' ; $i<='Z' ; $i++){
			array_push($a,$i);
			if($i=='Z')
				break; 
		}
		for($i='a' ; $i<='z' ; $i++){
			array_push($a,$i);
			if($i=='z')
				break; 
		}
		for($i=0 ; $i<=9 ; $i++){
			array_push($a,$i);
		}
		shuffle($a);
		$newcode="";
		for($i=0; $i<6 ; $i++){
			$newcode=$newcode.$a[$i];
		}
        $code  = $request->input('code');
        $newcode = $newcode."_".$code;
        $count = Images::where("code", $code)->count();
        if($count == 3){
            return redirect("/Admin/dashboard")->with(["success"=>"Successfully Upload Limited Photo"]);
        }else{
            $image = $request->file('photo');
            $name=$newcode.".jpg";
            $target = public_path('/images/' . $code);
            $image->move($target, $name);
            $imagedetails = new Images();
            $imagedetails->code= $code;
            $imagedetails->imgcode= $newcode;
            $imagedetails->save();
            $data = compact("code");
            return view("/Admin/uploadimage")->with($data);
        }
    }
    public function changepass(Request $request){
        $request->validate(
            [
                "RetypePassword"=>"required",
                "NewPassword"=>"required",
                "CurrentPassword"=>"required"
            ]
        );
        $cp = $request["CurrentPassword"];
        $np = $request["NewPassword"];
        $rp = $request["RetypePassword"];
        $email=$request->cookie("user");
        $data = Admins::find($email);
        if($cp == $data->password){
            if($np == $rp ){
                $data->password = $request["NewPassword"];
                $data->save();
                return redirect("/Admin/changepassword")->with(["success"=>"Password Changed Successful"]);
            }else{
                return redirect("/Admin/changepassword")->with(["error"=>"New And Retype Password Not Match"]);
            }
        }else{
            return redirect("/Admin/changepassword")->with(["error"=>"Current Password Incorrect"]);
        }
    }

    public function propertyview($code){
        $detail = Properties::find($code);
        $images = Images::where('code', $code)->pluck('imgcode')->toArray();
        $message = Message::where('code', $code)->get();
        if(!$message){
            $message = "";
        }
        $data = [
            'detail' => $detail,
            'images' => $images,
            'message' => $message
        ];
        return view("Admin/propertyviews")->with($data);
    } 
    public function propertyedit($code){
        $propertydetail = Properties::find($code);
        $data = ['propertydetail' => $propertydetail];
        return view("Admin/propertyedit")->with($data);
    } 
    public function updateproperty($code, Request $request){
        echo $request["city"];
        $request->validate(
            [
                "property"=>"required",
                "category"=>"required",
                "area"=>"required",
                "unit"=>"required",
                "amount"=>"required",
                "amounttype"=>"required",
                "propertyfor"=>"required",
                "bhk"=>"required",
                "state"=>"required",
                "city"=>"required",
                "description"=>"required",
                "uploadername"=>"required",
                "uploaderemail"=>"required",
                "uploaderphone"=>"required",
                "uploaderaddress"=>"required"
            ]
        );
        $details = Properties::find($code);
        $details->property = $request["property"];
        $details->category = $request["category"];
        $details->area = $request["area"];
        $details->unit = $request["unit"];
        $details->amount = $request["amount"];
        $details->amounttype = $request["amounttype"];
        $details->propertyfor = $request["propertyfor"];
        $details->description = $request["description"];
        $details->bhk = $request["bhk"];
        $details->state = $request["state"];
        $details->city = $request["city"];
        $details->uploaderaddress = $request["uploaderaddress"];
        $details->uploaderemail = $request["uploaderemail"];
        $details->uploaderphone = $request["uploaderphone"];
        $details->uploader = $request["uploadername"];
        $details->save();
        return redirect("/Admin/propertyview/$code")->with(["success"=>"Property Update SuccessFully"]);
    }
    
    public function propertydelete($code){
        $directory = public_path('/images/' . $code);
        foreach(glob($directory . '/*') as $file) {
            if(is_dir($file)) {
                $this->deleteDirectory($directory);
            } else {
                // Delete file
                unlink($file);
            }
        }
        rmdir($directory);
        Properties::find($code)->delete();
        unlink(public_path('/images/'.$code.'.jpg'));
        return redirect("/Admin/property")->with(["success"=>"Property Deleted"]);
    }
    private function deleteDirectory($directory) {
        if (!is_dir($directory)) {
            return;
        }
    
        $files = array_diff(scandir($directory), array('.', '..'));
        foreach ($files as $file) {
            if (is_dir("$directory/$file")) {
                $this->deleteDirectory("$directory/$file");
            } else {
                unlink("$directory/$file");
            }
        }
        rmdir($directory);
    }
}
