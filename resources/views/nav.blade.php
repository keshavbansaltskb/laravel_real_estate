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


