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
</style>


<div class="container-fluid">
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
