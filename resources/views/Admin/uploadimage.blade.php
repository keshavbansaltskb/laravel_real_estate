<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<div class="container" style="margin-bottom:330px">
    <form method="post" action="/Admin/uploadnextimage/{{$code}}" enctype="multipart/form-data">
        @csrf
        <div class='row' style='margin-bottom:10px'>
            <label><b>Upload the next image:</b></label>
            <input type="file" name="photo" class="form-control"><br><br>
            <input type="submit" value="Next" class="btn btn-primary" style="float:right">
        </div>
    </form>
</div>


@endsection
