
<style>

    th {
        text-align: center;
    }
</style>



<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="4"> <h1 style="width: 100%; text-align: center">  {{ trans('dashboard.VISITS REPORT') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Mother Company') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Date') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($reports as $report)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{ $report->user->mother_company_id == 1 ? trans('dashboard.linrco') : trans('dashboard.fnrco') }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->company->name }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$report->visit_date}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
