@extends('superadmin.master')

@section('page_title')
Add Coupon
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
                  <h4 class="card-title">Add Coupon</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('service.coupon.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code</label>
                          <input type="text" name="code" value="{{old('code')}}" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('code') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Category</label>
                          <select class="form-control js-example-basic-multiple" name="service" id="service" onchange="setPercent()">
                              <option value="">All Service</option>
                              @foreach($service_categories as $service)
                              <option value="{{$service->id}}">{{$service->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Coupon For Users</label>
                          <select class="form-control js-example-basic-multiple" name="users[]" multiple="multiple">
                              @foreach($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Coupon For Shops</label>
                          <select class="form-control js-example-basic-multiple" name="shops[]" multiple="multiple">
                              @foreach($shops as $shop)
                              <option value="{{$shop->id}}">{{$shop->name}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    </div> -->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Limit Per User</label>
                          <input type="number" min="0" name="limit_per_user" value="{{old('limit_per_user')}}" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('limit_per_user') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount Type</label>
                          <select class="form-control" name="discount_type" id="discount_type">
                              <option value="amount">Amount</option>
                              <option value="percent">Percent</option>
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('discount_type') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount</label>
                          <input type="number" min="0" step="any" value="{{old('discount')}}" name="discount" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('discount') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Max Discount</label>
                          <input type="number" min="0" step="any" value="{{old('max_discount')}}" name="max_discount" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('max_discount') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Minimum Cart Amount</label>
                          <input type="number" min="0" step="any" value="{{old('min_cart_amount')}}" name="min_cart_amount" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('min_cart_amount') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Start Date</label>
                          <input type="date" name="start_date" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('start_date') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>End Date</label>
                          <input type="date" name="end_date" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('end_date') }}</span>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
@endif
<script>
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
  });

  function setPercent()
  {
    if(['{{\App\Constants\ServiceCategoryType::RIDES}}', '{{\App\Constants\ServiceCategoryType::COURIER}}'].includes($('#service').val()))
    {
      $('#discount_type').val('percent');
      $('#discount_type option:not(:selected)').attr('disabled', true);
      return;
    }
    $('#discount_type option:not(:selected)').attr('disabled', false);
  }
</script>
@endsection



