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