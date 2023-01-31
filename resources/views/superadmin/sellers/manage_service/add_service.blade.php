@extends('superadmin.master')

@section('page_title')
Add Service
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
            <h4 class="card-title">Add Service</h4>
            <p class="card-category">(Service information)</p>
          </div>
          <div class="card-body">
            <form action="{{route('service.add.submit')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" name="name" class="form-control">
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
                    <input type="file" name="icon" id="icon" />
                    <input type="hidden" name="category_type" id="category_type" value="2" />
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
                    <input type="color" name="color" value="#FF5733">
                    <span style="color:red;float:left;font-size:13px;">{{ $errors->first('color') }}</span>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Add</button>
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