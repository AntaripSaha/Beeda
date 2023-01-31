<footer class="main-footer">
    <strong>Copyright &copy; {{date('Y')-1}}-{{date('Y')}} <a href="{{url('/')}}">{{env('APP_NAME')}}</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <script src="{{ asset('assets/front/js/jquery.min.js') }}"></script>
  <script>
    // order
    function shortOrderList()
    {
        $.ajax({
          url: '{{ route("short.order.list") }}',
          type: 'GET',
          dataType: 'JSON',
          success: function (response) {
              var data = response.orders;
              var unread_count = response.unread_count;
              console.log(data);
              $("#order-notification").html("");
              var content = '';
              for(var i = 0; i < data.length; i++)
              {
                var unread = '';
                if(data[i].viewed == 0)
                {
                  unread = `<span class="float-right text-sm text-danger"><i class="fa fa-rocket"></i></span>`;
                }
                content += `<a href="`+window.location.origin+'/'+'order-details'+'/'+data[i].id+`" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                              <img src="{{assetUrl('')}}cart-img.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                              <div class="media-body">
                                <h3 class="dropdown-item-title">
                                  `+data[i].user.name+`
                                  `+unread+`
                                </h3>
                                <p class="text-sm">From: `+data[i].order_details[0].product.service_category.name+` service</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> `+timeSince(new Date(data[i].created_at).getTime())+` Ago</p>
                              </div>
                            </div>
                            <!-- Message End -->
                          </a>
                          <div class="dropdown-divider"></div>`;
              }
              content += `<a href="{{route('order.list')}}" class="dropdown-item dropdown-footer">See All Orders</a>`;
              $(".order-badges").text(unread_count);
              $("#order-notification").html(content);
          }
        });
    }
    shortOrderList();
    
    // schedule
    function shortScheduleList()
    {
        $.ajax({
          url: '{{ route("realestate.short.schedule.list") }}',
          type: 'GET',
          dataType: 'JSON',
          success: function (response) {
              console.log(response);
              var data = response.schedules;
              var unread_count = response.unread_count;
              $("#schedule-notification").html("");
              var content = '';
              for(var i = 0; i < data.length; i++)
              {
                var unread = '';
                if(data[i].viewed == 0)
                {
                  unread = `<span class="float-right text-sm text-danger"><i class="fa fa-rocket"></i></span>`;
                }
                var username = '';
                if(data[i].user)
                {
                  username = data[i].user.name;
                }
                content += `<a href="`+window.location.origin+'/'+'realestate/schedule-details'+'/'+data[i].id+`/`+data[i].property.shop_id+`" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                              <img src="https://icons.iconarchive.com/icons/aha-soft/large-home/512/Property-icon.png" alt="Property Image" class="img-size-50 mr-3 img-circle">
                              <div class="media-body">
                                <h3 class="dropdown-item-title">
                                  `+data[i].property.name+`
                                  `+unread+`
                                </h3>
                                <p class="text-sm">From: `+ username +`</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> `+timeSince(new Date(data[i].created_at).getTime())+` Ago</p>
                              </div>
                            </div>
                            <!-- Message End -->
                          </a>
                          <div class="dropdown-divider"></div>`;
              }
              content += `<a href="{{url('realestate/schedule-list/`+data[0].property.shop_id+`')}}" class="dropdown-item dropdown-footer">See All Schedules</a>`;
              $(".schedule-badges").text(unread_count);
              $("#schedule-notification").html(content);
          }
        });
    }
    @foreach(getSellerServices() as $service)
      @if($service->service_category_id == 34)
        shortScheduleList();
      @endif
    @endforeach
    
  </script>

  <script>
    function timeSince(date) {

      var seconds = Math.floor((new Date() - date) / 1000);

      var interval = seconds / 31536000;

      if (interval > 1) {
        return Math.floor(interval) + " Years";
      }
      interval = seconds / 2592000;
      if (interval > 1) {
        return Math.floor(interval) + " Months";
      }
      interval = seconds / 86400;
      if (interval > 1) {
        return Math.floor(interval) + " Days";
      }
      interval = seconds / 3600;
      if (interval > 1) {
        return Math.floor(interval) + " Hours";
      }
      interval = seconds / 60;
      if (interval > 1) {
        return Math.floor(interval) + " Minutes";
      }
      return Math.floor(seconds) + " Seconds";

    }
    var aDay = 24*60*60*1000;
    // console.log(timeSince(new Date(Date.now()-aDay)));
    // console.log(timeSince(new Date(Date.now()-aDay*2)));
  </script>

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-app.js"></script> -->
  <script src="https://www.gstatic.com/firebasejs/8.2.3/firebase-database.js"></script>
<script>
    var firebaseConfig = {
        apiKey: "{{ config('services.firebase.api_key') }}",
        authDomain: "{{ config('services.firebase.auth_domain') }}",
        databaseURL: "{{ config('services.firebase.database_url') }}",
        projectId: "{{ config('services.firebase.project_id') }}",
        storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        messagingSenderId: "{{ config('services.firebase.messaging_sender_id') }}",
        appId: "{{ config('services.firebase.app_id') }}"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    // function initFirebaseMessagingRegistration() {
    //         console.log(messaging);
    //         messaging

    //         .requestPermission()
    //         .then(function () {
    //             return messaging.getToken()
    //         })
    //         .then(function(token) {
    //             console.log(token);
    //         }).catch(function (err) {
    //             console.log('User Chat Token Error'+ err);
    //         });
    //  }

    // chat area
    const usersRef = firebase
      .firestore()
      .collection("Users");

      usersRef
      .get()
      .then((snapshot) => {
        console.log(snapshot.docs);
        const data = snapshot.docs.map((doc) => ({
          id: doc.id,
          ...doc.data(),
        }));
        console.log("All data in 'users' collection", data); 
        // [ { id: 'glMeZvPpTN1Ah31sKcnj', title: 'The Great Gatsby' } ]
      });
    // chat area end   

    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
    setTimeout(shortOrderList, 1000);
    setTimeout(shortScheduleList, 1000);
</script>
<!-- <script>
    $(document).ready(function(){
        initFirebaseMessagingRegistration();
    })
</script> -->

@push('scripts')
<script>
    // order notification
    Echo.private('order.'+'{{auth()->user()->id}}')
    .listen('OrderCreated', (e) => {
        shortOrderList();
        console.log(e)  
        iziToast.success({
          title: 'New Order',
          position: 'topRight',
          message: 'New order placed now !',
      });
    })

    // property schedule notification
    // Echo.private('property_schedule.'+'{{auth()->user()->id}}')
    // .listen('PropertyScheduleCreated', (e) => {
    //     shortScheduleList();
    //     console.log(e)  
    //     iziToast.success({
    //       title: 'New Schedule',
    //       position: 'topRight',
    //       message: 'New schedule booked now !',
    //   });
    // })
</script>
@endpush

  