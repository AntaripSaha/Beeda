<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#06177D;padding-top: 25px;padding-bottom: 25px;">
  <div class="container">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

    <a class="navbar-brand" href="#">
      <img src="{{asset('assets/front/img/beeda_white_logo.png')}}" style="width:112px;height:auto"/>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
      <div class="dropdown ml-2">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownForm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span style="color:#ffe000;">Hello!</span> {{session()->get('user_info')->first_name.' '.session()->get('user_info')->last_name}}
        </button>
        <div class="dropdown-menu">
          @php $total_shop = 0 @endphp
          @foreach(getSellerServices() as $single_shop)
            @php
              if($single_shop->shop != null)
              {
                $total_shop++;
              }
            @endphp
          @endforeach
          @foreach(getProviderServices() as $single_shop)
            @php
              if($single_shop->shop != null)
              {
                $total_shop++;
              }
            @endphp
          @endforeach
          @if(count(getProviderServices()) > 0 || count(getSellerServices()) > 0 && $total_shop >= 1)
          <a class="dropdown-item" href="{{route('dashboard.index')}}">Dashboard</a>
          @endif
          <form action="{{route('login.logout')}}" id="logout_form" method="post">
            @csrf
            <a class="dropdown-item" href="javascript:;" onclick="logout()">Logout</a>
          </form>
        </div>
      </div>


    </div>
  </div>
</nav>
<script>
  function logout()
  {
    $('#logout_form').submit();
  }
</script>