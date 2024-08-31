<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<div class="container">
    <div class="row" style="margin-bottom:60px">
        <div class="col-lg-3"></div>
        <div class="col-lg-6" style="margin-bottom:55px">
            <?php
                $success=session()->get('success');
                if(strlen($success)>0 ){
                    ?>
                    <div class="alert alert-success">
                    <?=$success?>
                </div>
                <?php
                }
                $err=session()->get('error');
                if(strlen($err)>0 ){
                    ?>
                    <div class="alert alert-danger">
                    <?=$err?>
                </div>
                <?php
                }
            ?>
            <form method="post" action="changepass">
                @csrf
                <label><b>Current Password</b></label>
                <input type="password" name="CurrentPassword" placeholder="Enter Current Password" class="form-control">
                <div class="text-danger">
                    @error("CurrentPassword")
                        {{$message}}
                    @enderror
                </div><br>
                <label><b>New Password</b></label>
                <input type="password" name="NewPassword" placeholder="Enter New Password" class="form-control">
                <div class="text-danger">
                    @error("NewPassword")
                        {{$message}}
                    @enderror
                </div><br>
                <label><b>Retype Password</b></label>
                <input type="password" name="RetypePassword" placeholder="Enter Retype Password" class="form-control">
                <div class="text-danger">
                    @error("RetypePassword")
                        {{$message}}
                    @enderror
                </div><br>
                <input type="submit" value="Submit" class="btn btn-danger">
            </form>

        </div>
        <div class="col-lg-3"></div>
    </div>
</div>
@endsection
