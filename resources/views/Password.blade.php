<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("master")

    <div class="container my-5">
        <div class="row" style="margin-top:100px">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <center style="font-size:20px;font-weight:500"><b>Change Password</b></center><br>
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
                <form method="post" action="changepass">
                    @csrf
                    <label>Current Password :</label>
                    <input type="password" name="cp" class="form-control" required><br>
                    <label>New Password :</label>
                    <input type="password" name="np" class="form-control" required><br>
                    <label>Retype Password :</label>
                    <input type="password" name="rp" class="form-control" required><br>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>

@section("mainmenu")

@endsection