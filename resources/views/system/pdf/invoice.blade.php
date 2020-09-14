<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>invoice </title>


    <style>

        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 20px 20px 0 20px;
            /*background: url("



        {{url('assets/letter.jpg')}}") center no-repeat 250% 100%;*/
        }

        main {
            height: 870px;
            display: block
        }

        td {
            padding: 4px;
            text-align: center;
            border: 1px solid #77697a;
            border-collapse: collapse;

            font-size: 14px !important;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            border: 3px solid #2196f3;
            /*   border-left: 3px solid #c00000;font-family: 'Lato', sans-serif;
             font-family: DejaVu Sans, sans-serif;*/
            /*border-bottom: 3px solid #c00000;*/
            /* border-right: 3px solid #c00000;*/
            font-size: 13px;
            padding: 15px 15px;
            letter-spacing: 0px;
            margin: 5px;
            text-align: left;
            font-family: 'examplefont2', sans-serif;

        }

        /*    .ar {
                font-family: 'examplefont', sans-serif;
            }
*/
        .en {
            font-family: 'examplefont2', sans-serif;
            direction: ltr;
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

        main {

            padding: 10px;
            position: relative
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
            height: 1cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0px;
            left: 0cm;
            right: 0cm;
        }


    </style>
</head>


<body dir="ltr">
<div class="page1 en ltr">
    <header>

        <img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg">

    </header>
    <main>
        <h3 style="text-align: center; width: 100%; background: #d6d6d6">INVOICE</h3>
        <table style=" border: none;">
            <tbody>
            <tr>
                <td style="text-align:right;padding-right: 10px;border: none;">INVOICE NO.  0001</td>
            </tr>
            <tr>
                <td style="text-align:right;padding-right: 10px;border: none;">Date : 5/11/2020</td>
            </tr>
            <tr><td style="text-align:left;border: none; font-weight: bold;">Billed To: Recruitment Dept</td></tr>
            <tr><td style="text-align:left;border: none; font-weight: bold;">M/s.First National Recruitment Company</td></tr>
            <tr><td style="text-align:left;border: none; font-weight: bold;">Omar Bin Abdul Aziz Road, Al Malaz </td></tr>
            <tr><td style="text-align:left;border: none; font-weight: bold;">Riyadh -11371, KSA</td></tr>
            <tr><td style="text-align:left;border: none; font-weight: bold;">Phone : +966-112457248</td></tr>
            </tbody>
        </table>
        <br/>

        <table style="font-size: 12px;">

            <tbody>
            <tr>
                <td rowspan="2" colspan="2" style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; width: 50%;">P A R T I C U L A R S</td>
                <td   style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; width: 12.5%;">Visa Stamping</td>
                <td   style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; width: 12.5%;">Insurance Fee</td>
                <td  style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; width: 12.5%;">Recruitment Charges</td>
                <td   style="background: #d6d6d6; vertical-align: middle; text-align: center; font-weight: bold; width: 12.5%;">Total</td>
            </tr>
            <tr>
                <td style="vertical-align: middle; text-align: center;">Amt $</td>
                <td style="vertical-align: middle; text-align: center;">Amt $</td>
                <td style="vertical-align: middle; text-align: center;">Amt $</td>
                <td style="vertical-align: middle; text-align: center;">Amt $</td>
            </tr>

            <tr>
                <td style="width: 5%;">1</td>
                <td style="text-align: left;">Shiela Mae Cortez</td>
                <td>550.00</td>
                <td>144.00</td>
                <td>144.00</td>
                <td>694.00</td>
            </tr>
            <tr>
                <td style="width: 5%;">2</td>
                <td style="text-align: left;">Shiela Mae Cortez</td>
                <td>550.00</td>
                <td>144.00</td>
                <td>144.00</td>
                <td>694.00</td>
            </tr>
            <tr>
                <td style="width: 5%;">3</td>
                <td style="text-align: left;">Shiela Mae Cortez</td>
                <td>550.00</td>
                <td>144.00</td>
                <td>144.00</td>
                <td>694.00</td>
            </tr>
            <tr>
                <td style="width: 5%;">4</td>
                <td style="text-align: left;">Shiela Mae Cortez</td>
                <td>550.00</td>
                <td>144.00</td>
                <td>144.00</td>
                <td>694.00</td>
            </tr>
            <tr>
                <td style="width: 5%;">5</td>
                <td style="text-align: left;">Shiela Mae Cortez</td>
                <td>550.00</td>
                <td>144.00</td>
                <td>144.00</td>
                <td>694.00</td>
            </tr>
            <tr>
                <td style="width: 5%;">-</td>
                <td style="text-align: left;">-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td style="width: 5%;">-</td>
                <td style="text-align: left;">-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td style="width: 5%;">-</td>
                <td style="text-align: left;">-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td style="width: 5%;">-</td>
                <td style="text-align: left;">-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: left;">Total</td>
                <td>2750.00</td>
                <td>720.00</td>
                <td>-</td>
                <td>3470.00</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: center;">Amount in words: (US Dollars Three thousand four Hundred Seventy only)</td>

            </tr>
            </tbody>
        </table>
        <p>
            <strong>Terms & Conditions:-</strong><br/>

            * Total payment is due in Net 30 days<br/>
            * All the payment should be in favour of <strong>“LEADING INTERNATIONAL RECURITMENT CORPORATION”</strong><br/>
            * Please mention Invoice Number in all your Payment transections<br/>
            * The exchange rate applicabale according to the payment date<br/>
        </p>
        <br/>
        <table style=" border: none;">
            <tbody>
            <tr>
                <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;">Prepared By </td>
                <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;">Checked By</td>
                <td style="text-align:center;border: none; vertical-align: middle;text-decoration: underline;"> Approved by</td>
            </tr>


            </tbody>
        </table>


    </main>
    <footer>

        <img src="http://alwatnia.com.sa/demo/linrcopdf/foot.jpg" width="100%"/>

    </footer>
</div>

</body>
</html>
