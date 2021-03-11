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
                            {{ trans('dashboard.Edit Company Agreement') }}
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
                            <a href="{{ route('openFnrcoAgreement' , [$fnrco_agreement->id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Fnrco Agreements') }}
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
                            <form method="post" action="{{ route('CompanyAgreement.update' , [$fnrco_agreement->id]) }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{--<input value="{{ $company_id }}" name="company_id" type="hidden" />--}}
                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden" />

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.mol') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->mol }}" name="mol" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.mol') }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.location') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->location }}" name="location" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.location') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.agreement_num') }} :</label>
                                            <input value="{{ $fnrco_agreement->agreement_num }}" name="agreement_num" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.agreement_num') }}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.cr_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->cr_date }}" name="cr_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.cr_date') }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.hr_system') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->hr_system }}" name="hr_system" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.hr_system') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.signing_by') }} :</label>
                                            <input value="{{ $fnrco_agreement->signing_by }}" name="signing_by" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.signing_by') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.by_as') }} :</label>
                                            <input value="{{ $fnrco_agreement->by_as }}" name="by_as" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.by_as') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.address_en') }} :</label>
                                            <input value="{{ $fnrco_agreement->address_en }} " name="address_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.address_en') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.address_ar') }}:</label>
                                            <input value="{{ $fnrco_agreement->address_ar }}" name="address_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.address_ar') }}" required/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.agreement_issue_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->agreement_issue_date }}" name="agreement_issue_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.agreement_issue_date') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.agreement_expiry_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $fnrco_agreement->agreement_expiry_date }}" name="agreement_expiry_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.agreement_expiry_date') }}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Phone') }} :</label>
                                            <input value="{{ $fnrco_agreement->company->phone }}" name="phone" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Phone') }}" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.fax') }} :</label>
                                            <input value="{{ $fnrco_agreement->fax }}" name="fax" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.fax') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.mailing_address') }} :</label>
                                            <input value="{{ $fnrco_agreement->mailing_address }}" name="mailing_address" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.mailing_address') }}" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.postal_code') }} :</label>
                                            <input value="{{ $fnrco_agreement->postal_code }}" name="postal_code" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.postal_code') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work hours') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_hours }}" name="work_hours" type="text"
                                                   class="form-control" placeholder="8" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work_hours_ar') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_hours_ar }}" name="work_hours_ar" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.eight') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work_days') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_days }}" name="work_days" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.six') }}" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work_days_en') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_days_en }}" name="work_days_en" type="text" class="form-control"
                                                   placeholder="6" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work_hours_weekly') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_hours_weekly }}" name="work_hours_weekly" type="text"
                                                   class="form-control" placeholder="48" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.work_hours_weekly_ar') }} :</label>
                                            <input value="{{ $fnrco_agreement->work_hours_weekly_ar }}" name="work_hours_weekly_ar" type="text" class="form-control"
                                                   placeholder="ثمانية واربعون" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.first_party') }} :</label>
                                            <input value="{{ $fnrco_agreement->first_party }}" name="first_party" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.first_party') }}" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.first_party_en') }} :</label>
                                            <input value="{{ $fnrco_agreement->first_party_en }}" name="first_party_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.first_party_en') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.second_party') }} :</label>
                                            <input value="{{ $fnrco_agreement->second_party }}" name="second_party" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_party') }}" required/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.second_party_en') }} :</label>
                                            <input value="{{ $fnrco_agreement->second_party_en }}" name="second_party_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_party_en') }}" />
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('openFnrcoAgreement' , [$fnrco_agreement->id]) }}"
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