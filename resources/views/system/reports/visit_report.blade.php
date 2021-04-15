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
                            {{ trans('dashboard.VISITS REPORT') }}
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
                                {{ trans('dashboard.VISITS REPORT') }}
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
                        {{ trans('dashboard.Total visits') }} <span id="counter" > </span>
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
                                        {{ trans('dashboard.VISITS REPORT') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="salesFrom" action="{{ route('export_visit_report_excel') }}">
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
                                                                <select class="form-control select2" id="representative_id" name="representative_id">
                                                                    {{--multiple="multiple"--}}
                                                                    <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                    @foreach($representatives as $representative)
                                                                        <option value="{{ $representative->id }}" >
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
                                                                       name="from"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{ trans('dashboard.To') }}</label>
                                                                <input type="date" class="form-control"
                                                                       id="to" name="to"
                                                                       value="">
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
                                        <!--begin::Button-->
                                        <button type="submit" id="exportExcel" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                                            Export Excel
                                        </button>
                                    </div>
                                </form>
                                <div class="separator separator-dashed mt-8 mb-5"></div>

                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                @include('system.reports.visit_report_partial')
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
            $.ajax({
                dataType: 'html',
                url: '{{route("visit_report")}}',
                beforeSend: function () {
                    $('#searchFilter').addClass('spinner');
                    $('#searchFilter').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchFilter').removeClass('spinner');
                    $('#searchFilter').removeAttr('disabled');

                },
                data: {
                    "representative_id": $("#representative_id").val(),
                    "from": $("#from").val(),
                    "to": $("#to").val(),

                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                }
            });
        });
    </script>



@endsection
