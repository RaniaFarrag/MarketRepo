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
                        {{ trans('dashboard.Add New Agreement For ') }} {{ $company->name }}
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
                            <a href="{{ route('companies.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('CompanyAgreement.index' , [$company_id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Linrco Agreements') }}
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
                            <form method="post" action="{{ route('CompanyAgreement.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <input value="{{ $company_id }}" name="company_id" type="hidden" />
                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden" />

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ old('date') }}" name="date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Phone') }} :</label>
                                            <input value="{{ $company->phone }}" name="phone" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Phone') }}" required/>
                                        </div>

                                        {{--<div class="col-lg-4">--}}
                                            {{--<label>{{ trans('dashboard.company_name') }} :</label>--}}
                                            {{--<input value="{{ $company->name }}" name="company_name" type="text" class="form-control"--}}
                                                   {{--placeholder="{{ trans('dashboard.company_name') }}" required/>--}}
                                        {{--</div>--}}
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.cr') }} :</label>
                                            <input value="{{ $company->cr }}" name="cr" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.cr') }}" />
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.company_address_en') }} :</label>
                                            <input value="{{ $company->district }} " name="company_address" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.company_address_en') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.company_address_ar') }}:</label>
                                            <input value="{{ old('linrco_email') }}" name="linrco_email" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.company_address_ar') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.mail_box') }} :</label>
                                            <input value="{{ old('mail_box') }}" name="mail_box" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.mail_box') }}" required/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-3 mb-2">
                                            <label>{{ trans('dashboard.postal_code') }}:</label>
                                            <input value="{{ old('postal_code') }}" name="postal_code" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.postal_code') }}" required/>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <label>{{ trans('dashboard.Email') }} :</label>
                                            <input value="{{ $company->email }}" name="email" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Email') }}" required/>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <label>{{ trans('dashboard.Company Representative en') }}:</label>
                                            <input value="{{ $company->contract_manager_name }}" name="company_representative" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Company Representative en') }}" required/>
                                        </div>
                                        <div class="col-lg-3 mb-2">
                                            <label>{{ trans('dashboard.Company Representative Ar') }}:</label>
                                            <input value="{{ $company->contract_manager_name }}" name="company_representative" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Company Representative Ar') }}" required/>
                                        </div>

                                        {{--<div class="col-lg-3 mb-2">--}}
                                            {{--<label>{{ trans('dashboard.position') }}:</label>--}}
                                            {{--<input value="{{ old('position') }}" name="position" type="text"--}}
                                                   {{--class="form-control" placeholder="{{ trans('dashboard.position') }}" required/>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-3 mb-2">--}}
                                            {{--<label>{{ trans('dashboard.duration_of_commitment') }}:</label>--}}
                                            {{--<input value="{{ old('duration_of_commitment') }}" name="duration_of_commitment" type="number"--}}
                                                   {{--class="form-control" placeholder="{{ trans('dashboard.duration_of_commitment') }}" required/>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-3 mb-2">--}}
                                            {{--<label>{{ trans('dashboard.Recruitment fee') }}:</label>--}}
                                            {{--<input value="{{ old('payment_of_fees') }}" name="payment_of_fees" type="text"--}}
                                                   {{--class="form-control" placeholder="{{ trans('dashboard.Recruitment fee') }}" required/>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-3 mb-2">--}}
                                            {{--<label>{{ trans('dashboard.service_implementation_fee') }}:</label>--}}
                                            {{--<input value="{{ old('service_implementation_fee') }}" name="service_implementation_fee" type="text"--}}
                                                   {{--class="form-control" placeholder="{{ trans('dashboard.service_implementation_fee') }}" required/>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-lg-3 mb-2">--}}
                                            {{--<label>{{ trans('dashboard.the_notice_period') }}:</label>--}}
                                            {{--<input value="{{ old('the_notice_period') }}" name="the_notice_period" type="text"--}}
                                                   {{--class="form-control" placeholder="{{ trans('dashboard.the_notice_period') }}" required/>--}}
                                        {{--</div>--}}
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.healthcare_fee_ar') }} :</label>
                                            <input value="{{ old('healthcare_fee_ar') }}" name="healthcare_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.healthcare_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.healthcare_visa_fee_ar') }} :</label>
                                            <input value="{{ old('healthcare_visa_fee_ar') }}" name="healthcare_visa_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.healthcare_visa_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.healthcare_fee_en') }} :</label>
                                            <input value="{{ old('healthcare_fee_en') }}" name="healthcare_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.healthcare_fee_en') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.healthcare_visa_fee_en') }} :</label>
                                            <input value="{{ old('healthcare_visa_fee_en') }}" name="healthcare_visa_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.healthcare_visa_fee_en') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.whitecollar_fee_ar') }} :</label>
                                            <input value="{{ old('whitecollar_fee_ar') }}" name="whitecollar_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.whitecollar_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.whitecollar_visa_fee_ar') }} :</label>
                                            <input value="{{ old('whitecollar_visa_fee_ar') }}" name="whitecollar_visa_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.whitecollar_visa_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.whitecollar_fee_en') }} :</label>
                                            <input value="{{ old('whitecollar_fee_en') }}" name="whitecollar_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.whitecollar_fee_en') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.whitecollar_visa_fee_en') }} :</label>
                                            <input value="{{ old('whitecollar_visa_fee_en') }}" name="whitecollar_visa_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.whitecollar_visa_fee_en') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.bluecollar_fee_ar') }} :</label>
                                            <input value="{{ old('bluecollar_fee_ar') }}" name="bluecollar_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.bluecollar_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.bluecollar_visa_fee_ar') }} :</label>
                                            <input value="{{ old('bluecollar_visa_fee_ar') }}" name="bluecollar_visa_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.bluecollar_visa_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.bluecollar_fee_en') }} :</label>
                                            <input value="{{ old('bluecollar_fee_en') }}" name="bluecollar_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.bluecollar_fee_en') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.bluecollar_visa_fee_en') }} :</label>
                                            <input value="{{ old('bluecollar_visa_fee_en') }}" name="bluecollar_visa_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.bluecollar_visa_fee_en') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.labor_fee_ar') }} :</label>
                                            <input value="{{ old('labor_fee_ar') }}" name="labor_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.labor_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.labor_visa_fee_ar') }} :</label>
                                            <input value="{{ old('labor_visa_fee_ar') }}" name="labor_visa_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.labor_visa_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.labor_fee_en') }} :</label>
                                            <input value="{{ old('labor_fee_en') }}" name="labor_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.labor_fee_en') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.labor_visa_fee_en') }} :</label>
                                            <input value="{{ old('labor_visa_fee_en') }}" name="labor_visa_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.labor_visa_fee_en') }}" />
                                        </div>
                                    </div>
                                    <div class="form-group row">

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.referred_candidates_fee_ar') }} :</label>
                                            <input value="{{ old('referred_candidates_fee_ar') }}" name="referred_candidates_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.referred_candidates_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.referred_candidates_visa_fee_ar') }} :</label>
                                            <input value="{{ old('referred_candidates_visa_fee_ar') }}" name="referred_candidates_visa_fee_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.referred_candidates_visa_fee_ar') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.referred_candidates_fee_en') }} :</label>
                                            <input value="{{ old('referred_candidates_fee_en') }}" name="referred_candidates_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.referred_candidates_fee_en') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.referred_candidates_visa_fee_en') }} :</label>
                                            <input value="{{ old('referred_candidates_visa_fee_en') }}" name="referred_candidates_visa_fee_en" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.referred_candidates_visa_fee_en') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.DataFlow') }} :</label>
                                            <input value="1" name="data_flow" type="checkbox"/>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                                    <a href="{{ route('CompanyAgreement.index' , [$company_id , $mother_company_id]) }}"
                                               class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
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



@section('script')

@endsection