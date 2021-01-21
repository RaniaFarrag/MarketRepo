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
    <table style=" border: none;width: 100%">
        <tbody>

        <tr>
            <td style="text-align:left;border: none; font-weight: bold;">Client Name:</td>
            <td style="text-align:left;border: none; font-weight: bold;"> Recruitment Dept (Diaverum)</td>
            <td style="text-align:left;border: none; font-weight: bold;width: 5%"> </td>
            <td style="text-align:left;border: none; font-weight: bold;">Contact Number</td>
            <td style="text-align:left;border: none; font-weight: bold;">00000000000</td>
        </tr>
        <tr>
            <td style="text-align:left;border: none; font-weight: bold;">Email Address:</td>
            <td style="text-align:left;border: none; font-weight: bold;">aaa@aaa.com</td>
            <td style="text-align:left;border: none; font-weight: bold;"> </td>
            <td style="text-align:left;border: none; font-weight: bold;">Attn:</td>
            <td style="text-align:left;border: none; font-weight: bold;">Contract Ref No:</td>

        </tr>
        <tr>
            <td style="text-align:left;border: none; font-weight: bold;">Contract Ref No:</td>
            <td style="text-align:left;border: none; font-weight: bold;">00000000000</td>
            <td style="text-align:left;border: none; font-weight: bold;"> </td>
            <td style="text-align:left;border: none; font-weight: bold;">Quotation No:</td>
            <td style="text-align:left;border: none; font-weight: bold;">12</td>

        </tr>
        <tr>
            <td style="text-align:left;border: none; font-weight: bold;">Annexure Number:</td>
            <td style="text-align:left;border: none; font-weight: bold;">00000000000</td>
            <td style="text-align:left;border: none; font-weight: bold;"> </td>
            <td style="text-align:left;border: none; font-weight: bold;">Invoice Number:</td>
            <td style="text-align:left;border: none; font-weight: bold;">12</td>

        </tr>


        </tbody>
    </table>
    <br/>
    <table style="font-size: 12px;border: none;">

        <tbody>
        <tr style="border: none;">
            <td colspan="5" style="  vertical-align: middle; text-align: center; border: none; font-size: 11px  ">Please
                find hereunder our Recruitment Fees services as agreed:
            </td>
        </tr>
        </tbody>
    </table>
    <table style="font-size: 12px;border: 2px solid #000;">

        <tbody>

        <tr style="border: 2px solid #000;">
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;line-height: 18px;border: 2px solid #000;">Sector</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; border: 2px solid #000;">Particulars</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; ">Recruitment Fee</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; ">Visa processing fee</td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; ">Total </td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; "> Vat </td>
            <td style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold;border: 2px solid #000; "> Grand total</td>
        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>
        <tr>
            <td style="text-align: left;">Health Care</td>
            <td>NURSE NURSE</td>
            <td>500</td>
            <td>5000</td>
            <td>5500</td>
            <td>550</td>
            <td style="border: 2px solid #000;">650</td>

        </tr>


        <tr style="border: 2px solid #000;">
            <td style="text-align: center; font-weight: bold; font-size: 14px;border: 2px solid #000;">Total</td>
            <td colspan="5" style="text-align: center;border: 2px solid #000;">Fifty Eight Thousand Nine Hundred Forty Four Riyals and No
                Halalas
            </td>
            <td style="text-align: center;font-weight: bold;border: 2px solid #000;">58944.00</td>
        </tr>

        </tbody>
    </table>
    <table style="font-size: 12px;border: none;">

        <tbody>
        <tr style="border: none;">
            <td colspan="5" style="  vertical-align: middle; text-align: center; border: none; font-size: 11px  ">You are kindly requested to transfer the above stated amount in Saudi Riyals to the following account:
            </td>
        </tr>
        </tbody>
    </table>

    <br/>
    <table  style=" border: none;">
        <tbody>
        <tr>
            <td class="ltr" style="vertical-align: middle;">Client </td>
            <td class="ltr" style=" vertical-align: middle;">LEADING INTERNATIONAL RECRUITMENT CORPORATION</td>
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
    <br/>
    <p class="en ltr" style="line-height: 18px;border: 1px solid #000; padding: 5px 2px;font-size: 12px;">
        <strong style="text-decoration: underline;">Terms & Conditions:-</strong><br/>

        <br/> 1.	50% of the agreed invoice amount to be paid by the Second party upon visa stamping.
        <br/>        2.	The remaining 50% of the agreed invoiced amount to be paid by the Second party once the Joining ticket is issued to the respective candidate, before their arrival in KSA
        <br/>  3.	The Dataflow, Prometric, Classification and document attestation fees will be shouldered by the candidates initially in their home country and then the same will be reimbursed by the Second party directly to the Candidates after their Arrival.
        <br/>   4.	It is hereby agreed that all Fees mentioned in the Recruitment Agreement are not of Taxes and are VAT exclusive.
        <br/>    5.	In the case of applying (VAT) value-added tax, the fees stipulated in the employment agreement will not be subject to any deductions, and it is not permissible to impose a withholding tax, and in the event that any tax is applied in the future, it shall be borne by the second party alone.
        <br/>   6.	All the payments shall be made within fifteen (15) days upon receipt of the invoice generated by the First party.
        <br/>   7.	It is hereby agreed that an electronic copy of invoice sent by the First party is considered official and sufficient to effect payment collection.

    </p>
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
