@extends('superadmin.master')

@section('page_title')
Assign Vehicle Sub-Type
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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Assign Vehicle Sub-Type</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('transport.vehicle-sub-type.assign.submit')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}"/>
                    <input type="hidden" name="vehicle_sub_type_id"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" class="form-control" required/>
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('name') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                          <div class="">
                              <label class="bmd-label-floating">Image</label>
                              <br>
                              <img src="https://getuikit.com/v2/docs/images/placeholder_600x400.svg" id="image" style="width: 50px;height:50px"/>
                              <br>
                              <br>
                              <input type="file" name="image" id="image"/>
                              <br>
                              <span style="color:red;float:left;font-size:13px;">{{ $errors->first('image') }}</span>
                          </div>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col-md-4">
                        <label><input type="checkbox" name="has_color"/>&nbsp;&nbsp;Has Color</label>&nbsp;
                        <label><input type="checkbox" name="has_other_info"/>&nbsp;&nbsp;Has Other Info</label>&nbsp;
                        <label><input type="checkbox" name="has_number_of_seats"/>&nbsp;&nbsp;Has Number of Seats</label>&nbsp;
                        <label><input type="checkbox" name="has_baby_seat"/>&nbsp;&nbsp;Has baby seat</label>&nbsp;
                        <label><input type="checkbox" name="has_handicap_access"/>&nbsp;&nbsp;Has handicap access</label>&nbsp;
                        <label><input type="checkbox" name="has_ride_category"/>&nbsp;&nbsp;Has ride category</label>&nbsp;
                        <label><input type="checkbox" name="has_max_load_weight"/>&nbsp;&nbsp;Has max load weight</label>&nbsp;
                        <label><input type="checkbox" name="has_user_seat"/>&nbsp;&nbsp;Has user seat</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right"><span id="btn_txt">Assign</span></button>
                    <button type="button" class="btn btn-danger pull-right" id="cancel_edit" onclick="cancelEdit()" style="display: none;">Cancel Edit Mode</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('transport.vehicle-type.list')}}" class="btn btn-success pull-left">Back</a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Vehicle Sub-Types</h4>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
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
      ajax: "{{ route('transport.vehicle-sub-type.assign', ['id' => $id]) }}",
      columns: [
          {data: 'id', name: 'id'},
          {data: 'name', name: 'name'},
          {data: 'image', name: 'image'},
          {data: 'action', name: 'action'}
          
      ]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });

  function setValue(id, name, image, has_color, has_other_info, has_number_of_seats, has_baby_seat, has_handicap_access, has_ride_category, has_max_load_weight, has_user_seat)
  {
    document.getElementById('btn_txt').innerText = 'Update';
    document.getElementById('cancel_edit').style.display = 'block';
    document.getElementsByName('vehicle_sub_type_id')[0].value = id;
    document.getElementsByName('name')[0].focus();
    document.getElementsByName('name')[0].value = name;
    if(image) document.getElementById('image').setAttribute('src', `{{env('AWS_MEDIA_URL')}}`+image);
    document.getElementsByName('has_color')[0].checked  = parseInt(has_color) ? true : false;
    document.getElementsByName('has_other_info')[0].checked  = parseInt(has_other_info) ? true : false;
    document.getElementsByName('has_number_of_seats')[0].checked  = parseInt(has_number_of_seats) ? true : false;
    document.getElementsByName('has_baby_seat')[0].checked  = parseInt(has_baby_seat) ? true : false;
    document.getElementsByName('has_handicap_access')[0].checked  = parseInt(has_handicap_access) ? true : false;
    document.getElementsByName('has_ride_category')[0].checked  = parseInt(has_ride_category) ? true : false;
    document.getElementsByName('has_max_load_weight')[0].checked  = parseInt(has_max_load_weight) ? true : false;
    document.getElementsByName('has_user_seat')[0].checked  = parseInt(has_user_seat) ? true : false;
  }

  function cancelEdit()
  {
    document.getElementsByName('vehicle_sub_type_id')[0].value = '';
    document.getElementsByName('name')[0].value = '';
    document.getElementsByName('name')[0].value = '';
    document.getElementById('btn_txt').innerText = 'Assign';
    document.getElementById('cancel_edit').style.display = 'none';
    document.getElementById('image').setAttribute('src', 'https://getuikit.com/v2/docs/images/placeholder_600x400.svg');
    document.getElementsByName('has_color')[0].checked  = false;
    document.getElementsByName('has_other_info')[0].checked  = false;
    document.getElementsByName('has_number_of_seats')[0].checked  = false;
    document.getElementsByName('has_baby_seat')[0].checked  = false;
    document.getElementsByName('has_handicap_access')[0].checked  = false;
    document.getElementsByName('has_ride_category')[0].checked  = false;
    document.getElementsByName('has_max_load_weight')[0].checked  = false;
    document.getElementsByName('has_user_seat')[0].checked  = false;
  }

</script>

<script>
    function changeStatus(id) {
        console.log('s = ' + id);
        var mainParent = $('.approve' + id).parent('.toggle-btn');
        if ($(mainParent).find('input.approve' + id).is(':checked')) {
            $.ajax({
                url: '{{route("transport.vehicle-sub-type.change.status")}}',
                method: 'POST',
                data: {
                    'id': id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(data) {
                    $(mainParent).addClass('active');
                    $('.approve' + id).attr("checked", "checked");
                    customShowNotification('top', 'right', "Status changed successfully");
                }
            });
        } else {
            $.ajax({
                url: '{{route("transport.vehicle-sub-type.change.status")}}',
                method: 'POST',
                data: {
                    'id': id,
                    '_token': '{{csrf_token()}}'
                },
                success: function(data) {
                    $(mainParent).removeClass('active');
                    $('.feature' + id).removeAttr('checked');
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



