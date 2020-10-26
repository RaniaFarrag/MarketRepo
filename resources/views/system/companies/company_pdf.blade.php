<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
@if (app()->getLocale() == 'ar')

    <html lang="ar" dir="rtl">
    @else
        <html lang="en" dir="ltr">
        @endif


        <head>
            <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
            <title>{{ trans('dashboard.Business Detail') }} {{ $company->name }}</title>
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
                        font-family: 'examplefont3', sans-serif;
                    }

                    .en {
                        font-family: 'examplefont3', sans-serif;
                        direction: ltr;
                    }

                    td {
                        padding: 2px 5px;
                        text-align: right;
                        border: 1px solid #77697a;
                        border-collapse: collapse;
                        font-size: 14px !important;
                    }

                    .ltr {
                        direction: rtl;
                        text-align: right;
                    }
                    .rtl {
                       text-align: left;
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
                        text-align: left;
                        border: 1px solid #77697a;
                        border-collapse: collapse;
                        font-size: 14px !important;
                    }

                    .ltr {
                        direction: ltr;
                        text-align: left
                    }
                    .rtl {
                        text-align: right;
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
            <header><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg"></header>
        </htmlpageheader>

        <htmlpagefooter name="page-footer">

            <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/foot.jpg"></footer>
        </htmlpagefooter>

        <main>
            <h3 class="en ltr" style="text-align: center">{{ trans('dashboard.Business Detail Report') }}</h3>
            <table class="en ltr" style="line-height: 16px; border: none;">

                <tbody>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Vendor No') }} : {{ $company->id }}</td>

                </tr>
                <tr>
                    <td class="en ltr" style="width: 60%;font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.General information about the company') }}
                    </td>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;border: none;width: 15%;">
                        {{ trans('dashboard.Evaluation status') }} :
                    </td>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;width: 25%;">
                        @if($company->evaluation_status)
                            @if($company->evaluation_status == 1)
                                A
                            @elseif($company->evaluation_status == 2)
                                B
                            @elseif($company->evaluation_status == 3)
                                C
                            @endif
                        @else
                            -

                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="en ltr" style="line-height: 14px; border: none;border-collapse: separate;border-spacing: 0 2px;">

                <tbody>


                <tr>
                    <td colspan="1" class="en ltr"
                        style="font-size: 12px; vertical-align: middle;width: 25%; border: none;"> {{ trans('dashboard.Company Name English') }} :
                    </td>
                    <td colspan="3" class="en ltr" style="font-size: 12px;vertical-align: middle;width: 75%;">{{ $company->translate('en')->name }}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Company Name Arabic') }}
                        :
                    </td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;">{{ $company->translate('ar')->name }}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Whatsapp') }}  :
                    </td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;">{{ $company->whatsapp }}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.ECN') }} :</td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;background: #e6e6e6">{{ $company->ecn }}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Tel') }}  :
                    </td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;">{{ $company->phone }}</td>
                </tr>
                <tr>

                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Country') }}:
                    </td>
                    <td class="ltr" style="font-size: 12px;vertical-align: middle">{{ $company->country ? $company->country->name : '-' }}</td>


                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Website') }} :
                    </td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;">{{ $company->website }}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;"> {{ trans('dashboard.Location') }}  :</td>
                    <td class="ltr" style="font-size: 12px;vertical-align: middle;"> {{ $company->city ? $company->city->name : '-' }}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Sector') }} :
                    </td>
                    <td class="en ltr" style="font-size: 12px;vertical-align: middle;">{{ $company->sector->name ? $company->sector->name : '-' }}</td>
                </tr>
                <tr>

                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.CR') }}:</td>
                    <td class="en ltr"  style="font-size: 12px;vertical-align: middle; background: #e6e6e6">{{ $company->cr }}
                    </td>

                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none; ">
                        {{ trans('dashboard.Ksa Branch') }} :
                    </td>
                    <td class="en ltr"  style="font-size: 12px;vertical-align: middle;background: #e6e6e6">
                        @if($company->ksa_branch == 1)
                            {{ trans('dashboard.yes') }}
                        @else
                            {{ trans('dashboard.No') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class=""  style="font-size: 12px; vertical-align: middle; border: none">
                        <img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin">
                    </td>
                    <td class="en ltr"  style="font-size: 12px;vertical-align: middle;">{{ $company->linkedin ? $company->linkedin : '-'}}</td>
                    <td class="rtl"  style="font-size: 12px; vertical-align: middle; border: none; ">
                        <img src="https://picklefeetgames.com/wp-content/uploads/2018/12/twitter-app-icon-transparent-17-2-300x300.png" width="20" alt="twitter">
                    </td>
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ $company->twitter ? $company->twitter : '-' }}</td>
                </tr>
                </tbody>
            </table>
            <hr style="margin: 5px;"/>
            <h3 class="en ltr" style="margin: 5px;">{{ trans('dashboard.Designated contact') }}</h3>

            <table style="line-height: 14px; border: none;  border-collapse: separate;border-spacing: 0 2px;">

                <tbody>

                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"><span style="padding: 10px; border: 1px solid;">&nbsp;1&nbsp;</span>
                    </td>
                    <td style="font-size: 12px; vertical-align: middle; border: none"></td>
                    <td class="rtl"  style="font-size: 12px; vertical-align: middle; border: none; text-align: center; text-indent: 50px">
                        <span style="padding: 10px; border: 1px solid; padding: 5px !important;">&nbsp;2&nbsp;</span>
                    </td>
                    <td style="font-size: 12px; vertical-align: middle; border: none"></td>
                </tr>
                <tr>
                    <td class="" style="font-size: 12px; vertical-align: middle; border: none; width: 20% ">{{ trans('dashboard.Name') }}:</td>
                    <td class="" style="font-size: 12px;vertical-align: middle;width: 30% ">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->name ? $company->companyDesignatedcontacts[0]->name : '-' : '-'}}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;width: 20% ">
                        {{ trans('dashboard.Name') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 30% ">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->name ? $company->companyDesignatedcontacts[1]->name : '-' : '-'}}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> {{ trans('dashboard.citizenship') }} :</td>
                    <td style="font-size: 12px;vertical-align: middle;text-align: left">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->citizenship ? $company->companyDesignatedcontacts[0]->citizenship : '-' : '-'}}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none; ">
                        {{ trans('dashboard.citizenship') }} :
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->citizenship ? $company->companyDesignatedcontacts[1]->citizenship : '-' : '-'}}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> {{ trans('dashboard.Job Title') }} :</td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->job_title ? $company->companyDesignatedcontacts[0]->job_title : '-' : '-' }}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Job Title') }} :
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->job_title ? $company->companyDesignatedcontacts[1]->job_title : '-' : '-'}}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Email') }} :</td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->email ? $company->companyDesignatedcontacts[0]->email : '-' : '-'}}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none; ">
                        {{ trans('dashboard.Email') }} :
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->email ? $company->companyDesignatedcontacts[1]->email : '-' : '-' }}</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> {{ trans('dashboard.Mobile') }} :</td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->mobile ? $company->companyDesignatedcontacts[0]->mobile : '-' : '-'}}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        {{ trans('dashboard.Mobile') }} :
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->mobile ? $company->companyDesignatedcontacts[1]->mobile : '-' : '-' }}</td>
                </tr>
            {{--    <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Telephone:</td>
                    <td style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->whatsapp ? $company->companyDesignatedcontacts[0]->whatsapp : '-' : '-'}}</td>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">
                        Telephone:
                    </td>
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->whatsapp ? $company->companyDesignatedcontacts[1]->whatsapp : '-' : '-'}}</td>
                </tr>--}}

                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"><img
                                src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin">
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">-</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none; ">
                        <img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin">
                    </td>
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">-</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"><img
                                src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook">
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">-</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        <img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook">
                    </td>
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">-</td>
                </tr>
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"><img
                                src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png"
                                width="20" alt="whatsapp"></td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[0]->whatsapp ? $company->companyDesignatedcontacts[0]->whatsapp : '-' : '-'}}</td>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none; ">
                        <img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png"
                             width="20" alt="whatsapp"></td>
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;">{{ count($company->companyDesignatedcontacts) ? $company->companyDesignatedcontacts[1]->whatsapp ? $company->companyDesignatedcontacts[1]->whatsapp : '-' : '-'}}</td>
                </tr>
                </tbody>
            </table>
            <hr style="margin: 5px;"/>
            <h3 class="en ltr" style="margin: 5px;">{{ trans('dashboard.Contract Manager') }}</h3>

            <table style="line-height: 14px; border: none; border-collapse: separate;border-spacing: 0 2px;">

                <tbody>

                <tr>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%">
                        {{ trans('dashboard.Name') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle; width: 20%;">{{ $company->contract_manager_name ? $company->contract_manager_name : '-' }} </td>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%;">
                        {{ trans('dashboard.Mobile') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 20%;"> {{ $company->contract_manager_mobile ? $company->contract_manager_mobile : '-' }}</td>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%;">
                        {{ trans('dashboard.Phone') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 20%;">{{ $company->contract_manager_phone ? $company->contract_manager_phone : '-' }}</td>
                </tr>
                <tr>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: none;"><img
                                src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin">
                    </td>
                    <td style="font-size: 12px;vertical-align: middle; background: #e6e6e6">{{ $company->contract_manager_linkedin }}</td>

                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;">
                        <img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png"
                             width="20" alt="whatsapp"></td>
                    <td style="font-size: 12px;vertical-align: middle; width: 20%">
                        @if($company->contract_manager_whatsapp)
                            <a target="_blank"
                               href="https://api.whatsapp.com/send?phone={{ $company->contract_manager_whatsapp }}">
                                <i class="fab fa-whatsapp  text-success"></i>
                            </a>
                        @else
                            -
                        @endif

                    </td>
                </tr>
                </tbody>
            </table>
            <h3 class="en ltr" style="margin: 5px;"> {{ trans('dashboard.HR Director') }}</h3>

            <table style="line-height: 14px; border: none; border-collapse: separate;
        border-spacing: 0 2px;">

                <tbody>

                <tr>
                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%">
                        {{ trans('dashboard.Name') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 20%">{{ $company->hr_director_job_name ? $company->hr_director_job_name : '-' }}</td>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%; ">
                        {{ trans('dashboard.Mobile') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 20%"> {{ $company->hr_director_job_mobile ? $company->hr_director_job_mobile : '-' }}</td>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: nonel;width: 13.3%;">
                        {{ trans('dashboard.Phone') }}:
                    </td>
                    <td style="font-size: 12px;vertical-align: middle;width: 20%"> {{ $company->hr_director_job_phone ? $company->hr_director_job_phone : '-' }}</td>
                </tr>
                <tr>
                    <td class="rtl"
                        style="font-size: 12px; vertical-align: middle; border: none;"><img
                                src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin">
                    </td>
                    <td style="font-size: 12px;vertical-align: middle; background: #e6e6e6">{{ $company->contract_manager_linkedin }}</td>

                    <td class="rtl" style="font-size: 12px; vertical-align: middle; border: none;width: 20%"><img
                                src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png"
                                width="20" alt="whatsapp"></td>
                    <td style="font-size: 12px;vertical-align: middle;">@if($company->hr_director_job_whatsapp)
                            <a target="_blank"
                               href="https://api.whatsapp.com/send?phone={{ $company->hr_director_job_whatsapp }}">
                                <i class="fab fa-whatsapp  text-success"></i>
                            </a>
                        @else
                            -
                        @endif</td>
                </tr>
                </tbody>
            </table>
            <hr style="margin: 5px;"/>
            @if(count($sales_team_lead_reports))
                <table style="line-height: 14px; border: none; border-collapse: separate;
            border-spacing: 0 2px; margin-top: 5px">
                    <tbody>
                    @foreach($sales_team_lead_reports as $k=>$salesLeadReport)
                        <tr>
                            <td class="en ltr"
                                style="font-size: 12px; vertical-align: middle; border: none">{{ $k+1 }}</td>
                            <td style="font-size: 12px;vertical-align: middle;border: none">
                                {{ trans('dashboard.Client Feedback') }}:
                            </td>
                            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Date') }}:</td>
                            <td style="font-size: 12px;vertical-align: middle; border: none">{{ $salesLeadReport->created_at }}</td>
                            {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Time:</td>--}}
                            {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">11:00</td>--}}
                            <td class="rtl"
                                style="font-size: 12px; vertical-align: middle;border: none">{{ trans('dashboard.nextFollowUp') }}
                            </td>
                            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ trans('dashboard.Date') }}:</td>
                            <td style="font-size: 12px;vertical-align: middle; border: none">{{ $salesLeadReport->nextFollowUp }}</td>
                            {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Time:</td>--}}
                            {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">11:00</td>--}}
                        </tr>
                        <tr>
                            <td colspan="11"
                                style="font-size: 11px; vertical-align: middle;  border: none; ">
                                {{ $salesLeadReport->client_feeback }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="11"
                                style="font-size: 11px; vertical-align: middle;  border: 1px solid #d6d6d6;  padding: 0px"></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif


        </main>
        </body>
        </html>
