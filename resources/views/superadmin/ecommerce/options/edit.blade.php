@extends('superadmin.master')

@section('page_title')
Ecommerce Subscription Option Edit
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
                  <h4 class="card-title">Edit Option</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('option.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$option->id}}" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title <span class="text-danger">*</span></label>
                          <input type="text" name="title" value="{{$option->title}}" class="form-control" onkeyup="setSlug($(this).val())">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('title') }}</span>
                        </div>
                      </div>
                    </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label class="bmd-label-floating">Status<span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="status">
                                <option value="">Select Option</option>
                                <option value="1" @if($option->status) @if($option->status == 1) selected @endif @endif>Active</option>
                                <option value="0" @if($option->status) @if($option->status == 0) selected @endif @endif>Inactive</option>
                            </select>
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('status') }}</span>
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

<script>
    function setSlug(slug)
    {
      slug = slug.replaceAll(' ', '-');
      $("#slug").val(slug);
    }
</script>

@endsection



0