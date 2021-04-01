
<style>

    th {
        text-align: center;
    }
</style>



<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center">  {{ trans('dashboard.TEAM SALES LEAD REPORT') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#ffc50c;">{{ trans('dashboard.Sl.No') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Date') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Lead Source') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Lead status') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Contact Person') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Contact No') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Whatsapp') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Email') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Brochure status') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Category of Requirement') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Quantity') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Type of Service required') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Location') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Client Feedback') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Next FollowUp') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($reports as $report)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{$report->id}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->created_at->format('d/m/Y')}}</td>
            <td style="text-align: center; border: 1px solid #000000">Marketing-Hc</td>
            <td style="text-align: center; border: 1px solid #000000">
                @if($report->statue)
                    @if($report->statue == 1)
                        {{ trans('dashboard.Hot') }}
                    @elseif($report->statue == 2)
                        {{ trans('dashboard.Warm') }}
                    @elseif($report->statue == 3)
                        {{ trans('dashboard.Cold') }}
                    @elseif($report->statue == 4)
                        {{ trans('dashboard.Awarded') }}
                    @endif
                @else
                    -
                @endif
            </td>
            {{--<td style="text-align: center; border: 1px solid #000000"><a target="_blank" href="{{route('companies.show',$report->company)}}">{{$report->company->name?? '-'}}</a></td>--}}
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->name?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_name ?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_phone?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_mobile?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000"><a href="mailto:{{$report->company->company_representative_email ?? ''}}">{{$report->company->company_representative_email?? '-'}}</a></td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->brochurs_status?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->type_of_serves?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->quanity?? '-'}}</td>

            <td style="text-align: center; border: 1px solid #000000">{{$report->cat_of_req?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->city->name ?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->client_feeback?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->nextFollowUp?? '-'}}</td>

        </tr>
    @endforeach
    </tbody>
</table>
