
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th> {{ trans('dashboard.Company Name') }}</th>
            <th>{{ trans('dashboard.Company Type') }}	</th>
            <th>{{ trans('dashboard.Company Status') }}	</th>
            <th>{{ trans('dashboard.Interview Time') }}</th>
            <th>{{ trans('dashboard.Interview Date') }}</th>
            <th>{{ trans('dashboard.City') }}</th>
            <th>{{ trans('dashboard.BY') }}</th>
        </tr>
        </thead>

        <tbody>
            @foreach($meetings as $k=>$meeting)
                    @if($meeting->company)
                        <tr>
                            <td>{{ $k+1 }}</td>
                            <td> <a target="_blank" href="{{ route('show_company' , [$meeting->company_id , $mother_company_id] ) }}">{{ $meeting->company ? $meeting->company->name : '-' }}</a></td>
                            <td>{{ $meeting->company ? $meeting->company->subSector->name : '-' }}</td>
                            <td>
                                @if($meeting->company->representative[0]->pivot->client_status == 1)
                                    {{ trans('dashboard.Hot') }}
                                @elseif($meeting->company->representative[0]->pivot->client_status == 2)
                                    {{ trans('dashboard.Warm') }}
                                @elseif($meeting->company->representative[0]->pivot->client_status == 3)
                                    {{ trans('dashboard.Cold') }}
                                @elseif($meeting->company->representative[0]->pivot->client_status == 4)
                                    {{ trans('dashboard.Awarded') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $meeting->time }}</td>
                            <td>{{ $meeting->date }}</td>
                            <td>
                                <a target="_blank" href="https://marketing-hc.com/search/acp/companyData?city=3083">
                                    {{ $meeting->company->city ? $meeting->company->city->name : '-' }}
                                </a>
                            </td>
                            <td>{{ app()->getLocale() == 'ar' ?  $meeting->user->name : $meeting->user->name_en }}</td>
                        </tr>
                    @endif
                @endforeach
        </tbody>
    </table>

        {{ $meetings->links() }}

