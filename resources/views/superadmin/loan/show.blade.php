@extends('superadmin.master')

@section('page_title')
Customer Details
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')">
<link rel="stylesheet" href="asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')">
<style>
.toggle-btn {
  width: 72px;
  height: 26px;
  margin: 10px;
  border-radius: 50px;
  display: inline-block;
  position: relative;
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==") no-repeat 50px center #e74c3c;
  cursor: pointer;
  -webkit-transition: background-color .40s ease-in-out;
  -moz-transition: background-color .40s ease-in-out;
  -o-transition: background-color .40s ease-in-out;
  transition: background-color .40s ease-in-out;
  cursor: pointer;
}
.toggle-btn.active {
  background: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC") no-repeat 10px center #2ecc71;
}
.toggle-btn.active .round-btn {
  left: 45px;
}
.toggle-btn .round-btn {
  width: 20px;
  height: 20px;
  background-color: #fff;
  border-radius: 50%;
  display: inline-block;
  position: absolute;
  left: 5px;
  top: 50%;
  margin-top: -10px;
  -webkit-transition: all .30s ease-in-out;
  -moz-transition: all .30s ease-in-out;
  -o-transition: all .30s ease-in-out;
  transition: all .30s ease-in-out;
}
.toggle-btn .cb-value {
  position: absolute;
  left: 0;
  right: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 9;
  cursor: pointer;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}
.btn{
  padding: 5px 10px;
  margin-right: 5px;
}
.btn.btn-info {
    color: #fff;
    background-color: #061880;
    border-color: #061880;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
}
.modal-dialog {
  width: 100%;
  height: 100%;
  margin: 0;
  padding: 0;
}

.modal-content {
  height: auto;
  min-height: 100%;
  border-radius: 0;
}
</style>
@endsection

@section('main_content')

<div class="content">
        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">              
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        
        
          <div class="row">
            <div class="col-md-10">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Loan Details</h4>
                </div>
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-6">
                                    <h4 class="mt-5">
                                        Applied By: 
                                        @if($loan->user->name)  {{$loan->user->name}} 
                                        @else {{$loan->user->first_name}}{{$loan->user->last_name}} @endif
                                    </h4>
                                    <h4>
                                        Name: {{$loan->first_name}}{{$loan->last_name}}
                                    </h4>
                                    <h4>
                                        Amount: {{$loan->amount}}
                                    </h4>
                                    <ul class="list-unstyled">
                                      
                                        Status:<br>
                                        <select id="loan_status" class="form-select" aria-label="Default select example">
                                            <option value="Pending" @if($loan->loan_status == "Pending") selected @endif>Pending</option>
                                            <option value="Processing" @if($loan->loan_status == "Processing") selected @endif>Processing</option>
                                            <option value="Rejected" @if($loan->loan_status == "Rejected") selected @endif>Rejected</option>
                                            <option value="On Hold" @if($loan->loan_status == "On Hold") selected @endif>On Hold</option>
                                            <option value="Approved" @if($loan->loan_status == "Approved") selected @endif>Approved</option>
                                            <option value="Under Review" @if($loan->loan_status == "Under Review") selected @endif>Under Review</option>
                                        </select>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 class="box-title mt-5 ml-5">General Info</h3>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-product">
                                            <tbody>
                                                <tr>
                                                    <td width="390">Name</td>
                                                    <td>{{$loan->first_name}} {{$loan->last_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>{{$loan->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>{{$loan->primary_phone}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>{{$loan->street_address}},{{$loan->state}}, {{$loan->zip}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Birth Date</td>
                                                    <td>{{$loan->date_of_birth}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Social Link </td>
                                                    <td>{{$loan->social_link_from}}:{{$loan->social_link}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Interest Rate </td>
                                                    <td>@if($loan->loan_type->type == "Regular"){{$loan->emi_term->interest_rate_reguler}}%
                                                        @else {{ $loan->interest_rate }}%
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total Payable Amount </td>
                                                    <td>@if($loan->loan_type->type == "Regular"){{$loan->amount + (($loan->amount*$loan->emi_term->interest_rate_reguler)/100)}}
                                                        @else {{ $loan->amount + (($loan->amount*$loan->interest_rate)/100) }}
                                                        @endif
                                                    </td>
                                                </tr>
                                                @foreach($loan->loan_document as $document)
                                                    <tr>
                                                        <td>{{ $document->document_name->name }} </td>
                                                        <td>
                                                            <a href="#" class="pop">
                                                                <img src="{{assetUrl().$document->image->file_name}} " height="150">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              <a href="{{route('loan.index')}}" class="btn btn-dark">Go Back</a>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('css_js_down')
<script>
    $('#loan_status').change(function(){

        var id = '{{ $loan->id }}';
        // alert(id);
        var loan_status = $(this).val();
        var user_id = '{{$loan->user_id}}';
        // alert(user_id);

        $.ajax({
            type:'POST',
            url:"{{ route('loan.status') }}",
            data:{'id':id, 'loan_status':loan_status ,'user_id':user_id, '_token': '{{csrf_token()}}'},
            success:function(data){
                alert(data.message);
                console.log(data);
            },
            error:function(e){
                console.log(e);
            }
        });

    });
</script>
<script>
    $(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');   
        });     
});
</script>

@if(Session::get('success_message'))

@endif

@endsection



