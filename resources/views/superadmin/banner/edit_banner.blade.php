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
                  <h4 class="card-title">Edit Banner @if($banner_data->service_category) ({{$banner_data->service_category->name}}) @endif</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('banner.edit.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$banner_data->id}}" />
                    <div class="row">
                      <div class="col-md-6">
                          <br>
                        <div class="">
                          <label class="bmd-label-floating">Banner</label>
                          <br>
                          @if($banner_data->photo)
                            <img src="{{assetUrl().$banner_data->photo}}" style="width:160px;height:60px;"/>
                          @endif
                          <br>
                          <br>
                          <input type="file" name="photo" id="photo" />
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Position</label>
                          <input type="number" name="position" min="1" value="{{$banner_data->position}}" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('position') }}</span>
                        </div>
                      </div>
                    </div>
                    @if($banner_data->type == 3)
                    <div class="row other">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">URL</label>
                          <input type="text" name="url" value="{{$banner_data->url}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label class="bmd-label-floating">Published</label>
                            <select class="form-control" name="published" id="published">
                                <option value="">Select Option</option>
                                <option value="1" @if($banner_data->published == 1) selected @endif>Yes</option>
                                <option value="0" @if($banner_data->published == 0) selected @endif>No</option>
                            </select>
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('published') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                          <label class="bmd-label-floating">Slider Section</label>
                          <select class="form-control" name="slider_section" id="slider_section">
                              <option value="">Select section</option>
                              @for ($i = 1; $i <= 10; $i++)
                              <option value="{{ $i }}" @if($banner_data->slider_section == $i) echo 'selecteed' @endif>{{ $i }}</option>
                              @endfor
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('slider_section') }}</span>
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



