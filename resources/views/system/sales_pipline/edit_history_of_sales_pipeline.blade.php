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
                            {{ trans('dashboard.Edit History') }}
                        </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>

                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Edit History') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <form method="post" action="{{ route('update_history_sales_pipeline' , $history->id) }}" class="form">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        {{ trans('dashboard.Edit History') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $history->date }}" name="date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.total_volume') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $history->total_volume }}" name="total_volume" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.total_volume') }}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Forecast') }} :</label>
                                            <select name="forecast" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                <option {{ $history->forecast == 'Hot' ? 'selected' : '' }} value="Hot">{{ trans('dashboard.Hot') }}</option>
                                                <option {{ $history->forecast == 'Warm' ? 'selected' : '' }} value="Warm">{{ trans('dashboard.Warm') }}</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.project closing Month') }} :</label>
                                            <select name="project_closing_month" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                <option {{ $history->project_closing_month == 'January' ? 'selected' : '' }} value="January">{{ trans('dashboard.January') }}</option>
                                                <option {{ $history->project_closing_month == 'February' ? 'selected' : '' }} value="February">{{ trans('dashboard.February') }}</option>
                                                <option {{ $history->project_closing_month == 'March' ? 'selected' : '' }} value="March">{{ trans('dashboard.March') }}</option>
                                                <option {{ $history->project_closing_month == 'April' ? 'selected' : '' }} value="April">{{ trans('dashboard.April') }}</option>
                                                <option {{ $history->project_closing_month == 'May' ? 'selected' : '' }} value="May">{{ trans('dashboard.May') }}</option>
                                                <option {{ $history->project_closing_month == 'June' ? 'selected' : '' }} value="June">{{ trans('dashboard.June') }}</option>
                                                <option {{ $history->project_closing_month == 'July' ? 'selected' : '' }} value="July">{{ trans('dashboard.July') }}</option>
                                                <option {{ $history->project_closing_month == 'August' ? 'selected' : '' }} value="August">{{ trans('dashboard.August') }}</option>
                                                <option {{ $history->project_closing_month == 'September' ? 'selected' : '' }} value="September">{{ trans('dashboard.September') }}</option>
                                                <option {{ $history->project_closing_month == 'October' ? 'selected' : '' }} value="October">{{ trans('dashboard.October') }}</option>
                                                <option {{ $history->project_closing_month == 'November' ? 'selected' : '' }} value="November">{{ trans('dashboard.November') }}</option>
                                                <option {{ $history->project_closing_month == 'December' ? 'selected' : '' }} value="December">{{ trans('dashboard.December') }}</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.project closing Month') }} :</label>
                                            <select name="project_closing_year" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                <option {{ $history->project_closing_year == 2021 ? 'selected' : '' }} value="2021">{{ 2021 }}</option>
                                                <option {{ $history->project_closing_year == 2022 ? 'selected' : '' }} value="2022">{{ 2022 }}</option>
                                                <option {{ $history->project_closing_year == 2023 ? 'selected' : '' }} value="2023">{{ 2023 }}</option>
                                                <option {{ $history->project_closing_year == 2024 ? 'selected' : '' }} value="2024">{{ 2024 }}</option>
                                                <option {{ $history->project_closing_year == 2025 ? 'selected' : '' }} value="2025">{{ 2025 }}</option>
                                                <option {{ $history->project_closing_year == 2026 ? 'selected' : '' }} value="2026">{{ 2026 }}</option>
                                                <option {{ $history->project_closing_year == 2027 ? 'selected' : '' }} value="2027">{{ 2027 }}</option>
                                                <option {{ $history->project_closing_year == 2028 ? 'selected' : '' }} value="2028">{{ 2028 }}</option>
                                                <option {{ $history->project_closing_year == 2029 ? 'selected' : '' }} value="2029">{{ 2029 }}</option>
                                                <option {{ $history->project_closing_year == 2030 ? 'selected' : '' }} value="2030">{{ 2030 }}</option>
                                            </select>
                                        </div>


                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.comments') }} :</label>
                                            <textarea name="comments" class="form-control"
                                                      rows="5">{{ $history->comments }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                            <a href="{{ route('show_history_sales_pipeline' , $history->sales_pipeline_id) }}" class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>




@endsection
