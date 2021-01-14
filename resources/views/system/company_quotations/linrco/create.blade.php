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
                            {{ trans('dashboard.Add New Company Quotations') }}
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
                            <a href="{{ route('companyQuotation.index' , [$company_id , $mother_company_id]) }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
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
                            <form method="post" action="{{ route('companyQuotation.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden"/>
                                <input value="{{ $company_id }}" name="company_id" type="hidden"/>

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Ref: No') }} :</label>
                                            <input value="{{ old('ref_no') }}" name="ref_no" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Ref: No') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Attn') }} :</label>
                                            <input value="{{ old('attn') }}" name="attn" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Attn') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Tel') }} :</label>
                                            <input value="{{ old('telephone') }}" name="telephone" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Tel') }}"/>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile') }} :</label>
                                            <input value="{{ old('mobile') }} " name="mobile" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Mobile') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.E-mail') }} :</label>
                                            <input value="{{ old('email') }}" name="email" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.E-mail') }}"
                                                   required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Quotation No.') }} :</label>
                                            <input value="{{ old('Quotation_No') }}" name="Quotation_No" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Quotation No.') }}" required/>
                                            @error('Quotation_No')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="kt_repeater_1">
                                        <div id="kt_repeater_1" class="form-group row">
                                            <div data-repeater-list="item" class="col-lg-12">
                                                <div data-repeater-item class="form-group row align-items-center">

                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.TRADE') }}:</label>
                                                        <input arr-name="item" value="{{ old('trade') }}" name="trade"
                                                               type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.TRADE') }}" required/>

                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.Gender') }} :</label>
                                                        <select arr-name="item" id="gender" class="form-control select"
                                                                name="gender"
                                                        >
                                                            <option value=""
                                                                    selected="">{{ trans('dashboard.Select All') }}</option>
                                                            <option value="1">{{ trans('dashboard.Male') }}</option>
                                                            <option value="2">{{ trans('dashboard.Female') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.Qualification') }}:</label>
                                                        <input arr-name="item"
                                                               value="{{ old('educational_qualification') }}"
                                                               name="educational_qualification" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.Qualification') }}"
                                                               required/>

                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.QTY') }}:</label>
                                                        <input arr-name="item" value="{{ old('quantity') }}"
                                                               name="quantity" type="number"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.QTY') }}" required/>

                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.Nationality') }}:</label>
                                                        <select arr-name="item" class="form-control select"
                                                                name="nationality"
                                                        >
                                                            <option value=""
                                                                    selected="">{{ trans('dashboard.Select All') }}</option>
                                                            @foreach($countries as $country)
                                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.SALARY (SAR)') }}:</label>
                                                        <input arr-name="item" value="{{ old('salary') }}" name="salary"
                                                               type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.SALARY (SAR)') }}"
                                                               required/>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}
                                                            :</label>
                                                        <input arr-name="item"
                                                               value="{{ old('RECRUITMENT_CHARGES_PER_CANDIDATE') }}"
                                                               name="RECRUITMENT_CHARGES_PER_CANDIDATE" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}"
                                                               required/>
                                                    </div>
                                                    <div class="col-lg-3 mb-2">
                                                        <label>{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}
                                                            :</label>
                                                        <input arr-name="item"
                                                               value="{{ old('VISA_PROCESSING_CHARGES_PER_CANDIDATE') }}"
                                                               name="VISA_PROCESSING_CHARGES_PER_CANDIDATE" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}"
                                                               required/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center">

                                            <div class="col-lg-3 float-right"
                                                 style="float: none !important;margin: 0 auto;">
                                                <a href="javascript:;" data-repeater-create=""
                                                   class="btn btn-block font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i> {{ trans('dashboard.Add a new Title') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    {{--<div class="form-group row">--}}
                                    {{--<div class="col-lg-12">--}}
                                    {{--<label>{{ trans('dashboard.Saudization') }} :</label>--}}
                                    {{--<input value="1" name="saudization" type="checkbox"/>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Terms & Conditions AR') }} :</label>
                                            <textarea rows="6" class="form-control" name="terms_ar">
•  تخضع جميع الشروط والأحكام للعقد الموقع.
•  يتم توفير الإقامة والنقل من جانب العميل.
•  يوفر العميل تذكرة التحاق الموظف للعمل.
•  مدة عقد الخدمة المقدمة عامان قابلة للتجديد حسب الشروط والأحكام المعمول بها.
•  ساعات العمل حسب قانون العمل السعودي.
• في البداية سيتحمل المرشحون رسوم الداتا فلو والبروميتريك ورسوم التصنيف وتصديق المستندات في دولتهم، ثم يقوم العميل بسداد المبالغ مباشرة إلى المرشحين عند وصولهم إلى المملكة العربية السعودية.
•    يجب أن يحصل العميل على أمر العمل الضروري من القنصليات المعنية.
•    يتم دفع 50٪ من المبلغ المثبت في الفاتورة بمجرد الانتهاء من ختم التأشيرة.
•    ويتم دفع 50٪ المتبقية عند إصدار وحجز تذكرة الانضمام للمرشح.
•    سيتم تطبيق ضريبة القيمة المضافة وأي ضرائب حكومية إضافية ورسوم حكومية.
•    عرض السعر المرسل صالح لمدة 7 أيام من تاريخ إصداره.
                                            </textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Terms & Conditions EN') }} :</label>
                                            <textarea rows="6" class="form-control" name="terms_en">
• All Terms & Conditions are subjected to Signed Contract.
• Accommodation & Transportation will be provided by the client.
• Employee Joining Tickets will be provided by the client.
• Service contract period is for 2 years and renewable as per the standard Terms & Conditions.
• Working hours as per Saudi Labor Law.
• The Dataflow, Prometric, Classification and Document Attestation Fees will be shouldered by the candidates initially in their home country and then the same will be reimbursed by the Client directly to the Candidates upon their arrival in KSA.
• Necessary Job Order to be obtained by the client from the respective consulates
• 50% of the invoice amount to be paid upon visa stamping.
• Remaining 50% of the invoice amount to be paid upon the issuance of the joining ticket.
• VAT and any Additional Government Taxes and Government Fee will be applicable.
• This quotation is Valid for 7 Days from the issued date.
                                            </textarea>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('companyQuotation.index' , [$company_id , $mother_company_id]) }}"
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
        var KTFormRepeater = function () {

            // Private functions
            var demo1 = function () {
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
                init: function () {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormRepeater.init();
        });


    </script>

@endsection