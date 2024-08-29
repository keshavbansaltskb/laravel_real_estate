<link href="https://fonts:googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    
</style>
<!-- The Modal -->

<div class="modal fade" id="checkmodal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title modaltext">Enter code which is send in your Email.</h4>
          <label type="button" class="close" data-dismiss="modal">&times;</label>
        </div>
        
      <!-- Modal body -->
      <div class="modal-body">
        <div class="alert alert-danger codenotmatch" style="display:none;width:100%;text-align:center">Code Not Match</div>
        <input type="text" id="logincode" class="form-control" placeholder="Enter Code">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
          <label class="modalclose">Submit</label>
      </div>

    </div>
  </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login/Signup Error</h4>
          <label type="button" class="close" data-dismiss="modal">&times;</label>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-center">
            <div class="alert alert-danger">
            </div>
        </div>
        
      </div>
    </div>
  </div>
  <?php
    $err=session()->get('error');
    if(strlen($err)>0 ){
        echo "<script>
                $(document).ready(function(){
                    $('#myModal .alert-danger').text('$err'); // Set modal body text
                    $('#myModal').modal('show'); // Show the modal
                    
                });
            </script>";
    }
?>         
@include("nav")
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-7" style="margin-top:50px">
                <div class="card logincard">
                    <div class="card-header text-center" style="font-family:serif">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <form  method="post" action="loginuser">
                            @csrf  
                            <input type="email" class="form-control" name="email" placeholder="Email" required><br>
                            <input type="password"  class="form-control" name="password" placeholder="Password" required><br>
                            <button class="btn btn-danger">Login</button>
                        </form>
                        <br>
                        <label>Haven't any account? <span class="opensignup" style="color:red;cursor:pointer">Signup</span></label>
                    </div>
                </div>
                <div class="card signupcard" style="display:none">
                    <div class="card-header text-center" style="font-family:serif">
                        <h4>Signup</h4>
                    </div>
                    <div class="card-body">
                        <input type="text" class="form-control" id="user" placeholder="User name" required><br>
                        <input type="email" class="form-control"  id="email" placeholder="Email" required><br>
                        <input type="password" class="form-control"  id="password" placeholder="Password" required><br>
                        <input type="phone" class="form-control"  id="phone" placeholder="Phone No." required><br>
                        <button class="btn btn-danger signupbutton">Sign up</button>
                    <br><br>
                    <label>Already have a account? <span class="openlogin" style="color:red;cursor:pointer">Login</span></label>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    @include("footer")
<script>
    $(document).on("click",".opensignup",function(){
        $(".signupcard").css("display","block");
        $(".logincard").css("display","none");
    });
    $(document).on("click",".openlogin",function(){
        $(".signupcard").css("display","none");
        $(".logincard").css("display","block");
    });


    var code = "";
    var usercode = "";
    $(document).on("click",".signupbutton",function(){
        var user = $("#user").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var phone = $("#phone").val();
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.com/;            
        if(user!="" && email!="" && password!="" && phone!=""){
            if (emailPattern.test(email)) {
                $.ajax({
                    url: '/CodeCheck',
                    type: 'post',
                    data : 'id='+email+'&_token={{csrf_token()}}',
                    success: function (response) {
                        if(response=="exist"){
                            $('#myModal .alert-danger').text('Email Id Already Exist'); 
                            $('#myModal').modal('show');
                            //$(".codenotmatch").css("display","block");  
                            //$(".codenotmatch").html("Email Id Already Exist"); 
                        }else{
                            $('#checkmodal').modal('show');
                            $(".codenotmatch").css("display","none");
                            $("#logincode").val(""); 
                            code = response;
                            alert(code);
                        }
                    }
                });
            } else {
                $('#myModal .alert-danger').text('Please enter a valid email address.'); 
                $('#myModal').modal('show');
            }
        }else{
            $('#myModal .alert-danger').text('All Field Required'); 
            $('#myModal').modal('show');
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
            if(user!="" || email!="" || password!="" || phone!=""){
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
                         window.location = "/";
                    }
                });
            }else{
                $(".codenotmatch").css("display","block");  
                $(".codenotmatch").html("All Field Required");   
            }
        }
        else{
            $(".codenotmatch").html("Code Not Match");   
            $(".codenotmatch").css("display","block");   
        }
    });

</script>
