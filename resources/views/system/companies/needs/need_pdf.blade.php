<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NEED</title>
    <style>
        @page {
            margin: 110px 20px;
            header: page-header;
            footer: page-footer;
        }

        body {
            font-size: 13px;
            letter-spacing: 0px; position: relative;
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

    @if(app()->getLocale() == 'en')


    @elseif(app()->getLocale() == 'ar')

    @endif

</head>


<body class="en ltr">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg"></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">

    <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/foot.jpg"></footer>
</htmlpagefooter>

<main>
    <table style="line-height: 24px; border: none;">
        <tbody>
        <tr>
            <td>{{ __('dashboard.Ref No') }} :</td>
            <td>111</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Date') }}:</td>
            <td>20/09/03</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Client Name') }}:</td>
            <td>مستشارك طب الأسنان المتقدم - ADVANCED DENTAL CARE</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Sector') }} :</td>
            <td>نفط وغاز- oil and gas</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Recruitment Type') }} :</td>
            <td>محلي - local</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Contract Duration') }} :</td>
            <td>2 years</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.RequiredPosition') }} </td>
            <td>Service/Kitchen Crew</td>
        </tr>

        <tr>
            <td>{{ __('dashboard.JobDescription') }}</td>
            <td> dsad asdas das dasas- شسيشسيسي شس يشسي شسي</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.No of candidates') }}</td>
            <td> 20</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Nationality') }}</td>
            <td>Philippines - فلبينى</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Gender') }}</td>
            <td>male - ذكور</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Age Limit') }}</td>
            <td>25</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Educational Qualification') }}</td>
            <td>سيشس ي- asdasdasd</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Data Flow') }}</td>
            <td>مطلوبه من داخل المملكة - Required from inside the Kingdom</td>
        </tr>

        <tr>
            <td>{{ __('dashboard.International Experience') }}</td>
            <td>3-5 years</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Area of Expertise') }}</td>
            <td>Riyadh</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Total Salary') }}</td>
            <td>1800</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Working Hours') }}</td>
            <td>8</td>
        </tr>
        <tr>
            <td>{{ __('dashboard.Deadline') }}</td>
            <td>Sep 20</td>
        </tr>
        <tr>
            <td><strong>{{ __('dashboard.Special Remarks') }}</strong></td>
            <td>-</td>
        </tr>
        </tbody>
    </table>






</main>
<span style="position:absolute; bottom: 70px; right: 0; left: 0; width: 100% !important; background: #000;z-index: 200; background: red; display:block">  <table style="line-height: 24px; border: none; ">
        <tbody>
        <tr>
            <td style="border: none;">{{ __('dashboard.BY') }} : hussein.saleh</td>
            <td style="border: none;">{{ __('dashboard.Date') }} : 20/09/03</td>
        </tr>
        </tbody>
    </table></span>
</body>
</html>
