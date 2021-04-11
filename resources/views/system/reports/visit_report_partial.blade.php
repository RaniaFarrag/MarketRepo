<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>{{ trans('dashboard.Mother Company') }}</th>
        <th>{{ trans('dashboard.Company Representative name') }}</th>
        <th>{{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Date') }}</th>
    </tr>

    </thead>

    <tbody>
    @foreach($reports as $report)
        <tr>
            <td>{{ $report->user->mother_company_id == 1 ? trans('dashboard.linrco') : trans('dashboard.fnrco') }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en}}</td>
            <td><a href="{{ route('get_sales_report_details' , $report->id) }}">{{ $report->company->name }}</a></td>
            <td>{{ $report->visit_date }}</td>
        </tr>
    @endforeach

    </tbody>

</table>
