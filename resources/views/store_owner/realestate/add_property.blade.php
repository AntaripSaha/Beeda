@extends('store_owner.master')

@section('page_title')
Add Property
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
  /*Copied from bootstrap to handle input file multiple*/
  /* This is copied from https://github.com/blueimp/jQuery-File-Upload/blob/master/css/jquery.fileupload.css */
  .fileinput-button {
    position: relative;
    overflow: hidden;
  }

  .fileinput-button input {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    opacity: 0;
    -ms-filter: "alpha(opacity=0)";
    font-size: 200px;
    direction: ltr;
    cursor: pointer;
  }

  .thumb {
    height: 80px;
    width: 100px;
    border: 1px solid #000;
  }

  ul.thumb-Images li {
    width: 120px;
    float: left;
    display: inline-block;
    vertical-align: top;
    height: 120px;
  }

  .img-wrap {
    position: relative;
    display: inline-block;
    font-size: 0;
  }

  .img-wrap .close {
    position: absolute;
    top: 2px;
    right: 2px;
    z-index: 100;
    background-color: #d0e5f5;
    padding: 5px 2px 2px;
    color: #000;
    font-weight: bolder;
    cursor: pointer;
    opacity: 0.5;
    font-size: 23px;
    line-height: 10px;
    border-radius: 50%;
  }

  .img-wrap:hover .close {
    opacity: 1;
    background-color: #ff0000;
  }

  .FileNameCaptionStyle {
    font-size: 12px;
  }






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

  .fileinput-button {
    position: relative;
    overflow: hidden;
    background-color: #061880;
    color: white;
  }


  /* input[type="file"] {
  display: block;
} */
  .imageThumb {
    max-height: 75px;
    border: 2px solid;
    padding: 1px;
    cursor: pointer;
  }

  .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
  }

  .remove {
    display: block;
    background: #444;
    border: 1px solid black;
    color: white;
    text-align: center;
    cursor: pointer;
  }

  .remove:hover {
    background: white;
    color: black;
  }

  .bootstrap-switch {
    float: right;
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
          <h1 class="m-0">Add Property</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Add Property</a></li>
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
      <form action="{{route('realestate.add.property.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop_id}}" />
        <div class="row">
          <div class="col-8">
            <!-- general form elements -->
            <!-- product information -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Property Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="item_name">Property Name</label>
                  <input type="text" class="form-control" name="property_name" id="property_name" placeholder="Enter Property Name">

                  <span style="color:red;font-size:13px;">{{ $errors->first('property_name') }}</span>
                </div>
                <div class="form-group">
                  <label for="category">Category</label>
                  <select class="form-control select2bs4" style="width: 100%;" name="category" id="category">
                    <option value="" disabled selected>Select</option>
                    @if($data)
                    @foreach($data->category as $category)

                    @if(count($category->child_categories)>0)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @include('store_owner.service_item.subcategory', ['child_categories'=>$category->child_categories])
                    @else
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endif
                    @endforeach
                    @endif
                  </select>
                  <span style="color:red;font-size:13px;">{{ $errors->first('category') }}</span>
                </div>

                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="summernote" name="description">
                    </textarea>
                </div>
                <div class="form-group">
                  <label for="tags">Tags</label>
                  <div class="bs-example">
                    <input type="text" name="tags" data-role="tagsinput">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gallery Image</label>
                  <br>
                  <!-- <div class="field" align="left">
                      <input type="file" id="files" class="form-control" name="gallery_images[]" multiple />
                    </div> -->
                  <!--To give the control a modern look, I have applied a stylesheet in the parent span.-->
                  <span class="btn btn-info fileinput-button">
                    <span><i class="fa fa-paperclip" aria-hidden="true"></i> Select Attachment</span>
                    <input type="file" name="gallery_images[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
                  </span>
                  <br>
                  <br>
                  <output id="Filelist"></output>
                </div>

                <div>

                </div>
                <div class="form-group">
                  <label for="thumbnail_image">Thumbnail Image</label>
                  <input type="file" id="thumbnail_image" class="form-control" name="thumbnail_image" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('thumbnail_image') }}</span>
                </div>
				        <div class="form-group">
                  <label for="bed">Number of Beds</label>
                  <input type="number" class="form-control" min="0" value="0" name="bed" id="bed" placeholder="0">
                  <span style="color:red;font-size:13px;">{{ $errors->first('bed') }}</span>
                </div>
				        <div class="form-group">
                  <label for="bath">Number of Baths</label>
                  <input type="number" class="form-control" min="0" value="0" name="bath" id="bath" placeholder="0">
                  <span style="color:red;font-size:13px;">{{ $errors->first('bath') }}</span>
                </div>
				        <div class="form-group">
                  <label for="area">Area</label>
                  <input type="number" class="form-control" min="0" value="0" name="area" id="area" placeholder="100">
                  <span style="color:red;font-size:13px;">{{ $errors->first('area') }}</span>
                </div>
				        <div class="form-group">
                  <label for="plot_area">Plot Area</label>
                  <input type="number" class="form-control" min="0" value="0" name="plot_area" id="plot_area" placeholder="100">
                  <span style="color:red;font-size:13px;">{{ $errors->first('plot_area') }}</span>
                </div>
				        <div class="form-group">
                  <label for="property_type">Property Type</label>
                  <select name="property_type" class="form-control" id="property_type">
                    <option value="0">Sell</option>
                    <option value="1">Rent</option>
                  </select>
                  <span style="color:red;font-size:13px;">{{ $errors->first('property_type') }}</span>
                </div>
				        <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" min="0" value="0" name="price" id="price" placeholder="100">
                  <span style="color:red;font-size:13px;">{{ $errors->first('price') }}</span>
                </div>
				        <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="store_address">Property Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Choose from map">
                            <input type="hidden" name="address_long" id="lng" class="form-control">
                            <input type="hidden" name="address_lat" id="lat" class="form-control">
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                        <label>Select Your Property Address</label>
                    </div>
                    <div class="col-md-12">
                        <input id="searchInput" name="store_address"
                                class="form-control col-sm-6 mt-2"
                                type="text" placeholder="Enter a location">
                        <div class="map" id="map"
                                style="width: 100%; height: 300px;"></div>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- product information end -->

            <!-- interior features -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Interior Features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="interior_status">Status</label>
                  <select name="interior_status" id="interior_status" class="form-control">
                    <option value="">Select</option>
                    <option value="0">Sell</option>
                    <option value="1">Rent</option>
                  </select>
                  <span style="color:red;font-size:13px;">{{ $errors->first('interior_status') }}</span>
                </div>
                <div class="form-group">
                  <label for="interior_living_area">Living Area</label>
                  <input type="number" min="1" name="interior_living_area" id="interior_living_area" class="form-control" placeholder="1848" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('interior_living_area') }}</span>
                </div>
                <div class="form-group">
                  <label for="interior_type">Type</label>
                  <input type="text" name="interior_type" id="interior_type" class="form-control" placeholder="Condo" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('interior_type') }}</span>
                </div>
                <div class="form-group">
                  <label for="interior_year_built">Year Built</label>
                  <input type="text" name="interior_year_built" id="interior_year_built" class="form-control" placeholder="1994" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('interior_year_built') }}</span>
                </div>
                <div class="form-group">
                  <label for="interior_life_styles">Life Styles</label>
                  <input type="text" name="interior_life_styles" id="interior_life_styles" class="form-control" placeholder="Beach" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('interior_life_styles') }}</span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- interior features end -->

            <!-- exterior features -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Exterior Features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="exterior_status">Status</label>
                  <select name="exterior_status" id="exterior_status" class="form-control">
                    <option value="">Select</option>
                    <option value="0">Sell</option>
                    <option value="1">Rent</option>
                  </select>
                  <span style="color:red;font-size:13px;">{{ $errors->first('exterior_status') }}</span>
                </div>
                <div class="form-group">
                  <label for="exterior_living_area">Living Area</label>
                  <input type="number" min="1" name="exterior_living_area" id="exterior_living_area" class="form-control" placeholder="1848" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('exterior_living_area') }}</span>
                </div>
                <div class="form-group">
                  <label for="exterior_type">Type</label>
                  <input type="text" name="exterior_type" id="exterior_type" class="form-control" placeholder="Condo" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('exterior_type') }}</span>
                </div>
                <div class="form-group">
                  <label for="exterior_year_built">Year Built</label>
                  <input type="text" name="exterior_year_built" id="exterior_year_built" class="form-control" placeholder="1994" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('exterior_year_built') }}</span>
                </div>
                <div class="form-group">
                  <label for="exterior_life_styles">Life Styles</label>
                  <input type="text" name="exterior_life_styles" id="exterior_life_styles" class="form-control" placeholder="Beach" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('exterior_life_styles') }}</span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- exterior features end -->

            <!-- area features -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Area & Lot Features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="area_status">Status</label>
                  <select name="area_status" id="area_status" class="form-control">
                    <option value="">Select</option>
                    <option value="0">Sell</option>
                    <option value="1">Rent</option>
                  </select>
                  <span style="color:red;font-size:13px;">{{ $errors->first('area_status') }}</span>
                </div>
                <div class="form-group">
                  <label for="area_living_area">Living Area</label>
                  <input type="number" min="1" name="area_living_area" id="area_living_area" class="form-control" placeholder="1848" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('area_living_area') }}</span>
                </div>
                <div class="form-group">
                  <label for="area_type">Type</label>
                  <input type="text" name="area_type" id="area_type" class="form-control" placeholder="Condo" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('area_type') }}</span>
                </div>
                <div class="form-group">
                  <label for="area_year_built">Year Built</label>
                  <input type="text" name="area_year_built" id="area_year_built" class="form-control" placeholder="1994" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('area_year_built') }}</span>
                </div>
                <div class="form-group">
                  <label for="area_life_styles">Life Styles</label>
                  <input type="text" name="area_life_styles" id="area_life_styles" class="form-control" placeholder="Beach" />
                  <span style="color:red;font-size:13px;">{{ $errors->first('area_life_styles') }}</span>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- area features end -->

            <!-- product videos -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Property Videos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="video_provider">Video Provider</label>
                  <select class="form-control" name="video_provider" id="video_provider">
                    <option value="youtube">Youtube</option>
                    <option value="dailymotion">Dailymotion</option>
                    <option value="vimeo">Vimeo</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="video_link">Video Link</label>
                  <input type="text" name="video_link" id="video_link" class="form-control" placeholder="Video Link" />
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- product videos end -->

            <!-- seo meta tags -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">SEO Meta Tags</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="meta_title">Meta Title</label>
                  <input type="text" class="form-control" name="meta_title" id="meta_title" placeholder="Enter Meta Title">
                </div>
                <div class="form-group">
                  <label for="meta_description">Description</label>
                  <textarea class="summernote" name="meta_description">
                    </textarea>
                </div>
                <div class="form-group">
                  <label for="meta_image">Meta Image</label>
                  <input type="file" class="form-control" name="meta_image" id="meta_image">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- seo meta tags end -->
            <input type="hidden" id="place_id" name="place_id"/>
            <input type="submit" value="Submit" class="btn float-right" style="background-color: #061880;color: white;"/>
            <br>
            <br>
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
<script src="//maps.googleapis.com/maps/api/js?key={{env('GOOGLE_API_KEY')}}&libraries=places"></script>
    <script>

    // google map
    function initialize() {
        var latlng = new google.maps.LatLng(18.0179, -76.8099);
        var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 10
            });
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var input = document.getElementById('searchInput');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        var geocoder = new google.maps.Geocoder();
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                window.alert("Autocomplete's returned place contains no geometry");
                return;
            }
            // If the place has a geometry, then present it on a map.
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            console.log(place);
            $("#place_id").val(place.place_id);
            bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
            infowindow.setContent(place.formatted_address);
            infowindow.open(map, marker);
        });
        // this function will work on marker move event into map
        google.maps.event.addListener(marker, 'dragend', function () {
            geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        // console.log(results);
                        $("#place_id").val(results[0].place_id);
                        bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                    }
                }
            });
        });
    }

    function bindDataToForm(address, lat, lng) {
        document.getElementById('address').value = address;
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        document.getElementById('searchInput').value = address;
        // console.log(address);
    }

    google.maps.event.addDomListener(window, 'load', initialize);
    // google map end
</script>
<script>
  $(document).ready(function() {
    $('.cuisine-basic-multiple').select2();
  });
  $(document).ready(function() {
    $('.addon-basic-multiple').select2();
  });
</script>

<script>
 

  $(function() {
    // Summernote
    $('.summernote').summernote();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    // $("#inputTag").tagsinput('items');

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  })

  
</script>


<script>
  //I added event handler for the file upload control to access the files properties.
  document.addEventListener("DOMContentLoaded", init, false);

  //To save an array of attachments
  var AttachmentArray = [];

  //counter for attachment array
  var arrCounter = 0;

  //to make sure the error message for number of files will be shown only one time.
  var filesCounterAlertStatus = false;

  //un ordered list to keep attachments thumbnails
  var ul = document.createElement("ul");
  ul.className = "thumb-Images";
  ul.id = "imgList";

  function init() {
    //add javascript handlers for the file upload event
    document
      .querySelector("#files")
      .addEventListener("change", handleFileSelect, false);
  }

  //the handler for file upload event
  function handleFileSelect(e) {
    //to make sure the user select file/files
    if (!e.target.files) return;

    //To obtaine a File reference
    var files = e.target.files;

    // Loop through the FileList and then to render image files as thumbnails.
    for (var i = 0, f;
      (f = files[i]); i++) {
      //instantiate a FileReader object to read its contents into memory
      var fileReader = new FileReader();

      // Closure to capture the file information and apply validation.
      fileReader.onload = (function(readerEvt) {
        return function(e) {
          //Apply the validation rules for attachments upload
          ApplyFileValidationRules(readerEvt);

          //Render attachments thumbnails.
          RenderThumbnail(e, readerEvt);

          //Fill the array of attachment
          FillAttachmentArray(e, readerEvt);
        };
      })(f);

      // Read in the image file as a data URL.
      // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
      // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
      fileReader.readAsDataURL(f);
    }
    document
      .getElementById("files")
      .addEventListener("change", handleFileSelect, false);
  }

  //To remove attachment once user click on x button
  jQuery(function($) {
    $("div").on("click", ".img-wrap .close", function() {
      var id = $(this)
        .closest(".img-wrap")
        .find("img")
        .data("id");

      //to remove the deleted item from array
      var elementPos = AttachmentArray.map(function(x) {
        return x.FileName;
      }).indexOf(id);
      if (elementPos !== -1) {
        AttachmentArray.splice(elementPos, 1);
      }
      console.log(AttachmentArray);
      //to remove image tag
      $(this)
        .parent()
        .find("img")
        .not()
        .remove();

      //to remove div tag that contain the image
      $(this)
        .parent()
        .find("div")
        .not()
        .remove();

      //to remove div tag that contain caption name
      $(this)
        .parent()
        .parent()
        .find("div")
        .not()
        .remove();

      //to remove li tag
      var lis = document.querySelectorAll("#imgList li");
      for (var i = 0;
        (li = lis[i]); i++) {
        if (li.innerHTML == "") {
          li.parentNode.removeChild(li);
        }
      }
    });
  });

  //Apply the validation rules for attachments upload
  function ApplyFileValidationRules(readerEvt) {
    //To check file type according to upload conditions
    if (CheckFileType(readerEvt.type) == false) {
      alert(
        "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/gif files"
      );
      e.preventDefault();
      return;
    }

    //To check file Size according to upload conditions
    if (CheckFileSize(readerEvt.size) == false) {
      alert(
        "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
      );
      e.preventDefault();
      return;
    }

    //To check files count according to upload conditions
    if (CheckFilesCount(AttachmentArray) == false) {
      if (!filesCounterAlertStatus) {
        filesCounterAlertStatus = true;
        alert(
          "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
        );
      }
      e.preventDefault();
      return;
    }
  }

  //To check file type according to upload conditions
  function CheckFileType(fileType) {
    if (fileType == "image/jpeg") {
      return true;
    } else if (fileType == "image/png") {
      return true;
    } else if (fileType == "image/gif") {
      return true;
    } else {
      return false;
    }
    return true;
  }

  //To check file Size according to upload conditions
  function CheckFileSize(fileSize) {
    // if (fileSize < 300000) {
    //   return true;
    // } else {
    //   return false;
    // }
    return true;
  }

  //To check files count according to upload conditions
  function CheckFilesCount(AttachmentArray) {
    //Since AttachmentArray.length return the next available index in the array,
    //I have used the loop to get the real length
    var len = 0;
    for (var i = 0; i < AttachmentArray.length; i++) {
      if (AttachmentArray[i] !== undefined) {
        len++;
      }
    }
    //To check the length does not exceed 10 files maximum
    if (len > 9) {
      return false;
    } else {
      return true;
    }
  }

  //Render attachments thumbnails.
  function RenderThumbnail(e, readerEvt) {
    var li = document.createElement("li");
    ul.appendChild(li);
    li.innerHTML = [
      '<div class="img-wrap"> <span class="close">&times;</span>' +
      '<img class="thumb" src="',
      e.target.result,
      '" title="',
      escape(readerEvt.name),
      '" data-id="',
      readerEvt.name,
      '"/>' + "</div>"
    ].join("");

    var div = document.createElement("div");
    div.className = "FileNameCaptionStyle";
    li.appendChild(div);
    div.innerHTML = [readerEvt.name].join("");
    document.getElementById("Filelist").insertBefore(ul, null);
  }

  //Fill the array of attachment
  function FillAttachmentArray(e, readerEvt) {
    AttachmentArray[arrCounter] = {
      AttachmentType: 1,
      ObjectType: 1,
      FileName: readerEvt.name,
      FileDescription: "Attachment",
      NoteText: "",
      MimeType: readerEvt.type,
      Content: e.target.result.split("base64,")[1],
      FileSizeInBytes: readerEvt.size
    };
    arrCounter = arrCounter + 1;
  }
</script>

@if(Session::get('success_message'))
<script>
  iziToast.success({
    title: 'Success',
    position: 'topRight',
    message: '{{Session::get("success_message")}}',
  });
</script>
@endif
@if(Session::get('error_message'))
<script>
  iziToast.error({
    title: 'Error',
    position: 'topRight',
    message: '{{Session::get("error_message")}}',
  });
</script>
@endif
@endsection