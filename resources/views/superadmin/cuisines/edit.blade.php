@extends('superadmin.master')

@section('page_title')
Cuisine Brand
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
                  <h4 class="card-title">Edit Cuisine</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('superadmin.cuisine.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" value="{{$cuisine->name}}" name="name" class="form-control">
                          <input type="hidden" value="{{$cuisine->id}}" name="id">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <br>
                        <div class="">
                          <label class="bmd-label-floating">Image</label>
                          <br>
                          <input type="file" name="image" id="image" />
                          <img src="{{env('AWS_MEDIA_URL') . $cuisine->image}}" height="100px" alt="{{$cuisine->name}}">
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
                                  <img src="{{env('AWS_MEDIA_URL') . $cuisine->icon}}" height="100px" alt="{{$cuisine->name}}">
                              </div>
                          </div>
                      </div>
                    <div class="row">
                      <div class="col-md-6">
                          <br>
                        <div class="">
                          <label class="bmd-label-floating">Status</label>
                          <br>
                          <select class="form-control" name="status" id="status">
                              <option value="1" {{$cuisine->status ? 'selected' : ''}}>Active</option>
                              <option value="0" {{!$cuisine->status ? 'selected' : ''}}>Inactive</option>
                          </select>
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



