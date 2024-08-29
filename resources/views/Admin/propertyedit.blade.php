<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<body>
<div class="container">
        <?php
            $err=session()->get('success');
            if(strlen($err)>0 ){
                ?>
                <div class="alert alert-success">
                <?=$err?>
            </div>
            <?php
            }
        ?>
        <h5 class="card-title text-center">UPDATE PROPERTY DETAILS</h5>
        <br>
        <label id="show"></label>
        <form action="/Admin/updateproperty/{{$propertydetail->rcode}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row" style="margin-bottom:10px">
                <select class='form-control' id="propertyType" name="property">
                    <option value="">Select Property type</option>
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                </select>
            </div>
            <div class="text-danger">
                @error("property")
                    {{$message}}
                @enderror
            </div>
            <div class="row" id="categoryDropdown" style="display:none;margin-bottom:10px">
                 <select class='form-control' id="propertyCategory" name="category">
                    <option value="">Select Category</option>
                </select>
                <div class="text-danger">
                    @error("category")
                        {{$message}}
                    @enderror
                </div>
            </div>
           
            <div class='row' style="margin-bottom:10px">
                <input type="number" name="area" value="{{$propertydetail->area}}" placeholder='Enter Area' name="area" class='form-control area'></input>
            </div>
            <div class="text-danger">
                @error("area")
                    {{$message}}
                @enderror
            </div>
            <div class="row" id="areaunit" style="margin-bottom:10px">
                <select class='form-control' name="unit">
                    <option value="{{$propertydetail->unit}}">{{$propertydetail->unit}}</option>
                    <option value="sq. ft.">sq. ft.</option>
                    <option value="sq. yards">sq. yards</option>
                    <option value="sq. m.">sq. m.</option>
                    <option value="acres">acres</option>
                    <option value="marla">marla</option>
                    <option value="cents">cents</option>
                    <option value="bigha">bigha</option>
                    <option value="kottah">kottah</option>
                </select>
                <div class="text-danger">
                    @error("unit")
                        {{$message}}
                    @enderror
                </div>
            </div>
           
            <div class="row" style="margin-bottom:10px">
                <input type="number" value="{{$propertydetail->amount}}" name="amount" placeholder="Enter Amount" class="form-control"> 
            </div>
            <div class="text-danger">
                @error("amount")
                    {{$message}}
                @enderror
            </div>
            <div class="row" style="margin-bottom:10px">
                <select class='form-control' name="amounttype">
                    <option value="{{$propertydetail->amounttype}}">{{$propertydetail->amounttype}}</option>
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            <div class="text-danger">
                @error("amounttype")
                    {{$message}}
                @enderror
            </div>
            <div class="row" style="margin-bottom:10px">
                <select class='form-control' name="propertyfor">
                    <option value="{{$propertydetail->propertyfor}}">{{$propertydetail->propertyfor}}</option>
                    <option value="Buy">Buy</option>
                    <option value="Rent">Rent</option>
                    <option value="Sell">Sell</option>
                </select>
            </div>
            <div class="text-danger">
                @error("propertyfor")
                    {{$message}}
                @enderror
            </div>
            <div class='row' style="margin-bottom:10px">
                <select class='form-control' name="bhk">
                    <option value="{{$propertydetail->bhk}}">{{$propertydetail->bhk}}</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                </select>
            </div>
            <div class="text-danger">
                @error("bhk")
                    {{$message}}
                @enderror
            </div>
            <div class="row stateselect" style="margin-bottom:10px">
                <select class="form-control state" name="state">
                    <option>Select State</option>
                </select>
            </div>
            <div class="text-danger">
                @error("state")
                    {{$message}}
                @enderror
            </div>
            <div class="row cityselect" style="margin-bottom:10px">
                <select class="form-control city" name="city">
                    <option>Select City</option>
                </select>
            </div>
            <div class="text-danger">
                @error("city")
                    {{$message}}
                @enderror
            </div>
            <div class="row"  style="margin-bottom:10px">
                <textarea class="form-control" rows="5" name="description" placeholder="Enter Property Description">{{$propertydetail->description}}</textarea>
            </div>
            <div class="text-danger">
                @error("description")
                    {{$message}}
                @enderror
            </div>
            <div class='row' style='margin-bottom:10px'>
                <input  type='text' value="{{$propertydetail->uploader}}" name="uploadername" placeholder='Enter Property Uploader Name' class='form-control'></input>
            </div>
            <div class="text-danger">
                @error("uploadername")
                    {{$message}}
                @enderror
            </div>
            <div class='row' style='margin-bottom:10px'>
                <input  type='email'  value="{{$propertydetail->uploaderemail}}" name="uploaderemail" placeholder='Enter Property Uploader Email' class='form-control'></input>
            </div>
            <div class="text-danger">
                @error("uploaderemail")
                    {{$message}}
                @enderror
            </div>
            <div class='row' style='margin-bottom:10px'>
                <input  type='number'  value="{{$propertydetail->uploaderphone}}" name="uploaderphone" placeholder='Enter Property Uploader Phone' class='form-control'></input>
            </div>
            <div class="text-danger">
                @error("uploaderphone")
                    {{$message}}
                @enderror
            </div>
            <div class='row' style='margin-bottom:10px'>
                <textarea rows='5' name="uploaderaddress" placeholder='Enter Property Uploader Address' class='form-control'>{{$propertydetail->uploaderaddress}}</textarea>
            </div>
            <div class="text-danger">
                @error("uploaderaddress")
                    {{$message}}
                @enderror
            </div>
            <input  type='submit' value="Update" class='btn btn-primary' style="margin-top:30px"></input>
            
        </form>
    </div>
</body>
@endsection




<script>
    $(document).ready(function(){
        $("#propertyType").change(function(){
            var selectedType = $(this).val();
            if(selectedType != "") {
                $("#categoryDropdown").show();
                var categories = [];
                if(selectedType === "Residential") {
                    categories = ['Residential Apartment', 'Independent/Builder Floor','Independent House/Villa','Residential Land','Studio Apartment','Farm House','Serviced Apartments','Others'];
                } else if(selectedType === "Commercial") {
                    categories = ['Commercial Shops', 'Commercial Showrooms', 'Commercial Office/Space','Commercial Land','Industrial Lands/Plots','Agricultural/Farm Land','Hotel/Resorts','Guest House/Banquet-Halls','Time Share','Space in Retail Mail','Office in Bussiness Park','Office in IT Park','Ware House','Cold Storage','Factory','Manufacturing','Business Center','Other'];
                }
                else{
                    $("#categoryDropdown").hide();
                }
                $("#propertyCategory").empty().append('<option>Select Category</option>');
                $.each(categories, function(index, category){
                    $("#propertyCategory").append('<option value="' + category + '">' + category + '</option>');
                });
                $("#propertyCategory option:first").text("Select " + selectedType + " Category");
            } else {
                $("#categoryDropdown").hide();
            }
        });
    });

    $(document).on("keyup",".area",function(){
        var area = $(this).val();
        if(area!=""){
            $("#areaunit").css("display","block");
        }else{
            $("#areaunit").css("display","none");
        }
        
    });


    $(document).ready(function(){
        $.ajax({
            url : '/State',
            type:'post',
            data : '&_token={{csrf_token()}}',
            success:function(response){
                $(".stateselect").html(response);
            }
        });
    });
    $(document).on("change",".states",function(){
        var state = $(this).val();
        $.ajax({
            url : '/City',
            type:'post',
            data : 'id='+state+'&_token={{csrf_token()}}',
            success:function(response){
                $(".cityselect").html(response);
            }
        });
    });
</script>
