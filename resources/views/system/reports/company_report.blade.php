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
                            {{ trans('dashboard.Company Report') }}
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
                                {{ trans('dashboard.Company Report') }}
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
                    <button type="button" onclick='document.getElementById("exportExcelForm").submit();' class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Export Excel ') }}
                    </button>

                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6">
                        {{ trans('dashboard.Companies') }} <span id="counter">{{ $data['count'] }}</span>
                    </a>
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
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.Company Report') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Companies Filters') }}
                                            </div>
                                        </div>
                                        <form autocomplete="off" id="exportExcelForm" action="{{route('extract_company_report_excel')}}">

                                            <div id="collapseOne1" class="collapse show"
                                                 data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <div class="row fliter_serch">
                                                        @can('Show Mother Company')
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label> {{ trans('dashboard.Mother Company') }}  </label>
                                                                    <select id="mother_company_id" name="mother_company_id" class="form-control select2" >
                                                                        @foreach($mother_companies as $key=>$mother_company)
                                                                            <option {{ $key == 0 ? 'selected' : ''}} value="{{ $mother_company->id }}">
                                                                                {{ app()->getLocale() == 'ar' ? $mother_company->name : $mother_company->name_en }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endcan


                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label> {{ trans('dashboard.Company Name') }}  </label>
                                                                <input type="text" class="form-control" id="name" name="name" autocomplete="off"
                                                                       placeholder="{{ trans('dashboard.Company Name') }} ">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Sectors') }}</label>
                                                                <select class="form-control select2" id="sector"
                                                                        name="sector_id">
                                                                    <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($sectors as $sector)
                                                                        <option
                                                                            value="{{$sector->id}}">{{$sector->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Type') }}</label>
                                                                <select class="form-control select2" id="subSector"
                                                                        name="subSector_id">
                                                                    <option value=""
                                                                            selected="">{{ trans('dashboard.Select All') }}</option>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Country') }}</label>
                                                                <select class="form-control select2" id="countries"
                                                                        name="country_id">
                                                                    <option value=""
                                                                            selected="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($countries as $country)
                                                                        <option
                                                                            value="{{$country->id}}">{{$country->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.City') }}</label>
                                                                <select class="form-control select2" id="cities"
                                                                        name="city_id">
                                                                    <option value=""
                                                                            selected="">{{ trans('dashboard.Select All') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Representative name') }}  </label>
                                                                <select id="representative_id" class="form-control select2" name="representative_id">
                                                                    <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($representatives as $representative)
                                                                        <option value="{{ $representative->id }}">
                                                                            {{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}
                                                                        </option>
                                                                    @endforeach

                                                                    {{--@if(auth()->user()->hasRole('Sales Manager'))--}}
                                                                        {{--<option value="{{ auth()->user()->id }}">{{ app()->getLocale() == 'ar' ? auth()->user()->name : auth()->user()->name_en }}</option>--}}
                                                                    {{--@endif--}}

                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Evaluation status') }}</label>
                                                                <select class="form-control select2" name="evaluation_ids[]"
                                                                        id="evaluation_ids" multiple="multiple">
                                                                    <option value="1">A</option>
                                                                    <option value="2">B</option>
                                                                    <option value="3">C</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Status') }}</label>
                                                                <select class="form-control select2" id="company_status" autocomplete="off"
                                                                        name="company_status[]" multiple="multiple">
                                                                    <option value="confirm_connected">{{ trans('dashboard.Confirm Connection') }}</option>
                                                                    <option value="confirm_interview">{{ trans('dashboard.Confirm Interview') }}</option>
                                                                    <option value="confirm_need">{{ trans('dashboard.Confirm Need') }}</option>
                                                                    <option value="confirm_contract">{{ trans('dashboard.Confirm Contract') }}</option>
                                                                    <option value="no_meeting">{{ trans('dashboard.No Meeting') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                {{--        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Representative name') }}  </label>
                                                                <select id="representative_id" class="form-control select2" name="representative_id">
                                                                    <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($representatives as $representative)
                                                                        <option value="{{ $representative->id }}">
                                                                            {{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}
                                                                        </option>
                                                                    @endforeach
                                                                    <option value="{{ auth()->user()->id }}">{{ app()->getLocale() == 'ar' ? auth()->user()->name : auth()->user()->name_en }}</option>

                                                                </select>
                                                            </div>
                                                        </div>--}}

                                                        <div class="col-md-4 col-xs-12">
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
                                        </form>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                        {{--@include('system.reports.company_report_partial')--}}
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

    <script>
        function filter(btn) {
            $.ajax({
                dataType: 'html',
                url: "{{ route('company_report') }}",
                beforeSend: function () {
                    $('#searchBtn').addClass('spinner');
                    $('#searchBtn').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchBtn').removeClass('spinner');
                    $('#searchBtn').removeAttr('disabled');

                },
                "data": {
                    // "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "page": btn.is("a") ? btn.attr('href').split('page=')[1] : "",
                    "company_status": $("#company_status").val(),
                    "evaluation_ids": $("#evaluation_ids").val(),
                    "city_id": $("#cities").val(),
                    "representative_id": $("#representative_id").val(),
                    "country_id": $("#countries").val(),
                    "subSector": $("#subSector").val(),
                    "sector_id": $("#sector").val(),
                    "name": $("#name").val(),
                    "mother_company_id": $("#mother_company_id").val(),
                },
                success: function (data) {
                    // $('.renderTable').html(data);
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                    KTApp.initComponents();
                }
            });
        }
    </script>

    <script>
        $('body').on('click', '.pagination a, #searchBtn', function (e) {
            e.preventDefault();
            filter($(this))
        });

        $(document).ready(function() {
            filter($(this));
        })

    </script>


@endsection
