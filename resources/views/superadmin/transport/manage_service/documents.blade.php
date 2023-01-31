@extends('superadmin.master')

@section('page_title')
Ride List
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
</style>
@endsection

@section('main_content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-plain">
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0" style="margin-left: 4px;">Documents of {{$documents->user->name}}</h4>
          </div>
          <!-- <br> -->
          <div class="row">
            <div class="col-md-6">
              <h3 style="font-size: 15px;">Required Documents: </h3>
              @foreach($documents->requiredDocuments as $reqDoc)
              <span class="badge badge-primary" style="font-size: 0.9rem;">{{$reqDoc->name}}</span>
              @endforeach
            </div>
          </div>
          <h3 style="font-size: 15px;">Provided Documents</h3>
          <div class="row" style="margin-top: -25px;">

            @if($documents->user->seller_services)

            @foreach($documents->user->seller_services as $seller_services)
            @if($seller_services->service_category_id==\App\Constants\ServiceCategoryType::RIDES)
            @foreach($seller_services->documents as $document)
            <div class="col-md-3">
              <a target="_blank" href="{{assetUrl().$document->doc_file->file_name}}">
                <div class="card comp-card">
                  <div class="card-body text-center">
                    <h6 class="m-b-20">{{$document->required_document->name}}</h6>
                    <hr>
                    @if($document->document_file)
                      <embed height="130px" width="100%" src="{{assetUrl().$document->doc_file->file_name}}" alt="">
                    @endif
                  </div>
                </div>
              </a>
            </div>
            @endforeach
            @endif
            @endforeach
            @endif
          </div>
          <!-- <hr> -->

          <!-- <div class="row">
            <button type="button" class="btn btn-success"><i class="material-icons">thumb_up_off_alt</i> Approve</button>
            <button type="button" class="btn btn-danger"><i class="material-icons">thumb_down_off_alt</i> Reject</button>
          </div> -->
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
  function customShowNotification(from, align, custom_message) {
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