
<style>

    th {
        text-align: center;
    }
</style>
<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Sl.No') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Date') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Lead Source') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Lead status') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Contact Person') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Contact No') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Whatsapp') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Email') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Brochure status') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Category of Requirement') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Quantity') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Type of Service required') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Company Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Location') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Client Feedback') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Next FollowUp') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($reports as $report)
        <tr>
            <td style="text-align: center; border: 1px solid #000000">{{$report->id}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->created_at->format('d/m/Y')}}</td>
            <td style="text-align: center; border: 1px solid #000000">Marketing-Hc</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->statue?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000"><a target="_blank" href="{{route('companies.show',$report->company)}}">{{$report->company->name?? '-'}}</a></td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_name ?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_job_phone?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->company_representative_job_mobile?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000"><a href="mailto:{{$report->company->company_representative_job_email}}">{{$report->company->company_representative_job_email?? '-'}}</a></td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->brochurs_status?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->cat_of_req?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->quanity?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->type_of_serves?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->user->name}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->company->city->name ?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->client_feeback?? '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->nextFollowUp?? '-'}}</td>

        </tr>
    @endforeach
    </tbody>
</table>
