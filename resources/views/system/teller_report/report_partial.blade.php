<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>{{ trans('dashboard.id') }}</th>
        <th>{{ trans('dashboard.Date Call') }}</th>
        <th>{{ trans('dashboard.Time Call') }}</th>
        <th>{{ trans('dashboard.Teller') }}</th>
        <th>{{ trans('dashboard.Mother Company') }}</th>
        <th>{{ trans('dashboard.Representative name') }}</th>
        <th>{{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Date Meeting') }}</th>
        <th>{{ trans('dashboard.Time Meeting') }}</th>
        <th>{{ trans('dashboard.Call Feedback') }}</th>
        @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Coordinator'))
            <th>{{ trans('dashboard.edit') }}</th>
        @endif
    </tr>

    </thead>

    <tbody>
    @foreach($teller_reports as $report)
        <tr>
            <td>{{ $report->id }}</td>
            <td>{{ $report->date_call }}</td>
            <td>{{ $report->time_call }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
            <td>{{ $report->mother_company_id == 1 ? trans('dashboard.linrco') : trans('dashboard.fnrco') }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $report->representative->name : $report->representative->name_en}}</td>
            <td>{{ $report->company ? $report->company->name : '' }}</td>
            <td>{{ $report->date_meeting }}</td>
            <td>{{ $report->time_meeting }}</td>
            <td>{{ $report->feedback }}</td>
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Coordinator'))
                <td><a class="btn btn-success font-weight-bold" href="{{ route('edit_teller_report' , $report->id) }}">{{ trans('dashboard.edit') }}</a></td>
            @endif
        </tr>
    @endforeach

    </tbody>

</table>
