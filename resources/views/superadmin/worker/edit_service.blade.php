@extends('superadmin.master')

@section('page_title')
Edit Service
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>

</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Worker Service</h4>
            <p class="card-category">(Service information)</p>
          </div>
          <div class="card-body">
            <form action="{{route('worker.service.edit.submit')}}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="id" value="{{$service->id}}" />
              <input type="hidden" name="category_type" value="{{$service->category_type}}" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" name="name" value="{{$service->name}}" class="form-control">
                    <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <br>
                  <div class="">
                    <label class="bmd-label-floating">Icon</label>
                    <br>
                    <img src="{{assetUrl().$service->icon_image}}" style="width:100px;height:100px;" />
                    <br>
                    <input type="file" name="icon" id="icon" />
                    <br>
                    <span style="color:red;float:left;font-size:13px;">{{ $errors->first('icon') }}</span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <br>
                  <div class="">
                    <label class="bmd-label-floating">Background Color</label>
                    <br>
                    <input type="color" name="color" value="{{$service->color}}">
                    <span style="color:red;float:left;font-size:13px;">{{ $errors->first('color') }}</span>
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