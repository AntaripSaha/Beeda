@extends('superadmin.master')
@section('page_title')
Edit Loan Type
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Loan Type</h4>
            <p class="card-category">(Service information)</p>
          </div>
          <div class="card-body">
            <form action="{{route('loan.type.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="loan_type_id" value="{{$loan_type->id}}" />
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Loan Name</label>
                        <input type="text" name="loan_type" class="form-control" value="{{$loan_type->loan_type}}" required>
                        <span style="color:red;float:left;font-size:13px;">{{ $errors->first('loan_type') }}</span>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Loan Basis</label>
                        <select class="form-control" name="basis" >
                            <option value="Month" @if($loan_type->basis =="Month") selected @endif>Month</option>
                            <option value="Day" @if($loan_type->basis =="Day") selected @endif>Day</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="">
                            <label class="bmd-label-floating">Image</label>
                            <input type="file" name="image" />
                        </div>
                    </div>
                    @if(isset($loan_type->loan_image->file_name))
                        <div class="col-md-6">
                            <div class="">
                                <img src="{{env('AWS_MEDIA_URL')}}{{$loan_type->loan_image->file_name}}" style="width:400px;" />
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <div class="">
                        <label class="bmd-label-floating">Image Background Color</label>
                        <br>
                        <input type="color" name="image_bg_color" value="{{$loan_type->image_background}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <div class="">
                        <label class="bmd-label-floating">Max Amount Background Color</label>
                        <br>
                        <input type="color" name="max_amount_bg_color" value="{{$loan_type->max_amount_background}}" required>
                    </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Max Amount</label>
                        <input type="text" name="max_amount" class="form-control" value="{{$loan_type->max_amount}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Max EMI Term</label>
                        <select class="form-control" name="max_emi_term_id" >
                            @foreach($emi_terms as $term)
                                <option value="{{ $term->id }}" @if($term->id == $loan_type->max_emi_term_id) selected @endif>{{ $term->term_month }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Interest Rate</label>
                        <input type="number" step="0.01" min="0.01" max="100" name="interest_rate" class="form-control" value="{{$loan_type->interest_rate}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Processing Fee</label>
                        <input type="number" name="processing_fee" class="form-control" value="{{$loan_type->processing_fee}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Type</label>
                        <select class="form-control" name="type" >
                            <option value="Package" @if($loan_type->type== "Package") selected @endif>Package</option>
                            <option value="Regular" @if($loan_type->type== "Regular") selected @endif>Regular</option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Late Penalty Percentage</label>
                        <input type="number" step="0.01" min="0.01" max="100" name="late_penalty_percentage" class="form-control" value="{{$loan_type->late_penalty_percentage}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">advance Pay Decrease Percentage</label>
                        <input type="number" step="0.01" min="0.01" max="100" name="advance_pay_decrease_percentage" class="form-control" value="{{$loan_type->advance_pay_decrease_percentage}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label class="bmd-label-floating">Min EMI Percentage</label>
                        <input type="number" step="0.01" min="0.01" max="100" name="min_emi_percentage" class="form-control" value="{{$loan_type->min_emi_percentage}}" required>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="bmd-label-floating">Status</label>
                            <select class="form-control" name="status" >
                                    <option value="1" @if($loan_type->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($loan_type->status == 0) selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div >
                    <div class="row" >
                        <div class="col-md-12"  id="more">
                            <label class="bmd-label-floating">Choose Rerquired Documentrs</label><br>

                        </div>
                    </div>
                    <button id="rowAdder" type="button"
                        class="btn btn-dark">
                        <span class="bi bi-plus-square-dotted">
                        </span> + Add More
                    </button>
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
<script type="text/javascript">
    $(document).ready(function(){
        var obj = <?= json_encode($loan_type->documents) ?>;
        var obj = JSON.parse(JSON.stringify(obj));
        $.each( obj, function( key, value ) {
            var file = '';
            value.image ? file = `<img src="{{env('AWS_MEDIA_URL')}}${value.image.file_name}" style="width:200px;">` : file = '<span>No image selected</span>';
            // alert(file);
            $('#more').append(
                `<div class="row" id="row">
                    <input type="hidden" name="existing_image_id[]" value="${value.id}"/>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-check-label" for="doc_name">Name</label>
                            <input type="text" value="${value.name}" class="form-check" name="doc_name[]" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div >
                            <label class="form-check-label" for="demo_image">Demo Image</label>
                            <input type="file" accept=".png, .jpg, .jpeg" class="form-check"  name="update_demo_image[]" />
                            <input type="hidden" value="${value.id}" accept=".png, .jpg, .jpeg" class="form-check"  name="update_demo_image_id[]" />
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div >
                           ${file}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger"
                            id="DeleteRow" type="button">
                            <i class="bi bi-trash"></i>
                            X
                        </button>
                    </div>
                </div>`
            );
        });
        $("#rowAdder").click(function () {
            newRowAdd =
                `<div class="row" id="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-check-label" for="doc_name">Name</label>
                            <input type="text" class="form-check" name="doc_name[]" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label class="form-check-label" for="demo_image">Demo Image</label>
                        <input id="imageUpload" accept=".png, .jpg, .jpeg" type="file" class="form-check"  name="new_demo_image[]" required/>
                    </div>
                    <div class="col-md-2">
                        <div id="imagePreview" ></div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger"
                            id="DeleteRow" type="button">
                            <i class="bi bi-trash"></i>
                            X
                        </button>
                    </div>
                </div>`;

            $('#more').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();

        })
    });
</script>
@if(Session::get('error_message'))
<script>
  customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
@endif

@endsection
