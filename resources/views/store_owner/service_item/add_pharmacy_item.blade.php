@extends('store_owner.master')

@section('page_title')
Add Grocery Product
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

<style type="text/css">
  img {
    /* display: block; */
    max-width: 100%;
  }
  .preview {
    overflow: hidden;
    width: 290px; 
    height: 300px;
    margin: 10px;
    border: 1px solid red;
  }
  .modal-lg{
    max-width: 1000px !important;
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
          <h1 class="m-0">Add Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Add Product</a></li>
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
      <form action="{{route('service.add.item.submit')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop_id}}" />
        <input type="hidden" name="choise" id="choise" />
        <input type="hidden" name="choise_attributes" id="choise_attributes" />
        <input type="hidden" name="choise_values" id="choise_values" />
        <input type="hidden" name="is_variant" value="0" id="is_variant" />
        <input type="hidden" name="cash_on_delivery" value="0" id="cash_on_delivery" />
        <input type="hidden" name="featured" value="0" id="featured" />
        <input type="hidden" name="tabed" value="0" id="tabed" />
        <input type="hidden" name="today_deal" value="0" id="today_deal" />
        <input type="hidden" name="is_quantity_multiplied" value="0" id="is_quantity_multiplied" />
        <input type="hidden" name="shipping_type" value="free" id="shipping_type" />
        <input type="hidden" name="service_category_id" value="{{$data->shop->seller_service->service_category_id}}" id="service_category_id" />
        <div class="row">
          <div class="col-8">
            <!-- general form elements -->
            <!-- product information -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="item_name">Product Name <span class="text-danger" title="Required">*</span></label>
                  <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name" required>
                  <span style="color:red;font-size:13px;">{{ $errors->first('product_name') }}</span>
                </div>
                <div class="form-group">
                  <label for="category">Category <span class="text-danger" title="Required">*</span></label>
                  <select class="form-control select2bs4" style="width: 100%;" name="category" id="category" required>
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
                  <label for="category">Brand</label>
                  <select class="form-control select2bs4" name="brand" id="brand">
                    <option value="" disabled selected>Select</option>
                    @if($data)
                    @foreach($data->brand as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label for="unit">Unit <span class="text-danger" title="Required">*</span></label>
                  <input type="text" class="form-control" name="unit" id="unit" placeholder="Unit(e.g: kg, pcs etc)" required>
                  <span style="color:red;font-size:13px;">{{ $errors->first('unit') }}</span>
                </div>
                <div class="form-group">
                  <label for="min_quantity">Min Qty <span class="text-danger" title="Required">*</span></label>
                  <input type="number" min="1" class="form-control" name="min_quantity" id="min_quantity" value="1" required>
                  <span style="color:red;font-size:13px;">{{ $errors->first('min_quantity') }}</span>
                </div>
                {{-- <div class="form-group">
                  <label for="packaging_charge">Packaging Charge</label>
                  <input type="number" min="0" class="form-control" name="packaging_charge" value="0" id="packaging_charge" placeholder="0">
                  <span style="color:red;font-size:13px;">{{ $errors->first('packaging_charge') }}</span>
                </div> --}}

                <div class="form-group">
                  <label for="description">Short Description</label>
                  <textarea class="summernote" name="short_description">
                    </textarea>
                </div>


                <div class="form-group">
                  <label for="description">Full Description</label>
                  <textarea class="summernote" name="description">
                    </textarea>
                </div>

                <div class="form-group">
                  <label for="service_description">Service Description</label>
                  <textarea class="summernote" name="service_description">
                    </textarea>
                </div>

                <div class="form-group">
                  <label for="tags">Tags</label>
                  <div class="bs-example">
                    <input type="text" name="tags" data-role="tagsinput">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gallery Image <span class="text-danger" title="Required">*</span></label>
                  <br>
                  <!-- <div class="field" align="left">
                      <input type="file" id="files" class="form-control" name="gallery_images[]" multiple />
                    </div> -->
                  <!--To give the control a modern look, I have applied a stylesheet in the parent span.-->
                  <span class="btn btn-info fileinput-button">
                    <span><i class="fa fa-paperclip" aria-hidden="true"></i> Select Attachment</span>
                    <input type="file" name="gallery_images[]" id="files" multiple accept="image/jpeg, image/png, image/gif," required><br />
                  </span>
                  <span style="color:red;font-size:13px;">{{ $errors->first('gallery_images') }}</span>
                  <br>
                  <br>
                  <output id="Filelist"></output>
                </div>

                <div></div>

                <div class="form-group">
                  <label for="thumbnail_image">Thumbnail Image <span class="text-danger" title="Required">(450 X 450)*</span></label>
                  <input type="file" class="450-450-1-1-thumbnail_image_preview-thumbnail_image" name="" id="thumbnail_image" style="
                    display: block;width: 100%;
                    height: calc(2.25rem + 2px);
                    padding: 0.375rem 0.75rem;
                    font-size: 1rem;
                    font-weight: 400;line-height: 1.5;
                    color: #495057;
                    background-color: #fff;
                    background-clip: padding-box;
                    border: 1px solid #ced4da;
                    border-radius: 0.25rem;
                    box-shadow: inset 0 0 0 transparent;
                    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;" required/>
                  <span style="color:red;font-size:13px;">{{ $errors->first('thumbnail_image') }}</span>
                  <img src="" id="thumbnail_image_preview" style="height:100px;" />
                  <!-- Crop -->
                  <input type="hidden" name="thumbnail_image" class="thumbnail_image">
                  <!-- Crop -->
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- product information end -->

            <!-- product videos -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Videos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <div class="mb-2">
                      <label><input type="radio" name="colorRadio" value="provide" checked> Provide Video Link</label>
                      <label><input type="radio" name="colorRadio" value="upload"> Upload Video</label>
                  </div>

                  <div class="provide box mt-3 border-top" id="provide">
                      <div class="form-group row mt-1">

                          <label class="col-md-3 col-from-label">Video Provider</label>

                          <div class="col-md-8">

                              <select class="form-control aiz-selectpicker" name="video_provider" id="video_provider">

                                  <option value="youtube">Youtube</option>

                                  <option value="dailymotion">Dailymotion</option>

                                  <option value="vimeo">Vimeo</option>

                              </select>

                          </div>

                      </div>

                      <div class="form-group row">

                          <label class="col-md-3 col-from-label">Video Link</label>

                          <div class="col-md-8">

                              <input type="text" class="form-control" name="video_link" id="video_link" onchange="linkUpload(this)"

                                  placeholder="Video Link">

                          </div>

                      </div>
                  </div>

                  <div class="form-group row upload box mt-3 border-top" id="upload">

                      <label class="col-md-3 col-from-label mt-1">Video File</label>

                      <div class="col-md-8 mt-1">

                          <input type="file" class="form-control" id="product_video_file" onchange="checkVideoDuration(this)" name="product_video_file"

                              accept="video/mp4,video/x-m4v,video/*">

                      </div>

                  </div>

                </div>
              <!-- /.card-body -->
            </div>
            <!-- product videos end -->


            <!-- product variation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Variation</h3>
              </div>
              <!-- /.card-header -->
              <div class="form-group">
                <div class="card-body">
                  <div class="form-group">
                    <p>Product Price + Stock</p>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="unit_price">Unit Price</label>
                    <input type="number" step="any" min="0" value="0" onchange="setUnitPrice()" class="form-control" name="unit_price" id="unit_price" placeholder="0">
                  </div>
                  <div class="form-group">
                    <label for="discount">Discount</label>
                    <div class="row">
                      <div class="col-6">
                        <input type="number" step="any" min="0" class="form-control" name="discount" id="discount" placeholder="0">
                      </div>
                      <div class="col-3"></div>
                      <div class="col-3">
                        <select class="form-control select2bs4" name="discount_type" id="discount_type">
                          <option value="amount">Flat</option>
                          <option value="percent">Percent</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group no-variant">
                    <label for="quantity">Stock Quantity</label>
                    <input type="number" min="0" class="form-control" name="normal_quantity" id="quantity" placeholder="0">
                  </div>
                  <div class="form-group no-variant">
                    <label for="sku">SKU</label>
                    <input type="text" class="form-control" name="sku" id="sku" placeholder="Product Sku">
                  </div>
                  <div class="form-group variant">
                    <table class="table table-hover" id="participantTable">
                      <thead>
                        <tr>
                          <th>Variant</th>
                          <th>Variant Price</th>
                          <th>SKU</th>
                          <th>Quantity</th>
                          <th>Photo</th>
                          <!-- <th>Action</th> -->
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                      <!-- <tr class="participantRow">
                                <td><input type="text" class="form-control" name="variant_name[]" readonly/></td>
                                <td><input type="number" step="any" min="1" class="form-control" name="variant_price[]"/></td>
                                <td><input type="text" class="form-control" name="sku[]"/></td>
                                <td><input type="number" class="form-control" name="quantity[]"/></td>
                                <td><input type="file" class="form-control" name="variant_images[]"/></td>
                                <td><button class="btn btn-danger btn-sm remove-variant-row" type="button"><i class="fa fa-trash" aria-hidden="true"></i>                                </button></td>
                            </tr>
                            <tr id="addButtonRow">
                                <td colspan="6"><button class="btn btn-sm btn-success float-right add" type="button"><i class="fa fa-plus" aria-hidden="true"></i>                                </button></td>
                            </tr> -->
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- product variation end -->
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

            <!-- pdf specification -->
            <div class="card card-primary">
              <!-- /.card-header
              <div class="card-header">
                <h3 class="card-title">PDF Specification</h3>
              </div>
              
              <div class="card-body">
                <div class="form-group">
                  <label for="pdf_specification_file">Upload PDF</label>
                  <input type="file" class="form-control" name="pdf_specification_file" id="pdf_specification_file">
                </div>
              </div>
              card-body -->

              <div class="card-footer">
                <button type="submit" class="btn" style="background-color: #061880;color: white;">Create Product</button>
              </div>
            </div>
            <!-- pdf specification end -->
          </div>
          <div class="col-4">
            <!-- shipping configuration -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shipping Configuration</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="free_shipping">Free Shipping</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="free_shipping" onclick="config('free')" class="cb-value free_shipping" />
                    <span class="round-btn"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="flat_rate">Flat Rate</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="flat_rate" onclick="config('flat_rate')" class="cb-value flat_rate" />
                    <span class="round-btn"></span>
                  </div>
                  <div class="shipping_cost" style="display:none;">
                    <label for="shipping_cost">Shipping Cost</label>
                    <br>
                    <div class="" id="req_input">
                      <div class="required_inp">
                        <input type="number" name="from_unit[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="from unit" class="from_unit form-control col-md-3"/>
                        <input type="number" name="to_unit[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="to unit"  class="to_unit form-control col-md-3"/>
                        <input type="number" name="flat_shipping_cost[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="cost" class="form-control col-md-3"/>
                      </div>
                    </div>
                    <a href="javascript:;" id="addmore" class="btn btn-x btn-primary">Add more</a>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="flat_rate">Flat Rate</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="flat_rate" onchange="config('flat_rate')" class="cb-value flat_rate" />
                    <span class="round-btn"></span>
                  </div>
                  <div class="shipping_cost" style="display:none;">
                    <label for="shipping_cost">Shipping Cost</label>
                    <input type="text" name="flat_shipping_cost" style="float:right" value="0" class="form-control col-md-4" />
                  </div>
                </div> -->
                <!-- <div class="form-group">
                  <label for="product_wise_shipping">Product Wise Shipping</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="product_wise_shipping" onchange="config('product_wise')" class="cb-value product_wise_shipping" />
                    <span class="round-btn"></span>
                  </div>
                  <div class="product_wise_cost" style="display:none;">
                    @foreach($data->cities as $city)
                    <label for="product_wise_cost">{{$city->name}}</label>
                    <input type="text" name="shipping_cost[{{$city->name}}]" style="float:right" value="{{$city->cost}}" class="form-control col-md-4" />
                    <br>
                    <br>
                    @endforeach
                  </div>
                </div>
                <div class="form-group">
                  <label for="product_quantity_multiply">Is Product Quantity Mulitiply</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="product_quantity_multiply" onchange="productQuantityMultiply()" class="cb-value product_quantity_multiply" />
                    <span class="round-btn"></span>
                  </div>
                </div> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- shipping configuration end -->
            <!-- low stock quantity warning -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Low Stock Quantity Warning</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="warning_quantity">Quantity</label>
                  <input type="number" step="any" min="1" name="warning_quantity" class="form-control" value="1">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- low stock quantity warning end -->
            <!-- stock visibility state -->
            {{-- <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Stock Visibility State</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label for="show_stock_quantity"> <input type="radio" name="stock_visibility" id="show_stock_quantity" value="quantity" checked> Show Stock Quantity</label>
                </div>
                <div class="form-group">
                  <label for="show_stock_text_only"> <input type="radio" name="stock_visibility" id="show_stock_text_only" value="text"> Show Stock With Text Only</label>

                </div>
                <div class="form-group">
                  <label for="hide_stock"> <input type="radio" name="stock_visibility" id="hide_stock" value="hide"> Hide Stock</label>

                </div>
              </div>
            </div> --}}

            <!-- stock visibility state end -->
            <!-- cash on delivery state -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cash on Delivery</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="cash_on_delivery_status">Status</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                    <input type="checkbox" name="cash_on_delivery_status" onchange="cashOnDelivery()" class="cb-value cash_on_delivery" />
                    <span class="round-btn"></span>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- cash on delivery end -->
            <!-- featured -->
            <!-- <div class="card card-primary"> -->
            <!-- <div class="card-header">
              <h3 class="card-title">Featured</h3>
            </div> -->
            <!-- /.card-header -->
            <!-- <div class="card-body">
                <div class="form-group">
                  <label for="featured_status">Status</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                      <input type="checkbox" name="featured_status" onchange="feature()" class="cb-value featured"/>
                      <span class="round-btn"></span>
                  </div>
                </div>
              </div> -->
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- featured end -->
            <!-- tabed -->
            <!-- <div class="card card-primary"> -->
            <!-- <div class="card-header">
              <h3 class="card-title">Tabed</h3>
            </div> -->
            <!-- /.card-header -->
            <!-- <div class="card-body">
                <div class="form-group">
                  <label for="tabed_status">Status</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                      <input type="checkbox" name="tabed_status" onchange="tab()" class="cb-value tabed"/>
                      <span class="round-btn"></span>
                  </div>
                </div>
              </div> -->
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- tabed end -->
            <!-- today's deal -->
            <!-- <div class="card card-primary"> -->
            <!-- <div class="card-header">
              <h3 class="card-title">Today's Deal</h3>
            </div> -->
            <!-- /.card-header -->
            <!-- <div class="card-body">
                <div class="form-group">
                  <label for="today_deal_status">Status</label>
                  <div class="toggle-btn" style="margin:0px;float:right;">
                      <input type="checkbox" name="today_deal_status" onchange="todayDeal()" class="cb-value today_deal"/>
                      <span class="round-btn"></span>
                  </div>
                </div>
              </div> -->
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- today's deal end -->
            <!-- flash deal -->
            <!-- <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Flash Deal</h3>
            </div> -->
            <!-- /.card-header -->
            <!-- <div class="card-body">
                <div class="form-group">
                  <label for="flash_title">Choose Flash Title</label>
                  <select class="form-control" name="flash_title">
                    <option selected disabled>Select</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="flash_discount">Discount</label>
                  <input type="number" class="form-control" step="any" name="flash_discount" min="1" placeholder="0" />
                </div>
                <div class="form-group">
                  <label for="flash_discount_type">Discount Type</label>
                  <select class="form-control" name="flash_discount_type">
                    <option selected disabled>Select</option>
                    <option value="Flat">Flat</option>
                    <option value="Percent">Percent</option>
                  </select>
                </div>
              </div> -->
            <!-- /.card-body -->
            <!-- </div> -->
            <!-- flash deal end -->
            <!-- estimate shipping time -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Estimate Shipping Time</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group">
                  <label for="shipping_time">Days</label>
                  <input type="number" step="any" min="1" value="1" name="shipping_time" class="form-control">
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- estimate shipping time end -->
            <!-- vat & tax -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Vat & TAX</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <label for="tax">Tax</label>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <input type="hidden" value="3" name="tax_id" />
                      <input type="number" step="any" min="0" value="0" name="tax" class="form-control">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <select class="form-control" name="tax_type">
                        <option value="amount">Flat</option>
                        <option value="percent">Percent</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- vat & tax end -->
          </div>
        </div>
        <!-- /.row -->
      </form>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- MODAL START -->
<!-- MODAL START -->
<div class="modal fade" id="modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="modalLabel">Crop Image</h5>
              <button type="button" class="close" id="crop_modal_cancel" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-8">
                          <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                      </div>
                      <div class="col-md-4">
                          <div class="preview"></div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" id="crop">Crop</button>
          </div>
      </div>
  </div>
</div>
<!-- MODAL END -->
<!-- MODAL END -->
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>


<script>       
  //modal crop logo
  var image = document.getElementById('image');
  var $modal1 = $('#modal');
  var width;
  var height;
  var ratioLeft;
  var ratioRight;
  var preview;
  var copped;
  $("body").on("change", "#thumbnail_image", function(e){
      var classAtt = $(this).attr('class');
      // alert(classAtt);
      var att = classAtt.split("-");
      width = att[0];
      height = att[1];
      ratioLeft = att[2];
      ratioRight = att[3];
      preview = att[4];
      copped = att[5];
      var cropper;
      var files = e.target.files;
      var done = function (url) {
          image.src = url;
          $modal1.modal('show');
      };
      var reader;
      var file;
      var url;
      if (files && files.length > 0) {
          file = files[0];
          if (URL) {
          done(URL.createObjectURL(file));
          } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
          done(reader.result);
          };
          reader.readAsDataURL(file);
          }
      }
  });
  $modal1.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
          aspectRatio: Number(ratioLeft)/Number(ratioRight),
          viewMode: 1,
          preview: '.preview',
          dragMode: 'move',
          autoCropArea: 0.3,
          restore: false,
          guides: false,
          center: false,
          highlight: false,
          cropBoxMovable: true,
          cropBoxResizable: false,
          toggleDragModeOnDblclick: false,
          data:{ //define cropbox size
              width: Number(width) ,
              height:  Number(height),
          },
      });
  }).on('hidden.bs.modal', function () {
      cropper.destroy();
      cropper = null;
  });
  $("#crop").click(function(){
      canvas = cropper.getCroppedCanvas({
          width: width,
          height: height,
      });
      canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
          reader.readAsDataURL(blob); 
          reader.onloadend = function() {
              var base64data = reader.result; 
              $modal1.modal('hide');
   
              $("." +copped).val(base64data);  
  
              document.getElementById(preview).style.display = 'block';
              document.getElementById(preview).src = base64data;
  
          }
      });
  })
  </script>
  
  <script type="text/javascript">  
      $("#crop_modal_cancel").click(function() {
          $("#modal").modal("hide");
      });
  </script>




<script>
  $(document).ready(function() {
    $('.cuisine-basic-multiple').select2();
  });
  $(document).ready(function() {
    $('.addon-basic-multiple').select2();
  });

  $(document).ready(function() {
  $("#addmore").click(function() {
    $("#req_input").append('<div class="required_inp"><input type="number" name="from_unit[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="from unit" class="from_unit form-control col-md-3"/><input type="number" name="to_unit[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="to unit"  class="to_unit form-control col-md-3"/><input type="number" name="flat_shipping_cost[]" step="any" min="0" style="float:left;margin-right:3px;" placeholder="cost" class="form-control col-md-3"/>'+'<input type="button" class="inputRemove btn btn-x btn-info" value="Remove"/></div>');
  });
  $('body').on('click','.inputRemove',function() {
    $(this).parent('div.required_inp').remove()
  });
});
</script>

<script>
  function checkVideoDuration(video_file)
  {
      window.URL = window.URL || window.webkitURL;
      var video = document.createElement('video');
      video.preload = 'metadata';
      video.onloadedmetadata = function () {
          window.URL.revokeObjectURL(video.src);
          if(video.duration > 60)
          {
            alert('Sorry the video duration greater than 1 min. Please upload video max 1 min.');
            $('#video_file').val(null);
            return;
          }
      }
      video.src = URL.createObjectURL(video_file.files[0]);
  }
  
  function setUnitPrice() {
    getAttributeValue();
  }
  var mainParent = $('.cash_on_delivery').parent('.toggle-btn');
  $(mainParent).addClass('active');
  $('.cash_on_delivery').attr("checked", "checked");
  $('#cash_on_delivery').val(1);

  function cashOnDelivery() {
    var mainParent = $('.cash_on_delivery').parent('.toggle-btn');
    if ($(mainParent).find('input.cash_on_delivery').is(':checked')) {
      $(mainParent).addClass('active');
      $('.cash_on_delivery').attr("checked", "checked");
      $('#cash_on_delivery').val(1);
    } else {
      $(mainParent).removeClass('active');
      $('.cash_on_delivery').removeAttr('checked');
      $('#cash_on_delivery').val(0);
    }
  }

  var mainParent = $('.free_shipping').parent('.toggle-btn');
  $(mainParent).addClass('active');
  $('.free_shipping').attr("checked", "checked");

  function config(type) {
    if (type == 'free') {
      var mainParent = $('.free_shipping').parent('.toggle-btn');
      if ($(mainParent).find('input.free_shipping').is(':checked')) {
        $(mainParent).addClass('active');
        $('.free_shipping').attr("checked", "checked");
        $('#shipping_type').val(type);

        $($('.flat_rate').parent('.toggle-btn')).removeClass('active')
        $('.flat_rate').removeAttr('checked');
        $($('.product_wise_shipping').parent('.toggle-btn')).removeClass('active')
        $('.product_wise_shipping').removeAttr('checked');
        $('.shipping_cost').attr('style', 'display:none;');
        $('.product_wise_cost').attr('style', 'display:none;');
      } else {
        $(mainParent).removeClass('active');
        $('.free_shipping').removeAttr('checked');
        $('#shipping_type').val('');
      }

    } else if (type == 'flat_rate') {
      var mainParent = $('.flat_rate').parent('.toggle-btn');
      if ($(mainParent).find('input.flat_rate').is(':checked')) {
          $(mainParent).addClass('active');
          $('.flat_rate').attr("checked", "checked");
          $('#shipping_type').val(type);
          $($('.free_shipping').parent('.toggle-btn')).removeClass('active')
          $('.free_shipping').removeAttr('checked');
          $('.shipping_cost').attr('style', 'display:');
      } else {
        $(mainParent).removeClass('active');
        $('.flat_rate').removeAttr('checked');
        $('#shipping_type').val('');
        $('.shipping_cost').attr('style', 'display:none');
      }
      $('.free_shipping').removeAttr('checked');
      $('.product_wise').removeAttr('checked');
    } else if (type == 'product_wise') {
      var mainParent = $('.product_wise_shipping').parent('.toggle-btn');
      if ($(mainParent).find('input.product_wise_shipping').is(':checked')) {
        $(mainParent).addClass('active');
        $('.product_wise_shipping').attr("checked", "checked");
        $('#shipping_type').val(type);

        $($('.free_shipping').parent('.toggle-btn')).removeClass('active')
        $('.free_shipping').removeAttr('checked');
        $($('.flat_rate').parent('.toggle-btn')).removeClass('active')
        $('.flat_rate').removeAttr('checked');
        $('.shipping_cost').attr('style', 'display:none');
        $('.product_wise_cost').attr('style', 'display:;');
      } else {
        $(mainParent).removeClass('active');
        $('.product_wise_shipping').removeAttr('checked');
        $('#shipping_type').val('');
        $('.product_wise_cost').attr('style', 'display:none;');
      }
      $('.free_shipping').removeAttr('checked');
      $('.flat_rate').removeAttr('checked');
    }

  }

  function productQuantityMultiply() {
    var mainParent = $('.product_quantity_multiply').parent('.toggle-btn');
    if ($(mainParent).find('input.product_quantity_multiply').is(':checked')) {
      $(mainParent).addClass('active');
      $('.product_quantity_multiply').attr("checked", "checked");
      $('#is_quantity_multiplied').val(1);
    } else {
      $(mainParent).removeClass('active');
      $('.product_quantity_multiply').removeAttr('checked');
      $('#is_quantity_multiplied').val(0);
    }
  }

  function feature() {
    var mainParent = $('.featured').parent('.toggle-btn');
    if ($(mainParent).find('input.featured').is(':checked')) {
      $(mainParent).addClass('active');
      $('.featured').attr("checked", "checked");
      $('#featured').val(1);
    } else {
      $(mainParent).removeClass('active');
      $('.featured').removeAttr('checked');
      $('#featured').val(0);
    }
  }

  function tab() {
    var mainParent = $('.tabed').parent('.toggle-btn');
    if ($(mainParent).find('input.tabed').is(':checked')) {
      $(mainParent).addClass('active');
      $('.tabed').attr("checked", "checked");
      $('#tabed').val(1);
    } else {
      $(mainParent).removeClass('active');
      $('.tabed').removeAttr('checked');
      $('#tabed').val(0);
    }
  }

  function todayDeal() {
    var mainParent = $('.today_deal').parent('.toggle-btn');
    if ($(mainParent).find('input.today_deal').is(':checked')) {
      $(mainParent).addClass('active');
      $('.today_deal').attr("checked", "checked");
      $('#today_deal').val(1);
    } else {
      $(mainParent).removeClass('active');
      $('.today_deal').removeAttr('checked');
      $('#today_deal').val(0);
    }
  }

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

  $('#participantTable').hide();

  //  multiple image upload 
  // $(document).ready(function() {
  //   if (window.File && window.FileList && window.FileReader) {
  //     $("#files").on("change", function(e) {
  //       var files = e.target.files,
  //         filesLength = files.length;
  //       for (var i = 0; i < filesLength; i++) {
  //         var f = files[i]
  //         var fileReader = new FileReader();
  //         fileReader.onload = (function(e) {
  //           var file = e.target;
  //           $("<span class=\"pip\">" +
  //             "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
  //             "<br/><span class=\"remove\">Remove image</span>" +
  //             "</span>").insertAfter("#files");
  //           $(".remove").click(function(){
  //             $(this).parent(".pip").remove();
  //           });

  //           // Old code here
  //           /*$("<img></img>", {
  //             class: "imageThumb",
  //             src: e.target.result,
  //             title: file.name + " | Click to remove"
  //           }).insertAfter("#files").click(function(){$(this).remove();});*/

  //         });
  //         fileReader.readAsDataURL(f);
  //       }
  //       console.log(files);
  //     });
  //   } else {
  //     alert("Your browser doesn't support to File API")
  //   }
  // });

  var all_attributes = [];
  <?php foreach ($data->attributes as $attribute) { ?>
    all_attributes.push('<?php echo $attribute->name; ?>')
  <?php
  } ?>

  var attributes = [];

  function setAttributeField() {

    var attribute_value = [];
    var choice_attributes = [];
    $("#attribute option:selected").each(function() {
      var $this = $(this);
      if ($this.length) {
        attribute_value.push($this.text());
        choice_attributes.push($this.val());
      }
    });
    if (attribute_value.length == 0) {
      $('#attributes_area').html("");
    } else {
      for (var i = 0; i < attribute_value.length; i++) {
        if (attributes.includes(attribute_value[i]) == false) {
          $('#attributes_area').append(`
        <label class="` + attribute_value[i] + `">` + attribute_value[i] + `</label>
        <input type="text" id="` + attribute_value[i] + `" onchange="getAttributeValue()"  name="` + attribute_value[i] + `" data-role="tagsinput" class="form-control" placeholder="Enter attribute value"/>
        `);
          $('input[data-role=tagsinput]').tagsinput();
        }
      }

      attributes = [];
      for (var i = 0; i < attribute_value.length; i++) {
        attributes.push(attribute_value[i]);
      }
      for (var i = 0; i < all_attributes.length; i++) {

        if (attributes.includes(all_attributes[i]) == false) {
          $("[name='" + all_attributes[i] + "']").parents('.bootstrap-tagsinput').remove()
          $("[name='" + all_attributes[i] + "']").remove();
          $("#" + all_attributes[i]).remove();
          $("." + all_attributes[i]).remove();
        }
      }

      // variant_name
      $('#choise').val(attributes);
      $('#choise_attributes').val(choice_attributes);

    }

    getAttributeValue();
  }

  var variant_name = '';
  var all_variant = [];

  function getAttributeValue() {
    all_variant = [];
    var selected_attribute = [];
    $("#attribute option:selected").each(function() {
      var $this = $(this);
      if ($this.length) {
        selected_attribute.push($this.text());
      }
    });
    // var selected_attribute = $('#attribute').val();

    for (var i = 0; i < selected_attribute.length; i++) {
      // if($("#"+selected_attribute[i+1]).tagsinput('items') && $("#"+selected_attribute[i+1]).tagsinput('items').length > 0)
      // {
      if ($("#" + selected_attribute[i + 1]).tagsinput('items')) {
        var comb_array = [];
        var mainParent = $('.color_field').parent('.toggle-btn');
        if ($(mainParent).find('input.color_field').is(':checked')) {
          var selected_colors = [];
          $("#color option:selected").each(function() {
            var $this = $(this);
            if ($this.length) {
              selected_colors.push($this.text());
            }
          });
          comb_array.push(selected_colors);
        }
        for (var j = 0; j < selected_attribute.length; j++) {
          comb_array.push($("#" + selected_attribute[j]).tagsinput('items'));
        }
        //check the attribute array values
        var total_attribute_values = 0;
        for (var y = 0; y < selected_attribute.length; y++) {
          if ($("#" + selected_attribute[y]).tagsinput('items').length > 0) {
            total_attribute_values = 1;
          }
        }
        $.ajax({
          url: '{{url("/get-possible-combination")}}',
          method: 'POST',
          data: {
            'attr_array': comb_array,
            '_token': '{{csrf_token()}}'
          },
          success: function(data) {
            var upcoming_attr_array = data.data;
            for (var i = 0; i < upcoming_attr_array.length; i++) {
              all_variant.push(upcoming_attr_array[i]);
            }
            if (all_variant.length > 0 && total_attribute_values == 1) {
              $('.no-variant').hide();
              $('#participantTable tbody tr').remove();
              var add_td = '<tr class="participantRow">';
              for (var i = 0; i < all_variant.length; i++) {
                add_td += '<td><input type="text" class="form-control" value="' + all_variant[i] + '" name="variant_name[]" readonly/></td>';
                add_td += '<td><input type="number" step="any" min="1" placeholder="0" value="' + $('#unit_price').val() + '" class="form-control" name="variant_price[]"/></td>';
                add_td += '<td><input type="text" class="form-control" placeholder="Sku" name="variant_sku[]"/></td>';
                add_td += '<td><input type="number" min="0" class="form-control" value="10" placeholder="0" name="quantity[]"/></td>';
                add_td += '<td><input type="file" class="form-control" name="variant_images[]" required/></td></tr>';
              }
              $('#participantTable tbody').append(add_td);
              $('#participantTable').show();
            } else {
              $('.no-variant').show();
              $('#participantTable tbody tr').remove();
              $('#participantTable').hide();
            }
          }
        });
      } else {
        var mainParent = $('.color_field').parent('.toggle-btn');
        if ($(mainParent).find('input.color_field').is(':checked')) {
          var selected_colors = [];
          $("#color option:selected").each(function() {
            var $this = $(this);
            if ($this.length) {
              selected_colors.push($this.text());
            }
          });
          for (var m = 0; m < selected_colors.length; m++) {
            if ($("#" + selected_attribute[i]).tagsinput('items')) {
              for (var k = 0; k < $("#" + selected_attribute[i]).tagsinput('items').length; k++) {
                variant_name = selected_colors[m];
                variant_name = (variant_name + '-' + $("#" + selected_attribute[i]).tagsinput('items')[k]);
                all_variant.push(variant_name);
              }
            }

          }
        } else {
          if ($("#" + selected_attribute[i]).tagsinput('items')) {
            for (var k = 0; k < $("#" + selected_attribute[i]).tagsinput('items').length; k++) {
              variant_name = '';
              variant_name = (variant_name + '-' + $("#" + selected_attribute[i]).tagsinput('items')[k]).substring(1);
              all_variant.push(variant_name);
            }
          }

        }
      }
      break;
    }

    if (selected_attribute.length == 0) {

      var mainParent = $('.color_field').parent('.toggle-btn');
      if ($(mainParent).find('input.color_field').is(':checked')) {
        var selected_colors = [];
        $("#color option:selected").each(function() {
          var $this = $(this);
          if ($this.length) {
            selected_colors.push($this.text());
          }
        });
        for (var i = 0; i < selected_colors.length; i++) {
          all_variant.push(selected_colors[i]);
        }
      }
    } else {
      //check the attribute array values
      var total_attribute_values = 0;
      for (var y = 0; y < selected_attribute.length; y++) {
        if ($("#" + selected_attribute[y]).tagsinput('items')) {
          if ($("#" + selected_attribute[y]).tagsinput('items').length > 0) {
            total_attribute_values = 1;
          }
        }

      }
      if (total_attribute_values == 0) {
        var mainParent = $('.color_field').parent('.toggle-btn');
        if ($(mainParent).find('input.color_field').is(':checked')) {
          var selected_colors = [];
          $("#color option:selected").each(function() {
            var $this = $(this);
            if ($this.length) {
              selected_colors.push($this.text());
            }
          });
          for (var i = 0; i < selected_colors.length; i++) {
            all_variant.push(selected_colors[i]);
          }
        }
      }
    }
    if (all_variant.length > 0) {
      $('.no-variant').hide();
      $('#participantTable tbody tr').remove();
      var add_td = '<tr class="participantRow">';
      for (var i = 0; i < all_variant.length; i++) {
        add_td += '<td><input type="text" class="form-control" value="' + all_variant[i] + '" name="variant_name[]" readonly/></td>';
        add_td += '<td><input type="number" step="any" min="1" class="form-control" value="' + $('#unit_price').val() + '" name="variant_price[]" placeholder="0"/></td>';
        add_td += '<td><input type="text" class="form-control" name="variant_sku[]" placeholder="Sku"/></td>';
        add_td += '<td><input type="number" min="0" placeholder="0" value="10" class="form-control" name="quantity[]" /></td>';
        add_td += '<td><input type="file" class="form-control" name="variant_images[]" required/></td></tr>';
      }
      $('#participantTable tbody').append(add_td);
      $('#participantTable').show();
    } else {
      $('.no-variant').show();
      $('#participantTable tbody tr').remove();
      $('#participantTable').hide();
    }
    console.log(all_variant.length)
    // if (all_variant.length > 0) {
    //   $('#is_variant').val(1);
    // } else {
    //   $('#is_variant').val(0);
    // }
    $('#is_variant').val(1);
    console.log(all_variant);
  }

  function getVariantByColor() {
    getAttributeValue();
  }

  // function colorField()
  // {
  //   var isVariant = $('[name="variant_checkbox"]').is(':checked');
  //   if(isVariant)
  //   {
  //     $('#color').removeAttr('disabled');
  //   }
  //   else
  //   {
  //     $('#color').attr('disabled', 'disabled');
  //   }
  //   getAttributeValue();
  // }

  // multiple field add script
  /* Variables */
  var p = $("#participants").val();
  var row = $(".participantRow");

  /* Functions */
  function getP() {
    p = $("#participants").val();
  }

  function addRow() {
    row.clone(true, true).appendTo("#participantTable");
  }

  function removeRow(button) {
    button.closest("tr").remove();
  }
  /* Doc ready */
  $(".add").on('click', function() {
    getP();
    if ($("#participantTable tr").length < 17) {
      addRow();
      var i = Number(p) + 1;
      $("#participants").val(i);
    }
    $(this).closest("tr").appendTo("#participantTable");
    if ($("#participantTable tr").length === 3) {
      $(".remove-variant-row").hide();
    } else {
      $(".remove-variant-row").show();
    }
  });
  $(".remove-variant-row").on('click', function() {
    getP();
    if ($("#participantTable tr").length === 3) {
      //alert("Can't remove row.");
      $(".remove-variant-row").hide();
    } else if ($("#participantTable tr").length - 1 == 3) {
      $(".remove-variant-row").hide();
      removeRow($(this));
      var i = Number(p) - 1;
      $("#participants").val(i);
    } else {
      removeRow($(this));
      var i = Number(p) - 1;
      $("#participants").val(i);
    }
  });
  $("#participants").change(function() {
    var i = 0;
    p = $("#participants").val();
    var rowCount = $("#participantTable tr").length - 2;
    if (p > rowCount) {
      for (i = rowCount; i < p; i += 1) {
        addRow();
      }
      $("#participantTable #addButtonRow").appendTo("#participantTable");
    } else if (p < rowCount) {}
  });



  function colorField() {
    var mainParent = $('.color_field').parent('.toggle-btn');
    if ($(mainParent).find('input.color_field').is(':checked')) {
      $(mainParent).addClass('active');
      $('.color_field').attr("checked", "checked");
      $('#color').removeAttr('disabled');
    } else {
      $(mainParent).removeClass('active');
      $('.color_field').removeAttr('checked');
      $('#color').attr('disabled', 'disabled');
    }
    getAttributeValue();
  }
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
<script>
    $(document).ready(function(){
        $(".upload").hide();
        // $(".provide").show();
        $('input[type="radio"]').click(function(){
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".box").not(targetBox).hide();
            $(targetBox).show();
        });
    });
</script>
@endsection