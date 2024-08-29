<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("master")

@section("mainmenu")


<div class="container my-5">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <center style="font-size:30px;font-weight:500;margin-top:20px">Edit Your Profile</center>
            <?php
                $success=session()->get('success');
                if(strlen($success)>0 ){
                    ?>
                    <div class="alert alert-success text-center" style="width:100%">
                    <?=$success?>
                </div>
            <?php
                }
            ?>
            <form method="post" action="/EditProfile">
                @csrf
                <label><b>Name:</b></label>
                <input type="text" name="user" required value="{{ $details->user }}" class="form-control">
                <br><label><b>Phone:</b></label>
                <input type="text" name="phone" required value="{{ $details->phone }}" class="form-control">
                <br>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div>
</div>


@endsection
