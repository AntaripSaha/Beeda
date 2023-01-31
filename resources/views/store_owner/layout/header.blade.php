  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <!--order-->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" style="margin-right:10px;">
          <i class="fa fa-shopping-cart" style="font-size: 21px;color: #58D68D;"></i>
          <span class="badge badge-info navbar-badge order-badges" style="font-weight: 900;background-color:black;font-size: 0.6em;">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="order-notification">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZldEPvFgz5ysckNAa5ztdf4Exw00bb1a9qA&usqp=CAU" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeH_bt2VcwTEx8mY8tJYsYmHaQzcT4-oABVg&usqp=CAU" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{route('order.list')}}" class="dropdown-item dropdown-footer">See All Orders</a>
        </div>
      </li>
      <!--order end-->
      @foreach(getSellerServices() as $service)
        @if($service->service_category_id == 34)
          <!--schedule-->
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="#" style="margin-right:10px;">
                <i class="fa fa-calendar" style="font-size: 21px;color: #f17d50;"></i>
                <span class="badge badge-info navbar-badge schedule-badges" style="font-weight: 900;background-color:black;font-size: 0.6em;">0</span>
              </a>
              <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" id="schedule-notification">
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZldEPvFgz5ysckNAa5ztdf4Exw00bb1a9qA&usqp=CAU" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Brad Diesel
                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">Call me whenever you can...</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSeH_bt2VcwTEx8mY8tJYsYmHaQzcT4-oABVg&usqp=CAU" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        John Pierce
                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">I got your message bro</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                  <!-- Message Start -->
                  <div class="media">
                    <img src="https://w7.pngwing.com/pngs/340/946/png-transparent-avatar-user-computer-icons-software-developer-avatar-child-face-heroes.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                    <div class="media-body">
                      <h3 class="dropdown-item-title">
                        Nora Silvester
                        <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                      </h3>
                      <p class="text-sm">The subject goes here</p>
                      <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                    </div>
                  </div>
                  <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{route('order.list')}}" class="dropdown-item dropdown-footer">See All Orders</a>
              </div>
            </li>
          <!--schedule end-->
        @endif
      @endforeach

      <li class="nav-item">
        <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a> -->
        <form action="{{route('login.logout')}}" method="post">
          @csrf
          <button class="btn btn-sm" style="background-color: #061880;color: white;"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
