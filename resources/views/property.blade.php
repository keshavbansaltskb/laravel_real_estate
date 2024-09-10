<script src="{{url("/jquery-3.6.0.min.js")}}"></script>
@extends("master")

@section("mainmenu")
    <style>
        @media only screen and (min-width: 800px) {
            #messagefont{
                font-size:20px;
            }
        }
    </style>
<div class="container my-5">
    
    <div class="row">
        <div class="col-lg-12" style="margin-top:2%;margin-bottom:2%">
            <h4 style="font-size:35px;letter-spacing:5px;text-align:center" id="messagefont">
                {{ $cookieMessage }}
            </h4>
        </div>

        <!-- Display properties -->
        @foreach($properties as $property)
        <div class="col-xl-4 col-lg-4 col-sm-6" style="margin-bottom:20px">
            <div class="card">
                <div class="card-body">
                    <img src="{{ url('images/' . $property['rcode'] . '.jpg') }}" class="img-fluid"><br><br>
                    <center>
                        <b><label>{{ $property['property'] }}</label></b><br>
                        {{ $property['category'] }}<br><br>
                        <a href="/propertyview/{{ $property['rcode'] }}">
                            <button class="btn btn-danger">View</button>
                        </a>
                    </center>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
