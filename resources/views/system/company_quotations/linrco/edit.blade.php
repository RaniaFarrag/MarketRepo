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
                            {{ trans('dashboard.Linrco Quotations') }}
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
                            <a href="{{ route('companyQuotation.index' , [$company_id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Linrco Quotations') }}
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
                            <form method="post" action="{{ route('companyQuotation.update' , $linrco_quotation->id ) }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden" />
                                <!-- <input value="{{ $company_id }}" name="company_id" type="hidden" /> -->

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Ref: No') }} :</label>
                                            <input value="{{ $linrco_quotation->ref_no }}" name="ref_no" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Ref: No') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Attn') }} :</label>
                                            <input value="{{ $linrco_quotation->attn }}" name="attn" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Attn') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Tel') }} :</label>
                                            <input value="{{ $linrco_quotation->telephone }}" name="telephone" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Tel') }}" />
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile') }} :</label>
                                            <input value="{{ $linrco_quotation->mobile }} " name="mobile" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Mobile') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.E-mail') }} :</label>
                                            <input value="{{ $linrco_quotation->email }}" name="email" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.E-mail') }}" required/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Quotation No.') }} :</label>
                                            <input value="{{ $linrco_quotation->Quotation_No }}" name="Quotation_No" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Quotation No.') }}" required/>
                                            @error('Quotation_No')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="kt_repeater_1">
                                        <div id="kt_repeater_1" class="form-group row">
                                            <div data-repeater-list="item" class="col-lg-12">
                                                @if(count($linrco_quotation->linrcoQuotationsRequest))
                                                    @foreach($linrco_quotation->linrcoQuotationsRequest as $linrco_request)                                         
                                                        <div data-repeater-item class="form-group row align-items-center">
                                                            <input arr-name="item" type="hidden" name="request_id" value={{ $linrco_request->id }}>

                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.TRADE') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->trade }}" name="trade" type="text"
                                                                    class="form-control" placeholder="{{ trans('dashboard.TRADE') }}" required/>

                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.Gender') }} :</label>
                                                                <select arr-name="item" id="gender" class="form-control select" name="gender">
                                                                    <option value="" >{{ trans('dashboard.Select All') }}</option>
                                                                    <option {{ $linrco_request->gender == 1 ? 'selected' : '' }} value="1" >{{ trans('dashboard.Male') }}</option>
                                                                    <option {{ $linrco_request->gender == 2 ? 'selected' : '' }} value="2">{{ trans('dashboard.Female') }}</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.Qualification') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->educational_qualification }}" name="educational_qualification" type="text"
                                                                    class="form-control" placeholder="{{ trans('dashboard.Qualification') }}" required/>

                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.QTY') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->quantity }}" name="quantity" type="number"
                                                                    class="form-control" placeholder="{{ trans('dashboard.QTY') }}" required/>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.Nationality') }}:</label>
                                                                <select arr-name="item" class="form-control select" name="nationality">                                                                
                                                                    <option value="">{{ trans('dashboard.Select All') }}</option>
                                                                    @foreach($countries as $country)
                                                                        <option {{ $linrco_request->nationality == $country->id ? 'selected' : '' }} value="{{ $country->id }}" >{{ $country->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.SALARY (SAR)') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->salary }}" name="salary" type="text"
                                                                    class="form-control" placeholder="{{ trans('dashboard.SALARY (SAR)') }}" required/>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->RECRUITMENT_CHARGES_PER_CANDIDATE }}" name="RECRUITMENT_CHARGES_PER_CANDIDATE" type="text"
                                                                    class="form-control" placeholder="{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}" required/>
                                                            </div>
                                                            <div class="col-lg-3 mb-2">
                                                                <label>{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}:</label>
                                                                <input arr-name="item" value="{{ $linrco_request->VISA_PROCESSING_CHARGES_PER_CANDIDATE }}" name="VISA_PROCESSING_CHARGES_PER_CANDIDATE" type="text"
                                                                    class="form-control" placeholder="{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}" required/>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div data-repeater-item class="form-group row align-items-center">
                                                    <input arr-name="item" type="hidden" name="request_id" value="">
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.TRADE') }}:</label>
                                                            <input arr-name="item" value="{{ old('trade') }}" name="trade" type="text"
                                                                class="form-control" placeholder="{{ trans('dashboard.TRADE') }}" required/>
                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.Gender') }} :</label>
                                                            <select arr-name="item" id="gender" class="form-control select" name="gender"
                                                                    >
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="1" >{{ trans('dashboard.Male') }}</option>
                                                                <option value="2">{{ trans('dashboard.Female') }}</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.Qualification') }}:</label>
                                                            <input arr-name="item" value="{{ old('educational_qualification') }}" name="educational_qualification" type="text"
                                                                class="form-control" placeholder="{{ trans('dashboard.Qualification') }}" required/>

                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.QTY') }}:</label>
                                                            <input arr-name="item" value="{{ old('quantity') }}" name="quantity" type="number"
                                                                class="form-control" placeholder="{{ trans('dashboard.QTY') }}" required/>

                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.Nationality') }}:</label>
                                                            <select arr-name="item" class="form-control select" name="nationality">             
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                                                @endforeach

                                                            </select>

                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.SALARY (SAR)') }}:</label>
                                                            <input arr-name="item" value="{{ old('salary') }}" name="salary" type="text"
                                                                class="form-control" placeholder="{{ trans('dashboard.SALARY (SAR)') }}" required/>
                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}:</label>
                                                            <input arr-name="item" value="{{ old('RECRUITMENT_CHARGES_PER_CANDIDATE') }}" name="RECRUITMENT_CHARGES_PER_CANDIDATE" type="text"
                                                                class="form-control" placeholder="{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}" required/>
                                                        </div>
                                                        <div class="col-lg-3 mb-2">
                                                            <label>{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}:</label>
                                                            <input arr-name="item" value="{{ old('VISA_PROCESSING_CHARGES_PER_CANDIDATE') }}" name="VISA_PROCESSING_CHARGES_PER_CANDIDATE" type="text"
                                                                class="form-control" placeholder="{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}" required/>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center" >

                                            <div class="col-lg-3 float-right" style="float: none !important;margin: 0 auto;">
                                                <a href="javascript:;" data-repeater-create="" class="btn btn-block font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i> {{ trans('dashboard.Add a new Title') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.Saudization') }} :</label>
                                            <input {{ $linrco_quotation->saudization == 1 ? 'checked' : ''}} value="1" name="saudization" type="checkbox"/>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('companyQuotation.index' , [$linrco_quotation->company_id , $mother_company_id]) }}"
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