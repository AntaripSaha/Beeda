@extends('store_owner.master')

@section('page_title')
    Orders
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

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
.checked {
  color: orange;
}
</style>
@endsection

@section('main_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12">
        <div class="card">
              <div class="card-header">

                <h3 class="card-title" style="color:black;">Order DataTable</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Order Code</th>
                    <th>Service</th>
                    <th>No. of Products</th>
                    <th>Customer</th>
                    <th>Amount</th>
                    <th>Delivery Status</th>
                    <th>Payment Status</th>
                    <th>Viewed</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        </div>
        </div>
        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      processing: true,
      serverSide: true,
      ajax: "{{ route('order.list') }}",
      columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sorting: false},
          {data: 'code', name: 'code'},
          {data: 'service', name: 'service'},
          {data: 'quantity', name: 'quantity'},
          {data: 'customer', name: 'customer'},
          {data: 'amount', name: 'amount'},
          {data: 'delivery_status', name: 'delivery_status'},
          {data: 'payment_status', name: 'payment_status'},
          {data: 'viewed', name: 'viewed'},
          {data: 'action', name: 'action'},
          
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

</script>

<script>
//$('input.cb-value').prop("checked", true);
function publish(id)
{
  var mainParent = $('.publish'+id).parent('.toggle-btn');
  if($(mainParent).find('input.publish'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.item.publish")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              iziToast.success({
                  title: 'Success',
                  position: 'topRight',
                  message: 'Product published successfully',
              });
            }
        });
    $(mainParent).addClass('active');
    $('.publish'+id).attr("checked", "checked");
  } else {
    $.ajax({
            url: '{{route("service.item.publish")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              iziToast.success({
                  title: 'Success',
                  position: 'topRight',
                  message: 'Product unpublished successfully',
              });
            }
        });
    $(mainParent).removeClass('active');
    $('.publish'+id).removeAttr('checked');
  }
}

function feature(id)
{
  var mainParent = $('.feature'+id).parent('.toggle-btn');
  if($(mainParent).find('input.feature'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.item.feature")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              iziToast.success({
                  title: 'Success',
                  position: 'topRight',
                  message: 'Product featured successfully',
              });
            }
        });
    $(mainParent).addClass('active');
    $('.feature'+id).attr("checked", "checked");
  } else {
    $.ajax({
            url: '{{route("service.item.feature")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              iziToast.success({
                  title: 'Success',
                  position: 'topRight',
                  message: 'Product unfeatured successfully',
              });
            }
        });
    $(mainParent).removeClass('active');
    $('.feature'+id).removeAttr('checked');
  }
}

// $(document).on('click', '.cb-value', function(){
//   alert(2222);
// })
// $('.cb-value').click(function() {
//   alert(222);
//   var mainParent = $(this).parent('.toggle-btn');
//   if($(mainParent).find('input.cb-value').is(':checked')) {
//     $(mainParent).addClass('active');
//     $(this).attr("checked", "checked");
//   } else {
//     $(mainParent).removeClass('active');
//     $(this).removeAttr('checked');
//   }

// })
</script>

@if(Session::get('success_message'))
    <script>
        iziToast.success({
            title: 'OK',
            position: 'topRight',
            message: '{{Session::get("success_message")}}',
        });
    </script>
 @endif
@endsection

