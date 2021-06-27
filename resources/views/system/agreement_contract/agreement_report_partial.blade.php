<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>{{ trans('dashboard.id') }}</th>
            <th>{{ trans('dashboard.Company Name') }}</th>
            <th>{{ trans('dashboard.Representative name') }}</th>
            <th>{{ trans('dashboard.Mother Company') }}</th>
            <th>{{ trans('dashboard.Contract Status') }}</th>
            <th>{{ trans('dashboard.Date') }}</th>
            <th>{{ trans('dashboard.feedback') }}</th>
            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                <th>{{ trans('dashboard.edit') }}</th>
            @endif
        </tr>
    </thead>

    <tbody>
        @foreach($agreement_reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->company->name }}</td>
                <td>{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en }}</td>
                <td>{{ app()->getLocale() == 'ar' ? $report->motherCompany->name : $report->motherCompany->name_en }}</td>
                <td>{{ $report->contract_status }}</td>
                <td>{{ $report->date }}</td>
                <td>{{ $report->feedback }}</td>
                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                    <td><a class="btn btn-success font-weight-bold" href="{{ route('edit_agreement_report' , $report->id) }}">{{ trans('dashboard.edit') }}</a></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
