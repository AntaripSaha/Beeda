@extends('superadmin.master')

@section('page_title')
Brand List
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
            <h4 class="card-title mt-0" style="padding-top: 7px;margin-left: 5px;font-size: 17px;">Categories</h4>
          </div>
          <div class="card-body">
            <form action="{{route('update.pharmacy.section.category')}}" method="post" enctype="multipart/form-data">
              @csrf
                <h3>Section 1</h3><br>
                <div class="row">
                  <div class="col-md-6" style="margin-top: 35px !important;">
                    <div class="form-group">
                      <label class="bmd-label-floating">Section Name</label>
                      <input type="text" name="section_name_1" value="{{ get_setting('pharmacy_category_name_1') }}" class="form-control" require>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label class="bmd-label-floating">Parent Category </label>
                      <select class="form-control" name="section_1_value" required id="section_1_value">
                          <option value="">Select Option</option>
                          @foreach($categories as $category)                         
                            @if($category->id == get_setting('pharmacy_category_section_1'))
                              <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <h3>Section 2</h3><br>
                <div class="row">
                  <div class="col-md-6" style="margin-top: 35px !important;">
                    <div class="form-group">
                      <label class="bmd-label-floating">Section Name</label>
                      <input type="text" value="{{ get_setting('pharmacy_category_name_2') }}" name="section_name_2" class="form-control" require>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label class="bmd-label-floating">Parent Category </label>
                      <select class="form-control" name="section_2_value" required id="section_2_value">
                          <option value="">Select Option</option>
                          @foreach($categories as $category)                         
                            @if($category->id == get_setting('pharmacy_category_section_2'))
                              <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <h3>Section 3</h3><br>
                <div class="row">
                  <div class="col-md-6" style="margin-top: 35px !important;">
                    <div class="form-group">
                      <label class="bmd-label-floating">Section Name</label>
                      <input type="text" name="section_name_3" value="{{ get_setting('pharmacy_category_name_3') }}" class="form-control" require>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group ">
                      <label class="bmd-label-floating">Parent Category </label>
                      <select class="form-control"  name="section_3_value" required id="section_3_value">
                          <option value="">Select Option</option>
                          @foreach($categories as $category)                         
                            @if($category->id == get_setting('pharmacy_category_section_3'))
                              <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                              <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                          @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-auto my-1">
                  <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection



@if(Session::get('success_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif




