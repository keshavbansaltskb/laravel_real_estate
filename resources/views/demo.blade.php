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
        margin-bottom:40px;
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
        background:var(--white);
        transition:0.5s ease;
    }
    .main.active{
        width: calc(100% - 80px);
        left:80px;

    }
    .topbar{
        widht:100%;
        height:60px;
        display:flex;
        justify-content:space-between;
        align-item:center;
        padding:0 10px;
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
    .search{
        position: relative;
        width:400px;
        margin:0 10px;
    }
    .search label{
        position: relative;
        width:100%;   
    }
    .search label input{
        width:100%;
        height:40px;
        margin-top:10px;
        border-radius:40px;
        padding : 5px 20px;
        padding-left:35px;
        font-size:18px;
        outline:none;
        border:1px solid var(--black2);
    }
    .search label ion-icon{
        position: absolute;
        top:0;
        left:10px;
        font-size:1.2em;
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

<div class="container mainmenu">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="logo-apple"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="chatbox-outline"></ion-icon></span>
                    <span class="title">Message</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <span class="title">Password</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"><ion-icon name="folder-outline"></ion-icon></span>
                    <span class="title">Properties</span>
                </a>
            </li>
            <li>
                <a href="#">
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
            <!-- search -->
            <div class="search">
                <label>
                    <input type="text" placeholder="Search Here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <!-- user img -->
            <div class="user">
                <label>Logout <b><ion-icon name="log-in-outline"></ion-icon></b></label>
            </div>
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