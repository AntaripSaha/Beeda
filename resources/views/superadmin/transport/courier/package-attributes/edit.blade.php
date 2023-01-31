@extends('superadmin.master')

@section('page_title')
Edit Package Attribute
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
                  <h4 class="card-title">Edit Package Attribute</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('transport.courier.package-attribute.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$packageAttribute->id}}" name="id"/>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" value="{{$packageAttribute->title}}" class="form-control">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('title') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Units</label>
                          @php 
                            $units = '';
                            if($packageAttribute->units)
                            {
                              $unitArray = json_decode($packageAttribute->units);
                              foreach($unitArray as $value)
                              {
                                $units .= $value.',';
                              }
                            }
                          @endphp
                          <input type="text" name="units" class="form-control" value="{{trim($units, ',')}}" id="inputTag" data-role="tagsinput">
                          <span style="color:red;float:left;font-size:13px;">{{ $errors->first('units') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="bmd-label-floating">
                            Is Required? &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="is_required" @if($packageAttribute->is_required) checked @endif/>
                          </label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                          <label class="bmd-label-floating">
                            Input Type
                          </label>
                          <select name="input_type" class="form-control">
                            <option value="pre-defined" {{$packageAttribute->input_type=='pre-defined' ? 'selected' : ''}}>Pre Defined</option>
                            <option value="custom" {{$packageAttribute->input_type=='custom' ? 'selected' : ''}}>Custom</option>
                          </select>
                      </div>
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

@if(Session::get('error_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('error_message')}}");
</script>
<script>
  $("#inputTag").tagsinput('items');
</script>
@endif

@endsection



