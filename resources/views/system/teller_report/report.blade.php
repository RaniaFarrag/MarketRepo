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
                            {{ trans('dashboard.Teller REPORT') }}
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
                                {{ trans('dashboard.Teller REPORT') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Coordinator'))
                        @can('Add Teller Report')
                            <a href="{{ route('add_teller_report') }}"
                               class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                                {{ trans('dashboard.Add Teller Report') }}
                            </a>
                        @endcan
                    @endif

                    <a href="#"
                       class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Total Reports') }} <span id="counter" > {{ $count }}</span>
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
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.Teller REPORT') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="salesFrom" action="{{ route('export_excel_teller_report') }}">
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
                                                                <label>{{ trans('dashboard.companies') }}</label>
                                                                <select class="form-control select2" id="company_id" name="company_id">
                                                                    {{--multiple="multiple"--}}
                                                                    <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                    @foreach($companies as $company)
                                                                        <option value="{{ $company->id }}" >
                                                                            {{ $company->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.date_meeting_from') }}</label>
                                                                <input type="date" class="form-control" id="date_meeting_from"
                                                                       name="date_meeting_from"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.date_meeting_to') }}</label>
                                                                <input type="date" class="form-control" id="date_meeting_to"
                                                                       name="date_meeting_to"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{ trans('dashboard.date_call_from') }}</label>
                                                                <input type="date" class="form-control"
                                                                       id="date_call_from" name="date_call_from"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label
                                                                    for="name">{{ trans('dashboard.date_call_to') }}</label>
                                                                <input type="date" class="form-control"
                                                                       id="date_call_to" name="date_call_to"
                                                                       value="">
                                                            </div>
                                                        </div>

                                                        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('ADMIN') ||
                                                            \Illuminate\Support\Facades\Auth::user()->hasRole('Sales Manager'))
                                                            <div class="col-md-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <label for="name">{{ trans('dashboard.Tellers') }}</label>
                                                                    <select class="form-control select2" id="user_id" name="user_id">
                                                                        <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                        @foreach($tellers as $teller)
                                                                            <option value="{{ $teller->id }}" >
                                                                                {{ app()->getLocale()=='ar' ? $teller->name : $teller->name_en}}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endif

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
                                        <button type="submit" id="exportExcel" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                                            {{ trans('dashboard.Export Excel') }}
                                        </button>
                                    </div>
                                </form>
                                <div class="separator separator-dashed mt-8 mb-5"></div>

                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                  @include('system.teller_report.report_partial')
                                {{--{!! $reports->links() !!}--}}

                                {{--{{ $reports->links() }}--}}
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
        $('body').on('click', '.pagination a , #searchBtn', function (e) {
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: '{{ route("get_teller_report") }}',
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
                    "company_id": $("#company_id").val(),
                    "date_meeting_from": $("#date_meeting_from").val(),
                    "date_meeting_to": $("#date_meeting_to").val(),
                    "date_call_from": $("#date_call_from").val(),
                    "date_call_to": $("#date_call_to").val(),
                    "user_id": $("#user_id").val(),

                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                }
            });
        });
    </script>


@endsection
