<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
@if (app()->getLocale() == 'ar')

    <html lang="ar" dir="rtl">

    @else

        <html lang="en" dir="ltr">


        @endif
        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>{{ $need->id}} NEED {{ $need->company->name }}</title>

            @if (app()->getLocale() == 'ar')

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
                        font-family: 'examplefont2', sans-serif;
                        direction: ltr;
                    }

                    td {
                        padding: 2px 5px;
                        text-align: right;
                        border: 1px solid #77697a;
                        border-collapse: collapse;
                        font-size: 14px !important;
                    }
                    tr td:first-child {text-align: right !important;}

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


                    table.table_need tr td:first-child {
                        text-align: right; background: #000;
                        width: 40%;
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
                        text-align: left;
                        border: 1px solid #77697a;
                        border-collapse: collapse;
                        font-size: 14px !important;
                    }
                    tr td:first-child {text-align: right !important;}

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


                    .first{
                        text-align: right; background: #000;
                        width: 40%;
                    }

                </style>


            @endif


        </head>


        @if (app()->getLocale() == 'ar')

            <body class="ar">

            @else

                <body class="en ltr">


                @endif

                <htmlpageheader name="page-header">
                    <header><img style="width: 100%" src="{{ asset('dashboard/assets/fhead.jpg') }}"></header>
                </htmlpageheader>

                <htmlpagefooter name="page-footer">

                    <footer><img style="width: 100%" src="{{ asset('dashboard/assets/ffoot.jpg') }}"></footer>
                </htmlpagefooter>

                <main>
                    <h3 style="text-align: center"> {{ trans('dashboard.Needs') }} {{ $need->company->name }}</h3>
                    <table style="line-height: 24px; border: none;">
                        <tbody>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Ref No') }}</td>
                            <td>{{ $need->id}}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Date') }}</td>
                            <td>{{ $need->created_at->format('d-m-Y')}}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Client Name') }}</td>
                            <td>{{ $need->company->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Sector') }} </td>
                            <td>{{ $need->company->sector->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Recruitment Type') }}</td>
                            <td>
                                @if($need->employment_type_id)
                                    {{ app()->getLocale() == 'ar' ? $need->employmentType->name : $need->employmentType->name_en }}
                                @endif
                                {{--{{ $employeement_type->id }}--}}                   {{--{{ employeement type Here }}--}}
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Contract Duration') }}</td>
                            <td>{{ $need->contract_duration }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Required Position') }} </td>
                            <td>{{ $need->required_position }}</td>
                        </tr>

                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Job Description') }}</td>
                            <td>{!! $need->job_description !!}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.No of candidates') }}</td>
                            <td>{{ $need->candidates_number }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Nationality') }}</td>
                            <td>{{ $need->country->name }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Gender') }}</td>
                            <td>                     {{--{{ Add 3 options }}--}} {{--{{ Add both }}--}}
                                {{ $need->gender == 1 ? trans('dashboard.Male') : trans('dashboard.Female')  }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Age Limit') }}</td>
                            <td>{{ $need->minimum_age }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Experience Range') }}</td>
                            <td>{{ $need->experience_range }}</td>
                        </tr>

                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Total Salary') }}</td>
                            <td>{{ $need->total_salary }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Work Location') }}</td>
                            <td>{{ $need->work_location }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Working Hours') }}</td>
                            <td>{{ $need->work_hours }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;">{{ __('dashboard.Deadline') }}</td>
                            <td>{{ $need->deadline }}</td>
                        </tr>
                        <tr>
                            <td style="width: 30%; background-color: #d7d7d7;"><strong>{{ __('dashboard.Special Remarks') }}</strong></td>
                            <td>{{ $need->special_note }}</td>
                        </tr>
                        </tbody>
                    </table>


                </main>
                <span style="position:absolute; bottom: 70px; right: 0; left: 0; width: 100% !important; background: #000;z-index: 200;display:block">
    <table style="line-height: 24px; border: none; text-align: center ">
        <tbody>
        <tr>
            <td style="border: none;text-align: center">{{ __('dashboard.BY') }}
                :
                @if($need->user)
                    {{ app()->getLocale() == 'ar' ? $need->user->name : $need->user->name_en }}
                @else
                    -
                @endif
            </td>
            <td style="border: none;text-align: center">{{ __('dashboard.Date') }}
                : {{ $need->created_at->format('d-m-Y')}}</td>
        </tr>
        </tbody>
    </table>
</span>
                </body>
        </html>
