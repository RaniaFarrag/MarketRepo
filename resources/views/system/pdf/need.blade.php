<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
{{--
@if (app()->getLocale() == 'ar')
<html lang="en" dir="rtl">
@else
<html lang="en" dir="ltr">
@endif--}}
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>NEED</title>


    <style>
        @page {
            margin: 20px 20px 0 20px;
        }

        main {
            height: 870px;
            display: block; position: relative;
        }

        td {
            padding: 4px;
            text-align: center;
            border: 1px solid #77697a;
            border-collapse: collapse;

            font-size: 14px !important;
        }

        body.ar {
            font-family: 'examplefont', sans-serif;
        }

        body {
            border: 3px solid #2196f3;
            font-size: 13px;
            padding: 15px 15px;
            letter-spacing: 0px;
            margin: 5px;
        }

        .ar {
            font-family: 'examplefont', sans-serif;
        }

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

        footer {
            position: fixed;
            bottom: 0px;
            left: 0cm;
            right: 0cm;
        }


    </style>
</head>
{{--
@if (app()->getLocale() == 'ar')
    <body dir="rtl" class="ar">
@else
    <body dir="ltr" class="en ltr">
@endif--}}

<body dir="rtl" class="ar">

<div class="page1">
    <header>
        <img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg">
    </header>

    <main>
        {{--
        @if (app()->getLocale() == 'ar')
             <table class="ar" style="line-height: 24px; border: none;">
        @else
            <table class="en" style="line-height: 24px; border: none;">
        @endif--}}
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

        <br>
        <table style="line-height: 24px; border: none; ">
            <tbody>
            <tr>
                <td style="border: none;">{{ __('dashboard.BY') }} : hussein.saleh</td>
                <td style="border: none;">{{ __('dashboard.Date') }} : 20/09/03</td>
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
