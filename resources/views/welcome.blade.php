<!DOCTYPE html>
<html lang="en">
<head>
<title>RealEstate</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Caladea&family=Lora:wght@500&family=Satisfy&display=swap" rel="stylesheet">
<style>
		.social{
			font-size:20px;
			padding:20px;
			color:white;
			cursor:pointer;
		}
		.social fa:hover{
			
			color:#434BFE;
		}	
		body,h3,p,label{
			overflow:hidden;
			
			font-family: 'Lora', serif;
		}
		h3{
			font-size:25px;
		}
		label,p{
			font-size:18px;
		}
		.col-lg-4,.col-lg-3{
			padding:10px;
		}
		@keyframes move_wave {
			0% {
				transform: translateX(0) translateZ(0) scaleY(1)
			}
			50% {
				transform: translateX(-25%) translateZ(0) scaleY(0.55)
			}
			100% {
				transform: translateX(-50%) translateZ(0) scaleY(1)
			}
		}
		.waveWrapper {
			overflow: hidden;
			position: absolute;
			left: 0;
			right: 0;
			bottom: 0;
			top: 0;
			margin: auto;

		}
		.waveWrapperInner {
			position: absolute;
			width: 100%;
			overflow: hidden;
			height: 100%;
			bottom: -1px;
		   
		}

		.bgMiddle {
			z-index: 10;
			opacity: 1;
		}

		.wave {
			position: absolute;
			left: 0;
			width: 200%;
			height: 100%;
			background-repeat: repeat no-repeat;
			background-position: 0 bottom;
			transform-origin: center bottom;
		}
		
		.waveMiddle {
			background-size: 50% 120px;
		}
		.waveAnimation .waveMiddle {
			animation: move_wave 10s linear infinite;
		}
		
		.navbar-toggler-icon {
			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
		  
		}
		.navbar-brand{
			font-size:30px;
		}
	  .parallax {
			/* The image used */
			background-image: url("{{'/images/bg.jpg'}}");

			/* Set a specific height */
			min-height: 500px;

			/* Create the parallax scrolling effect */
			background-attachment: fixed;
			background-position: center;
			background-repeat: no-repeat;
			background-size: cover;
			
			filter: alpha(opacity=50);
		}
				
		/* waves */
		.ocean {
		  height: 80px; /* change the height of the waves here */
		  width: 100%;
		  position: absolute;
		  bottom: 0;
		  left: 0;
		  right: 0;
		  overflow-x: hidden;
		}

		.ocean .wave {
		  
		  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 88.7'%3E%3Cpath d='M800 56.9c-155.5 0-204.9-50-405.5-49.9-200 0-250 49.9-394.5 49.9v31.8h800v-.2-31.6z' fill='dodgerblue'/%3E%3C/svg%3E");
		  position: absolute;
		  width: 200%;
		  height: 100%;
		  animation: wave 10s -3s linear infinite;
		  transform: translate3d(0, 0, 0);
		  opacity: 1;
		}


		@keyframes wave {
			0% {transform: translateX(0);}
			50% {transform: translateX(-25%);}
			100% {transform: translateX(-50%);}
		}
		.searchclass{
			color:white;
			font-size:65px;
			font-weight:600;
			letter-spacing:6px;
		}
		
		@media only screen and (max-width:667px) {
			.searchclass{
				font-size:30px;
				letter-spacing:4px;
			}
		}
		@media only screen and (min-width:667px) and (max-width:900px) {
			.searchclass{
				font-size:45px;
				letter-spacing:5px;
			}
		}
	</style>
	<script>
		$(document).ready(function(){
			$(".navbar-toggler-icon").click(function(){
				var txt=$("#navbar").attr("rel");
				if(txt=="transparent"){
					$("#navbar").addClass("w3-black");
					$("#navbar").attr("rel","dark");
				}
				else{
					$("#navbar").removeClass("w3-black");
					$("#navbar").attr("rel","transparent");
				}
			});
		});
	</script>
</head>

<body>
<nav class="navbar navbar-expand-md" id="navbar" rel="transparent">
  <a class="navbar-brand" href="/" style="color:white;font-size:20px">RealEstate</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/"  style="color:white">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ContactUs" style="color:white">Contact</a>
      </li>    
	  <?php 
          $login = Cookie::get("realestate");
          if(isset($login)){
      ?>
	  <li class="nav-item" >
        <a class="nav-link" href="Edit" style="color:white;">Edit Profile</a>
      </li>
	  <li class="nav-item" >
        <a class="nav-link" href="Password" style="color:white;">Change Password</a>
      </li>
	  <li class="nav-item" >
        <a class="nav-link" href="Uploadproperty" style="color:white;">Upload Property</a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" onclick="openModal()" style="color:white;cursor:pointer">Logout</a>
      </li>
      <?php
          }else{

      ?>
      <li class="nav-item">
        <a class="nav-link" href="/Login" style="color:white">Login</a>
      </li> 
      <?php
          }
      ?>
    </ul>
  </div>  
</nav>
<div id="myModal" class="w3-modal">
	<div class="w3-modal-content w3-card-4   w3-animate-zoom"  style="max-width:400px">
	<header class="w3-container" style="border-bottom:1px solid #000"> 
		<span onclick="closeModal()" 
		class="w3-button w3-display-topright">&times;</span>
		<h5>Log Out <i class="fa fa-lock"></i></h5>
	</header>
	<div class="w3-container" style="margin-top:20px;border-bottom:1px solid #000">
			<b>Are you sure for logout</b><br>
		<label>Either cancel or Logout</label>
	</div>
	<footer class="w3-container" style="padding:10px">
		<a href="/logout"><button type="button" style="float:right;margin-left:10px" class="btn btn-danger">Logout</button></a>
		<button type="button" class="btn btn-secondary" style="float:right"  onclick="closeModal()" >Cancel</button>
		
	</footer>
	</div>
</div> 
<div class="container-fluid">
  <div class="row" style="position:absolute;top:0;z-index:-1;left:0">
   <div class="col-lg-12">
	<img src="{{'/images/banner.jpg'}}" class="img-fluid">
	
	<div class="waveWrapper waveAnimation">
  
			  <div class="waveWrapperInner bgMiddle">
				<div class="wave waveMiddle" style="background-image: url('http://front-end-noobs.com/jecko/img/wave-mid.png')"></div>
			  </div>
			  
	</div>
   </div>
   
  </div>
</div>
	
	<div class="container-fluid" style="position:absolute;margin-top:50%">
		<div class="row">
			<div class="col-lg-1"></div>
			<div class="col-lg-11">
				<div class="row">
					<div class="col-lg-5">
						<h3  style="overflow-y:hidden;letter-spacing:8px;font-size:35px">About Us</h3>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
					</div>
					<div class="col-lg-7">
						<img src="{{'/images/about.jpg'}}" class="img-fluid">
					</div>
				</div>
				
				<br><br>
			</div>
			
		
		</div>
		
		
			<div class="row parallax">
				<div class="col-lg-12" style="margin-top:3%;">
					<center><h2 class="searchclass">Find your dream home</h2></center>
				<br>	
				<form method="post" action="propertysearch">
					@csrf
					<div class="row">
						<div class="col-lg-3"></div>
						<div class="col-lg-6">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
									<label style="color:white">State</label>
									<div class="stateselect">
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
									<label style="color:white">City</label>
									<div class="cityselect">
										<select class="form-control city" name="city">
										<option>Select City</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
									<label style="color:white">Property</label>
									<select class="form-control" name="property">
										<option value="Residential">Residential</option>
										<option value="Commercial">Commercial</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
									<label style="color:white">BHK</label>
									<select class="form-control" name="bhk">
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
									<label style="color:white">Search For</label>
									<select class="form-control" name="propertyfor">
									<option value="Buy">Buy</option>
									<option value="Rent">Rent</option>
									</select>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px;margin-top:40px">
									<input type="submit" value="Search" class="w3-btn w3-red">
								</div>
							</div>
						</div>
						<div class="col-lg-3"></div>					
					</div>	
				</form>
					
				</div>	
				   
				
				
			</div>
		
		
		
		<div class="row">
			<div class="col-lg-12" style="margin-top:2%;margin-bottom:2%"><h3 style="font-size:35px;letter-spacing:8px;text-align:center">Properties</h3></div>
			@foreach($property as $stud)
                
                <div class="col-xl-4 col-lg-4 col-sm-6" style="margin-bottom:20px">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ url('images/' . $stud->rcode . '.jpg') }}" class="img-fluid"><br><br>
							<div style="margin-bottom:10px"><span style="font-weight:bold">{{ $stud->property }} Prpperty</span><span style="float:right">{{ $stud->bhk }} BHK </span></div>
							<div style="margin-bottom:10px"><span>{{ $stud->category }}</span><span style="float:right">{{ $stud->amount }} {{ $stud->amounttype }}</span></div>
							<div><a href="/propertyview/{{ $stud->rcode }}"><button class="btn btn-danger">View Property</button></a></div>
                            
                        </div>
                    </div>
                </div>
                @endforeach			
		</div>
		
		
		
			<div class="row" style="margin-top:15%">
		<div class="col-sm-12">
			<div class="ocean">
			  <div class="wave"></div>
			  
			</div>
		</div>
	</div>
	<div class="row" style="background-color:dodgerblue;color:white">
		<div class="col-lg-4" style="padding:40px">
			<h2 style="letter-spacing:10px"><img src="https://skillhoard.com/skillhoard.png" style="width:40px;height:40px;"> LifeStyle</h2>
			<h4 style="color:white">© All Rights Reserved</h4>
			<p style="color:white">Designed by Skillhoard.com</p>
		</div>
		<div class="col-lg-4" style="padding:40px">
			<h3>Links</h3>
			<p style="color:white">Home</p>
			<p style="color:white">About Us</p>
			<p style="color:white">Contact</p>
		</div>
		<div class="col-lg-4" style="padding:40px">
			<h3 style="padding-left:20px">Social Links</h3>
			<i class="fa fa-facebook social"></i> <i class="fa fa-linkedin social"></i> <i class="fa fa-twitter social"></i> <i class="fa fa-youtube social"></i> <i class="fa fa-instagram social"></i>
		</div>
		<div class="col-lg-12" style="background-color:dodgerblue">
			<br><center style="color:white">Design & Developed By <a href="https://skillhoard.com" target="_blank" style="color:white;text-decoration:none">Skillhoard.com</a></center><br>
		</div>
	</div>
	</div>
</body>
</html>



<script>
        function openModal() {
            var modal = document.getElementById('myModal');
            modal.style.display = 'block';
            document.body.style.overflowY = 'none'; // Disable scrolling
        }
		function closeModal() {
            var modal = document.getElementById('myModal');
			modal.style.display = "none";
            document.body.style.overflow = 'auto'; // Enable scrolling
            
        }

        // Close the modal when clicking outside of it
        window.onclick = function(event) {
            var modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = "none";
                document.body.style.overflow = 'auto'; // Enable scrolling
            }
        }
		
		
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
