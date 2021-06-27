<style>

    th {
        text-align: center;
    }
</style>
<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center"> {{ trans('dashboard.General Report') }} {{ $representative_name }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>


<table style="text-align: center; border: 1px solid #000000">
    <thead>
        <tr>
        <th> </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Representative name') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Daily visits') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Target') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Achieved') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Residual') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Due from salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.rest salary') }} </th>
  </tr>
    </thead>
    <tbody>
    <tr>
        <td> </td>
      {{--  <td style="text-align: center; border: 1px solid #000000;"> {{app()->getLocale() == 'ar' ? $rep->name : $rep->name_en}}</td>
--}}
        <td style="text-align: center; border: 1px solid #000000;"> {{ $representative_name }}</td>
        <td style="text-align: center; border: 1px solid #000000;"> {{ $salary ? $salary : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $salary ? round($daily_visits) : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $salary ? round($daily_visits) * 22 : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $sum_visited }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $salary ? (round($daily_visits) * 22) - $sum_visited : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $salary ? $sum_visited * 50 : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $salary ? $salary - ($sum_visited * 50) : '-' }}</td>
    </tr>
    </tbody>
</table>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.id') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Date') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Companies Counts') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Visits Counts') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($data_counts as $k=>$count)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{ $k+1 }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $count['date'] }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $count['added'] }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $count['visited'] }}</td>
        </tr>
    @endforeach
    <tr>
        <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; "></td>
        <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c;" >{{ trans('dashboard.Total') }}</td>
        <td style="text-align: center; border: 1px solid #000000">{{ $sum_added }}</td>
        <td style="text-align: center; border: 1px solid #000000">{{ $sum_visited }}</td>
    </tr>
    </tbody>
</table>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>



{{--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>--}}

{{--<script>--}}
{{--    window.onload = function () {--}}
{{--        var chart_array1 = @json($chart_array1);--}}
{{--        console.log(@json($chart_array1))--}}
{{--        var chart_array2 = @json($chart_array2);--}}
{{--        var representative_name = @json($representative_name);--}}

{{--        var chart = new CanvasJS.Chart("chartContainer", {--}}
{{--            animationEnabled: true,--}}
{{--            theme: "light2",--}}
{{--            title:{--}}
{{--                text: "Chart Of " + representative_name,--}}
{{--                _fontSize: "1%"--}}
{{--            },--}}
{{--            axisY:{--}}
{{--                includeZero: false,--}}
{{--                labelAngle: 20,--}}
{{--            },--}}
{{--            axisX:{--}}
{{--                labelAngle: 60,--}}
{{--            },--}}
{{--            legend:{--}}
{{--                cursor: "pointer",--}}
{{--                verticalAlign: "center",--}}
{{--                horizontalAlign: "right",--}}
{{--                itemclick: toggleDataSeries--}}
{{--            },--}}
{{--            data: [{--}}
{{--                type: "column",--}}
{{--                name: "{{ trans('dashboard.Added') }}",--}}
{{--                //indexLabel: "{y}",--}}
{{--                //yValueFormatString: "$#0.##",--}}
{{--                showInLegend: true,--}}
{{--                dataPoints: chart_array1--}}
{{--            },{--}}
{{--                type: "column",--}}
{{--                name: "{{ trans('dashboard.Visited') }}",--}}
{{--                //indexLabel: "{y}",--}}
{{--                //yValueFormatString: "$#0.##",--}}
{{--                showInLegend: true,--}}
{{--                dataPoints: chart_array2--}}
{{--            }]--}}
{{--        });--}}
{{--        chart.render();--}}

{{--        function toggleDataSeries(e){--}}
{{--            console.log(dataSeries)--}}
{{--            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {--}}
{{--                e.dataSeries.visible = false;--}}
{{--            }--}}
{{--            else{--}}
{{--                e.dataSeries.visible = true;--}}
{{--            }--}}
{{--            chart.render();--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
