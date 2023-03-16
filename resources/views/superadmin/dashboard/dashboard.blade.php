@extends('superadmin.master')

@section('page_title')
Dashboard
@endsection

@section('css_js_up')
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- PIE CHART -->
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'Pie chart',
                       'width':500,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <!-- BUBBLE CHART -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawSeriesChart);

    function drawSeriesChart() {

      var data = google.visualization.arrayToDataTable([
        ['ID', 'Life Expectancy', 'Fertility Rate', 'Region',     'Population'],
        ['CAN',    80.66,              1.67,      'North America',  33739900],
        ['DEU',    79.84,              1.36,      'Europe',         81902307],
        ['DNK',    78.6,               1.84,      'Europe',         5523095],
        ['EGY',    72.73,              2.78,      'Middle East',    79716203],
        ['GBR',    80.05,              2,         'Europe',         61801570],
        ['IRN',    72.49,              1.7,       'Middle East',    73137148],
        ['IRQ',    68.09,              4.77,      'Middle East',    31090763],
        ['ISR',    81.55,              2.96,      'Middle East',    7485600],
        ['RUS',    68.6,               1.54,      'Europe',         141850000],
        ['USA',    78.09,              2.05,      'North America',  307007000]
      ]);

      var options = {
        // title: 'Fertility rate vs life expectancy in selected countries (2010).' +
        //   ' X=Life Expectancy, Y=Fertility, Bubble size=Population, Bubble color=Region',
        title: 'Bubble chart',
        hAxis: {title: 'Life Expectancy'},
        vAxis: {title: 'Fertility Rate'},
        bubble: {textStyle: {fontSize: 11}}
      };

      var chart = new google.visualization.BubbleChart(document.getElementById('series_chart_div'));
      chart.draw(data, options);
    }
    </script>
@endsection

@section('main_content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">store_mall_directory</i>
                    </div>
                    <p class="card-category">Total Sellers</p>
                    <h3 class="card-title">{{ $total_sellers }}
                    <!-- <small>GB</small> -->
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons text-warning">arrow_forward</i><a href="{{ route('seller.list') }}">More Details</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">home_repair_service</i>
                    </div>
                    <p class="card-category">Total Providers</p>
                    <h3 class="card-title">{{ $total_provider }}</h3>
                </div>
                <div class="card-footer">
                <div class="stats">
                    <i class="material-icons text-success">arrow_forward</i><a href="javascript:;">More Details</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">two_wheeler</i>
                    </div>
                    <p class="card-category">Total Riders</p>
                    <h3 class="card-title">{{ $total_rides }}</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                    <i class="material-icons text-danger">arrow_forward</i><a href="javascript:;">More Details</a>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                    <i class="material-icons">room_service</i>
                    </div>
                    <p class="card-category">Total Services</p>
                    <h3 class="card-title">{{ $total_services }}+</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons text-info">arrow_forward</i><a href="javascript:;">More Details</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
            <a href="{{ route('super.admin.description.update') }}" class="btn btn-circle btn-info">
                <span>Update description</span>
            </a>
                <!--Div that will hold the pie chart-->
                <!-- <div id="chart_div"></div> -->
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <!--Div that will hold the pie chart-->
                <!-- <div id="series_chart_div" style="width: 500px; height: 400px;"></div> -->
            </div>
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

</script>

@if(Session::get('success_message'))
<script>
    customShowNotification('top', 'right', "{{Session::get('success_message')}}");
</script>
@endif

@endsection



