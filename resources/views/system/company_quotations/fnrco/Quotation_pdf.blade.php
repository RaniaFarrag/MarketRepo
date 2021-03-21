<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
@if (app()->getLocale() == 'ar')

    <html lang="ar" dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title> {{$fnrco_quotation->company->name }} عرض اسعار الى </title>
        @else

            <html lang="en" dir="ltr">
            <head>
                <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
                <title>Quotation For {{$fnrco_quotation->company->name }} </title>

                @endif

                @if (app()->getLocale() == 'ar')
                    <style>
                        @page {
                            margin: 110px 20px;
                            header: page-header;
                            footer: page-footer;
                        }

                        body {
                            font-size: 13px;
                            letter-spacing: 0px;
                            position: relative;
                            text-align: right;
                            font-family: 'examplefont3', sans-serif;
                        }

                        main {
                            height: 870px;
                            position: relative;
                            display: block;
                        }

                        .ar {
                            font-family: 'examplefont', sans-serif;
                        }

                        td {
                            padding: 2px 5px;
                            text-align: center;
                            border: 1px solid #77697a;
                            border-collapse: collapse;
                            font-size: 14px !important;
                        }

                        h4 {
                            font-size: 24px;
                        }

                        h5 {
                            font-size: 18px
                        }

                        table {
                            width: 100% !important;
                            border-collapse: collapse;
                            border: 1px solid #77697a
                        }

                        .ltr {
                            direction: rtl;
                            text-align: right;
                        }

                        .page_break {
                            page-break-before: always;
                        }

                        p {
                            font-size: 14px
                        }

                        header {
                            position: absolute;
                            top: 0cm;
                            left: 0cm;
                            right: 0cm;
                            text-align: center;
                            width: 100%;
                            height: 2cm;
                        }

                        footer {
                            position: absolute;
                            bottom: 0cm;
                            left: 0cm;
                            right: 0cm;
                            text-align: center;
                            width: 100%;
                        }
                    </style>

                @else

                    <style>
                        @page {
                            margin: 110px 20px;
                            header: page-header;
                            footer: page-footer;
                        }

                        body {
                            font-size: 13px;
                            letter-spacing: 0px;
                            position: relative;
                            text-align: right;
                            font-family: 'examplefont2', sans-serif;
                        }

                        main {
                            height: 870px;
                            position: relative;
                            display: block;
                        }

                        .ar {
                            font-family: 'examplefont', sans-serif;
                        }

                        .en {
                            font-family: 'examplefont2', sans-serif;
                            direction: ltr;
                        }

                        td {
                            padding: 2px 5px;
                            text-align: center;
                            border: 1px solid #77697a;
                            border-collapse: collapse;
                            font-size: 14px !important;
                        }

                        .ltr {
                            direction: ltr;
                            text-align: left
                        }

                        h4 {
                            font-size: 24px;
                        }

                        h5 {
                            font-size: 18px
                        }

                        table {
                            width: 100% !important;
                            border-collapse: collapse;
                            border: 1px solid #77697a
                        }

                        .page_break {
                            page-break-before: always;
                        }

                        p {
                            font-size: 14px
                        }

                        header {
                            position: absolute;
                            top: 0cm;
                            left: 0cm;
                            right: 0cm;
                            text-align: center;
                            width: 100%;
                            height: 2cm;
                        }

                        footer {
                            position: absolute;
                            bottom: 0cm;
                            left: 0cm;
                            right: 0cm;
                            text-align: center;
                            width: 100%;
                        }
                    </style>



                @endif

            </head>

    @if (app()->getLocale() == 'ar')

        <body dir="rtl">

        @else

            <body dir="ltr">


            @endif


            <htmlpageheader name="page-header">
                <header><img style="width: 100%" src="{{ asset('dashboard/assets/fhead.jpg') }}"></header>
            </htmlpageheader>

            <htmlpagefooter name="page-footer">

                <footer><img style="width: 100%" src="{{ asset('dashboard/assets/ffoot.jpg') }}"></footer>
            </htmlpagefooter>

            <main>

                @if (app()->getLocale() == 'ar')

                    <table style="line-height: 24px; border: none;">

                        @else

                            <table class="en ltr" style="line-height: 24px; border: none;">


                                @endif


                                <tbody>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.To') }}</td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;">{{ $fnrco_quotation->company->name }}
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Ref: No') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->ref_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Attn') }}</td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;">{{ $fnrco_quotation->attn }}

                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Date') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Tel') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->telephone }}
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Industry') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->company->sector->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Mobile') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->mobile }}
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Quotation No.') }}</td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;">{{ $fnrco_quotation->Quotation_No }}</td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.E-mail') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        {{ $fnrco_quotation->email }}
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Page No.') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">1</td>
                                </tr>
                                </tbody>
                            </table>


                            @if (app()->getLocale() == 'ar')

                                <p>
                                    <strong>عزيزي السيد
                                        <span class="en">/ ............................. ،</span>
                                    </strong> <br/>
                                    شكراً لإعطائنا الفرصة لتقديم عرض السعر هذا لشركتكم القيمة<span class="en">.</span>
                                    بناءً على متطلباتك<span class="en">،</span> فإن عرضنا التنافسي يتضمن
                                    الآتي<span class="en">.</span> يرجى ملاحظة أن الرسوم أدناه تتعلق بتوفير خدمات
                                    التوظيف والتأشيرة لشركتكم الموقرة<span class="en">.</span>
                                </p>

                            @else


                                <p class="en ltr">
                                    <strong>Dear DR. MOHAMED YAMANI, </strong> <br/>
                                    Thank you for giving us the opportunity to quote for your valued company. Based on
                                    your requirements our
                                    competitive quote is as follows. Below charges relate to the provision of
                                    recruitment and visa services to
                                    your Esteemed Establishment

                                </p>


                            @endif



                            <table class="en ltr" style="line-height: 16px; border: none;">

                                <tbody>
                                <tr class="en ltr">
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.No') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Category') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.QTY') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Nationality') }}
                                    </td>
                                    {{--  <td class="en ltr"
                                          style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                          {{ __('dashboard.SALARY (SAR)') }}
                                      </td>--}}
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.F&A') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Value Per Employee / Month') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Total Value Per Month') }}
                                    </td>

                                </tr>
                                @foreach($fnrco_quotation->fnrcoQuotationsRequest as $fnrco_request)
                                    <tr>
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->id }}
                                        </td>
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->category }}
                                        </td>
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->quantity }}
                                        </td>
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->country->name }}
                                        </td>
                                        {{--  <td class="en ltr"
                                              style="font-size: 12px; vertical-align: middle;text-align: center;">
                                              {{ $fnrco_request->salary }}
                                          </td>--}}
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->Food_allowance }}
                                        </td>

                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->value_per_employee_month }}
                                        </td>
                                        <td class="en ltr"
                                            style="font-size: 12px; vertical-align: middle;text-align: center;">
                                            {{ $fnrco_request->total_value_per_month }}
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                            <p class="en ltr" style="line-height: 20px; font-size: 12px;">
                                @if (app()->getLocale() == 'ar')
                                    <strong>قامت فناركو بتطبيق نظام SAP & ISO QMS لتحسين العمليات.</strong>
                                @else

                                    <strong>FNRCO has implemented SAP & ISO QMS to optimize the Operations.</strong>
                                @endif

                                <br/>
                                <br/>
                            </p>

                            <p class="en ltr" style="line-height: 18px;">
                                <strong>{{ __('dashboard.Terms & Conditions') }}:-</strong><br/>

                                @if (app()->getLocale() == 'ar')

                                    1. تخضع جميع الشروط والأحكام للعقد الموقع.<br/>
                                    2. تقوم فناركو بسداد كل ما يتعلق باستحقاقات رواتب الموظفين وفقًا لقانون العمل، وبدل
                                    الطعام، وتكلفة الإقامة، والرسوم الطبية ، ورسوم ماكينات الصراف الآلي ، ورسوم تحويل
                                    الراتب ، ورسوم مكتب العمل ، والتأمينات الاجتماعية ، و EOS ، رسوم الخروج والعودة مرة
                                    أخرى ، ودفع الإجازة ،
                                    @if($fnrco_quotation->saudization == 0)
                                        <strong>السعودة </strong>,
                                    @endif
                                    ، والتأمين ، وتذاكر الطيران ، والرسوم الحكومية الأخرى.<br/>
                                    3. توفر شركة
                                    {{ $fnrco_quotation->company->name }}
                                    ،
                                    @if($fnrco_quotation->saudization == 1)
                                        <strong>و السعودة </strong>
                                    @endif، إقامة الموظفين ونقلهم. <br/>
                                    4. مدة عقد القوى العاملة
                                    @if($fnrco_quotation->Contract_period == 12)
                                        <strong>12 شهر</strong>
                                    @elseif($fnrco_quotation->Contract_period == 24)
                                        <strong>24 شهر</strong>
                                    @endif قابلة للتجديد حسب معايير الشروط والأحكام الموضوعة.<br/>
                                    5. إيداع مبلغ شهرين مقدماً.  بمعنى: يتعين على شركة جاش للخدمات التقنية إيداع مبلغ
                                    الفاتورة شهرين مقدمًا لدى FNRCO.<br/>
                                    6. الدفع في غضون 30 يومًا بعد تقديم الفاتورة مقابل جدول ساعات العمل المعتمد.
                                    7. ساعات العمل حسب نظام العمل السعودي.







                                @else

                                    1. All Terms & Conditions subject to Signed Contract.<br/>
                                    2. Employees Payroll Benefits as per Labor Law, Food Allowance, Iqama Cost, Medical
                                    (Iqama), ATM, Salary Transfer Fee, Labor Office Charges, GOSI,
                                    EOS, Exit Re-Entry, Vacation Pay, Insurance,
                                    @if($fnrco_quotation->saudization == 0)
                                        <strong>Saudization </strong>,
                                    @endif
                                    Flight Tickets & Other Government Related Charges will be
                                    provided by FNRCO.<br/>
                                    3. Employee Accommodation, Transportation
                                    @if($fnrco_quotation->saudization == 1)
                                        <strong>and Saudization </strong>
                                    @endif
                                    will be
                                    provided by {{ $fnrco_quotation->company->name }} .<br/>
                                    4. Manpower contract period is for
                                    @if($fnrco_quotation->Contract_period == 12)
                                        <strong>1 year</strong>
                                    @elseif($fnrco_quotation->Contract_period == 24)
                                        <strong>2 year</strong>
                                    @endif
                                    and renewable as per the
                                    standard Terms & Conditions.<br/>
                                    5.<strong> Two months advance depositie ie; Jash Technical Services LLC</strong> has
                                    to deposit invoice amount of two months in advance with FNRCO .<br/>
                                    6. Payment within 30 days after the invoice submitted against the approved
                                    timesheet.<br/>
                                    7. Working hours as per Saudi Labor<br/>
                                    <br/>
                                    Time Frame required for the personnel mobilization<br/>
                                    •   If the candidate is inside the kingdom, the maximum time period of mobilization
                                    is immediately.<br/>



                                @endif

                            </p>

                            <table class="en ltr" style="line-height: 24px; border: none;">

                                <tbody>
                                <tr class="en ltr" style="width: 60%">
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;">
                                        @if (app()->getLocale() == 'ar')
                                            <strong> معدل ساعات الوقت الاضافي هو 1.5 مرة من المعدل العادي<br/>
                                                معدل الساعة للعطلة الرسمية هو 1.5 مرة من المعدل العادي<br/>
                                                ساري لمدة 14 يومًا من تاريخ عرض السعر
                                            </strong>
                                        @else
                                            <strong>Over Time hour rate is 1.5 times of the Normal Rate<br/>
                                                Hourly Rate of Public Holiday is 1.5 times of the Normal Rate<br/>
                                                Valid for 14 Days from the date of Quotation</strong>

                                        @endif
                                    </td>
                                    <td rowspan="3" class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;width: 40%">
                                        @if (app()->getLocale() == 'ar')
                                            موافقة العميل<br/><br/><br/><br/>
                                            ختم الشركة :
                                        @else
                                            Client Acceptance<br/><br/><br/><br/>
                                            Company Stamp :
                                        @endif

                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; text-align: left; border: none;">
                                        <br></td>
                                </tr>
                                <tr>
                                    <td class="en ltr" style="font-size: 12px; border: none;">

                                        @if (app()->getLocale() == 'ar')
                                            <strong> مدير المبيعات والتسويق<br/>
                                                15٪ ضريبة القيمة المضافة المطبقة على القيمة الإجمالية شهريا. </strong>
                                        @else
                                            <strong> Sales & Marketing Manager<br/>
                                                15% VAT applicable on Total Value Per Month.</strong>
                                        @endif


                                    </td>


                                </tr>

                                </tbody>
                            </table>
            </main>

            </body>
    </html>
