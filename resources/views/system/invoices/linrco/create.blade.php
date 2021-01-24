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
                        {{ trans('dashboard.Add Invoice For ') }} {{ $linrco_agreement->company->name }}
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
                            <a href="{{ route('CompanyAgreement.index' , [$linrco_agreement->company->id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
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
                            <form method="post" action="{{ route('companyInvoice.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <input value="{{ $linrco_agreement->id }}" name="linrco_agreement_id" type="hidden" />
                                <input value="{{ $linrco_agreement->company->id }}" name="company_id" type="hidden" />
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
                                            <label>{{ trans('dashboard.client_code') }} :</label>
                                            <input value="{{ $linrco_agreement->company->client_code  }}" name="client_code" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.client_code') }}" required readonly/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.agreement_no') }} :</label>
                                            <input value="{{ $linrco_agreement->agreement_no  }}" name="agreement_no" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.agreement_no') }}" required readonly/>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.internal_contact') }} :</label>
                                            <input value="{{ old('internal_contact') }}" name="internal_contact" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.internal_contact') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.telephone') }} :</label>
                                            <input value="{{ old('telephone') }} " name="telephone" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.telephone') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.email') }}:</label>
                                            <input value="{{ old('email') }}" name="email" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.email') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.customer_vat_no') }}:</label>
                                            <input value="{{ $linrco_agreement->company->customer_vat_no }}" name="customer_vat_no" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.customer_vat_no') }}" required readonly/>
                                        </div>

                                    </div>


                                    <div id="kt_repeater_1">
                                        <div id="kt_repeater_1" class="form-group row">
                                            <div data-repeater-list="" class="col-lg-12">
                                                <div data-repeater-item class="form-group row align-items-center">

                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.particulars') }}:</label>
                                                        <input arr-name="item" value="{{ old('particulars') }}"  name="particulars" type="text" class="form-control" placeholder="particulars"/>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.recruitment_fee') }}:</label>
                                                        <input arr-name="item" value="{{ old('recruitment_fee') }}" name="recruitment_fee" type="text" class="form-control adminFees" placeholder="recruitment_fee"/>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.visa_processing_fee') }}:</label>
                                                        <input arr-name="item" value="{{ old('visa_processing_fee') }}" name="visa_processing_fee" type="text" class="form-control PerEmployee" placeholder="visa_processing_fee "/>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.tax %') }}:</label>
                                                        <input arr-name="item" value="5" name="tax" type="text" class="form-control totalValue" placeholder="tax %"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center" >

                                            <div class="col-lg-3 float-right" style="float: none !important;margin: 0 auto;">
                                                <a href="javascript:;" data-repeater-create="" class="btn btn-block font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i> {{ trans('dashboard.Add a new Category') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                                    <a href="{{ route('companyInvoice.index' , [$linrco_agreement->id , $mother_company_id]) }}"
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
    <script>
        // Class definition
        var KTFormRepeater = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });


    </script>
@endsection