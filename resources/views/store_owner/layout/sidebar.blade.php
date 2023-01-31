<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard.index') }}" class="brand-link" style="text-align: center;background-color:#061880;">
    <!-- <img src="{{asset('store_owner_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
    <img src="{{asset('assets/front/img/beeda_logo.svg')}}" alt="AdminLTE Logo" style="width:35%;">
    <!-- <span class="brand-text font-weight-light">Beeda</span> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex"> -->
    <!-- <div class="image">
          <img src="https://media.istockphoto.com/vectors/businessman-icon-on-a-round-button-vector-id484911744?b=1&k=6&m=484911744&s=170667a&w=0&h=huwcT88p4zBq1trUWMH8yoyeMmQ3QshzXU7D0Bn646c=" class="img-circle elevation-2" alt="User Image">
        </div> -->
    <!-- <div class="info">
        </div> -->
    <!-- </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
          <a href="javascript:;" class="nav-link">
           <i class="fas fa-tachometer-alt" style="color:#778aff" aria-hidden="true"></i>
            <p>
                Seller
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('dashboard.index')}}" class="nav-link @if($page == 'seller_dashboard') active @endif">
            <i class="fas fa-tachometer-alt" style="color:black" aria-hidden="true"></i>
            <p style="padding-left: 3px;">
              Dashboard
            </p>
          </a>
        </li>
        @foreach(getSellerServices() as $sidebarService)
        @if($sidebarService->shop)
        <li class="nav-item @if($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id) menu-open @endif">
          <a href="javascript:;" class="nav-link">
            <img src="{{assetUrl().$sidebarService->service_category->icon_image}}" style="width: 25px;height: 25px;" />
            &nbsp;
            <p style="padding-left: 3px;">
              {{$sidebarService->service_category->name}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if($sidebarService->service_category->name != "Real Estate")
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('service.add.item', ['id' => $sidebarService->shop->id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'add_product' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-upload" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>Add {{$sidebarService->service_category->name}} Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('service.item.list', ['id' => $sidebarService->service_category_id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'product_list' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-list-alt" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>{{$sidebarService->service_category->name}} Products</p>
              </a>
            </li>
            @endif
            @if($sidebarService->service_category->name == "Real Estate")
            <li class="nav-item">
                  <a href="{{route('realestate.add.property', ['id' => $sidebarService->shop->id])}}" class="nav-link @if($page == 'add_property' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                    <i class="fa fa-upload" style="color:black" aria-hidden="true"></i>
                    &nbsp;
                    <p>Add Property</p>
                  </a>
                </li>
            <li class="nav-item">
              <a href="{{route('realestate.property.list', ['id' => $sidebarService->shop->id])}}" class="nav-link @if($page == 'property_list' || $page == 'edit_property' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="far fa-building" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p> Manage Property</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('realestate.schedule.list', ['id' => $sidebarService->shop->id])}}" class="nav-link @if($page == 'schedule_list' || $page == 'schedule_details' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fas fa-calendar-day" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p> Manage Schedule</p>
              </a>
            </li>
            @endif
            @if($sidebarService->service_category->name == "Food")
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('cuisine.list', ['id'=> $sidebarService->shop->id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'cuisine' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-list-alt" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>Cuisines</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('addon.list', ['id'=> $sidebarService->shop->id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'add_ons' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-list-alt" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>Add-Ons</p>
              </a>
            </li>
            @endif


          </ul>
        </li>
        @endif
        @endforeach

        <li class="nav-item">
          <a href="{{route('shop.setting')}}" class="nav-link @if($page == 'shop_setting') active @endif">
            <i class="fas fa-cogs" style="color:black"></i>
            <p style="padding-left: 3px;">
              Shop Setting
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('product.reviews')}}" class="nav-link @if($page == 'product_review') active @endif">
            <i class="fa fa-star" aria-hidden="true" style="color:black"></i>
            <p style="padding-left: 3px;">
              Product Reviews
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('order.list')}}" class="nav-link @if($page == 'order') active @endif">
            <i class="fas fa-shopping-cart" style="color:black"></i>
            <p style="padding-left: 3px;">
              Orders
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="{{route('seller.wallet.index')}}" class="nav-link @if($page == 'seller-wallet') active @endif">
            <i class="fas fa-wallet" style="color:black"></i>
            <p style="padding-left: 3px;">
              My Wallet
            </p>
          </a>
        </li> -->

        <li class="nav-item @if($parent == 'seller') menu-open @endif">
          <a href="javascript:;" class="nav-link"><i class="fas fa-wallet" style="color:black"></i>
            &nbsp;
            <p style="padding-left: 3px;">
              My Wallet
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('seller.wallet.index')}}" class="nav-link @if($page == 'seller-wallet') active @endif">
                <i class="fa fa-history" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>History</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('seller.wallet.qr-code')}}" class="nav-link @if($page == 'seller-wallet-qr') active @endif">
                <i class="fa fa-qrcode" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>QR Code</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{route('chat.get')}}" class="nav-link @if($page == 'chats') active @endif">
            <i class="fas fa-comment" style="color:black"></i>
            <p style="padding-left: 3px;">
              Chats
            </p>
          </a>
        </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="javascript:;" class="nav-link">
           <i class="fas fa-tachometer-alt" style="color:#778aff" aria-hidden="true"></i>
            <p>
                Provider
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          <li class="nav-item">
          <a href="{{route('dashboard.index')}}" class="nav-link @if($page == 'seller_dashboard') active @endif">
            <i class="fas fa-tachometer-alt" style="color:black" aria-hidden="true"></i>
            <p style="padding-left: 3px;">
              Dashboard
            </p>
          </a>
        </li>
        @foreach(getProviderServices() as $sidebarService)
        @if($sidebarService->shop)
        <li class="nav-item @if($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id) menu-open @endif">
          <a href="javascript:;" class="nav-link">
            <img src="{{assetUrl().$sidebarService->service_category->icon_image}}" style="width: 25px;height: 25px;" />
            &nbsp;
            <p style="padding-left: 3px;">
              {{$sidebarService->service_category->name}}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @if($sidebarService->service_category->name == "Beauty")
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('service.add.item', ['id' => $sidebarService->shop->id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'add_product' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-upload" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>Add Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="@if($sidebarService->status == 0)javascript:;@else{{route('service.item.list', ['id' => $sidebarService->service_category_id])}}@endif" @if($sidebarService->status == 0) onclick="showAlert('{{$sidebarService->service_category->name}}')" @endif class="nav-link @if($page == 'product_list' && ($parent == $sidebarService->shop->id || $parent == $sidebarService->service_category_id)) active @endif">
                <i class="fa fa-list-alt" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>{{$sidebarService->service_category->name}} Products</p>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        @endforeach

        <li class="nav-item">
          <a href="{{route('shop.setting')}}" class="nav-link @if($page == 'shop_setting') active @endif">
            <i class="fas fa-cogs" style="color:black"></i>
            <p style="padding-left: 3px;">
              Shop Setting
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('product.reviews')}}" class="nav-link @if($page == 'product_review') active @endif">
            <i class="fa fa-star" aria-hidden="true" style="color:black"></i>
            <p style="padding-left: 3px;">
              Product Reviews
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{route('order.list')}}" class="nav-link @if($page == 'order') active @endif">
            <i class="fas fa-shopping-cart" style="color:black"></i>
            <p style="padding-left: 3px;">
              Orders
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="{{route('seller.wallet.index')}}" class="nav-link @if($page == 'seller-wallet') active @endif">
            <i class="fas fa-wallet" style="color:black"></i>
            <p style="padding-left: 3px;">
              My Wallet
            </p>
          </a>
        </li> -->

        <li class="nav-item @if($parent == 'seller') menu-open @endif">
          <a href="javascript:;" class="nav-link"><i class="fas fa-wallet" style="color:black"></i>
            &nbsp;
            <p style="padding-left: 3px;">
              My Wallet
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('seller.wallet.index')}}" class="nav-link @if($page == 'seller-wallet') active @endif">
                <i class="fa fa-history" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>History</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('seller.wallet.qr-code')}}" class="nav-link @if($page == 'seller-wallet-qr') active @endif">
                <i class="fa fa-qrcode" style="color:black" aria-hidden="true"></i>
                &nbsp;
                <p>QR Code</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{route('chat.get')}}" class="nav-link @if($page == 'chats') active @endif">
            <i class="fas fa-comment" style="color:black"></i>
            <p style="padding-left: 3px;">
              Chats
            </p>
          </a>
        </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  function showAlert(shop_name) {
    swal({
      title: "Oops!",
      text: shop_name + " shop is not verified",
      icon: "error",
      button: "Oh no!",
      allowOutsideClick: false
    })
  }
</script>