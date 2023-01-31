@extends('superadmin.master')

@section('page_title')
Add Banner
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
                  <h4 class="card-title">Add Banner</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('banner.add.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                          <br>
                        <div class="">
                          <label class="bmd-label-floating">Banner</label>
                          <input type="file" name="photo" id="photo" />
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('photo') }}</span>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-6">
                          <div class="form-group ">
                            <label class="bmd-label-floating">Banner for Service Category</label>
                            <select class="form-control" name="service_category" id="service_category">
                                <option value="">Select Option</option>
                                @foreach($service_category_list as $service)
                                  <option value="{{$service->id}}">{{$service->name}}</option>
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
                          <label class="bmd-label-floating">Banner of</label>&nbsp;&nbsp;&nbsp;
                          <input type="radio" onclick="showTypeField($(this))" name="type" value="1"/>&nbsp;Product
                          <input type="radio" onclick="showTypeField($(this))" name="type" value="2"/>&nbsp;Shop
                          <input type="radio" onclick="showTypeField($(this))" name="type" value="3" checked/>&nbsp;Other
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('photo') }}</span>
                        </div>
                      </div>
                    </div>

                    <div class="product">
                    </div>

                    <div class="shop">
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Position</label>
                          <input type="number" name="position" min="1" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('position') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row other">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">URL</label>
                          <input type="text" name="url" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                            <label class="bmd-label-floating">Published</label>
                            <select class="form-control" name="published" id="published">
                                <option value="">Select Option</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <span style="color:red;float:left;font-size:13px;">{{ $errors->first('published') }}</span>
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

<script>
  function showTypeField(type)
  {
    if(!$("#service_category").val())
    {
      alert("Please select service category");
      return;
    }
    else if(type.val() == 1)
    {
      $.ajax({
          url: "{{route('banner.service.category.products')}}",
          type: "POST",
          data: {"_token": "{{csrf_token()}}", id: $("#service_category").val()},
          success: function(data){
              var content = `<div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                      <label class="bmd-label-floating">Select Product</label>
                      <select class="form-control" name="product" id="product"><option value="">Select Option</option>`;      
                for(var i=0; i < data.products.length; i++)
                {
                  content += '<option value="'+data.products[i].id+'">'+data.products[i].name+'</option>';
                }
                content += `</select>
                      </div>
                  </div>
                </div>`;
              $(".other").hide();
              $(".shop").hide();
              $(".product").show();
              $(".product").html(content);  
          }
      });
    }
    else if(type.val() == 2)
    {
      $.ajax({
          url: "{{route('banner.service.category.shops')}}",
          type: "POST",
          data: {"_token": "{{csrf_token()}}", id: $("#service_category").val()},
          success: function(data){
              var content = `<div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                      <label class="bmd-label-floating">Select Shop</label>
                      <select class="form-control" name="shop" id="shop"><option value="">Select Option</option>`;      
                for(var i=0; i < data.shops.length; i++)
                {
                  content += '<option value="'+data.shops[i].id+'">'+data.shops[i].name+'</option>';
                }
                content += `</select>
                      </div>
                  </div>
                </div>`;
              $(".other").hide();
              $(".shop").show();
              $(".product").hide();
              $(".shop").html(content);  
          }
      });
    }
    else
    {
      $(".other").show();
      $(".shop").hide();
      $(".product").hide();
    }
    
  }
</script>
@endsection



