@extends('superadmin.master')

@section('page_title')
E-commerce Subscription Option List
@endsection

@section('css_js_up')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('store_owner_assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<style>
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
</style>
@endsection

@section('main_content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <a href="{{route('option.add')}}" class="btn btn-info" style="float:right;"><i class="material-icons">add</i> Add New</a>
                  <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Subscription Option List</h4>
                </div>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($allOptions as $option)
                    <tr>
                        <th>{{ $option->id }}</th>
                        <th>{{ $option->title }}</th>
                        <th>{{ $option->status == 1 ? 'active' : 'inactive' }}</th>
                        <th>
                          <form action="{{ route('option.delete', [$option->id]) }}" method="post" id="delete-form-{{ $option->id }}">
                            @csrf
                            <input type="hidden" value="{{ $option->id }}" name="id" />
                          </form>
                            <a href="{{ route('option.edit', [$option->id]) }}" class="btn btn-success" title="Edit"><i class="fas fa-edit"></i></a>
                            <a href="javascript:;" title="Delete" class="btn btn-danger" onclick="deleteOption({{ $option->id }})"><i class="far fa-trash-alt"></i></a>
                        </th>
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
@endsection

@section('css_js_down')
<!-- DataTables  & Plugins -->

<script>

  function deleteOption(id)
  {
    if(confirm("Are you sure to delete the blog?"))
    {
      $("#delete-form-"+id).submit();
    }
  }
  </script>

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

@if(Session::get('success_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection



