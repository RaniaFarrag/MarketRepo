
<style>

    th {
        text-align: center;
    }
</style>



<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center">  {{ trans('dashboard.Requests Report') }}</h1>
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
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Type') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Quantity') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Feedback') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.notes') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.nextfollow_date') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.request_status') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($requests_report as $report)
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
            <td style="text-align: center; border: 1px solid #000000">{{ trans('dashboard.'.$report->request_type) }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->quantity }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->notes) ? $report->notes[0]->feedback : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->notes) ? $report->notes[0]->note : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ count($report->notes) ? $report->notes[0]->next_follow_date : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $report->request_status ? $report->request_status : '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
