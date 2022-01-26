<table class="table table-bordered text-center">
    <thead>
    <tr>
{{--        <th>#</th>--}}
        <th>{{ trans('dashboard.id') }}</th>
        <th>{{ trans('dashboard.date') }}</th>
        <th>{{ trans('dashboard.Representative') }}</th>
        <th>{{ trans('dashboard.Mother Company') }}</th>
        <th>{{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Company Class') }}</th>
        <th>{{ trans('dashboard.Total Volume') }}</th>
        <th>{{ trans('dashboard.contract_type') }}</th>
        <th>{{ trans('dashboard.Sector') }}</th>
        <th>{{ trans('dashboard.Forecast') }}</th>
        <th>{{ trans('dashboard.comments') }}</th>
        <th>{{ trans('dashboard.project closing Month') }}</th>
        <th>{{ trans('dashboard.show') }}</th>
        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
            <th>{{ trans('dashboard.edit') }}</th>
        @endif

    </tr>
    </thead>

    <tbody>
    @foreach($sales_pipeline_report as $k=>$report)
        <tr>
{{--            <td>{{ $k+1 }}</td>--}}
            <td>{{ $report->id }}</td>
            <td>{{ $report->date }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $report->motherCompany->name : $report->motherCompany->name_en }}</td>
            <td>{{ $report->company ? $report->company->name : '-'}}</td>
            <td>
                @if($report->status)
                    @if($report->status == 1) A
                    @elseif($report->status == 2) B
                    @elseif($report->status == 3) C
                    @endif
                @else
                    {{ '-' }}
                @endif
            </td>
            <td>{{ count($report->history) ? $report->history[0]->total_volume : '-'  }}</td>
            <td>{{ $report->contract_type }}</td>
            <td>{{ $report->company->sector->name }}</td>
            <td>{{ count($report->history) ? $report->history[0]->forecast : '-' }}</td>
            <td>{{ count($report->history) ? $report->history[0]->comments : '-' }}</td>
            <td>{{ count($report->history) ? $report->history[0]->project_closing_month.' '.$report->history[0]->project_closing_year
                    : '-' }}</td>
            <td><a class="btn btn-success font-weight-bold"
                   href="{{ route('show_history_sales_pipeline' , $report->id) }}">{{ trans('dashboard.show') }}</a></td>
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                <td><a class="btn btn-success font-weight-bold"
                       href="{{ route('edit_sales_pipeline' , $report->id) }}">{{ trans('dashboard.edit') }}</a></td>
            @endif
        </tr>
    @endforeach
    </tbody>
{{--    {{ $requests_report->links() }}--}}
</table>
