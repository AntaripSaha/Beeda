@extends('store_owner.master')

@section('page_title')
    Add Delivery Zone
@endsection

@section('css_js_up')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.css')}})">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('store_owner_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- tags input -->
  <link rel="stylesheet" href="{{asset('store_owner_assets/tags_input/tagsinput.css')}}">

  <style>

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
            <h1 class="m-0">Add Delivery Zone</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Add Delivery Zone</a></li>
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
                      <!-- form start -->
        <form action="{{route('add.delivery.zone.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-8">
            <!-- general form elements -->
            <!-- product information -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Delivery Zone Information</h3>
              </div>
              <!-- /.card-header -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="item_name">City Name</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name">
                    <span style="color:red;font-size:13px;">{{ $errors->first('city') }}</span>
                  </div>
                  <div class="form-group">
                    <label for="country">Country</label>
                    <select class="form-control select2bs4" style="width: 100%;" name="country" id="country">
                      <option value="" disabled selected>Select</option>
                        @if($country_list)
                          @foreach($country_list as $country)
                              <option value="{{$country->id}}">{{$country->name}}</option>
                          @endforeach
                        @endif                                     
                    </select>
                    <span style="color:red;font-size:13px;">{{ $errors->first('country') }}</span>
                  </div>
                  <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="number" step="any" min="1" class="form-control" name="cost" id="cost" placeholder="Enter Cost">
                    <span style="color:red;font-size:13px;">{{ $errors->first('cost') }}</span>
                  </div>
                  <button type="submit" class="btn btn-sm float-right" style="background-color:#061880;border: 1px solid #061880;color:white;margin-left: 4px;">Add</button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- product information end -->
        </div>
        </div>
        <!-- /.row -->
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css_js_down')
<!-- Summernote -->
<script src="{{asset('store_owner_assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('store_owner_assets/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Tags Input -->
<script src="{{asset('store_owner_assets/tags_input/tagsinput.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('store_owner_assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endsection

