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
                  <a href="{{route('subscriptions.index')}}" class="btn btn-info" style="float:right;"><i class="material-icons">list</i> Back</a>
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Edit Subscription</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('subscriptions.update')}}" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" value="{{$subscription->id}}" name="id"/>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Service Category Type</label>
                          <select class="form-control" name="service_category_id" required>
                            @foreach($service_categories as $row)
                            <option value="{{ $row->id }}" @if($subscription->service_category_id == $row->id) {{ 'selected' }} @endif>{{ $row->name }}</option>
                            @endforeach
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('is_active') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Package name</label>
                          <input type="text" name="name" value="{{$subscription->name}}" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Duration Days</label>
                          <input type="number" name="duration_days" value="{{$subscription->duration_days}}" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('duration_days') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Remaining Notification Days</label>
                          <input type="number" name="remaining_notification" value="{{$subscription->remaining_notification}}" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('remaining_notification') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Amount (Default value 0 is required.)</label>
                          <input type="text" name="amount" value="{{ number_format($subscription->amount, 2) }}" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('amount') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount (Default value 0 is required.)</label>
                          <input type="text" name="discount" value="{{ number_format($subscription->discount, 2) }}" class="form-control" required>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('discount') }}</span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="is_active" required>
                            <option value="1" @if($subscription->is_active == 1) {{ 'selected' }} @endif>Active</option>
                            <option value="0" @if($subscription->is_active == 0) {{ 'selected' }} @endif>Inactive</option>
                          </select>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('is_active') }}</span>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Subscription</button>
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



