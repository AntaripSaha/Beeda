@extends('superadmin.master')

@section('page_title')
Vouchers
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
  .toggle-btn {
    width: 44px;
    height: 19px;
    margin: 10px 10px 10px 10px;
    border-radius: 50px;
    display: inline-block;
    position: relative;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAyklEQVQ4T42TaxHCQAyENw5wAhLACVUAUkABOCkSwEkdhNmbpHNckzv689L98toIAKjqGcAFwElEFr5ln6ruAMwA7iLyFBM/TPDuQSrxwf6fCKBoX2UMIYGYkg8BLOnVg2RiAEexGaQQq4w9e9klcxGLLAUwgDAcihlYAR1IvZA1sz/+AAaQjXhTQQVoe2Yo3E7UQiT2ijeQdojRtClOfVKvMVyVpU594kZK9zzySWTlcNqZY9tjCsUds00+A57z1e35xzlzJjee8xf0HYp+cOZQUQAAAABJRU5ErkJggg==) no-repeat 50px center #b9b9b9;
    cursor: pointer;
    -webkit-transition: background-color .40s ease-in-out;
    -moz-transition: background-color .40s ease-in-out;
    -o-transition: background-color .40s ease-in-out;
    transition: background-color .40s ease-in-out;
    cursor: pointer;
  }

  .toggle-btn.active {
    /* background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAmUlEQVQ4T6WT0RWDMAhFeZs4ipu0mawZpaO4yevBc6hUIWLNd+4NeQDk5sE/PMkZwFvZywKSTxF5iUgH0C4JHGyF97IggFVSqyCFga0CvQSg70Mdwd8QSSr4sGBMcgavAgdvwQCtApvA2uKr1x7Pu++06ItrF5LXPB/CP4M0kKTwYRIDyRAOR9lJTuF0F0hOAJbKopVHOZN9ACS0UgowIx8ZAAAAAElFTkSuQmCC) no-repeat 10px center #b9b9b9; */
    background: url('{{asset("assets/images/website-logo-icon/switch-btn.png")}}') no-repeat 24px center #b9b9b9;
    background-size: 18px 18px;
  }

  .toggle-btn.active .round-btn {
    left: 45px;
    opacity: 0;
  }

  .toggle-btn .round-btn {
    width: 15px;
    height: 15px;
    background-color: #fff;
    border-radius: 50%;
    display: inline-block;
    position: absolute;
    left: 5px;
    top: 50%;
    margin-top: -8px;
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

  .btn {
    padding: 5px 10px;
    margin-right: 5px;
  }

  .btn.btn-info {
    color: #fff;
    background-color: #061880;
    border-color: #061880;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
  }
</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <a href="{{route('banner.add')}}" class="btn btn-info" style="float:right;" data-toggle="modal" data-target="#exampleModal"><i class="material-icons">add</i> Generate Voucher</a>
            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Voucher Batch List</h4>
          </div>
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Batch No</th>
                  <th>Status</th>
                  <th>Total Vouchers</th>
                  <th>Generated On</th>
                  <th>Reference</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('css_js_down')
<!-- DataTables  & Plugins -->
<script src="{{asset('store_owner_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('store_owner_assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
  function customShowNotification(from, align, custom_message) {
    type = ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

    color = Math.floor((Math.random() * 6) + 1);

    $.notify({
      icon: "add_alert",
      message: custom_message

    }, {
      type: type[color],
      timer: 3000,
      placement: {
        from: from,
        align: align
      }
    });
  }
</script>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      processing: true,
      serverSide: true,
      order: [0, "desc"],
      ajax: "{{ route('voucher.index') }}",
      columns: [{
          data: 'batch_no',
          name: 'batch_no'
        },
        {
          data: 'status',
          name: 'status'
        },
        {
          data: 'voucher_count',
          name: 'voucher_count'
        },
        {
          data: 'created_at',
          name: 'created_at'
        },
        {
          data: 'reference',
          name: 'reference'
        },
        {
          data: 'action',
          name: 'action'
        }
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<script>

</script>

@if(Session::get('success_message'))
<script>
  customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="card-title mt-0" id="exampleModalLabel">Generate Vouchers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('voucher.generate')}}" method="post" id="myform" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Number of Vouchers:</label>
            <input type="number" value="10" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Currency:</label>
            <select class="form-control" name="currency" id="currency" required>
              @foreach($currencies as $currency)
              <option value="{{$currency->id}}">{{$currency->name}} - {{$currency->symbol}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Reference: (optional)</label>
            <input type="text" class="form-control" id="reference" name="reference">
          </div>
          <div class="form-group" id="otp_div" style="display: none;">
            <label for="message-text" class="col-form-label">OTP:</label>
            <input type="text" class="form-control" id="otp" name="otp" required>
            <input type="hidden" class="form-control" id="otp_confirm" name="otp_confirm">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" onclick="sendOTP()" id="buttonLabel">Generate</a>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
  function sendOTP() {
    if ($('#otp_div').css('display') == 'none') {
      document.getElementById('buttonLabel').innerHTML = 'Processing...';
      axios.get('/api/voucher-otp')
        .then(function(response) {
          console.log(response.data.otp);
          let otp = response.data.otp;
          $('#otp_confirm').val(otp);
          document.getElementById('otp_div').style.display = 'block';
          customShowNotification('bottom', 'right', "Please check your email for OTP");
          document.getElementById("otp").focus();
          document.getElementById('buttonLabel').innerHTML = 'Confirm';
        })
        .catch(function(error) {
          console.log(error);
        });
    } else {
      document.getElementById("myform").submit();
    }
  }
</script>
@endsection