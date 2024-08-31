<title>Real State</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.navbar-toggler {
    background-color: #white; /* New background color */
    border-color: #fff; /* New border color, if needed */
    /* Other styles you want to apply */
}
.navbar-toggler-icon{
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%23ffffff' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}

</style>

<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log Out <i class="fa fa-lock"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <b>Are you sure for logout</b><br>
            <label>Either cancel or Logout</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="/logout"><button type="button" class="btn btn-danger">Logout</button></a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="searchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold">Search Any Property </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
								<label style="color:black;font-weight:bold">State</label>
								<div class="stateselect">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
								<label style="color:black;font-weight:bold">City</label>
								<div class="cityselect">
									<select class="form-control city">
									<option  value="">Select City</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
								<label style="color:black;font-weight:bold">Property</label>
								<select class="form-control property">
									<option value="Residential">Residential</option>
									<option value="Commercial">Commercial</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
								<label style="color:black;font-weight:bold">BHK</label>
								<select class="form-control bhk">
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
								<label style="color:black;font-weight:bold">Search For</label>
								<select class="form-control propertyfor">
								<option value="Buy">Buy</option>
								<option value="Rent">Rent</option>
								</select>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6" style="margin-bottom:15px">
								<label style="color:black;font-weight:bold">Price</label>
								<input class="form-control proprice" placeholder="Enter Price">
							</div>
						</div>
      </div>
      <div class="modal-footer">
        <input type="button" value="Search" class="w3-btn btn-danger formsubmit">
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-md bg-dark fixed-top">
  <a class="navbar-brand" href="/" style="color:white">RealEstate</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/"  style="color:white">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/ContactUs"  style="color:white">Contact Us</a>
      </li> 
      <li class="nav-item" >
        <a  class="nav-link"  data-toggle="modal" data-target="#searchmodal" style="color:white;cursor:pointer">Search</a>
      </li> 
      <?php 
          $login = Cookie::get("realestate");
          if(isset($login)){
      ?>

      <li class="nav-item">
        <a class="nav-link" href="/Edit"  style="color:white" >Edit Profile</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="/Password"  style="color:white" >Change Password</a>
      </li> 
      <li class="nav-item" >
        <a class="nav-link" href="/Uploadproperty" style="color:white;">Upload Property</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/editproperty"  style="color:white" >Edit Property</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href=""  style="color:white" data-toggle="modal" data-target="#logoutmodal" >Logout</a>
      </li> 
      <?php
          }else{

      ?>
      <li class="nav-item">
        <a class="nav-link" href="/Login"  style="color:white">Login</a>
      </li> 
      <?php
          }
      ?>

    </ul>
  </div>  
</nav>
<br>

<script>
  $(document).on("click",".formsubmit",function(){
		var states = $(".states").val();
		var city = $(".city").val();
		var property = $(".property").val();
		var bhk = $(".bhk").val();
		var propertyfor = $(".propertyfor").val();
		var price = $(".proprice").val();
		if(states!="" && city!="" && property!="" && bhk!="" && propertyfor!="" && price!=""){
			$.ajax({
                url: '/propertysearch',
                type: 'post',
                data: {
					states: states,
					city: city,
					property: property,
					bhk: bhk,
					propertyfor: propertyfor,
					price: price,
					_token: '{{ csrf_token() }}'
				},
				success: function(response) {
					window.location.href = '/searchproperty'; 
				},
				error: function(xhr, status, error) {
					console.error('AJAX error:', status, error);
					alert('An error occurred while processing your request.');
				}
            });
		}else{
			alert("All Field Required");
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
