<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("master")

@section("mainmenu")
    
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12" style="margin-top:2%;margin-bottom:2%"><h3 style="font-size:35px;letter-spacing:5px;text-align:center">Properties According Your Search</h3></div>
        @foreach($property as $stud)
        <div class="col-xl-4 col-lg-4 col-sm-6" style="margin-bottom:20px">
            <div class="card">
                <div class="card-body">
                    <img src="{{ url('images/' . $stud->rcode . '.jpg') }}" class="img-fluid"><br><br>
                    <center>
                        <b>
                        <label>
                            {{ $stud->property }}
                        </b><br>
                            {{ $stud->category }}
                        </label><br><br>
                        <a href="/propertyview/{{ $stud->rcode }}"><button class="btn btn-danger">View</button></a>
                    </center>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection