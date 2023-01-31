<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('super_admin_assets/img/sidebar-1.jpg')}}">
  <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->

  <div class="logo" style="background-color:#061880"><a href="{{route('super.admin.dashbaord')}}" class="simple-text logo-normal">
      <img src="{{asset('assets/front/img/beeda_logo.svg')}}" style="width: 80px;height: 45px;" />
    </a></div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item @if($page == 'dashboard') active @endif">
        <a class="nav-link" href="{{route('super.admin.dashbaord')}}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'manage_brand' || $page == 'manage_service') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#seller_menu" aria-expanded="true">
          <i class="material-icons">store_mall_directory</i>
          <p>Seller
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if($page == 'manage_product' || $page == 'manage_brand' || $page == 'manage_service' || $page == 'manage_seller' || $page == 'manage_attribute' || $page == 'manage_color') show @endif" id="seller_menu">
          <ul class="nav">
            <!-- <li class="nav-item @if($page == 'manage_category') active @endif">
              <a class="nav-link" href="{{route('category.list')}}">
                <span class="sidebar-mini"><i class="material-icons">category</i></span>
                <span class="sidebar-normal">Manage Category</span>
              </a>
            </li> -->
            <li class="nav-item @if($page == 'manage_product') active @endif">
              <a class="nav-link" href="{{route('product.list')}}">
                <span class="sidebar-mini"><i class="material-icons">rounded_corner</i></span>
                <span class="sidebar-normal">Manage Product</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_brand') active @endif">
              <a class="nav-link" href="{{route('brand.list')}}">
                <span class="sidebar-mini"><i class="material-icons">rounded_corner</i></span>
                <span class="sidebar-normal">Manage Brand</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_service') active @endif">
              <a class="nav-link" href="{{route('service.list')}}">
                <span class="sidebar-mini"><i class="material-icons">storefront</i></span>
                <span class="sidebar-normal">Manage Services</span>
              </a>
            </li>
            <!-- <li class="nav-item @if($page == 'manage_document') active @endif">
              <a class="nav-link" href="{{route('document.list')}}">
                <span class="sidebar-mini"><i class="material-icons">description</i></span>
                <span class="sidebar-normal">Manage Documents</span>
              </a>
            </li> -->
            <li class="nav-item @if($page == 'manage_seller') active @endif">
              <a class="nav-link" href="{{route('seller.list')}}">
                <span class="sidebar-mini"><i class="material-icons">people</i></span>
                <span class="sidebar-normal">Manage Sellers</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_attribute') active @endif">
              <a class="nav-link" href="{{route('service.attribute.list')}}">
                <span class="sidebar-mini"><i class="material-icons">layers</i></span>
                <span class="sidebar-normal">Manage Attributes</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_color') active @endif">
              <a class="nav-link" href="{{route('service.color.list')}}">
                <span class="sidebar-mini"><i class="material-icons">palette</i></span>
                <span class="sidebar-normal">Manage Colors</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#provider_menu" aria-expanded="true">
          <i class="material-icons">baby_changing_station</i>
          <p>Worker
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if($page == 'manage_worker_service') show @endif" id="provider_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'manage_worker_service') active @endif">
              <a class="nav-link" href="{{route('worker.service.list')}}">
                <span class="sidebar-mini"><i class="material-icons">storefront</i></span>
                <span class="sidebar-normal">Manage Services</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">
                <span class="sidebar-mini"><i class="material-icons">store_mall_directory</i></span>
                <span class="sidebar-normal">Manage Stores</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="">
                <span class="sidebar-mini"><i class="material-icons">cleaning_services</i></span>
                <span class="sidebar-normal">Services</span>
              </a>
            </li> -->
          </ul>
        </div>
      </li>
      <li class="nav-item @if($page == 'manage_transport_service' || $page == 'manage_rider_list' || $page == 'manage_ride_list') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#transport_menu" aria-expanded="true">
          <i class="material-icons">local_shipping</i>
          <p>Transport
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if($page == 'manage_milestone' || $page == 'manage_transport_service' || $page == 'manage_vehicle_type' || $page == 'manage_vehicle_category' || $page == 'manage_rider_list' || $page == 'manage_ride_list' || $page == 'subscriptions') show @endif" id="transport_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'manage_transport_service') active @endif">
              <a class="nav-link" href="{{route('transport.service.list')}}">
                <span class="sidebar-mini"><i class="material-icons">storefront</i></span>
                <span class="sidebar-normal">Manage Services</span>
              </a>
            </li>
            <!-- <li class="nav-item @if($page == 'manage_rider_list') active @endif">
              <a class="nav-link" href="{{route('transport.service.all-drivers')}}">
                <span class="sidebar-mini"><i class="material-icons">groups</i></span>
                <span class="sidebar-normal">Rider List</span>
              </a>
            </li> -->
            <li class="nav-item @if($page == 'manage_vehicle_category') active @endif">
              <a class="nav-link" href="{{route('transport.vehicle.list')}}">
                <span class="sidebar-mini"><i class="material-icons">commute</i></span>
                <span class="sidebar-normal">Manage Vehicle Category</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_vehicle_type') active @endif">
              <a class="nav-link" href="{{route('transport.vehicle-type.list')}}">
                <span class="sidebar-mini"><i class="material-icons">commute</i></span>
                <span class="sidebar-normal">Manage Vehicle Type</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'manage_milestone') active @endif">
              <a class="nav-link" href="{{route('transport.milestone.list')}}">
                <span class="sidebar-mini"><i class="material-icons">star</i></span>
                <span class="sidebar-normal">Milestone</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'subscriptions') active @endif">
              <a class="nav-link" href="{{route('subscriptions.index')}}">
                <span class="sidebar-mini"><i class="material-icons">subscriptions</i></span>
                <span class="sidebar-normal">Manage Subscription</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'driver_subscriptions') active @endif">
              <a class="nav-link" href="{{route('subscriptions.driver')}}">
                <span class="sidebar-mini"><i class="material-icons">commute</i></span>
                <span class="sidebar-normal">Driver Subscription</span>
              </a>
            </li>
            <!-- <li class="nav-item @if($page == 'manage_ride_list') active @endif">
              <a class="nav-link" href="{{route('transport.service.all-rides')}}">
                <span class="sidebar-mini"><i class="material-icons">two_wheeler</i></span>
                <span class="sidebar-normal">All Rides</span>
              </a>
            </li> -->
          </ul>
        </div>
      </li>
      <li class="nav-item @if($page == 'manage_coupon') active @endif">
        <a class="nav-link" href="{{route('service.coupon.list')}}">
          <i class="material-icons">local_offer</i>
          <p>Manage Coupon</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'manage_customer') active @endif">
        <a class="nav-link" href="{{route('superadmin.customer.index')}}">
          <i class="material-icons">group</i>
          <p>Manage Customers</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'manage_category') active @endif">
        <a class="nav-link" href="{{route('category.list')}}">
          <i class="material-icons">toc</i>
          <p>Manage Categories</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'manage_document') active @endif">
        <a class="nav-link" href="{{route('document.list')}}">
          <i class="material-icons">description</i>
          <p>Manage Documents</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'manage_banner') active @endif">
        <a class="nav-link" href="{{route('banner.list')}}">
          <i class="material-icons">photo_library</i>
          <p>Manage Banners</p>
        </a>
      </li>
      <!-- <li class="nav-item {{request()->route()->getName()=='wallet.index' ? 'active' : ''}}">
        <a class="nav-link" href="{{route('wallet.index')}}">
          <i class="material-icons">money</i>
          <p>Manage Wallet</p>
        </a>
      </li> -->
      <li class="nav-item @if($page == 'wallet_index') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#wallet_menu" aria-expanded="true">
          <i class="material-icons">account_balance_wallet</i>
          <p>Manage Wallet
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="wallet_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'wallet_index') active @endif">
              <a class="nav-link" href="{{route('wallet.index')}}">
                <span class="sidebar-mini"><i class="material-icons">groups</i></span>
                <span class="sidebar-normal">Transactions</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'bank_transfer') active @endif">
              <a class="nav-link" href="{{route('wallet.bank-transfer')}}">
                <span class="sidebar-mini"><i class="material-icons">cleaning_services</i></span>
                <span class="sidebar-normal">Wallet To Bank Transfer</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'wallet_pin_reset_requests') active @endif">
              <a class="nav-link" href="{{route('wallet.pin-reset-requests')}}">
                <span class="sidebar-mini"><i class="material-icons">token</i></span>
                <span class="sidebar-normal">PIN Reset Requests</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'qr-code') active @endif">
              <a class="nav-link" href="{{route('wallet.qr-code')}}">
                <span class="sidebar-mini"><i class="material-icons">qr_code</i></span>
                <span class="sidebar-normal">Generate QR</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item @if($page == 'voucher' || $page == 'active_vouchers') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#voucher_menu" aria-expanded="true">
          <i class="material-icons">money</i>
          <p>Manage Vouchers
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="voucher_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'voucher') active @endif">
              <a class="nav-link" href="{{route('voucher.index')}}">
                <span class="sidebar-mini"><i class="material-icons">groups</i></span>
                <span class="sidebar-normal">Generate</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'active_vouchers') active @endif">
              <a class="nav-link" href="{{route('voucher.active.vouchers')}}">
                <span class="sidebar-mini"><i class="material-icons">cleaning_services</i></span>
                <span class="sidebar-normal">Active Vouchers</span>
              </a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item @if($page == 'revenue' || $page == 'revenue_settings') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#revenue_menu" aria-expanded="true">
          <i class="material-icons">paid</i>
          <p>Manage Revenue
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="revenue_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'revenue') active @endif">
              <a class="nav-link" href="{{route('revenue.index')}}">
                <span class="sidebar-mini"><i class="material-icons">summarize</i></span>
                <span class="sidebar-normal">Summary</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'revenue_settings') active @endif">
              <a class="nav-link" href="{{route('revenue.settings')}}">
                <span class="sidebar-mini"><i class="material-icons">settings</i></span>
                <span class="sidebar-normal">Settings</span>
              </a>
            </li>
          </ul>
        </div>
      </li>






      <li class="nav-item @if($page == 'movie') active @endif">
        <a class="nav-link" href="{{route('movie.index')}}">
          <i class="material-icons">toc</i>
          <p>Default video</p>
        </a>
      </li>
      <li class="nav-item @if($page == 'reward_point_settings') active @endif">
        <a class="nav-link" href="{{route('settings.reward-points')}}">
          <i class="material-icons">emoji_events</i>
          <p>Reward Point Settings</p>
        </a>
      </li>
      <!-- <li class="nav-item @if($page == 'loan') active @endif">
        <a class="nav-link" href="{{route('loan.index')}}">
          <i class="material-icons">money_bag</i>
          <p>Loan</p>
        </a>
      </li> -->
      <li class="nav-item @if($page == 'loan') active @endif">
        <a class="nav-link" data-toggle="collapse" href="#loan_menu" aria-expanded="true">
          <i class="material-icons">money_bag</i>
          <p>Loan
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse @if($page == 'loan' || $page == 'loan_types') show @endif" id="loan_menu">
          <ul class="nav">
            <li class="nav-item @if($page == 'loan') active @endif">
              <a class="nav-link" href="{{route('loan.index')}}">
                <span class="sidebar-mini"><i class="material-icons">storefront</i></span>
                <span class="sidebar-normal">All Loans</span>
              </a>
            </li>
            <li class="nav-item @if($page == 'loan_types') active @endif">
              <a class="nav-link" href="{{route('loan.types')}}">
                <span class="sidebar-mini"><i class="material-icons">commute</i></span>
                <span class="sidebar-normal">Loan Types</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item @if($page == 'manage_blog') active @endif">
        <a class="nav-link" href="{{route('beeda.blog.list')}}">
          <i class="material-icons">rss_feed</i>
          <p>Blogs</p>
        </a>
      </li>
    </ul>
  </div>
</div>