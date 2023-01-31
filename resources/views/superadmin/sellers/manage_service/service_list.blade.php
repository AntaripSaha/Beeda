@extends('superadmin.master')

@section('page_title')
Manage Service
@endsection

@section('css_js_up')
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

.card-stats .card-header + .card-footer {
    border-top: 0;
    margin-top: 20px;
}

.service_btn{
    transition: .5s background-color;
    color: #A9AFBB !important;
    border: 1px solid #A9AFBB;
    padding-bottom: 7px;
    border-radius: 3px;
    margin-right: 7px;
}
.service_btn:hover {
    background-color: #061880;
    color: white !important;
    padding-bottom: 6px;
}
.btn{
  padding: 5px 10px;
  margin-right: 5px;
}
.btn.btn-primary {
    color: #fff;
    float:left;
    background-color: #061880 !important;
    border-color: #061880 !important;
    box-shadow: 0 2px 2px 0 rgb(0 188 212 / 14%), 0 3px 1px -2px rgb(0 188 212 / 20%), 0 1px 5px 0 rgb(0 188 212 / 12%);
}

.active_status{
    margin-bottom: -10px;
}

</style>
@endsection

@section('main_content')
<div class="content" style="margin-top:20px !important;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="text-align:right;">
                <a href="{{route('service.add')}}" class="btn btn-primary"><i style="font-size:25px;" class="material-icons">add</i> Add New</a>
            </div>
        </div>
        <div class="row">
            @foreach($service_category_list as $service)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-icon">
                    <div class="card-icon" style="background-color: {{$service->color}};">
                        <img src="{{assetUrl().$service->icon_image}}" style="width:50px;padding: 6%;"/>
                    </div>
                    <!-- <p class="card-category">Total Sellers</p> -->
                    <h3 class="card-title" style="font-size:18px">{{$service->name}}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <a class="service_btn" href="{{route('service.store.dashboard', ['id' => $service->id])}}" title="Home" style="color:#e863ff;"><i style="font-size:20px;" class="material-icons service_icon">home</i></a>
                    @if($service->id == \App\Constants\ServiceCategoryType::REAL_ESTATE)
                        <a class="service_btn" href="{{route('service.agent.list')}}" title="Agent List" style="color:#e863ff;"><i style="font-size:20px;" class="material-icons service_icon">real_estate_agent</i></a>
                    @else
                        <a class="service_btn" href="{{route('service.store.list', ['id' => $service->id])}}" title="Stores" style="color:#e863ff;"><i style="font-size:20px;" class="material-icons service_icon">store</i></a>
                        <a class="service_btn" href="{{route('service.order.list', ['id' => $service->id])}}" title="Orders" style="color:#e863ff;"><i style="font-size:20px;" class="material-icons service_icon">shopping_bag</i></a>
                    @endif
                        <a class="service_btn" href="{{route('service.edit', ['id' => $service->id])}}" title="Edit" style="color:#e863ff;"><i style="font-size:20px;" class="material-icons service_icon">edit</i></a>
                    </div>
                    <div class="active_status">
                        @php
                            $active = '';
                            $checked = '';
                            if($service->status)
                            {
                                $active = 'active';
                                $checked = 'checked';
                            }
                        @endphp
                        <div class="toggle-btn {{$active}}">
                            <input type="checkbox" onclick="statusChange({{$service->id}})" class="cb-value service{{$service->id}}" {{$checked}}/>
                            <span class="round-btn"></span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('css_js_down')

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

function statusChange(id)
{
    var mainParent = $('.service'+id).parent('.toggle-btn');
    if($(mainParent).find('input.service'+id).is(':checked')) {
        $.ajax({
                url: '{{route("service.status")}}',
                method: 'POST',
                data: {'service_id': id, '_token': '{{csrf_token()}}'},
                success: function(data){
                    $(mainParent).addClass('active');
                    $('.service'+id).attr("checked", "checked");
                    customShowNotification('top', 'right', "Service status changed successfully");
                }
            });
    } else {
        $.ajax({
                url: '{{route("service.status")}}',
                method: 'POST',
                data: {'service_id': id, '_token': '{{csrf_token()}}'},
                success: function(data){
                    $(mainParent).removeClass('active');
                    $('.service'+id).removeAttr('checked');
                    customShowNotification('top', 'right', "Service status changed successfully");
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



