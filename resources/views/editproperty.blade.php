<script src="{{url("/jquery-3.6.0.min.js")}}"></script>

@extends("master")

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
        <a href="" id="deleteproeprty"><button type="button" class="btn btn-danger">Confirm</button></a>
      </div>
    </div>
  </div>
</div>
<div class="container my-5">
    <div class="row">
       @if ($properties && $properties->isNotEmpty())
            <div class="col-lg-12">
                <center style="font-size:30px; font-weight:500; margin-top:20px;margin-bottom:20px">Your Property</center>
                <?php
                    $err=session()->get('success');
                    if(strlen($err)>0 ){
                ?>
                        <div class="alert alert-success text-center" style="width:100%"><?=$err?></div>
                <?php
                    }
                ?>
            </div>
            @foreach($properties as $stud)
            
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
                                <a href="/propertyview/{{ $stud->rcode }}"><button class="btn btn-primary">View</button></a>
                                <a href="/propertyedits/{{ $stud->rcode }}"><button class="btn btn-warning">Edit</button></a>
                                <input data-toggle="modal" data-target="#exampleModal" type="submit" value="Delete" id="{{ $stud->rcode }}" class="btn btn-danger buttondanger">
                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        
            
        @else
            <label style="font-size:30px; font-weight:500; margin-top:20px">Please <a  href="/Uploadproperty" style="color:blue;text-decoration:underline">Add A Property</a> To Get Started</label>
            
        @endif        
    </div>
</div>


@endsection

<script>
    $(document).on("click",".buttondanger",function(){
        var code = $(this).attr("id");
        $("#deleteproeprty").attr("href","/deleteproperty/" + code);
    })
</script>