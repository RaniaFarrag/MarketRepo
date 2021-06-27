<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>{{ trans('dashboard.Representative name') }}</th>
            <th>{{ trans('dashboard.Salary') }} </th>
            <th>{{ trans('dashboard.Daily visits') }} </th>
            <th>{{ trans('dashboard.Target') }} </th>
            <th>{{ trans('dashboard.Achieved') }} </th>
            <th>{{ trans('dashboard.Residual') }} </th>
            <th>{{ trans('dashboard.Due from salary') }} </th>
            <th>{{ trans('dashboard.rest salary') }} </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $representative_name }}</td>
            <td>{{ $salary ? $salary : '-' }}</td>
            <td>{{ $salary ? round($daily_visits) : '-' }}</td>
            <td>{{ $salary ? round($daily_visits) * 22 : '-' }}</td> <!--target-->
            <td>{{ $sum_visited }}</td> <!--Achieved-->
           <td>{{ $salary ? (round($daily_visits) * 22) - $sum_visited : '-' }}</td>
           <td>{{ $salary ? $sum_visited * $visit_price : '-' }}</td>
           <td>{{ $salary ? $salary - ($sum_visited * $visit_price) : '-' }}</td>

       </tr>
       </tbody>
   </table>
</div>

<div class="separator separator-dashed mt-8 mb-5"></div>

<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>{{ trans('dashboard.id') }}</th>
        <th>{{ trans('dashboard.Date') }}</th>
        <th>
            <span></span>
            <span>{{ trans('dashboard.Companies Counts') }}</span>
        </th>
        <th>{{ trans('dashboard.Visits Counts') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($data_counts as $k=>$count)
        <tr>
            <td><span></span>{{ $k+1 }}</td>
            <td>{{ $count['date'] }}</td>
            <td>{{ $count['added'] }}</td>
            <td>{{ $count['visited'] }}</td>
        </tr>
    @endforeach
    <tr>
        <td></td>
        <td bgcolor="#f0f8ff"><strong>{{ trans('dashboard.Total') }}</strong></td>
        <td bgcolor="#f0f8ff"><strong>{{ $sum_added }}</strong></td>
        <td bgcolor="#f0f8ff"><strong>{{ $sum_visited }}</strong></td>
    </tr>

    </tbody>

</table>




{{--<div class="container-fluid p-5">--}}
{{--    <div id="barchart_material" style="width: 100%; height: 500px;"></div>--}}
{{--</div>--}}


{{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--<script type="text/javascript">--}}

{{--    google.charts.load('current', {'packages':['bar']});--}}
{{--    google.charts.setOnLoadCallback(drawChart);--}}

{{--    function drawChart() {--}}
{{--        var data = google.visualization.arrayToDataTable([--}}
{{--            ['Date', 'Visited', 'Added'],--}}

{{--            @php--}}
{{--                foreach($data_counts as $count) {--}}
{{--                    echo "['".$count['visited']."', ".$count['added'].", ".$count['date']."],";--}}
{{--                }--}}
{{--            @endphp--}}
{{--        ]);--}}

{{--        var options = {--}}
{{--            chart: {--}}
{{--                title: 'Bar Graph | Sales',--}}
{{--                subtitle: 'Visited, and Added: @php echo $data_counts[0]['date'] @endphp',--}}
{{--                labels: [1 , 2],--}}
{{--                --}}
{{--            },--}}
{{--            bars: 'vertical'--}}
{{--        };--}}
{{--        var chart = new google.charts.Bar(document.getElementById('barchart_material'));--}}
{{--        chart.draw(data, google.charts.Bar.convertOptions(options));--}}
{{--    }--}}
{{--</script>--}}

