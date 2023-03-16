@extends('superadmin.master')

@section('page_title')
Edit Attribute
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
                  <a href="{{route('ecommerce_subscription.index')}}" class="btn btn-info" style="float:right;"><i class="material-icons">list</i> Back</a>
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Add Subscription</h4>
                </div>
                <div class="card-body">
                  <form action="{{ route('ecommerce_subscription.store') }}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Category Type</label>
                          <select class="form-control" name="service_category_id" required>
                            @foreach($service_categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('is_active') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Package name</label>
                          <input type="text" name="name" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Duration Days</label>
                          <input type="text" name="duration_days" value="0" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('duration_days') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Remaining Notification Days</label>
                          <input type="text" name="remaining_notification" value="0" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('remaining_notification') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Amount (Default value 0 is required.)</label>
                          <input type="number" name="amount" value="0.00" step="0.01" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('amount') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount (Default value 0 is required.)</label>
                          <input type="number" name="discount" value="0.00" step="0.01" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('discount') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Listing (Default value 2 is required.)</label>
                          <input type="number" name="product_listing" value="2" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('product_listing') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Subscription Options</label><br/>
                          @foreach($subscription_options as $row)
                          <label><input type="checkbox" name="options[]" value="{{ $row->id }}" />&nbsp;&nbsp;{{ $row->title }}</label><br/>
                          @endforeach
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="is_active" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('is_active') }}</span>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save Subscription</button>
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



