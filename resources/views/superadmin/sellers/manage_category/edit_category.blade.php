@extends('superadmin.master')

@section('page_title')
Edit Category
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
                  <h4 class="card-title">Edit Category</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('category.edit.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$category->id}}" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" value="{{$category->name}}" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="bmd-label-floating">Parent Category <small>(Optional)</small></label>
                          <select class="form-control" name="parent_category" id="parent_category">
                              <option value="">Select Option</option>
                              @foreach($category_list as $singleCategory)                         
                                @if(count($singleCategory->child_categories)>0)
                                <option value="{{$singleCategory->id}}" @if($category->parent) @if($singleCategory->id == $category->parent->id) selected @endif @endif>{{$singleCategory->name}}</option>
                                    @php 
                                        $parent_id = null;
                                        if($category->parent)
                                        {
                                            $parent_id = $category->parent->id;
                                        }    
                                    @endphp
                                    @include('store_owner.service_item.subcategory', ['child_categories'=>$singleCategory->child_categories, 'parent_category_id' => $parent_id])
                                @else
                                <option value="{{$singleCategory->id}}">{{$singleCategory->name}}</option>
                                @endif
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="bmd-label-floating">Type</label>
                          <select class="form-control" name="type" id="type">
                              <option value="">Select Option</option>
                              <option value="0" @if($category->digital == 0) selected @endif>Physical</option>
                              <option value="1" @if($category->digital == 1) selected @endif>Digital</option>
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('type') }}</span>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group ">
                          <label class="bmd-label-floating">Service Category</label>
                          <select class="form-control" name="service_category" id="service_category">
                              <option value="">Select Option</option>
                              @foreach($service_category_list as $service)
                                <option value="{{$service->id}}" @if($category->service_category_id) @if($category->service_category_id == $service->id) selected @endif @endif>{{$service->name}}</option>
                              @endforeach
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('service_category') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <br>
                        <div class="">
                          <label class="bmd-label-floating">Banner (670x270) <small>(Optional)</small></label>
                          <br>
                          @if($category->banner)
                            <img src="{{assetUrl().$category->banner->file_name}}" style="width:100px;height:100px;"/>
                          @endif
                          <br>
                          <br>
                          <input type="file" name="banner" id="banner" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <br>
                        <div class="">
                          <label class="bmd-label-floating">Icon <small>(Optional)</small></label>
                          <br>
                          @if($category->icon)
                            <img src="{{assetUrl().$category->icon->file_name}}" style="width:100px;height:100px;"/>
                          @endif
                          <br>
                          <br>
                          <input type="file" name="icon" id="icon" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <br>
                        <div class="form-group">
                        <label class="bmd-label-floating">Meta Title <small>(Optional)</small></label>
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Meta Description <small>(Optional)</small></label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Description here...</label>
                            <textarea class="form-control" name="meta_description" rows="5">{{$category->meta_description}}</textarea>
                          </div>
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



