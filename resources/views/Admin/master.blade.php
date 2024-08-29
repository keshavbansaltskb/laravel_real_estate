<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family: 'Ubuntu', sans-serif;    
    }
    :root{
        --blue:#287bff;
        --white:#ffffff;
        --gray : #f5f5f5;
        --black1 : #222;
        --black2: #999;
    }
    body{
        min-height:100vh;
        overflow-x:hidden;
    }
    .mainmenu{
        position: relative;
        widht:100%;

    }
    .navigation{
        position: fixed;
        width:300px;
        height:100%;
        background:var(--blue);
        border-left:10px solid var(--blue);
        transition:0.5s ease;
        overflow:hidden;
    }
    .navigation.active{
        width:80px;
    }
    .navigation ul{
        position:absolute;
        top:0;
        left:0;
        width:100%;
    }
    .navigation ul li{
        position: relative;
        width:100%;
        list-style: none;
        border-top-left-radius:30px;
        border-bottom-left-radius:30px;
    }
    .navigation ul li:hover{
        background:var(--white);

    }
    .navigation ul li:nth-child(1){
        margin-bottom:20px;
        pointer-events:none;
    }
    .navigation ul li a{
        position: relative;
        display: block;
        width:100%;
        display:flex;
        text-decoration:none;
        color:var(--white);
    }
    .navigation ul li:hover a{
        color:var(--blue);
    }
    .navigation ul li a .icon{
        position: relative;
        display:block;
        min-width: 60px;
        height:40px;
        margin-top:12px;
        line-height:70px;
        text-align:center;
    }
    .navigation ul li a .icon ion-icon{
        font-size:1.75em;
    }
    .navigation ul li a .title{
        position: relative;
        display:block;
        padding: 0 10px;
        height:40px;
        line-height:50px;
        text-align:start;
        white-space: nowrap;
    }

    /* curse outside */
    .navigation ul li:hover a::before{
        content:'';
        position: absolute;
        top:-50px;
        border-radius:50%;
        right:0;
        width:50px;
        height:50px;
        background:transparent;
        box-shadow: 35px 35px 0 10px var(--white);
        pointer-events:none;
    }
    .navigation ul li:hover a::after{
        content:'';
        position: absolute;
        bottom:-50px;
        border-radius:50%;
        right:0;
        width:50px;
        height:50px;
        background:transparent;
        box-shadow: 35px -35px 0 10px var(--white);
        pointer-events:none;
    }

    /* main */

    .main{
        
        position:absolute;
        width: calc(100% - 300px);
        left:300px;
        min-height:100vh;
        background:#f2f2f2;
        transition:0.5s ease;
    }
    .main.active{
        width: calc(100% - 80px);
        left:80px;

    }
    .topbar{
        background-color:#fff;
        widht:100%;
        height:60px;
        display:flex;
        justify-content:space-between;
        align-item:center;
        padding:0 10px;
    }
    .footerbar{
        background-color:#fff;
        widht:100%;
        height:60px;
        padding:20px;
        font-family:'Ubuntu' sans-serif;
    }
    .toggle{
        position: relative;
        top:0;
        width:60px;
        height:60px;
        display:flex;
        justify-content:center;
        font-size:2.5em;
        cursor: pointer;
    }
    .user{
        position: relative;
        width: 100px;
        margin-top:10px;
        font-weight:bold;
        height: 40px;
        overflow:hidden;
        cursor: pointer;
    }

    /* Media Query */

    @media (max-width:991px){
        .navigation{
            left:-300px;
        }
        .navigation.active{
            width:300px;
            left:0;
        }
        .main{
            width:100%;
            left:0;
        }
        .main.active{
            width:calc(100% - 300px);
            left:300px;
        }
    }
    @media (max-width:667px){
        .navigation{
            width:100%;
            left:-100%;
            z-index: 1000;
        }
        .navigation.active{
            width:100%;
            left:0%;
        }
        .toggle{
            z-index: 10001;
        }
        .main.active .toggle{
            color:#fff;
            position: fixed;
            right:0px;
            left:initial;
        }
    }
</style>

<div class="modal fade" id="logoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Log Out <ion-icon name="log-in-outline"></ion-icon></h5>
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
        <a href="/Admin/login"><button type="button" class="btn btn-danger">Logout</button></a>
      </div>
    </div>
  </div>
</div>
<div class="mainmenu">
    <div class="navigation">
        <ul>
            <li>
                <a href="/Admin/dashboard">
                    <span class="icon"><ion-icon name="logo-xbox"></ion-icon></span>
                    <span class="title">RealEstate</span>
                </a>
            </li>
            <li>
                <a href="/Admin/dashboard">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li>
                <a href="/Admin/message">
                    <span class="icon"><ion-icon name="chatbox-outline"></ion-icon></span>
                    <span class="title">Message</span>
                </a>
            </li>
            <li>
                <a href="/Admin/property">
                    <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                    <span class="title">Properties</span>
                </a>
            </li>
            <li>
                <a href="/Admin/changepassword">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <span class="title">Password</span>
                </a>
            </li>
            <li>
                <a href="" data-toggle="modal" data-target="#logoutmodal" >
                    <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    <span class="title">LogOut</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main -->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <!-- user img -->
            <div class="user">
                <a href="" data-toggle="modal" data-target="#logoutmodal" style="color:black;cursor:pointer" ><label style="cursor:pointer">Logout <b><ion-icon name="log-in-outline"></ion-icon></b></label></a>
            </div>
        </div>
        <div style="padding:20px">
            @yield("mainmenu")
        </div>
        <div class="footerbar">
            <center><label>Copyright © 2024 || Design By Keshav Bansal</label></center>
        </div>
    </div>
</div>


<script>
    // menu toggler

    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    let main = document.querySelector('.main');
    
    toggle.onclick = function(){
        navigation.classList.toggle('active');
        main.classList.toggle('active');
    }


</script>