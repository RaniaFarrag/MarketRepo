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
                            {{ trans('dashboard.Companies Data') }}
                        </a>
                        <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                        <a href="{{ route('companyQuotation.index' , [$company_id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                            {{ trans('dashboard.Fnrco Quotations') }}
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
                    <!--begin::Card-->
                    <div class="card card-custom">
                        <form method="post" action="{{ route('store_visa_flatred_quotation') }}" class="form"
                              enctype="multipart/form-data">
                              @csrf
                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden" />
                                <input value="{{ $company_id }}" name="company_id" type="hidden" />
                                <input value="{{ $saudization }}" name="saudization" type="hidden" />

                            <div class="card-body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>{{ trans('dashboard.Ref: No') }} :</label>
                                        <input value="{{ old('ref_no') }}" name="ref_no" type="text" class="form-control"
                                               placeholder="{{ trans('dashboard.Ref: No') }}" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>{{ trans('dashboard.Attn') }} :</label>
                                        <input value="{{ old('attn') }}" name="attn" type="text" class="form-control"
                                               placeholder="{{ trans('dashboard.Attn') }}" required/>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>{{ trans('dashboard.Tel') }} :</label>
                                        <input value="{{ old('telephone') }}" name="telephone" type="text" class="form-control"
                                               placeholder="{{ trans('dashboard.Tel') }}" />
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label>{{ trans('dashboard.Mobile') }} :</label>
                                        <input value="{{ old('mobile') }} " name="mobile" type="text" class="form-control"
                                               placeholder="{{ trans('dashboard.Mobile') }}" />
                                    </div>
                                    <div class="col-lg-3">
                                        <label>{{ trans('dashboard.E-mail') }} :</label>
                                        <input value="{{ old('email') }}" name="email" type="text"
                                               class="form-control" placeholder="{{ trans('dashboard.E-mail') }}" required/>



                                    </div>
                                    <div class="col-lg-3">
                                        <label>{{ trans('dashboard.Quotation No') }} :</label>
                                        <input value="{{ old('Quotation_No') }}" name="Quotation_No" type="text"
                                               class="form-control" placeholder="{{ trans('dashboard.Quotation No') }}" required/>
                                        @error('Quotation_No')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3">
                                        <label>{{ trans('dashboard.Contract Period') }} :</label>
                                        <select class="form-control select2" id="period" name="Contract_period"
                                                            required>
                                            <option value="" selected="">Select All</option>
                                            <option value="12"  iqama="1115.5" >12 {{ trans('dashboard.Month') }}</option>
                                            <option value="24" iqama="1019.6">24 {{ trans('dashboard.Month') }}</option>
                                        </select>
                                            @error('Contract_period')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                    </div>

                                </div>

                                <div id="kt_repeater_1">
                                    <div id="kt_repeater_1" class="form-group row">
                                        <div data-repeater-list="" class="col-lg-12">
                                            <div data-repeater-item class="form-group row align-items-center">

                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Category') }}:</label>
                                                    <input arr-name="item" value="{{ old('category') }}" name="category" type="text"
                                                           class="form-control" placeholder="Category" required/>
                                                           @error('category')
                                                                <div class="error">{{ $message }}</div>
                                                            @enderror
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.visa_category_available') }}:</label>
                                                    <input arr-name="item" value="{{ old('visa_category_available') }}" name="visa_category_available" type="text"
                                                           class="form-control" placeholder="visa_category_available" required/>
                                                    @error('visa_category_available')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.visa_category_arabic') }}:</label>
                                                    <input arr-name="item" value="{{ old('visa_category_arabic') }}" name="visa_category_arabic" type="text"
                                                           class="form-control" placeholder="visa_category_arabic" required/>
                                                    @error('visa_category_arabic')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.quantity') }}:</label>
                                                    <input arr-name="item" value="{{ old('quantity') }}" name="quantity" type="number" id="qty"
                                                           class="form-control qty" placeholder="QTY" required/>

                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>Nationality:</label>
                                                    <select arr-name="item" class="form-control select" name="nationality"
                                                             required>
                                                        <option value="" selected="">Select All</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}" >{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.SALARY (SAR)') }}:</label>
                                                    <input arr-name="item" value="{{ old('salary') }}" name="salary" type="number"  id="basicSalary"
                                                           class="form-control basicSalary" placeholder="Basic Salary"  required/>

                                                </div>

                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Food allowance') }}:</label>
                                                    <input arr-name="item" value="{{ old('Food_allowance') }}" name="Food_allowance" type="number" id="foodAllowance"
                                                           class="form-control foodAllowance" placeholder="Food  Allowance" required/>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.FNRCO Charge')}}:</label>
                                                    <input arr-name="item" value="{{ old('Fnrco_charge') }}" name="Fnrco_charge" type="text" id="fNRCOCharge" class="form-control fNRCOCharge" placeholder="FNRCO Charge" required/>
                                                </div>

                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Iqama + Visa') }}:</label>
                                                    <input arr-name="item" value="{{ old('iqama_visa') }}"  id="iqamaVisa" name="iqama_visa" type="text" class="form-control iqamaVisa" readonly="true" placeholder="Iqama + Visa"/>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Admin Fees') }}:</label>
                                                    <input arr-name="item" value="{{ old('dashboard.admin_fees') }}"  id="adminFees" name="admin_fees" type="text" class="form-control adminFees" readonly="true" placeholder="Admin Fees "/>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Value Per Employee / Month') }}:</label>
                                                    <input arr-name="item" value="{{ old('dashboard.value_per_employee_month') }}"  id="PerEmployee" name="value_per_employee_month" type="text" class="form-control PerEmployee" readonly="true" placeholder="Value Per Employee / Month "/>
                                                </div>
                                                <div class="col-lg-3 mb-2">
                                                    <label>{{ trans('dashboard.Total Value Per Month') }}:</label>
                                                    <input arr-name="item" value="{{ old('dashboard.value_per_employee_month') }}"  id="totalValue" name="total_value_per_month" type="text" class="form-control totalValue" readonly="true" placeholder="Total Value Per Month"/>
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

                                {{--<div class="form-group row">--}}
                                    {{--<div class="col-lg-6">--}}
                                        {{--<label>{{ trans('dashboard.Terms & Conditions AR') }} :</label>--}}
                                        {{--<textarea rows="8" class="form-control" name="terms_ar">--}}
{{--•  تخضع جميع الشروط والأحكام للعقد الموقع.--}}
{{--•  تقوم فناركو بسداد كل ما يتعلق باستحقاقات رواتب الموظفين وفقًا لقانون العمل، وبدل الطعام، وتكلفة الإقامة، والرسوم الطبية ، ورسوم ماكينات الصراف الآلي ، ورسوم تحويل الراتب ، ورسوم مكتب العمل ، والتأمينات الاجتماعية ، و EOS ، رسوم الخروج والعودة مرة أخرى ، ودفع الإجازة.--}}
{{--•  .توفر شركة {{ $company->name }} ، و السعودة ، إقامة الموظفين ونقلهم.--}}
{{--•  مدة عقد الخدمة المقدمة عامان قابلة للتجديد حسب الشروط والأحكام المعمول بها.--}}
{{--•  ساعات العمل حسب قانون العمل السعودي.--}}
{{--• في البداية سيتحمل المرشحون رسوم الداتا فلو والبروميتريك ورسوم التصنيف وتصديق المستندات في دولتهم، ثم يقوم العميل بسداد المبالغ مباشرة إلى المرشحين عند وصولهم إلى المملكة العربية السعودية.--}}
{{--•    يجب أن يحصل العميل على أمر العمل الضروري من القنصليات المعنية.--}}
{{--•    يتم دفع 50٪ من المبلغ المثبت في الفاتورة بمجرد الانتهاء من ختم التأشيرة.--}}
{{--•    ويتم دفع 50٪ المتبقية عند إصدار وحجز تذكرة الانضمام للمرشح.--}}
{{--•    سيتم تطبيق ضريبة القيمة المضافة وأي ضرائب حكومية إضافية ورسوم حكومية.--}}
{{--•    عرض السعر المرسل صالح لمدة 7 أيام من تاريخ إصداره.--}}
                                            {{--</textarea>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-lg-6">--}}
                                        {{--<label>{{ trans('dashboard.Terms & Conditions EN') }} :</label>--}}
                                        {{--<textarea rows="8" class="form-control" name="terms_en">--}}
{{--• All Terms & Conditions are subjected to Signed Contract.--}}
{{--• Employees Payroll Benefits as per Labor Law, Food Allowance, Iqama Cost, Medical (Iqama), ATM, Salary Transfer Fee, Labor Office Charges, GOSI EOS, Exit Re-Entry, Vacation Pay, Insurance, @if($fnrco_quotation->saudization == 0)<strong>Saudization </strong>,--}}
  {{--@endif Flight Tickets & Other Government Related Charges will be provided by FNRCO.--}}
{{--• Employee Joining Tickets will be provided by the client.--}}
{{--• Service contract period is for 2 years and renewable as per the standard Terms & Conditions.--}}
{{--• Working hours as per Saudi Labor Law.--}}
{{--• The Dataflow, Prometric, Classification and Document Attestation Fees will be shouldered by the candidates initially in their home country and then the same will be reimbursed by the Client directly to the Candidates upon their arrival in KSA.--}}
{{--• Necessary Job Order to be obtained by the client from the respective consulates--}}
{{--• 50% of the invoice amount to be paid upon visa stamping.--}}
{{--• Remaining 50% of the invoice amount to be paid upon the issuance of the joining ticket.--}}
{{--• VAT and any Additional Government Taxes and Government Fee will be applicable.--}}
{{--• This quotation is Valid for 7 Days from the issued date.--}}
                                            {{--</textarea>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

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

    
<script>
    $(document).on('change', '#period , .basicSalary, .foodAllowance, .fNRCOCharge,.qty', function() {

        // Does some stuff and logs the event to the console
        var period =$('#period').val();
        // var period = 24;
        //console.log(period)
        var iqama = $('#period :selected').attr('iqama')

        $(".basicSalary").each(function() {
            var basicSalary = $(this).val();
            var foodAllowance = $(this).parent().parent().find('.foodAllowance').val();
            var fNRCOCharge = $(this).parent().parent().find('.fNRCOCharge').val();
            var qty = $(this).parent().parent().find('.qty').val();

            var hra = basicSalary/12*2;
            var gOSIA = basicSalary*0.02;
            var gOSIB = hra/100*2;
            var vacation  = 1.75*period;
            var vACATIONPAY  = basicSalary/30*vacation/period;
            var ticketPrice  = 2000;
            var fINALEXITAIRTICKET  = ticketPrice/period;
            var eOSB   = basicSalary/30*15/12;
            var eXITREENTRY   = 200/period;
            var adminFees   = gOSIA+gOSIB+vACATIONPAY+fINALEXITAIRTICKET+eOSB+eXITREENTRY;
            var PerEmployee   = parseFloat(basicSalary) + parseFloat(foodAllowance)+parseFloat(iqama)+parseFloat(adminFees)+parseFloat(fNRCOCharge);
            var totalValue   = PerEmployee*qty;

            $(this).parent().parent().find('.iqamaVisa').val(iqama);
            $(this).parent().parent().find('.adminFees').val(adminFees);
            $(this).parent().parent().find('.PerEmployee').val(PerEmployee);
            $(this).parent().parent().find('.totalValue').val(totalValue);

        });

//alert(qty);
});

</script>

@endsection