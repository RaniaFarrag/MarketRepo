
<style>

    th {
        text-align: center;
    }
</style>



<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center">  {{ trans('dashboard.Sales Pipeline Report') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#ffc50c;">{{ trans('dashboard.id') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Date') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Representative') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Mother Company') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Class') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.total_volume') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.contract_type') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Sector') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Forecast') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.comments') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.project closing Month') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($sales_pipeline_report as $k=>$report)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{ $report->id }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->date }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ app()->getLocale() == 'ar' ? $report->MotherCompany->name : $report->MotherCompany->name_en }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->company ? $report->company->name : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">
                @if($report->status)
                    @if($report->status == 1) A
                    @elseif($report->status == 2) B
                    @elseif($report->status == 3) C
                    @endif
                @else
                    {{ '-' }}
                @endif
            </td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->history) ? $report->history[0]->total_volume : '-'  }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->contract_type }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->company->sector->name }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->history) ? $report->history[0]->forecast : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->history) ? $report->history[0]->comments : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->history) ? $report->history[0]->project_closing_month.' '.$report->history[0]->project_closing_year
                    : '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
