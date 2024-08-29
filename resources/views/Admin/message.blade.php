<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<div class="container my-5">
    @foreach($message as $stud)
    <div class="card"  style="margin-bottom:20px">
    <div class="card-body">
        <div class="row">
        <div class="col-lg-4" style="margin-bottom:10px">
                {{$stud->rcode }}
                <img src="{{ url('images/' . $stud->code . '.jpg') }}" class="img-fluid">
            </div>
            <div class="col-lg-4 col-6" style="margin-bottom:10px">
                <label><b>Messanger Details</b></label><br>
                <label>{{  $stud->name }}</label><br>
                <label>{{  $stud->email }}</label><br>
                <label>{{  $stud->phone }}</label><br>
                <label>Message : {{  $stud->message }}</label><br>
            </div>
            <div class="col-lg-4  col-6"  style="margin-bottom:10px">
                <label><b>Uploader Details</b></label><br>
                <label>{{  $stud->username }}</label><br>
                <label>{{  $stud->useremail }}</label><br>
                <label>{{  $stud->userphone }}</label><br>
                <a href="/Admin/propertyview/{{ $stud->code }}"><button class="btn btn-danger">View Property</button></a>
            </div>
</div>
</div>
        </div>
    @endforeach
</div>
@endsection
