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
                            {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
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
                                {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="{{route('companySalesTeamReports.create',$company->id)}}"
                       class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.create Report') }}
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
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
                                        {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                @include('system.reports.sales_lead_report_partial')
                                <!--end: Datatable-->
                                </div>
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
        <!--end::Entry-->

    </div>
    <!--end::Content-->

@endsection



@section('script')
    <script>
        function contains(arr, element) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] === element) {
                    return true;
                }
            }
            return false;
        }
    </script>


    <script>
        var checkCvOriginal = [];
        $(document).on('change', '.checkReports', function () {
            if (contains(checkCvOriginal, $(this).val())) {
                var index = checkCvOriginal.indexOf($(this).val());
                checkCvOriginal.splice(index, 1);
            } else {
                checkCvOriginal.push($(this).val());

            }
            //console.log(checkCvOriginal)
             $('.ids').val(JSON.stringify(checkCvOriginal));
            //$('.ids').val((checkCvOriginal));
            console.log($('.ids').val());
        });
        $(document).on('click', '.submitBtn', function (e) {
            if (!$('#checkAll').is(':checked')) {
                if (checkCvOriginal.length == 0) {
                    e.preventDefault();
                    alert("Please Select Any Data .")
                }
            }
        });
    </script>

    <script>
        $(document).on('click', '#checkAll', function (e) {
            if ($('.items:checked').length == $('.items:checkbox').length) {
                $('.items:checkbox').prop('checked', false);
                $('.exportAll').val(0);
            } else {
                $('.items:checkbox').prop('checked', true);
                $('.exportAll').val(1);

            }
            $('.ids').val(JSON.stringify(checkCvOriginal));
            console.log(JSON.stringify(checkCvOriginal))
        });

    </script>

    <script>
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            //console.log(checkCvOriginal);
            var checked_val = 0;
            $('#checkAll').is(':checked') ? checked_val = 1 : checked_val = 0;
            $.ajax({
                dataType: 'html',
                url: '{{route("companySalesTeamReports.show",$company)}}',
                data: {
                    "checkAll": checked_val,
                    "ids": checkCvOriginal,
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "company_status": $("#company_status").val(),
                    "evaluation_ids": $("#evaluation_ids").val(),
                    "city_id": $("#cities").val(),
                    "country_id": $("#countries").val(),
                    "subSector_id": $("#subSector").val(),
                    "sector_id": $("#sector").val(),
                    "name": $("#name").val(),
                },
                success: function (data) {
                    $('.renderTable').html(data);
                }
            });
        });
    </script>
    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function () {

            $("#sector").on('change', function () {
                var sector_id = $(this).val();
                if (sector_id) {
                    $.ajax({
                        type: "get",
                        // url: "/get/sub/sectors/of/sector/" + sector_id,
                        {{--url: "{{ route('get_sub' ) }}" + '/' + sector_id,--}}
                            {{--url: "{{ route('get_sub' , ['sector_id'=>sector_id]) }}",--}}
                        url: "{{ url('/get/sub/sectors/of/sector/') }}" + '/' + sector_id,
                        dataType: "json",
                        success: function (response) {
                            var sub_sectors = response.sub_sectors;
                            if (sub_sectors.length) {
                                console.log(sub_sectors);
                                var html = '<option value="">{{ trans('dashboard.Select All') }}</option>'
                                for (let i = 0; i < sub_sectors.length; i++) {
                                    html += '<option value="' + sub_sectors[i].id + '">' + sub_sectors[i].name + '</option>';
                                }
                            } else {
                                var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                            }
                            $("#subSector").html(html);

                        }
                    });
                } else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#subSector").html(html);
                }

            })


            $("#countries").on('change', function () {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/get/cities/of/country/') }}" + '/' + country_id,
                        dataType: "json",
                        success: function (response) {
                            var cities = response.cities;
                            if (cities.length) {
                                console.log(cities);
                                var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>';
                                for (let i = 0; i < cities.length; i++) {
                                    html += '<option value="' + cities[i].id + '">' + cities[i].name + '</option>';
                                }
                            } else {
                                var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                            }
                            $("#cities").html(html);

                        }
                    });
                } else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#cities").html(html);
                }

            })

        });

    </script>
@endsection
