@extends('superadmin.master')

@section('page_title')
Assign Vehicle
@endsection

@section('css_js_up')
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
                  <h4 class="card-title">Assign Vehicle</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('transport.courier.package-type.store.vehicle')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$id}}" name="id" />
                    <div class="row">
                      @foreach($transportVehicleType as $vehicle)
                      <div class="col-md-2">
                          <label class="bmd-label-floating">
                            <input type="checkbox" value="{{$vehicle->id}}" name="vehicles[]" {{ in_array($vehicle->id, $packageTypeVehicles) ? 'checked' : '' }}/>&nbsp;&nbsp;&nbsp;{{$vehicle->name}}
                          </label>
                      </div>
                      @endforeach
                      <span style="color:red;float:left;font-size:13px;">{{ $errors->first('vehicles') }}</span>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Assign</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <a href="{{route('transport.courier.package-type.list')}}" class="btn btn-success pull-left">Back</a>
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



