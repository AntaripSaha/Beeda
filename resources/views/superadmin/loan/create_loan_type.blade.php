@extends('superadmin.master')

@section('page_title')
Edit Service
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
            <h4 class="card-title">Add Loan Type</h4>
            <p class="card-category">(Service information)</p>
          </div>
          <div class="card-body">
            <form action="{{route('service.edit.submit')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="" />
                <input type="hidden" name="category_type" value="" />
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Loan Name</label>
                        <input type="text" name="loan_type" class="form-control" required>
                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('loan_type') }}</span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Loan Basis</label>
                        <select class="form-control" name="basis" required>
                            <option value="Month">Month</option>
                            <option value="Day">Day</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <div class="">
                        <label class="bmd-label-floating">Image</label>
                        <input type="file" name="image" required/>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <div class="">
                        <label class="bmd-label-floating">Image Background Color</label>
                        <br>
                        <input type="color" name="image_bg_color" >
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <div class="">
                        <label class="bmd-label-floating">Max Amount Background Color</label>
                        <br>
                        <input type="color" name="max_amount_bg_color" >
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Max Amount</label>
                        <input type="text" name="max_amount" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Max EMI Term</label>
                        <select class="form-control" name="max_emi_term_id" required>
                            @foreach($emi_terms as $term)
                                <option value="{{ $term->term_month }}">{{ $term->term_month }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Interest Rate</label>
                        <input type="text" name="interest_rate" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Processing Fee</label>
                        <input type="text" name="processing_fee" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Type</label>
                        <select class="form-control" name="type" required>
                            <option value="Package" selected>Package</option>
                            <option value="Regular">Regular</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Late Penalty Percentage</label>
                        <input type="text" name="late_penalty_percentage" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">advance Pay Decrease Percentage</label>
                        <input type="text" name="advance_pay_decrease_percentage" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Min EMI Percentage</label>
                        <input type="text" name="min_emi_percentage" class="form-control" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">  
                        <label class="bmd-label-floating">Choose Rerquired Documentrs</label><br>
                        <div class="row">
                            @foreach($required_document as $documents)
                                <div class="col-md-6"> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check" type="checkbox" name="required_document[]" id="inlineRadio1" value="{{ $documents->id }}" />
                                        <label class="form-check-label" for="inlineRadio1">{{ $documents->name }}</label>
                                    </div>
                                </div>
                            @endforeach
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