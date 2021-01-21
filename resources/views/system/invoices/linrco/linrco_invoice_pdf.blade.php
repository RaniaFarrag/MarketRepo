<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>invoice</title>
    <style>
        @page {
            margin: 110px 20px;
            header: page-header;
            footer: page-footer;
        }

        body {
            font-size: 13px;
            letter-spacing: 0px;
            background: #2196f3;
            text-align: right;
            font-family: 'examplefont3', sans-serif;
        }

        main {
            height: 870px;
            position: relative;
            display: block;
        }

        .ar {
            font-family: 'examplefont3', sans-serif;
        }

        .en {
            font-family: 'examplefont3', sans-serif;
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

</head>


<body class="en ltr">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="{{ asset('dashboard/assets/head.jpg') }} "></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">
    <footer><img style="width: 100%" src="{{ asset('dashboard/assets/foot.jpg') }}"></footer>
</htmlpagefooter>

<main>
    <h3 style="text-align: center; width: 100%; background: #d6d6d6">INVOICE</h3>
    <table style=" width: 100%; font-size: 12px;">
        <tbody>

        <tr>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">INV NUMBER</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">INV DATE</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">CLIENT CODE</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">CONTRACT REF NO</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">INTERNAL CONTACT</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">TELEPHONE</td>
            <td style="text-align:center; font-weight: bold;font-size: 11px;background: #d6d6d6;">EMAIL</td>
        </tr>
        <tr>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">رقم الفاتورة</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">تاريخ الفاتورة</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">رقم العميل</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">رقم العقد</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">المسؤل</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">رقم الجوال</td>
            <td style="text-align:center;font-weight: bold;font-size: 11px;background: #d6d6d6;">البريد الالكتروني</td>
        </tr>
        <tr>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->id }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->date }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->company->client_code }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->agreement_no }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->internal_contact }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->telephone }}</td>
            <td style="text-align:center;font-size: 11px;">{{ $linrco_invoice->email }}</td>
        </tr>



        </tbody>
    </table>
    <br/>

    <div style="width: 40%; display: inline-block;float: left">
        <table style=" width: 100%; font-size: 12px;">
            <tbody>

            <tr>
                <td style="text-align:left;font-size: 11px;background: #d6d6d6;">Bill To:</td>
                <td style="text-align:right;font-size: 11px;background: #d6d6d6;">فاتورة الى</td>

            </tr>
            <tr>
                <td colspan="2" style="text-align:left; font-weight: bold;font-size: 11px;line-height: 20px;">{{ $linrco_invoice->company->name }}
                    <br/>
                    Riyadh,Saudi Arabia

                </td>


            </tr>
            <tr>
                <td style="text-align:left; font-size: 11px;background: #d6d6d6;">CUSTOMER VAT NO</td>
                <td style="text-align:right; font-size: 11px;background: #d6d6d6;">( رقم الملف الضريبى للعميل )</td>

            </tr>
            <tr>
                <td   colspan="2" style="text-align:left; font-size: 11px;">{{ $linrco_invoice->company->customer_vat_no }}</td>
            </tr>



            </tbody>
        </table>
    </div>

    <div style="width: 30%; display: inline-block;float: right">
        <table style=" width: 100%; font-size: 12px;">
            <tbody>

            <tr>
                <td style="text-align:left;font-size: 11px;background: #d6d6d6;">Remit To:</td>
                <td style="text-align:right;font-size: 11px;background: #d6d6d6;">تحويل الى</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:left; font-weight: bold;font-size: 11px;line-height: 20px;">
                    LINRCO
                    <br/>
                    Omar Bin Abdulaziz Street Al-Malaz
                    <br/>
                    District,Riyadh,Saudi Arabia
                    <br/>
                    <br/>
                    <br/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <br/>
    <br/>
    <br/>
    <br/>

    <br/>
    <br/>

    <table style="font-size: 10px;border: 2px solid #000;">

        <tbody>

        <tr style="border: 2px solid #000;">
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; border: 2px solid #000; font-size: 10px; ">Particulars</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  ">Recruitment Fee</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  ">Visa processing fee</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  ">TOTAL BEFORE TAX </td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  "> TAX 5% </td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px; "> TOTAL AMOUNT AFTER TAX</td>
        </tr>
        <tr style="border: 2px solid #000;">
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center;font-weight: bold;border: 2px solid #000;  font-size: 10px; ">تفاصيل</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  "> رسوم التوظيف</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  ">رسوم معالجة التأشرية</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  ">اجمالى بدون ضريبة</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  "> الضريبة 5%</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px;  "> المبلغ الاجمالى بعد الضريبة </td>
        </tr>

        @foreach($linrco_invoice->LinrcoInvoiceRequest as $request)
            <tr>
                <td style=" font-size: 10px; ">{{ $request->particulars }}</td>
                <td style=" font-size: 10px; ">{{ $request->recruitment_fee }}</td>
                <td style=" font-size: 10px; ">{{ $request->visa_processing_fee }}</td>
                <td style=" font-size: 10px; ">{{ $request->total_before_tax}}</td>
                <td style=" font-size: 10px; ">{{ $request->tax}}</td>
                <td style="border: 2px solid #000; font-size: 10px; ">{{ $request->total_amount_after_tax }}</td>

            </tr>
        @endforeach
        <tr style="border: 2px solid #000;">
            <td style="text-align: center; font-weight: bold; font-size: 14px;border: 2px solid #000;">Total</td>
            <td colspan="2" style="text-align: center;border: 2px solid #000;">Fifty Eight Thousand Nine Hundred Forty Four Riyals and No Halalas </td>
            <td style="text-align: center;font-weight: bold;border: 2px solid #000;">{{ $total_before_tax }}</td>
            <td style="text-align: center;font-weight: bold;border: 2px solid #000;">{{ $total_tax }}</td>
            <td style="text-align: center;font-weight: bold;border: 2px solid #000;">{{ $total_amount_after_tax }}</td>
        </tr>

        </tbody>
    </table>
    <br/>
    <div style="float: left; width: 50%; display: inline-block"> </div>
    <div style="float: right; width: 50%; display: inline-block">
        <table style="font-size: 10px;border: 2px solid #000;">

            <tbody>

            <tr style="border: 2px solid #000;">
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px; ">Sub TOTAL</td>
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px; "> Vat </td>
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; font-size: 10px; "> TOTAL</td>
            </tr>

            <tr style="border: 2px solid #000;">
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000;font-size: 10px; ">الاجمالى بدون ضريبة</td>
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000;font-size: 10px; "> اجمالى الضريبة </td>
                <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000;font-size: 10px; "> الاجمالى</td>
            </tr>
            <tr style="border: 2px solid #000;">
                <td style=" vertical-align: middle; text-align: center;border: 2px solid #000;font-size: 10px; ">{{ $total_before_tax }}</td>
                <td style="vertical-align: middle; text-align: center; border: 2px solid #000;font-size: 10px; "> {{ $total_tax }} </td>
                <td style=" vertical-align: middle; text-align: center;border: 2px solid #000;font-size: 10px; "> {{ $total_amount_after_tax }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div style="width: 100%; display: inline-block;height: 20px;"></div>

    <div style="float: right; width: 40%; display: inline-block"> </div>
    <div style="float:left ; width:60%; display: inline-block">
        <table style="font-size: 10px;border: 2px solid #000;">

            <tbody>
            <tr>
                <td class="ltr" style="vertical-align: middle; text-align: center">PAYMENT TERMS : الدفع شروط </td>
                <td class="ltr" style=" vertical-align: middle;text-align: center">15 DAYS</td>
            </tr>
            <tr>
                <td colspan="2" class="ltr" style="background: #d6d6d6;vertical-align: middle;font-size: 11px; text-align: center">VENDOR BANK ACCOUNT DETAILS FOR PAYMENT: الدفع لعملية المورد بنك تفاصيل
                </td>
            </tr>
            <tr>
                <td class="ltr" style=" vertical-align: middle;">BENIFICIARY NAME:</td>

                <td class="ltr" style=" vertical-align: middle;text-align: center"> INTERNATIONAL RECRUITMENT CORPORATION</td>

            </tr>
            <tr>

                <td class="ltr" style=" vertical-align: middle;">Branch Code </td>
                <td class="ltr" style=" vertical-align: middle;">21100</td>
            </tr>
            <tr>
                <td class="ltr" style=" vertical-align: middle;">LINRCO Bank ID</td>
                <td class="ltr" style=" vertical-align: middle;">20330372</td>
            </tr>
            <tr>
                <td class="ltr" style=" vertical-align: middle;">Account Number</td>
                <td class="ltr" style=" vertical-align: middle;">211608019800080</td>
            </tr>
            <tr>
                <td class="ltr" style=" vertical-align: middle;">IBAN</td>
                <td class="ltr" style="  vertical-align: middle;">SA11 8000 0211 6080 1980 0080</td>
            </tr>


            </tbody>
        </table>
    </div>
    <div style="width: 100%; display: inline-block;height: 20px;"></div>
    <br/>
    <br/>


    <table style=" border: none; line-height: 18px">
        <tbody>
        <tr>
            <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;font-weight: bold">Prepared By
            </td>
            <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;font-weight: bold">Checked By
            </td>
            <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;font-weight: bold"> Approved
                by
            </td>
        </tr>


        </tbody>
    </table>


</main>

</body>
</html>
