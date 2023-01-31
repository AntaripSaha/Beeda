@extends('superadmin.master')

@section('page_title')
Add Package Type
@endsection

@section('css_js_up')
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
                  <h4 class="card-title">Add Package Type</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('transport.courier.package-type.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('title') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea name="description" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="bmd-label-floating">
                            Has Fragile Items? &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="has_fragile_items"/>
                          </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="bmd-label-floating">
                            Need Assistance? &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="need_assistance"/>
                          </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="bmd-label-floating">
                            Has Liability? &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="has_liability"/>
                          </label>
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



