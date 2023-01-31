@extends('superadmin.master')

@section('page_title')
Store Product List
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
.btn{
  padding: 5px 10px;
}
.btn.btn-primary {
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
                  <h4 class="card-title mt-0" style="margin-left: 4px;">All Product List</h4>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Shop Name</th>
                    <th>Service Category</th>
                    <th>Category</th>
                    <th>Published</th>
                    <th>Tabed</th>
                    <th>Featured</th>
                    <th>Today's Deal</th>
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

<script>
function customShowNotification (from, align, custom_message) {
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
  $(function () {  
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      processing: true,
      serverSide: true,
      order: [0, "desc"],
      ajax: "{{ route('product.list') }}",
      columns: [
          {data: 'id', name: 'id'},
          {data: 'product_image', name: 'product_image'},
          {data: 'name', name: 'name'},
          {data: 'shop_name', name: 'shop_name'},
          {data: 'service_category', name: 'service_category'},
          {data: 'category', name: 'category'},
          {data: 'published', name: 'published'},
          {data: 'tabed', name: 'tabed'},
          {data: 'featured', name: 'featured'},
          {data: 'todays_deal', name: 'todays_deal'},
          
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

function publish(id)
{
  var mainParent = $('.publish'+id).parent('.toggle-btn');
  if($(mainParent).find('input.publish'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.publish.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).addClass('active');
              $('.publish'+id).attr("checked", "checked");
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  } else {
    $.ajax({
            url: '{{route("service.publish.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).removeClass('active');
              $('.publish'+id).removeAttr('checked');
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  }
}

function tab(id)
{
  var mainParent = $('.tab'+id).parent('.toggle-btn');
  if($(mainParent).find('input.tab'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.tab.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).addClass('active');
              $('.tab'+id).attr("checked", "checked");
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  } else {
    $.ajax({
            url: '{{route("service.tab.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).removeClass('active');
              $('.tab'+id).removeAttr('checked');
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  }
}

function feature(id)
{
  var mainParent = $('.feature'+id).parent('.toggle-btn');
  if($(mainParent).find('input.feature'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.feature.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).addClass('active');
              $('.feature'+id).attr("checked", "checked");
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  } else {
    $.ajax({
            url: '{{route("service.feature.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).removeClass('active');
              $('.feature'+id).removeAttr('checked');
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  }
}

function todaysDeal(id)
{
  var mainParent = $('.todaysDeal'+id).parent('.toggle-btn');
  if($(mainParent).find('input.todaysDeal'+id).is(':checked')) {
    $.ajax({
            url: '{{route("service.todaysdeal.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).addClass('active');
              $('.todaysDeal'+id).attr("checked", "checked");
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  } else {
    $.ajax({
            url: '{{route("service.todaysdeal.product")}}',
            method: 'POST',
            data: {'product_id': id, '_token': '{{csrf_token()}}'},
            success: function(data){
              $(mainParent).removeClass('active');
              $('.todaysDeal'+id).removeAttr('checked');
              customShowNotification('top', 'right', "Status changed successfully");
            }
        });
  }
}

</script>

@if(Session::get('success_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection



