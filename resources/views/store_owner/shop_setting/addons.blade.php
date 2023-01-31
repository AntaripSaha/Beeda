@extends('store_owner.master')

@section('page_title')
Addons
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
                    <h1 class="m-0">Addons</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Store</a></li>
                        <li class="breadcrumb-item active">Addons</li>
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
                            <h3 class="card-title" style="color:black;">Addons List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input placeholder="Addon Name" type="text" name="name" id="addon_name" class="form-control">
                                        <input type="hidden" value="{{$shopId}}" name="shop_id" class="form-control">
                                        <input type="hidden" value="0" name="id" id="addon_id" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="number" name="price" id="addon_price" class="form-control" placeholder="Price">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button onclick="storeAddon()" id="buttonLable" class="btn btn-info pull-right">Add Addon</button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button style="display: none;" onclick="clacelEdit()" id="cancelButton" class="btn btn-dark pull-right">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Addon Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- hear load data --}}
                                </tbody>
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


<script type="text/javascript">
    var table;
    $(document).ready( function () {
       $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       table = $('#example1').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('addon.list', ['id' => $shopId]) }}",
              columns: [
                {data:  'DT_RowIndex', name: 'DT_RowIndex'},
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                {data: 'action', name: 'action', orderable: false},
            ],
             order: [[0, 'desc']]
       });
   });
</script>

<script>
    function storeAddon() {
        var name = document.getElementById('addon_name').value;
        var price = document.getElementById('addon_price').value;
        var id = document.getElementById('addon_id').value;
        var shopId = `{{$shopId}}`;
        if (name == '' || price == '') return;

        $.ajax({
            url: '{{route("addon.store")}}',
            method: 'POST',
            data: {
                'name': name,
                'price': price,
                'id': id,
                'shop_id': shopId,
                '_token': '{{csrf_token()}}'
            },
            success: function(data) {
                table.ajax.reload();
            }
        });

        document.getElementById('addon_name').value = '';
        document.getElementById('addon_price').value = '';
        document.getElementById('addon_id').value = 0;
        document.getElementById('cancelButton').style.display = 'none';
        document.getElementById('buttonLable').innerHTML = 'Add Addon';
    }

    function editAddon(id, name, price) {
        document.getElementById('addon_id').value = id;
        document.getElementById('addon_name').value = name;
        document.getElementById('addon_price').value = price;
        document.getElementById('buttonLable').innerHTML = 'Update Addon';
        document.getElementById('cancelButton').style.display = 'block';
    }

    function deleteAddon(id) {
        $.ajax({
            url: '{{route("addon.delete")}}',
            method: 'POST',
            data: {
                'id': id,
                '_token': '{{csrf_token()}}'
            },
            success: function(data) {
                table.ajax.reload();
            }
        });
    }

    function clacelEdit() {
        document.getElementById('addon_name').value = '';
        document.getElementById('addon_price').value = '';
        document.getElementById('addon_id').value = 0;
        document.getElementById('cancelButton').style.display = 'none';
        document.getElementById('buttonLable').innerHTML = 'Add Addon';
    }
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