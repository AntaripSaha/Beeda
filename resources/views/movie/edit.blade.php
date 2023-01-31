@extends('superadmin.master')

@section('page_title')
Edit Banner
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
.btn{
  font-size: 13px;
  padding: 9px 24px;
}
.btn.btn-primary {
    color: #fff;
    background-color: #061880 !important;
    border-color: #061880 !important;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
}
</style>
@endsection

@section('main_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Video</h4>
                </div>
                <div class="card-body">
                <form action="{{route('movie.video.update', $video->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-md-6">
                        <br>
                        <div class="">
                            <label class="bmd-label-floating">Video</label>
                            <br>
                            <video id="my-video" class="video-js" controls preload="auto"  width="640"  height="264"  data-setup="{}" >
                                <source src="{{env('AWS_MEDIA_URL')}}{{$video->videolink->file_name}}" type="video/mp4" />
                                <source src="{{env('AWS_MEDIA_URL')}}{{$video->videolink->file_name}}" type="video/webm" />
                                
                            </video>
                            <br>
                            <br>
                            <input type="file" name="video" id="video" />
                        </div>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label class="bmd-label-floating">Image</label><br>
                                <img src="{{env('AWS_MEDIA_URL')}}{{$video->imageLink->file_name}}" style="width:60px;">
                            </div>
                            <input type="file" name="image" class="image_logo">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label class="bmd-label-floating">Product Name</label><br>
                                <input type="text" name="product_name" value="{{$video->product_name}}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label class="bmd-label-floating">Description</label><br>
                                <textarea rows="10" name="description" class="form-control">{{$video->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="">
                                <label class="bmd-label-floating">Price</label><br>
                                <input type="number" name="price" value="{{$video->price}}" class="form-control" step=0.01>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <div class="clearfix"></div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css_js_down')

@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
@endif

@endsection



