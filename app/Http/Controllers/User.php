<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Properties;
use App\Models\Images;
use App\Models\Login;
use App\Models\City;
use App\Models\State;
use App\Models\Message;
use App\Models\Contact;

class User extends Controller
{
    public function index(Request $request){
        $property = Properties::paginate(6); 
        return view("welcome",["property"=>$property]);
    }

    public function propertyview($code){
        $detail = Properties::find($code);
        $images = Images::where('code', $code)->pluck('imgcode')->toArray();
        $data = [
            'detail' => $detail,
            'images' => $images
        ];
        return view("propertyviews")->with($data);
    }
    public function message($code,Request $request){
        $email=$request->cookie("realestate");
        $details = Login::find($email);
        $userdetails = Properties::find($code);
        $message = New Message;
        $message->name = $details->user;
        $message->email = $email;
        $message->phone = $details->phone;
        $message->message = $request["msg"];
        $message->code = $code;
        $message->username = $userdetails->uploader;
        $message->useremail = $userdetails->uploaderemail;
        $message->userphone = $userdetails->uploaderphone;
        $message->save();
        return redirect("/propertyview/$code")->with(["success"=>"Message Send Successfully"]);  
    }

    public function Edit(Request $request){
        $email=$request->cookie("realestate");
        $details = Login::find($email);
        return view("Edit", compact('details'));
    }
    public function EditProfile(Request $request){
        $email = $request->cookie("realestate");

        $login = Login::where('email', $email)->first();
        Message::where('email', $email)->update([
            'name' => $request["user"],
            'phone' => $request["phone"],
        ]);
        if ($login) {
            $login->user = $request["user"];
            $login->phone = $request["phone"];
            $login->save();
        }
        return redirect("/Edit")->with(["success"=> "Your Profile Successfully Update"]);

    }

    public function Password(Request $request){
        return view("Password");
    }
    public function changepass(Request $request){
        $email = $request->cookie("realestate");
        $data = Login::find($email);
        $cp = $request["cp"];
        $np = $request["np"];
        $rp = $request["rp"];
        if($data->password==$cp){
            if($np==$rp){
                $data->password = $np;
                $data->save();
                return redirect("/Password")->with(["success"=>"Password changed successfully."]);
            }else{
                return redirect("/Password")->with(["error"=>"New And Retype Password Not Match"]);
            }
        }else{
            return redirect("/Password")->with(["error"=>"Current Password Not Match"]);
        }
    }
    public function login(){
        return view("login");
    }
    public function logout(){
        $response = new Response();
        $response = Response('<script> window.location = "/";</script>');  
        $response->withCookie(cookie("realestate","",-1));
        return $response;
    }
   
    public function loginuser(Request $request){
        $email = $request["email"];
        $password = $request["password"];
        $data = Login::find($email);
        if($data!=""){
            $matchpassword = $data->password;
            if($matchpassword == $password){
                $response = new Response();
                $response = Response('<script> window.location = "/";</script>');  
                $response->withCookie(cookie("realestate",$email,60*24*7*30));
                $request->session()->put("login",$email);
                return $response;
            }
            else{
                return redirect("/Login")->with(["error"=>"Password Not Match"]);
            }    
        }
        else{
            return redirect("/Login")->with(["error"=>"Email Not Found"]);
        }
    }
    public function propertlogin($code,Request $request){
        $email = $request["email"];
        $password = $request["password"];
        $data = Login::find($email);
        if($data!=""){
            $matchpassword = $data->password;
            if($matchpassword == $password){
                $response = new Response();
                $response = Response('<script> window.location = "/propertyview/'.$code.'";</script>');  
                $response->withCookie(cookie("realestate",$email,60*24*7*30));
                $request->session()->put("login",$email);
                return $response;
            }
            else{
                return redirect("/propertyview/$code")->with(["error"=>"Password Not Match"]);
            }    
        }
        else{
            return redirect("/propertyview/$code")->with(["error"=>"Email Not Found"]);
        }
    }
    public function states(Request $request){
        $states = State::where('country_id', 101)->get();
        $selectHTML = '<select class="form-control states" name="state"><option value="">Select State</option>';
        foreach ($states as $state) {
            $selectHTML .= '<option value="' . $state->id . '">' . $state->name . '</option>';
        }
        $selectHTML .= '</select>';
        echo $selectHTML;
    }
    public function cities(Request $request){
        $id = $request->post('id');
        $cities = City::where('state_id', $id)->get();
        $selectHTML = '<select class="form-control city" name="city"><option value="">Select City</option>';
        foreach ($cities as $city) {
            $selectHTML .= '<option value="' . $city->id . '">' . $city->name . '</option>';
        }
        $selectHTML .= '</select>';
        echo $selectHTML;
    }
    public function CodeCheck(Request $request){
        $id = $request->post('id');
        $checkemail = Login::find($id);
        if($checkemail==null){
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
            $code="";
            for($i=0; $i<6 ; $i++){
                $code=$code.$a[$i];
            }
            echo $code;
        }
        else{
            echo "exist";
        }
        
    }
    public function Signupcheck(Request $request){
        $email = $request->input('email');
        $user = $request->input('user');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $checkemail = Login::find($email);
        if($checkemail==null){
            $data = new Login;
            $data->user = $user;
            $data->email = $email;
            $data->password = $password;
            $data->phone = $phone;
            $data->save();
            $response = Response('<script> window.location = "/";</script>');  
            $response = $response->withCookie(cookie("realestate",$email,60*24*7*30));
            return $response;
        }
        else{
            echo "exist";
        }
    }
    
    public function ContactUs(){
        return view("contact");
    }
    public function ContactCode(Request $request){
        $email = $request->input('id');
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
        $code="";
        for($i=0; $i<6 ; $i++){
            $code=$code.$a[$i];
        }
        echo $code;
    }

    public function ContactForm(Request $request){
        $email = $request->input("email");
        $name = $request->input("name");
        $subject = $request->input("subject");
        $message = $request->input("message");
        $data = new Contact;
        $data->name = $name;
        $data->email = $email;
        $data->subject = $subject;
        $data->message = $message;
        $data->save();
        echo "success";
    }

    public function propertysearch(Request $request){
        $stateId = $request->input('states');
        $stateName = State::where('id', $stateId)->pluck('name')->first();
        $cityId = $request->input('city');
        $cityName = City::where('id', $cityId)->pluck('name')->first();
        $property = $request->input('property');
        $propertyfor = $request->input('propertyfor') === 'Buy' ? 'Sell' : 'Rent'; 
        $bhk = $request->input('bhk');
        $price = $request->input('price');
        
        $propertiesQuery = Properties::query()
            ->where('state', $stateName)
            ->where('city', $cityName)
            ->where('property', $property)
            ->where('propertyfor', $propertyfor)
            ->where('bhk', $bhk);
            
        if (!empty($price)) {
            $propertiesQuery->where('amount', '<=', $price);
        }
        $properties = $propertiesQuery->get();

        $response = new Response();
        $response->withCookie(cookie("message","",-1));
        $response->withCookie(cookie("properties","",-1));
        if ($properties->isEmpty()) {
            $properties = Properties::where('city', $cityName)->get();
            
            if ($properties->isEmpty()) {
                // No properties in the city, set the default properties
                $properties = Properties::all();
                $message = "No properties found matching your criteria. Here are some other properties.";
            } else {
                $message = "No exact match found. Here are some properties from the same city.";
            }
        } else {
            $message = "Properties matching your search.";
        }
        $response->withCookie(cookie("message",$message,60*24*7*30));
        $request->session()->put("properties",$properties);
    
        return $response;
    }

    public function searchproperty(Request $request){
        $message = $request->cookie("message");
        $properties = $request->session()->get('properties');
        return view('property')->with([
            'cookieMessage' => $message,
            'properties' => $properties
        ]);
    }
    

    public function Uploadproperty(Request $request){
        return view("Uploadproperty");
    }
    public function propertyuser(Request $request){        
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
            'uploaderAddress' => 'required|string',
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validate image
        ]);

        $maxsn = Properties::all();
        $sn = $maxsn->max('sn') + 1;
        $characters = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        shuffle($characters);
        $code = substr(implode($characters), 0, 6) . "_$sn";

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = $code . ".jpg";
            $target = public_path('/images');
            $image->move($target, $name);

            $directory = $target . '/' . $code;
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
        }
        $state = State::where('id', $request->input('state'))->first()->name;
        $city = City::where('id', $request->input('city'))->first()->name;
        
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
        $email = $request->cookie("realestate");
        $data = Login::find($email);
        $details->uploaderaddress =  $request["uploaderAddress"];
        $details->uploaderemail = $email;
        $details->uploaderphone = $data->phone;
        $details->uploader = $data->user;
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
    
    public function editproperty(Request $request){
        $email = $request->cookie('realestate');
        $properties = Properties::where('uploaderemail', $email)->get();
        
        if ($properties->isEmpty()) {
            return view("editproperty",["properties"=>""]);
        } else {
            
            return view("editproperty",["properties"=>$properties]);
        }
    }
    public function propertyedits($code, Request $request){
        $propertydetail = Properties::find($code);
        $data = ['propertydetail' => $propertydetail];
        return view("propertyedits")->with($data);
    }
    public function updateproperty($code, Request $request){
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
                "uploaderaddress"=>"required"
            ]
        );
        $state = State::where('id', $request->input('state'))->first()->name;
        $city = City::where('id', $request->input('city'))->first()->name;
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
        $details->state = $state;
        $details->city = $city;
        $details->uploaderaddress = $request["uploaderaddress"];
        $details->save();
        return redirect("/editproperty")->with(["success"=>"Property Update SuccessFully"]);
    }
    
    public function deleteproperty($code, Request $request){
        $directory = public_path('/images/' . $code);
        foreach(glob($directory . '/*') as $file) {
            if(is_dir($file)) {
                $this->deleteDirectory($directory);
            } else {
                unlink($file);
            }
        }
        rmdir($directory);
        
        Properties::find($code)->delete();
        unlink(public_path('/images/'.$code.'.jpg'));
        return redirect("/editproperty")->with(["success"=>"Property Deleted"]);
    }
    
}
