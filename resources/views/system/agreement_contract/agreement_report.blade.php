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
                            {{ trans('dashboard.Agreement Report') }}
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
                                {{ trans('dashboard.Agreement Report') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <button type="button" onclick='document.getElementById("exportExcelForm").submit();' class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Export Excel') }}
                    </button>

                    @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                        @can('Add Agreement Report')
                            <a href="{{ route('create_agreement_report') }}"
                               class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                                {{ trans('dashboard.Add Agreement Report') }}
                            </a>
                        @endcan
                    @endif

                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6">
                        {{ trans('dashboard.Reports') }} <span id="counter">{{ $count }}</span>
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
                                        {{ trans('dashboard.Agreement Report') }}
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
                                        <form autocomplete="off" id="exportExcelForm" action="{{route('export_excel_agreement_report')}}">
                                            <div id="collapseOne1" class="collapse show"
                                                 data-parent="#accordionExample1">
                                                <div class="card-body">
                                                    <div class="row fliter_serch">
                                                        @can('Show Mother Company')
                                                            <div class="col-md-12 col-xs-12">
                                                                <div class="form-group">
                                                                    <label> {{ trans('dashboard.Mother Company') }}  </label>
                                                                    <select id="mother_company_id" name="mother_company_id" class="form-control select2" >
                                                                        <option selected value="">{{ trans('dashboard.select one') }}</option>
                                                                        @foreach($mother_companies as $key=>$mother_company)
                                                                            <option value="{{ $mother_company->id }}">
                                                                                {{ app()->getLocale() == 'ar' ? $mother_company->name : $mother_company->name_en }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endcan

                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Company Name') }}  </label>
                                                                <select id="company_id" class="form-control select2" name="company_id">
                                                                    <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                    @foreach($companies as $company)
                                                                        <option value="{{ $company->id }}">
                                                                            {{ $company->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>{{ trans('dashboard.Representative name') }}</label>
                                                                <select id="user_id" class="form-control select2" name="user_id">
                                                                    <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($representatives as $representative)
                                                                        <option value="{{ $representative->id }}">
                                                                            {{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.From') }}</label>
                                                                <input type="date" class="form-control" id="from"
                                                                       name="from"
                                                                       value="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.To') }}</label>
                                                                <input type="date" class="form-control"
                                                                       id="to" name="to" value="">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="name">{{ trans('dashboard.contract_status') }}</label>
                                                                <select id="contract_status" name="contract_status" class="form-control select2" required>
                                                                    <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                                    <option value="Approved">{{ trans('dashboard.Approved') }}</option>
                                                                    <option value="Rejected">{{ trans('dashboard.Rejected') }}</option>
                                                                    <option value="Deferred">{{ trans('dashboard.Deferred') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>

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
                                    @include('system.agreement_contract.agreement_report_partial')
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
        $('body').on('click', '.pagination a , #searchBtn', function (e) {
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: '{{ route("get_agreement_report") }}',
                beforeSend: function () {
                    $('#searchFilter').addClass('spinner');
                    $('#searchFilter').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchFilter').removeClass('spinner');
                    $('#searchFilter').removeAttr('disabled');

                },
                data: {
                    "mother_company_id": $("#mother_company_id").val(),
                    "user_id": $("#user_id").val(),
                    "company_id": $("#company_id").val(),
                    "from": $("#from").val(),
                    "to": $("#to").val(),
                    "contract_status": $("#contract_status").val(),
                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                }
            });
        });
    </script>

@endsection
