@extends('layouts.dashboard')

@section('body')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Heading-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h2 class="text-white font-weight-bold my-2 mr-5">
                            {{ trans('dashboard.General Report') }}
                        </h2>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.General Report') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
{{--                    <button type="button" id="exportExcel"--}}
{{--                            class="btn btn-block btn-success spinner-white spinner-right">{{ trans('dashboard.Export Excel') }}--}}
{{--                    </button>--}}
{{--                    <a href="#"--}}
{{--                       class="btn btn-success font-weight-bold  py-3 px-6 mr-2">--}}
{{--                        {{ trans('dashboard.Total Reports') }} <span id="counter" ></span>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.General Report') }} <span id="representative_name">{{ $representative_name }}</span>
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="salesFrom" action=" ">
                                    <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" data-toggle="collapse"
                                                     data-target="#collapseOne1">
                                                    {{ trans('dashboard.Companies Filters') }}
                                                </div>
                                            </div>
                                            <div id="collapseOne1" class="collapse show"
                                                 data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <div class="row fliter_serch">
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Representative name') }}</label>
                                                                <select class="form-control select2" id="representative_id" name="representative_id" required>
                                                                    {{--multiple="multiple"--}}
                                                                    <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                    @foreach($representatives as $k=>$representative)
                                                                        <option {{ $k == 0 ? 'selected' : '' }} value="{{ $representative->id }}">
                                                                            {{ app()->getLocale()=='ar' ? $representative->name : $representative->name_en }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.From') }}</label>
                                                                <input type="date" class="form-control" id="from"
                                                                       name="from" value="{{ \Carbon\Carbon::now()->startOfMonth()->toDateString() }}" required>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.To') }}</label>
                                                                <input type="date" class="form-control" id="to"
                                                                       name="to" value="{{ \Carbon\Carbon::now()->toDateString() }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>&nbsp;</label>
                                                                <button type="button" id="searchBtn"
                                                                        class="btn btn-block btn-success spinner-white spinner-right">{{ trans('dashboard.Search') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator separator-dashed mt-8 mb-5"></div>
                                    <div class="d-flex align-items-center">
                                        <button type="submit" class="btn btn-success font-weight-bold  py-3 px-6 mr-2 submitBtn"  route="{{route('generate_chart')}}">
                                           Generate Chart
                                        </button>

                                        <button type="submit" route="{{route('export_visits_count_report')}}"
                                                class="btn btn-success font-weight-bold  py-3 px-6 mr-2 submitBtn">{{ trans('dashboard.Export Excel') }}
                                        </button>
                                    </div>
                                </form>
                                <div class="separator separator-dashed mt-8 mb-5"></div>

                                <div class="table-responsive renderTable">
                                    @include('system.companies_visits_count.report_partial')
                                </div>

{{--                                <div class="separator separator-dashed mt-8 mb-5"></div>--}}
{{--                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>--}}
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
    </div>
    <!--end::Content-->

@endsection


@section('script')
    <script>
        $('body').on('click', '.pagination a , #searchBtn', function (e) {
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: '{{ route("get_visits_count_report") }}',
                beforeSend: function () {
                    $('#searchBtn').addClass('spinner');
                    $('#searchBtn').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchBtn').removeClass('spinner');
                    $('#searchBtn').removeAttr('disabled');

                },
                data: {
                    "representative_id": $("#representative_id").val(),
                    "from": $("#from").val(),
                    "to": $("#to").val(),

                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#representative_name').html(JSON.parse(data).representative_name)

                    // var chart_array1 = JSON.parse(data).chart_array1;
                    // var chart_array2 = JSON.parse(data).chart_array2;
                    // var representative_name = JSON.parse(data).representative_name;

                    // var chart = new CanvasJS.Chart("chartContainer", {
                    //     animationEnabled: true,
                    //     theme: "light2",
                    //     title:{
                    //         text: "Chart Of " + representative_name,
                    //         _fontSize: "1%"
                    //     },
                    //     axisY:{
                    //         includeZero: false,
                    //         labelAngle: 20,
                    //     },
                    //     axisX:{
                    //         labelAngle: 60,
                    //     },
                    //     legend:{
                    //         cursor: "pointer",
                    //         verticalAlign: "center",
                    //         horizontalAlign: "right",
                    //         itemclick: toggleDataSeries
                    //     },
                    //     data: [{
                    //         type: "column",
                    //         name: "Added",
                    //         //indexLabel: "{y}",
                    //         //yValueFormatString: "$#0.##",
                    //         showInLegend: true,
                    //         dataPoints: chart_array1
                    //     },{
                    //         type: "column",
                    //         name: "Visited",
                    //         //indexLabel: "{y}",
                    //         //yValueFormatString: "$#0.##",
                    //         showInLegend: true,
                    //         dataPoints: chart_array2
                    //     }]
                    // });
                    // chart.render();

                    // function toggleDataSeries(e){
                    //     console.log(dataSeries)
                    //     if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    //         e.dataSeries.visible = false;
                    //     }
                    //     else{
                    //         e.dataSeries.visible = true;
                    //     }
                    //     chart.render();
                    // }
                }
            });
        });
    </script>

{{--    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>--}}

{{--    <script>--}}
{{--        window.onload = function () {--}}
{{--            var chart_array1 = @json($chart_array1);--}}
{{--            var chart_array2 = @json($chart_array2);--}}
{{--            var representative_name = @json($representative_name);--}}

{{--            var chart = new CanvasJS.Chart("chartContainer", {--}}
{{--                animationEnabled: true,--}}
{{--                theme: "light2",--}}
{{--                title:{--}}
{{--                    text: "Chart Of " + representative_name,--}}
{{--                    _fontSize: "1%"--}}
{{--                },--}}
{{--                axisY:{--}}
{{--                    includeZero: false,--}}
{{--                    labelAngle: 20,--}}
{{--                },--}}
{{--                axisX:{--}}
{{--                    labelAngle: 60,--}}
{{--                },--}}
{{--                legend:{--}}
{{--                    cursor: "pointer",--}}
{{--                    verticalAlign: "center",--}}
{{--                    horizontalAlign: "right",--}}
{{--                    itemclick: toggleDataSeries--}}
{{--                },--}}
{{--                data: [{--}}
{{--                    type: "column",--}}
{{--                    name: "Added",--}}
{{--                    //indexLabel: "{y}",--}}
{{--                    //yValueFormatString: "$#0.##",--}}
{{--                    showInLegend: true,--}}
{{--                    dataPoints: chart_array1--}}
{{--                },{--}}
{{--                    type: "column",--}}
{{--                    name: "Visited",--}}
{{--                    //indexLabel: "{y}",--}}
{{--                    //yValueFormatString: "$#0.##",--}}
{{--                    showInLegend: true,--}}
{{--                    dataPoints: chart_array2--}}
{{--                }]--}}
{{--            });--}}
{{--            chart.render();--}}

{{--            function toggleDataSeries(e){--}}
{{--                console.log(dataSeries)--}}
{{--                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {--}}
{{--                    e.dataSeries.visible = false;--}}
{{--                }--}}
{{--                else{--}}
{{--                    e.dataSeries.visible = true;--}}
{{--                }--}}
{{--                chart.render();--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

    <script>
        $('body').on('click' , '.submitBtn' , function (e){
            e.preventDefault()
            var url = $(this).attr('route');
                $('#salesFrom').attr('action',url)

            $('#salesFrom').submit();
        });

        $('body').on('click' , '#exportExcel' , function (e){
            e.preventDefault();
            $.ajax({
                {{--url: '{{ route("export_visits_count_report") }}',--}}
                dataType: 'json',
                type: 'get',
                url: '{{ URL::to('export/visits/count/report') }}',
                data: {
                    "representative_id": $("#representative_id").val(),
                    "from": $("#from").val(),
                    "to": $("#to").val(),

                },
                success: function (data) {
                    console.log("downloaded", data);

                }
            });
        });
    </script>

@endsection
