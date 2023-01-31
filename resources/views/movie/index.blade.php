
@extends('superadmin.master')

@section('page_title')
Videos
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet" />
<style>
.toggle-btn {
    width: 44px;
    height: 19px;
    margin: 10px 10px 10px 10px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==) no-repeat 50px center #b9b9b9;
    cursor: pointer;
    -webkit-transition: background-color .40s ease-in-out;
    -moz-transition: background-color .40s ease-in-out;
    -o-transition: background-color .40s ease-in-out;
    transition: background-color .40s ease-in-out;
    cursor: pointer;
}
.toggle-btn.active {
    /* background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC) no-repeat 10px center #b9b9b9; */
    background: url('{{asset("assets/images/website-logo-icon/switch-btn.png")}}') no-repeat 24px center #b9b9b9;
    background-size: 18px 18px;
}
.toggle-btn.active .round-btn {
  left: 45px;
  opacity: 0;
}
.toggle-btn .round-btn {
    width: 15px;
    height: 15px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    left: 5px;
    top: 50%;
    margin-top: -8px;
    -webkit-transition: all .30s ease-in-out;
    -moz-transition: all .30s ease-in-out;
    -o-transition: all .30s ease-in-out;
    transition: all .30s ease-in-out;
}
.toggle-btn .cb-value {
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 9;
  cursor: pointer;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}
</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Default Video</h4>
          </div>
          <div class="row">
            <div class="card-body col-md-6">
              <video id="my-video" class="video-js" controls preload="auto"  width="640"  height="264"  data-setup="{}" >
                <source src="{{env('AWS_MEDIA_URL')}}{{$video ? $video->file_name : ''}}" type="video/mp4" />
                <source src="{{env('AWS_MEDIA_URL')}}{{$video ? $video->file_name : ''}}" type="video/webm" />
                
              </video>
            </div>
            <div class="col-md-6 mt-2">
              <form action="{{route('movie.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="">
                  <label for="defaultVideo" class="bmd-label-floating">Upload default Video</label>
                  <input type="file" name="file" onchange="validation()" class="form-control-file" id="file" accept="video/*">
                </div>
                <button type="submit"  class="btn btn-primary btn-sm pull-left">Update Video</button>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <a href="{{ route('movie.video.create')}}" class="btn btn-info" style="float:right;"><i class="material-icons">add</i> Add New</a>
            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Slider Video List</h4>
          </div>
          <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Video</th>
              <th>Image</th>
              <th>Product Name</th>
              <th>Descripion</th>
              <th>Price</th>
              <th>Action</th>
            </tr>
            </thead>
            @foreach($slideVideos as $video)
            <tbody>
              <td>
                <video id="my-video" class="video-js" controls preload="auto"  width="640"  height="264"  data-setup="{}" >
                  <source src="{{env('AWS_MEDIA_URL')}}{{$video->videoLink ? $video->videoLink->file_name : ''}}" type="video/mp4" />
                  <source src="{{env('AWS_MEDIA_URL')}}{{$video->videoLink ? $video->videoLink->file_name : ''}}" type="video/webm" />
                </video>
              </td>
              <td>
                <img src="{{env('AWS_MEDIA_URL')}}{{$video->imageLink ? $video->imageLink->file_name : ''}}" style="width:60px;">
              </td>
              <td>
                {{$video->product_name}}
              </td>
              <td>
                {{$video->description}}</td>
              <td>
                {{$video->price}}</td>
              <td>
                <button class="btn btn-default">
                  <a href="{{ route('movie.video.edit', $video->id)}}" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>
                </button>
                <form action="{{ route('movie.video.delete', $video->id) }}" method="post" onsubmit="return confirm('Are you sure you want to Delete video?');">
                @csrf
                  <button class="btn btn-default">
                    <a href="" style="color:#061880;" title="Edit"><i class="material-icons">delete</i></a>
                  </button>
                </form>
              </td>
            </tbody>
            @endforeach
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('css_js_down')
<!-- DataTables  & Plugins -->
<script src="{{asset('store_owner_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>


<script>
    function validation(){
        const fi = document.getElementById('file');
        if (fi.files.length > 0) {
          const fsize = fi.files[0].size;
          const file = Math.round((fsize / 1024));
          // The size of the file.
          if (file >= 5120) {
              //alert("File too Big, please select a file less than 4mb");
              $('#file').val('');
              customShowNotification('right', 'right',"Video too Big, please select a video less than 5MB");
          }
        }
    }
</script>
<script>
  function customShowNotification (from, align, custom_message) {
      type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

      color = Math.floor((Math.random() * 6) + 1);

      $.notify({
          icon: "add_alert",
          message: custom_message

      }, {
          type: type[color],
          timer: 3000,
          placement: {
          //from: right,
          align: 'right'
          }
      });
    }

</script>

@if(Session::get('success_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection