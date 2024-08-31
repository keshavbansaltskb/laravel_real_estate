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
        
        <div class="mainproperty">
            <h5 class="card-title"><b>Enter Property Details:</b></h5>
            <div class="row" style="margin-bottom:10px">
                <select class='form-control' id="propertyType">
                    <option value="">Select Property type</option>
                    <option value="Residential">Residential</option>
                    <option value="Commercial">Commercial</option>
                </select>
            </div>      

            <div class="row" id="categoryDropdown" style="display:none;margin-bottom:10px">
                <select class='form-control' id="propertyCategory">
                    <option value="">Select Category</option>
                </select>       
            </div>
           
            <div class='row' style="margin-bottom:10px">
                <input type="number" id="area" placeholder='Enter Area' class='form-control area'>
            </div>      

            <div class="row" id="areaunit" style="display:none; margin-bottom:10px">
                <select class='form-control' id="unit">                
                    <option value="">Area Unit</option>
                    <option value="sq. ft.">sq. ft.</option>
                    <option value="sq. yards">sq. yards</option>
                    <option value="sq. m.">sq. m.</option>
                    <option value="acres">acres</option>
                    <option value="marla">marla</option>
                    <option value="cents">cents</option>
                    <option value="bigha">bigha</option>
                    <option value="kottah">kottah</option>
                </select>       
            </div>

            <div class="row" style="margin-bottom:10px">
                <input type="number" id="amount" placeholder="Enter Amount" class="form-control">
            </div>      

            <div class="row" style="margin-bottom:10px">
                <select class='form-control' id="amounttype">
                    <option value="">Select Amount type</option>
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                </select>
            </div>

            <div class="row" style="margin-bottom:10px">
                <select class='form-control' id="propertyfor">
                    <option value="">Property For</option>
                    <option value="Rent">Rent</option>
                    <option value="Sell">Sell</option>
                </select>
            </div>      
            <div class='row' style="margin-bottom:10px">
                <select class='form-control' id="bhk">
                    <option value="">BHK</option>
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
            <div class="row stateselect" style="margin-bottom:10px">
                <select class="form-control state" id="state">
                    <option>Select State</option>
                </select>
            </div>      
            <div class="row cityselect" style="margin-bottom:10px">
                <select class="form-control city" id="city">
                    <option>Select City</option>
                </select>
            </div>      
            <div class="row"  style="margin-bottom:10px">
                <textarea class="form-control" rows="5" id="description" placeholder="Enter Property Description"></textarea>
            </div>      
            <div class='row' style='margin-bottom:10px'>
                <input  type='text' id="uploadername" placeholder='Enter Property Uploader Name' class='form-control'></input>
            </div>      
            <div class='row' style='margin-bottom:10px'>
                <input  type='email' id="uploaderemail" placeholder='Enter Property Uploader Email' class='form-control' required></input>
            </div>      
            <div class='row' style='margin-bottom:10px'>
                <input  type='number' id="uploaderphone" placeholder='Enter Property Uploader Phone' class='form-control'></input>
            </div>      
            <div class='row' style='margin-bottom:10px'>
                <textarea rows='5' id="uploaderaddress" placeholder='Enter Property Uploader Address' class='form-control'></textarea>
            </div>
                <label><b>Property Image</b></label>
            <div class='row' style='margin-bottom:10px'>
                <input type="file" name="photo" id="photo" class="form-control">
            </div>
           <input  type='submit' value="Submit" class='btn btn-primary submitbutton' style="margin-top:20px"></input>
        </div>      
        <div class="propertyimageuploadform" style="display:none">
            <div class='row' style='margin-bottom:320px'>
                <label><b>Upload the Property <span class="imgnumber">1</span>/3 image:</b></label><br>
                <input type="file" id="photonxt" name="photo" class="form-control"><br><br>
                
                <input type="button" value="Next" class="btn btn-primary nextbutton" style="float:right"> <!-- Change to button type -->
                <input type="button" value="Skip" class="btn btn-danger skipimages" style="float:right;margin-left:20px"> <!-- Change to button type -->
                
            </div>
        </div>      
    </div>
</body>
@endsection


<script>
    var imgcode = "";
    $(document).on("click", ".submitbutton", function() {
        var propertyType = $("#propertyType").val();
        var propertyCategory = $("#propertyCategory").val();
        var area = $("#area").val();
        var unit = $("#unit").val();
        var amount = $("#amount").val();
        var amountType = $("#amounttype").val();
        var propertyFor = $("#propertyfor").val();
        var bhk = $("#bhk").val();
        var state = $(".states").val();
        var city = $(".city").val();
        var description = $("#description").val();
        var uploaderName = $("#uploadername").val();
        var uploaderEmail = $("#uploaderemail").val();
        var uploaderPhone = $("#uploaderphone").val();
        var uploaderAddress = $("#uploaderaddress").val();
        var photo = $("#photo")[0].files[0]; 
        alert(state+" "+city);
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(uploaderEmail)) {
            alert("Please enter a valid email address.");
            return;
        }
        if (propertyType != "" && propertyCategory != "" && area != "" && unit != "" && amount != "" && amountType != "" && propertyFor != "" && bhk != "" && state != "" && city != "" && description != "" && uploaderName != "" && uploaderEmail != "" && uploaderPhone != "" && uploaderAddress != "" && photo ) {
            if (parseInt(area) < 50) {        
                alert("Area cannot be less than 50.");
            } else {
                var formData = new FormData();
                formData.append('propertyType', propertyType);
                formData.append('propertyCategory', propertyCategory);
                formData.append('area', area);
                formData.append('unit', unit);
                formData.append('amount', amount);
                formData.append('amountType', amountType);
                formData.append('propertyFor', propertyFor);
                formData.append('bhk', bhk);
                formData.append('state', state);
                formData.append('city', city);
                formData.append('description', description);
                formData.append('uploaderName', uploaderName);
                formData.append('uploaderEmail', uploaderEmail);
                formData.append('uploaderPhone', uploaderPhone);
                formData.append('uploaderAddress', uploaderAddress);
                formData.append('photo', photo);
                formData.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    url: '/Admin/uploadproperty',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".propertyimageuploadform").css("display", "block");
                        $(".mainproperty").css("display", "none");
                        imgcode = response.code;
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error:', status, error);
                        alert('An error occurred while processing your request.');
                    }
                });
            }
        } else {
            alert("All fields are required. Please fill out all fields.");
        }
    });

    $(document).on("click",".skipimages",function(){
        window.location.href = "http://127.0.0.1:8000/Admin/dashboard";
    });
   
    var num = 1;
    $(document).on("click", ".nextbutton", function() {
        if (num <= 3) {
            var photo = $("#photonxt")[0].files[0];
            var formData = new FormData();
            formData.append('photo', photo);
            formData.append('code', imgcode);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: '/Admin/uploadnextimage',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (num == 3) {
                        window.location.href = "http://127.0.0.1:8000/Admin/dashboard";
                    }else{
                        num++;
                        $("#photonxt")[0].value='';
                        $(".imgnumber").text(num);   
                    }                
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error);
                    alert('An error occurred while processing your request.');
                }
            });
        } else {
            alert("Image upload limit reached.");
            window.location.href = "http://127.0.0.1:8000/Admin/dashboard";
        }
    });
    $(document).on("change", "#propertyType", function(){
        var selectedType = $(this).val(); // Get the selected property type value
        if(selectedType != "") {
            $("#categoryDropdown").show(); // Show the category dropdown
            var categories = [];
            if(selectedType === "Residential") {
                categories = ['Residential Apartment', 'Independent/Builder Floor', 'Independent House/Villa', 'Residential Land', 'Studio Apartment', 'Farm House', 'Serviced Apartments', 'Others'];
            } else if(selectedType === "Commercial") {
                categories = ['Commercial Shops', 'Commercial Showrooms', 'Commercial Office/Space', 'Commercial Land', 'Industrial Lands/Plots', 'Agricultural/Farm Land', 'Hotel/Resorts', 'Guest House/Banquet-Halls', 'Time Share', 'Space in Retail Mail', 'Office in Business Park', 'Office in IT Park', 'Warehouse', 'Cold Storage', 'Factory', 'Manufacturing', 'Business Center', 'Other'];
            }
            
            // Clear previous options and set new categories
            $("#propertyCategory").empty().append('<option value="">Select Category</option>');
            $.each(categories, function(index, category){
                $("#propertyCategory").append('<option value="' + category + '">' + category + '</option>');
            });
            
            // Update the placeholder text for the category dropdown
            $("#propertyCategory option:first").text("Select " + selectedType + " Category");
        } else {
            $("#categoryDropdown").hide(); // Hide the category dropdown if no type is selected
        }
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
