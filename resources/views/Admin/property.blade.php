<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<div class="container">
    <div class="row">
        <?php
            $err=session()->get('success');
            if(strlen($err)>0 ){
                ?>
                <div class="alert alert-danger text-center" style="width:100%">
                <?=$err?>
            </div>
            <?php
            }
        ?>
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
                            <a href="/Admin/propertyview/{{ $stud->rcode }}"><button class="btn btn-danger">View</button></a>
                        </center>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-lg-12">
            @if ($property->hasPages())
                <div class="d-flex justify-content-center">
                    @if ($property->onFirstPage())
                        <button class="btn btn-secondary mr-2" disabled>Previous</button>
                    @else
                        <a href="{{ $property->previousPageUrl() }}" class="btn btn-primary mr-2">Previous</a>
                    @endif

                    @if ($property->hasMorePages())
                        <a href="{{ $property->nextPageUrl() }}" class="btn btn-primary">Next</a>
                    @else
                        <button class="btn btn-secondary" disabled>Next</button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

@endsection