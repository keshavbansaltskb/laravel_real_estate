<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{url("/css/style.css")}}">
<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("Admin/master")

@section("mainmenu")

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Property Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <b>Are you sure for delete this property</b><br>
            <label>Either cancel or cirfirm</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="/Admin/propertydelete/{{ $detail->rcode }}"><button type="button" class="btn btn-danger">Confirm</button></a>
      </div>
    </div>
  </div>
</div>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ url('images/' . $detail->rcode . '.jpg') }}" class="img-fluid"><br><br>
                    </div>
                    @foreach($images as $image)
                        <div class="carousel-item">
                            <img src="{{ url('images/' . $detail->rcode . '/'. $image.'.jpg') }}" class="img-fluid"><br><br>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-lg-4">
            <?php
                $err=session()->get('success');
                if(strlen($err)>0 ){
                    ?>
                    <div class="alert alert-success text-center" style="width:100%">
                    <?=$err?>
                </div>
                <?php
                }
            ?>
            <b style="font-size:28px;color:#666">{{$detail->property}} Property</b><br>
            <label><b>Category :</b> {{$detail->category}}</label><br>
            <label><b>Area :</b> {{$detail->area}} {{$detail->unit}}</label><br>
            <label><b>Ammount :</b> {{$detail->amount}} {{$detail->amounttype}}</label><br>
            <label><b>Property Available For :</b> {{$detail->propertyfor}}</label><br>
            <label><b>Bhk :</b> {{$detail->bhk}}</label><br>
            <label><b>State :</b> {{$detail->state}}, India</label><br>
            <label><b>City :</b> {{$detail->city}}</label><br>
            <a href="/Admin/propertyedit/{{ $detail->rcode }}"><input type="submit" value="Edit" class="btn btn-primary"></a>
            <input data-toggle="modal" data-target="#exampleModal" type="submit" value="Delete" class="btn btn-danger">
        </div>
    </div>
    <div class="row" style="margin-top:20px;padding:10px">
        <label><b>Property Details</b></label><br>
        <label>{{$detail->description}}</label>
    </div>
</div>

@endsection