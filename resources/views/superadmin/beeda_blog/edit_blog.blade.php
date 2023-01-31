@extends('superadmin.master')

@section('page_title')
Edit Brand
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
                  <h4 class="card-title">Edit Beeda Blog</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('beeda.blog.edit.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$blog->id}}" />
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Blog Title <span class="text-danger">*</span></label>
                          <input type="text" name="title" value="{{$blog->title}}" class="form-control" onkeyup="setSlug($(this).val())">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('title') }}</span>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label class="bmd-label-floating">Category <span class="text-danger">*</span></label>
                            <select class="form-control" name="category_id" id="category_id">
                                <option value="">Select Option</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @if($blog->category_id) @if($blog->category_id == $category->id) selected @endif @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('category_id') }}</span>
                            </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label class="bmd-label-floating">Device Type <span class="text-danger">*</span></label>
                            <select class="form-control" name="device_type" id="device_type">
                                <option value="">Select Option</option>
                                <option value="web" @if($blog->device_type) @if($blog->device_type == 'web') selected @endif @endif>Web</option>
                                <option value="mobile" @if($blog->device_type) @if($blog->device_type == 'mobile') selected @endif @endif>Mobile</option>
                            </select>
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('device_type') }}</span>
                            </div>
                        </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" id="slug" class="form-control" value="{{ $blog->slug }}">
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('slug') }}</span>
                          </div>
                        </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-6">
                          <div class="">
                            <label class="bmd-label-floating">Banner <small>(1300x650)</small></label>
                            <br />
                            <input type="file" name="banner" id="banner" />   
                          </div>
                          <div style="margin-top: 10px; margin-bottom: 10px;">
                            @if($blog->banner)
                              <img src="{{assetUrl().$blog->img->file_name}}" style="width:100px;height:100px;"/>
                            @endif
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-12">
                            <br>
                          <div class="form-group">
                          <label class="bmd-label-floating">Short Description <span class="text-danger">*</span></label>
                          <textarea id="editor" name="short_description" rows="5">{{ $blog->short_description }}</textarea>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('short_description') }}</span>
                          </div>
                        </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Description</label>
                              <div class="form-group">
                                <textarea id="editor1" name="description" rows="5">{{ $blog->description }}</textarea>
                              </div>
                            </div>
                          </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ $blog->meta_title }}">
                          </div>
                        </div>
                      </div>
  
                      <div class="row mb-3">
                        <div class="col-md-6">
                            <br>
                          <div class="">
                            <label class="bmd-label-floating">Meta Image <small>(200x200)</small></label>
                            <br/>
                            <input type="file" name="meta_img" id="meta_img" />
                          </div>
                          <div style="margin-top: 10px; margin-bottom: 10px;">
                            @if($blog->meta_img)
                              <img src="{{assetUrl().$blog->metaImg->file_name}}" style="width:100px;height:100px;"/>
                            @endif
                          </div>
                        </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Meta description</label>
                              <div class="form-group">
                                <textarea id="editor2" name="meta_description" rows="5">{{ $blog->meta_description }}</textarea>
                              </div>
                            </div>
                          </div>
                      </div>
  
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label class="bmd-label-floating">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" value="{{ $blog->meta_keywords }}">
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



