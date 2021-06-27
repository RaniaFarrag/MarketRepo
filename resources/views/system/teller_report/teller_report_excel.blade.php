
<style>

    th {
        text-align: center;
    }
</style>



<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center">  {{ trans('dashboard.Teller REPORT') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#ffc50c;">{{ trans('dashboard.id') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Date Call') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Time Call') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Teller') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Mother Company') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Date Meeting') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Time Meeting') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Call Feedback') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($teller_reports as $report)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{ $report->id }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->date_call }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->time_call }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->mother_company_id == 1 ? trans('dashboard.linrco') : trans('dashboard.fnrco') }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ app()->getLocale() == 'ar' ? $report->representative->name : $report->representative->name_en}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->company ? $report->company->name : '' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->date_meeting }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->time_meeting }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->feedback }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
