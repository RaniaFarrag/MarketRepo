<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Business Detail {{ $company->name }}</title>
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
            font-family: 'examplefont', sans-serif;
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

</head>


<body dir="rtl">

<htmlpageheader name="page-header">
    <header><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/head.jpg"></header>
</htmlpageheader>

<htmlpagefooter name="page-footer">

    <footer><img style="width: 100%" src="http://alwatnia.com.sa/demo/linrcopdf/foot.jpg"></footer>
</htmlpagefooter>
<main>
    <h3 class="en ltr"  style="text-align: center">Business Detail Report</h3>
    <table class="en ltr" style="line-height: 16px; border: none; direction: ltr">

        <tbody>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Vendor No: {{ $company->id }}</td>

        </tr>
        <tr>
            <td  class="en ltr" style="width: 50%;font-size: 12px; vertical-align: middle; border: none">General information about the company</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle;border: none;text-align: right;">Evaluation status:</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle;">
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
    <table class="en ltr" style="line-height: 14px; border: none; direction: ltr;  border-collapse: separate;border-spacing: 0 2px;">

        <tbody>



        <tr>
            <td colspan="1" class="en ltr" style="font-size: 12px; vertical-align: middle;width: 25%; border: none;">Company Name English :</td>
            <td colspan="3" class="en ltr" style="font-size: 12px;vertical-align: middle;width: 75%;">{{ $company->translate('en')->name }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Company Name Arabic :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->translate('ar')->name }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">whatsapp :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->whatsapp }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">ECN :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;background: #e6e6e6">ADC</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Tel :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">{{ $company->phone }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;">Vendor No:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">{{ $company->id }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Web :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->website }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">CR:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">10005493</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Activity:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->sector->name ? $company->sector->name : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Primary Country:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->country ? $company->country->name : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Ksa Bransh:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">Yes</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Social Media Info
                <img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->linkedin }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">
                <img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook"></td>
            </td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;background: #e6e6e6">{{ $company->facebook }}</td>
        </tr>
        </tbody>
    </table>
    <hr style="margin: 5px;"/>
    <h3 class="en ltr"  style="margin: 5px;">Designated Contacts</h3>

    <table class="en ltr" style="line-height: 14px; border: none; direction: ltr;  border-collapse: separate;border-spacing: 0 2px;">

        <tbody>

        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"><span style="padding: 10px; border: 1px solid;">&nbsp;1&nbsp;</span>
            </td>
            <td  style="font-size: 12px; vertical-align: middle; border: none"> </td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: center; text-indent: 50px"><span style="padding: 10px; border: 1px solid; padding: 5px !important;">&nbsp;2&nbsp;</span>
            </td>
            <td style="font-size: 12px; vertical-align: middle; border: none"> </td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Full Name:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->name : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Full Name:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->name : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Citizenship :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">Saudi Arabia</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Citizenship :</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">United kingdom</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Position:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->title ? $company->companyDesignatedcontacts[0]->title : '-' : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Position:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->title ? $company->companyDesignatedcontacts[1]->title : '-' : '-'}}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Email:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->email ? $company->companyDesignatedcontacts[0]->email : '-' : '-'}}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Email:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->email ? $company->companyDesignatedcontacts[1]->email : '-' : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Mobile:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->mobile ? $company->companyDesignatedcontacts[0]->mobile : '-' : '-'}}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Mobile:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->mobile ? $company->companyDesignatedcontacts[1]->mobile : '-' : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Telephone:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[0] ? $company->companyDesignatedcontacts[0]->whatsapp ? $company->companyDesignatedcontacts[0]->whatsapp : '-' : '-'}}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Telephone:</td>
            </td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">{{ $company->companyDesignatedcontacts[1] ? $company->companyDesignatedcontacts[1]->whatsapp ? $company->companyDesignatedcontacts[1]->whatsapp : '-' : '-'}}</td>
        </tr>
        {{--<tr>--}}
        {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Fax:</td>--}}
        {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left">00966559913188</td>--}}
        {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">Fax:</td>--}}
        {{--</td>--}}
        {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left">00966559913188</td>--}}
        {{--</tr>--}}
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> <img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right"> <img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin"></td>
            </td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> <img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">  <img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook"></td>
            </td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none"> <img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png" width="20" alt="whatsapp"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right">  <img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png" width="20" alt="whatsapp"></td>
            </td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">-</td>
        </tr>
        </tbody>
    </table>
    <hr style="margin: 5px;"/>
    <h3 class="en ltr"  style="margin: 5px;">Contract Manger</h3>

    <table class="en ltr" style="line-height: 14px; border: none; direction: ltr;  border-collapse: separate;border-spacing: 0 2px;">

        <tbody>

        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%">Full Name:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; width: 20%;">{{ $company->contract_manager_name ? $company->contract_manager_name : '-' }} </td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%;text-align: right">Mobile:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;width: 20%;"> {{ $company->contract_manager_mobile ? $company->contract_manager_mobile : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%;text-align: right;">Telephone:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;width: 20%;">{{ $company->contract_manager_phone ? $company->contract_manager_phone : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right;"><img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">-</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;text-align: right;"><img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6">-</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;text-align: right;"><img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png" width="20" alt="whatsapp"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; width: 20%">
                @if($company->contract_manager_whatsapp)
                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $company->contract_manager_whatsapp }}">
                        <i class="fab fa-whatsapp  text-success"></i>
                    </a>
                @else
                    -
                @endif

            </td>
        </tr>
        </tbody>
    </table>
    <h3 class="en ltr"  style="margin: 5px;">HR Manger</h3>

    <table class="en ltr" style="line-height: 14px; border: none; direction: ltr;  border-collapse: separate;
        border-spacing: 0 2px;">

        <tbody>

        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%">Full Name:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;width: 20%">{{ $company->hr_director_job_name ? $company->hr_director_job_name : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;width: 13.3%; text-align: right">Mobile:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;width: 20%"> {{ $company->hr_director_job_mobile ? $company->hr_director_job_mobile : '-' }}</td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: nonel;width: 13.3%;text-align: right">Telephone:</td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left;width: 20%"> {{ $company->hr_director_job_phone ? $company->hr_director_job_phone : '-' }}</td>
        </tr>
        <tr>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none; text-align: right;"><img src="https://image.flaticon.com/icons/png/512/174/174857.png" width="20" alt="linkedin"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6"></td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;text-align: right;"><img src="https://image.flaticon.com/icons/png/512/124/124010.png" width="20" alt="Facebook"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left; background: #e6e6e6"> </td>
            <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none;text-align: right; width: 20%"><img src="https://seeklogo.com/images/W/whatsapp-icon-logo-BDC0A8063B-seeklogo.com.png" width="20" alt="whatsapp"></td>
            <td  style="font-size: 12px;vertical-align: middle;text-align: left">@if($company->hr_director_job_whatsapp)
                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{ $company->hr_director_job_whatsapp }}">
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
        <table class="en ltr" style="line-height: 14px; border: none; direction: ltr;  border-collapse: separate;
            border-spacing: 0 2px; margin-top: 5px">
            <tbody>
            @foreach($sales_team_lead_reports as $k=>$salesLeadReport)
                <tr>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">{{ $k+1 }}</td>
                    <td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">Feedback: </td>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Date:</td>
                    <td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">{{ $salesLeadReport->created_at }}</td>
                    {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Time:</td>--}}
                    {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">11:00</td>--}}
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle;text-align: right; border: none">Next Feedback</td>
                    <td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Date:</td>
                    <td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">{{ $salesLeadReport->nextFollowUp }}</td>
                    {{--<td class="en ltr" style="font-size: 12px; vertical-align: middle; border: none">Time:</td>--}}
                    {{--<td  style="font-size: 12px;vertical-align: middle;text-align: left; border: none">11:00</td>--}}
                </tr>
                <tr>
                    <td colspan="11" style="font-size: 11px; vertical-align: middle;  border: none; text-align: left;">
                        {{ $salesLeadReport->client_feeback }}
                    </td>
                </tr>
                <tr>
                    <td colspan="11" style="font-size: 11px; vertical-align: middle;  border: 1px solid #d6d6d6; text-align: left; padding: 0px"></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endif


</main>
</body>
</html>
