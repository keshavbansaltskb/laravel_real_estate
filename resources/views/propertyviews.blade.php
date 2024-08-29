<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

<style>
    .uploderdetails{
        background-color:#fff;
        padding:30px;
        text-align:center;
        height: 250px;
        margin-bottom:30px;
        box-shadow: 0px -5px 15px rgba(100, 100, 100, 0.5);
    }
    .loginmodall{
       background-image: linear-gradient(135deg, blue, pink);
    }
    @media only screen and (max-width: 600px) {
        .loginmodall{
            display: none;
        }
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <?php 
          $login = Cookie::get("realestate");
          if(isset($login)){
        ?>
            <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/message/{{ $detail->rcode}}" method="post">
                        @csrf
                        <textarea rows="4" name="msg" placeholder="Send message for this property" class="form-control" style="width:100%" ></textarea><br>
                        <button class="btn btn-primary">Send</button>
                    </form>
                </div>
      <?php
          }else {
            ?>
            <div class="row">
                <div class="loginmodall col-lg-4">
                    <img src="{{'/images/keshav.jpg'}}" class="img-fluid rounded-circle" style="margin-top:50px">
                </div>
                <div class="col-lg-8">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Login</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/propertlogin/{{$detail->rcode}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" required class="form-control" placeholder="Enter email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" required class="form-control" placeholder="Enter password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                        You don't have an account?<label data-toggle="modal" data-target="#signup" data-dismiss="modal" style="margin-left:10px;color:red;cursor:pointer">Signup</label>
                    </div>
                </div>
            </div>
        <?php
          }
        ?>
    </div>
  </div>
</div>

<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="row">
        <div class="loginmodall col-lg-5">
            <img src="{{'/images/keshav.jpg'}}" class="img-fluid rounded-circle" style="margin-top:70px">
        </div>
        <div class="col-lg-7">
                    
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                            <label for="pwd">Name:</label>
                            <input type="text" class="form-control" id="user" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Phone:</label>
                            <input type="phone" class="form-control" id="phone" placeholder="Enter Phone">
                        </div>
                    <button class="btn btn-primary signupbutton" data-dismiss="modal" id="{{$detail->rcode}}">Signup</button>
                    <br><br>
                    Already Have A Account?<label data-toggle="modal" data-target="#exampleModal" data-dismiss="modal" style="margin-left:10px;color:red;cursor:pointer">Login</label>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<div id="myModal" class="w3-modal">
	<div class="w3-modal-content w3-card-4   w3-animate-zoom" style="max-width:600px;padding:20px">
	<header class="w3-container" style="border-bottom:1px solid #000"> 
		<span onclick="closeModal()" 
		class="w3-button w3-display-topright">&times;</span>
		<h5>Enter code which is send in your Email.</i></h5>
	</header>
	<div class="w3-container allmodalbody" style="margin-top:20px;border-bottom:1px solid #000">
        <div class="alert alert-danger codenotmatch" style="display:none;width:100%;text-align:center">Code Not Match</div>
        <input type="text" id="logincode" class="form-control" placeholder="Enter Code"><br>
	</div>
	<footer class="w3-container" style="padding:10px">
		<button style="float:right" class="btn btn-danger modalclose">Logout</button>
	</footer>
	</div>
</div>
<div id="checkmodal" class="w3-modal">
	<div class="w3-modal-content w3-card-4   w3-animate-zoom" style="max-width:300px;padding:20px">
	<header class="w3-container" style="border-bottom:1px solid #000"> 
		<span onclick="closeModal()" 
		class="w3-button w3-display-topright">&times;</span>
		<h5>Login/Signup Error</i></h5>
	</header>
	<div class="w3-container errormodalbody alert alert-danger text-center" style="margin-top:20px">
        
	</div>
	</div>
</div> 

@extends("master")

@section("mainmenu")

<div class="container my-5">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('images/' . $detail->rcode . '.jpg') }}" class="img-fluid"><br><br>
                    </div>
                    @foreach($images as $image)
                        <div class="carousel-item">
                            <img src="{{ url('images/' . $detail->rcode . '/'. $image.'.jpg') }}" class="img-fluid"><br><br>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6"  style="font-family:serif">
            <?php
                $success=session()->get('success');
                if(strlen($success)>0 ){
                    ?>
                    <div class="alert alert-success text-center" style="width:100%">
                    <?=$success?>
                </div>
                <?php
                }
                $err=session()->get('error');
                if(strlen($err)>0 ){
                    ?>
                    <div class="alert alert-danger text-center" style="width:100%">
                    <?=$err?>
                </div>
                <?php
                }
            ?>
            <label><b style="font-size:28px;color:#444">{{$detail->property}} Property</b></label><br>
            <label><b>Category :</b> {{$detail->category}}</label><br>
            <label><b>Area :</b> {{$detail->area}} {{$detail->unit}}</label><br>
            <label><b>Ammount :</b> {{$detail->amount}} {{$detail->amounttype}}</label><br>
            <label><b>Property Available For : </b>{{$detail->propertyfor}} </label><br>
            <label><b>Bhk :</b> {{$detail->bhk}} Bhk</label><br>
            <label><b>Address :</b>  {{$detail->city}}, {{$detail->state}}, India</label><br>
            <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Send Message</button>
        </div>
    </div>
    <div class="row my-5">
        
        <div class="col-lg-12">
            <label style="font-size:25px"><b>Property Details</b></label><br>
            {{$detail->description}}
        </div>
    </div>
</div>
<br><br>
<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=%20{{$detail->city}}+()&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe> <a href='https://hauckautoren.ch/'>Hauckautoren</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=db32c13152d20792a63df941e94ed62cbefb0c9a'></script>

@endsection


<script>
    var procode = $(".signupbutton").attr("id");
    var code = "";
    var usercode = "";
    $(document).on("click",".signupbutton",function(){
        var user = $("#user").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        if(user!="" || email!="" || password!="" || phone!=""){
            $.ajax({
                url: '/CodeCheck',
                type: 'post',
                data : 'id='+email+'&_token={{csrf_token()}}',
                success: function (response) {
                    if(response=="exist"){
                        var modal = document.getElementById('checkmodal');
                        modal.style.display = 'block';
                        $('.errormodalbody').text('Email Id Already Exist'); 
                    }else{
                        var modal = document.getElementById('myModal');
                        modal.style.display = 'block';
                        $("#logincode").val(""); 
                        $(".codenotmatch").css("display","none"); 
                        code = response;
                        alert(code);
                    }
                }
            });
        }else{
            var modal = document.getElementById('checkmodal');
            modal.style.display = 'block';
            $('.errormodalbody').text('All Field Required'); 
        }
        
    });

    $(document).on("keyup", "#logincode", function() {
        usercode = $(this).val();
        $(".codenotmatch").css("display","none");   
    });

    $(document).on("click",".modalclose",function(){
        if(code == usercode){
            var user = $("#user").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var phone = $("#phone").val();
            var formData = {
                user: user,
                email: email,
                password: password,
                phone: phone,
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                url: '/Signupcheck',
                type: 'post',
                data: formData,
                success: function (response) {
                    window.location = "/propertyview/" + procode; 
                }
            });
        }
        else{
            $(".codenotmatch").html("Code Not Match");   
            $(".codenotmatch").css("display","block");   
        }
    });


    function closeModal() {
        var modal = document.getElementById('myModal');
        modal.style.display = "none";
        var modal = document.getElementById('checkmodal');
        modal.style.display = "none";
    }

    // Close the modal when clicking outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
        var modal = document.getElementById('checkmodal');
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>