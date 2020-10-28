<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
@if (app()->getLocale() == 'ar')

    <html lang="ar" dir="rtl">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>عرض اسعار الى </title>
        @else

            <html lang="en" dir="ltr">
            <head>
                <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
                <title>Quotation For </title>

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
                <header><img style="width: 100%" src="{{ asset('dashboard/assets/head.jpg') }}"></header>
            </htmlpageheader>

            <htmlpagefooter name="page-footer">

                <footer><img style="width: 100%" src="{{ asset('dashboard/assets/foot.jpg') }}"></footer>
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
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">RABIA HOSPITAL
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Ref: No') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">LINRCO / HO /
                                        051 – 2020
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Attn') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">DR. MOHAMED
                                        YAMANI
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Date') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">17th AUGUST
                                        2020
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Tel') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">+966 - 114 - 999
                                        - 000
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Industry') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">HEALTH CARE
                                        INDUSTRY
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Mobile') }} </td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">+966 - 541 - 454
                                        - 967
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.Quotation No.') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">051</td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle; background-color: #d7d7d7;">{{ __('dashboard.E-mail') }}</td>
                                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
                                        Yamani2@yahoo.com
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
                                        {{ __('dashboard.TRADE') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Gender') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Qualification') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.QTY') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.Nationality') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.SALARY (SAR)') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 12px; vertical-align: middle; text-align: center;line-height: 16px;">
                                        {{ __('dashboard.RECRUITMENT CHARGES PER CANDIDATE') }}
                                    </td>
                                    <td class="en ltr"
                                        style="background: #d7d7d7;font-size: 11px; vertical-align: middle; text-align: center;line-height: 16px; width: 170px;">
                                        {{ __('dashboard.VISA PROCESSING CHARGES PER CANDIDATE (U.S $)') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">GENERAL
                                        NURSES
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">FEMALE
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">BACHELOR
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">15
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">PHILIPPINES
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">3500+300+
                                        Transport &
                                        Accommodation
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">ONE MONTH
                                        SALARY
                                    </td>
                                    <td class="en ltr"
                                        style="font-size: 12px; vertical-align: middle;text-align: center;">$750
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <p class="en ltr" style="line-height: 24px;">
                                <strong>{{ __('dashboard.Terms & Conditions') }}:-</strong><br/>

                                @if (app()->getLocale() == 'ar')


                                    •  تخضع جميع الشروط والأحكام للعقد الموقع.<br/>
                                    •  يتم توفير الإقامة والنقل من جانب العميل.<br/>
                                    •  يوفر العميل تذكرة التحاق الموظف للعمل.<br/>
                                    •  مدة عقد الخدمة المقدمة عامان قابلة للتجديد حسب الشروط والأحكام المعمول بها.<br/>
                                    •  ساعات العمل حسب قانون العمل السعودي.<br/>
                                    • في البداية سيتحمل المرشحون رسوم الداتا فلو والبروميتريك ورسوم التصنيف وتصديق
                                    المستندات في دولتهم، ثم يقوم العميل بسداد المبالغ مباشرة إلى المرشحين عند وصولهم إلى
                                    المملكة العربية السعودية.<br/>
                                    •    يجب أن يحصل العميل على أمر العمل الضروري من القنصليات المعنية.<br/>
                                    •    يتم دفع 50٪ من المبلغ المثبت في الفاتورة بمجرد الانتهاء من ختم التأشيرة.<br/>
                                    •    ويتم دفع 50٪ المتبقية عند إصدار وحجز تذكرة الانضمام للمرشح.<br/>
                                    •    سيتم تطبيق ضريبة القيمة المضافة وأي ضرائب حكومية إضافية ورسوم حكومية.<br/>
                                    •    عرض السعر المرسل صالح لمدة 7 أيام من تاريخ إصداره.<br/>





{{--




                                    <span class="en">•</span>    تخضع جميع الشروط والأحكام للعقد الموقع<span class="en">.</span>
                                    <br/>
                                    <span class="en">•</span>    يتم توفير الإقامة والنقل من جانب العميل<span
                                            class="en">.</span><br/>
                                    <span class="en">•</span>    يتم توفير تذاكر الطيران من جانب العميل<span class="en">.</span>
                                    <br/>
                                    <span class="en">•</span>    ساعات العمل حسب قانون العمل السعودي<span
                                            class="en">.</span><br/>
                                    <span class="en">•</span>    سيتم دفع رسوم الداتا فلو والتصنيف والبرومتريك من قبل
                                    العميل قبل وصول المرشح<span class="en">.</span><br/>
                                    <span class="en">•</span>    يتم تصديق العروض الوظيفية المقدمة من جانب العميل عبر
                                    القنصليات المعنية<span class="en">.</span><br/>
                                    <span class="en">•</span>    يتم دفع <span class="en">100%</span> من المبلغ المثبتفي
                                    الفاتورة قبل وصول المرشح<span class="en">.</span><br/>
                                    <span class="en">•</span>    سيتم تطبيق ضريبة القيمة المضافة وأي ضرائب حكومية إضافية
                                    ورسوم حكومية<span class="en">.</span><br/>
                                    <span class="en">•</span>    عرض السعر المرسل صالح لمدة <span class="en">7</span>
                                    أيام من تاريخ إصداره<span class="en">.</span><br/>
--}}


                                    <strong style="font-size: 16px">الشركة الرائدة في مجال التوظيف الدولي – ليناركو</strong>
                                    <br/>
                                    المدير الاقليمي<br/>
                                    المبيعات والتسويق<br/>
                                    سيد رأفت علي

                                @else

                                    •    All Terms & Conditions are subjected to Signed Contract.<br/>
                                    •    Accommodation & Transportation will be provided by the client.<br/>
                                    •    Employee Joining Tickets will be provided by the client.<br/>
                                    •    Service contract period is for 2 years and renewable as per the standard Terms&
                                    Conditions.<br/>
                                    •    Working hours as per Saudi Labor Law.<br/>
                                    •    The Dataflow, Prometric, Classification and Document Attestation Fees will be
                                    shouldered by the candidates initially in their home country and then the same will
                                    be reimbursed by the Client directly to the Candidates upon their arrival in KSA.
                                    <br/>
                                    •    Necessary Job Order to be obtained by the client from the respective consulates
                                    <br/>
                                    •    50% of the invoice amount to be paid upon visa stamping.<br/>
                                    •    Remaining 50% of the invoice amount to be paid upon the issuance of the joining
                                    ticket.<br/>
                                    •    VAT and any Additional Government Taxes and Government Fee will be applicable.
                                    <br/>
                                    •    This quotation is Valid for 7 Days from the issued date.<br/>




                                    {{--  • All Terms & Conditions are subjected to Signed Contract.<br/>
                                      • Accommodation & Transportation will be provided by the client.<br/>
                                      • Employee Joining Tickets will be provided by the client.<br/>
                                      • Service contract period is for 2 years and renewable as per the standard Terms &
                                      Conditions.<br/>
                                      • Working hours as per Saudi Labor Law.<br/>
                                      • Dataflow, Pro-Metric & Classification charges will be reimbursed by the client
                                      before candidate’s arrival
                                      at Actuals<br/>
                                      • Necessary Job Order to be obtained by the client from the respective consulates
                                      <br/>
                                      • 100 % of the invoiced amount to be paid before candidate’s arrival<br/>
                                      • VAT and any Additional Government Taxes and Government Fee will be applicable.
                                      <br/>
                                      • This quotation is Valid for 7 Days from the issued date.<br/>--}}

                                    For <strong>INTERNATIONAL RECRUITMENT CORPORATION</strong><br/>
                                    Regional Manager<br/>
                                    Sales & Marketing<br/>
                                    SAYYED RAAFAT ALI


                                @endif

                            </p>
            </main>

            </body>
    </html>
