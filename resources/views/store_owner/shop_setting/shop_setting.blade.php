@extends('store_owner.master')

@section('page_title')
    Shop Setting
@endsection

@section('css_js_up')
<style>
.card-deck {
  margin: 0 10px 0 10px;
  /* justify-content: space-between; */
}

.card-deck .card {
  /* margin: 0 0 1rem; */
}
.card-deck .card img{
  height: 177px;
}

@media (min-width: 576px) and (max-width: 767.98px) {
  .card-deck .card {
    -ms-flex: 0 0 48.7%;
    flex: 0 0 48.7%;
  }
}

@media (min-width: 768px) and (max-width: 991.98px) {
  .card-deck .card {
    -ms-flex: 0 0 32%;
    flex: 0 0 32%;
  }
}

@media (min-width: 992px)
{
  .card-deck .card {
    -ms-flex: 0 0 24%;
    flex: 0 0 24%;
  }
}

.btn-info{
  background-color:#061880;
  border: 1px solid #061880;
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
            <h1 class="m-0">Shop Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Shop Setting</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- <a href="{{route('delivery.zone.list')}}" class="btn btn-sm float-right" style="background-color:#061880;border: 1px solid #061880;color:white;margin-left: 4px;">Your Delivery Zones</a> -->
          @if(isset($seller_services) && count($seller_services) < 4)
          <a href="{{route('register.storeRegisterGet', ['page_type' => 'service'])}}" class="btn btn-sm float-right" style="background-color:#061880;border: 1px solid #061880;color:white;">Add New Service</a>
          <br>
          <br>
          @endif
        <div class="card-deck">
        @foreach($seller_services as $service)
          @if($service->service_category_id != 34)
          <div class="card" style="margin-right: 0px;">
            <h6 style="text-align:center;background-color: #061880;color: white;">Your {{$service->service_category->name}} Shop</h6>
            <img class="card-img-top" style="margin-top: -8px;" src="{{$service->shop?assetUrl().$service->shop->logo_img->file_name:'https://cesarkaikarate.com/wp-content/uploads/2017/04/default-image-620x600.jpg'}}" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="color: #4f5fb9;font-weight: bolder;">{{$service->shop?$service->shop->name:'Shop is not created'}}</h5>
              <p class="card-text">{{$service->shop?$service->shop->address:'N/A'}}</p>
              <p class="card-text">
                <div class="row">
                  <!-- <div class="col-4">
                    <a href="#" class="btn btn-xs btn-primary">Details</a>
                  </div> -->
                  <div class="col-4">
                    <span class="badge @if($service->status) badge-success @else badge-danger @endif">
                      @if($service->status)
                      <i class="fa fa-check" aria-hidden="true"></i> Approved
                      @else
                      <i class="fa fa-close" aria-hidden="true"></i> Not Approved
                      <!--<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Need Info -->
                      @endif
                    </span>
                  </div>
                  <div class="col-4">
                    <a href="#">
                      @if($service->shop)
                      <span class="badge badge-info" type="button" data-toggle="modal" data-target="#exampleModal" onclick="showQR(`{{json_encode($service->shop)}}`,`{{base64_encode($service->shop->id)}}`)"> QR Code
                      </span>
                      @endif

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"></h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" id="qrcode">
                              
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>
                  <div class="col-4" style="text-align: right;">
                    @if($service->shop)
                    <a href="{{route('shop.edit', ['id' => $service->shop->id])}}" class="btn btn-xs btn-info" title="Edit Shop"><i class="fas fa-edit"></i> Edit</a>
                    @else
                      <a href="{{route('register.storeRegisterGet', ['page_type' => 'store'])}}" class="btn btn-xs btn-info" title="Create New Shop"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                    @endif
                  </div>
                </div>
              </p>
            </div>
          </div>
          @endif
         
        @endforeach
      </div>
        </div>
      </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('css_js_down')
<script type="text/javascript" src="/store_owner_assets/qrcode.min.js">
</script>

<script>
  showQR = function(shop,qr){
    shop = JSON.parse(shop);
    $('#exampleModalLabel').html(shop.name);
    document.getElementById('qrcode').innerHTML = '';
    var qrcode = new QRCode("qrcode");
    qrcode.makeCode(qr);
  } 
</script>

@endsection

