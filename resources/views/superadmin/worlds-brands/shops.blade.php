@extends('superadmin.master')

@section('page_title')
Add Brand
@endsection

@section('css_js_up')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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

.select2-results__option--selectable {
    color: black !important;
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
                  <h4 class="card-title">{{$worldsBrand->name}}'s Shops</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('worlds-brands.shops',['id'=>$worldsBrand->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <select class="js-example-basic-multiple form-control" name="shops[]" multiple="multiple" style="color:black !important">
                            @foreach($shops as $shop)
                            <option value="{{$shop->id}}">{{$shop->name}}</option>
                            @endforeach
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
@endif
<script>

  var existingShops = JSON.parse(`{{$existingShops}}`);
  console.log(existingShops);
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2().val(existingShops).trigger('change');
  });
</script>
@endsection



