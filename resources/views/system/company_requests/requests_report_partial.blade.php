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
        <th>{{ trans('dashboard.Type') }}</th>
        <th>{{ trans('dashboard.Quantity') }}</th>
        <th>{{ trans('dashboard.Feedback') }}</th>
        <th>{{ trans('dashboard.notes') }}</th>
        <th>{{ trans('dashboard.nextfollow_date') }}</th>
        <th>{{ trans('dashboard.request_status') }}</th>
        <th>{{ trans('dashboard.show') }}</th>

    </tr>
    </thead>

    <tbody>
    @foreach($requests_report as $k=>$request)
        <tr>
{{--            <td>{{ $k+1 }}</td>--}}
            <td>{{ $request->id }}</td>
            <td>{{ $request->date }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $request->user->name : $request->user->name_en }}</td>
            <td>{{ app()->getLocale() == 'ar' ? $request->MotherCompany->name : $request->MotherCompany->name_en }}</td>
            <td>{{ $request->company ? $request->company->name : '-'}}</td>
            <td>
                @if($request->status)
                    @if($request->status == 1) A
                    @elseif($request->status == 2) B
                    @elseif($request->status == 3) C
                    @endif
                @else
                    {{ '-' }}
                @endif
            </td>
            <td>{{ trans('dashboard.'.$request->request_type) }}</td>
            <td>{{ $request->quantity }}</td>
            <td>{{ count($request->notes) ? $request->notes[0]->feedback : '-' }}</td>
            <td>{{ count($request->notes) ? $request->notes[0]->note : '-' }}</td>
            <td>{{ count($request->notes) ? $request->notes[0]->next_follow_date : '-' }}</td>
            <td>{{ $request->request_status ? $request->request_status : '-' }}</td>
            <td><a class="btn btn-success font-weight-bold"
                   href="{{ route('get_notes_of_request_report' , $request->id) }}">{{ trans('dashboard.show') }}</a></td>
        </tr>
    @endforeach
    </tbody>
{{--    {{ $requests_report->links() }}--}}
</table>
