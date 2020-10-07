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
                    <a href="#"
                       class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Total Reports') }} (200)
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
                                <form id="salesFrom" action="{{route('extract_sales_lead_report_excel')}}">
                                    <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="card-title" data-toggle="collapse"
                                                     data-target="#collapseOne1">
                                                    {{ trans('dashboard.Companies Filters') }}
                                                </div>
                                            </div>
                                            <input type="hidden" name="checkAll" class="checkAllInput" value="">
                                            <input type="hidden" name="type" class="type"
                                                   value=""> {{-- type = 1 for export , type = 2 for sendmail--}}
                                            <input type="hidden" name="ids" class="ids" value="">
                                            <div id="collapseOne1" class="collapse show"
                                                 data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <div class="row fliter_serch">
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label> {{ trans('dashboard.Company Name') }}  </label>
                                                                <input type="text" class="form-control" id="name"
                                                                       name="name"
                                                                       placeholder="Company Name">
                                                            </div>

                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{__('dashboard.Quanity')}}</label>
                                                                <input type="number" class="form-control" id="quanity"
                                                                       name="quanity"
                                                                       value=""
                                                                       placeholder="{{__('dashboard.Quanity')}}">
                                                            </div>

                                                        </div>


                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{__('dashboard.Type of Service required')}}</label>
                                                                <input type="text"
                                                                       class="form-control def-input def-select"
                                                                       id="type_of_serves"
                                                                       name="type_of_serves"
                                                                       value=""
                                                                       placeholder="{{__('dashboard.Type of Service required')}}">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{__('dashboard.Brochure status')}} :</label>
                                                                <select name="brochurs_status" class="form-control"
                                                                        id="brochurs_status">
                                                                    <option value="">select</option>
                                                                    <option value="Yes">Yes</option>
                                                                    <option value="No">No</option>
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
                                                                <label
                                                                    for="name">{{__('dashboard.Category of Requirement')}}</label>
                                                                <input type="text" class="form-control" id="cat_of_req"
                                                                       name="cat_of_req"
                                                                       value=""
                                                                       placeholder="{{__('dashboard.Category of Requirement')}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{__('dashboard.Lead status')}}</label>
                                                                <select class="form-control select2"
                                                                        name="statue"
                                                                        id="statue" multiple="multiple">
                                                                    {{--<option value="Hot">{{ trans('dashboard.Hot') }}</option>--}}
                                                                    {{--<option value="Warm">Warm</option>--}}
                                                                    {{--<option value="Cold">Cold</option>--}}
                                                                    {{--<option value="CLOSED-WON">CLOSED-WON</option>--}}
                                                                    <option value="1">{{ trans('dashboard.Hot') }}</option>
                                                                    <option value="2">{{ trans('dashboard.Warm') }}</option>
                                                                    <option value="3">{{ trans('dashboard.Cold') }}</option>
                                                                    <option value="4">{{ trans('dashboard.Awarded') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.Date') }}</label>
                                                                <input type="date" class="form-control" id="created_at"
                                                                       name="created_at"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{ trans('dashboard.Next FollowUp') }}</label>
                                                                <input type="date" class="form-control"
                                                                       id="nextFollowUp" name="nextFollowUp"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label>&nbsp;</label>
                                                                <button type="button" id="searchBtn"
                                                                        class="btn btn-block btn-success">{{ trans('dashboard.Search') }}
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
                                        <!--begin::Button-->
                                        <button type="submit" id="exportExcel" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                                            Export Excel
                                        </button>
                                        <!--end::Button-->
                                        <!--begin::Button-->
                                        {{--<button type="button" id="sendMail" class="btn btn-warning font-weight-bold py-3 px-6" data-toggle="modal">--}}
                                            {{--Send Mail--}}
                                        {{--</button>--}}
                                        <!--end::Button-->
                                    </div>
                                </form>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
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
        <!-- Modal-->
        <div class="modal fade" id="btnMail-2863" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            {{ trans('dashboard.Send mail To Selected Company') }}
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>{{ trans('dashboard.email') }}:</label>
                        <input type="email" class="form-control" name="email">

                        <label>{{ trans('dashboard.message') }}:</label>
                        <textarea name="message" class="form-control" rows="5"> </textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                            {{ trans('dashboard.send') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

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
            console.log(checkCvOriginal)
            $('.ids').val(JSON.stringify(checkCvOriginal));
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
                $('.checkAllInput').val(0);
            } else {
                $('.items:checkbox').prop('checked', true);
                $('.checkAllInput').val(1);

            }
            $('.ids').val(JSON.stringify(checkCvOriginal));
            console.log(JSON.stringify(checkCvOriginal))
        });

    </script>
    <script>
        $('body').on('click', '.pagination a , #searchBtn', function (e) {
            e.preventDefault();
            var checked_val = 0;
            $('#checkAll').is(':checked') ? checked_val = 1 : checked_val = 0;
            $.ajax({
                dataType: 'html',
                url: '{{route("companySalesTeamReports.index")}}',
                data: {
                    "checkAll": checked_val,
                    "ids": checkCvOriginal,
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "name": $("#name").val(),
                    "quanity": $("#quanity").val(),
                    "city_id": $("#cities").val(),
                    "country_id": $("#countries").val(),
                    "type_of_serves": $("#type_of_serves").val(),
                    "brochurs_status": $("#brochurs_status").val(),
                    "cat_of_req": $("#cat_of_req").val(),
                    "statue": $("#statue").val(),
                    "created_at": $("#created_at").val(),
                    "nextFollowUp": $("#nextFollowUp").val(),
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

    <script>
        $('body').on('click', '#exportExcel', function () {
            $('.type').val(1)
        });
        $('body').on('click', '#sendMail', function () {
            $('.type').val(2)
        });
    </script>
@endsection
