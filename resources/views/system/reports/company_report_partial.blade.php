<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th> {{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Sector') }}</th>
        <th>{{ trans('dashboard.Company Type') }}</th>
        <th>{{ trans('dashboard.Evaluation status') }}</th>
        <th>{{ trans('dashboard.Evaluator') }}</th>
        <th>{{ trans('dashboard.Confirm Connection') }}</th>
        <th>{{ trans('dashboard.Confirm Interview') }}</th>
        <th>{{ trans('dashboard.Confirm Need') }}</th>
        <th>{{ trans('dashboard.Confirm Contract') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach($data['companies_user'] as $company_user)
            {{--{{ dd($company_user->company->id) }}--}}
            <tr>
                <td style="width: 34px;"><a href="{{route('show_company',[$company_user->company->id , $mother_company_id])}}" target="_blank">{{$company_user->company->id}}</a></td>
                <td><a target="_blank" href="{{route('show_company',[$company_user->company->id , $mother_company_id])}}">{{$company_user->company->name}}</a></td>
                <td>{{$company_user->company ? $company_user->company->sector->name : "-"}}</td>
                <td>{{$company_user->company ? $company_user->company->subSector->name : "-"}}</td>

                @if( $company_user->evaluation_status == 1 )
                    <td>A</td>
                @elseif( $company_user->evaluation_status == 2 )
                    <td>B</td>
                @elseif( $company_user->evaluation_status == 3 )
                    <td>C</td>
                @else
                    <td>-</td>
                @endif

                <td>{{ $company_user->evaluator ? app()->getLocale() == 'ar' ? $company_user->evaluator->name : $company_user->evaluator->name_en : '-' }}</td>
                @if($company_user->confirmConnect)
                    <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmConnect->name : $company_user->confirmConnect->name_en}}</td>
                @else
                    <td>-</td>
                @endif
                <td>{{ $company_user->confirmInterview ? app()->getLocale() == 'ar' ? $company_user->confirmInterview->name : $company_user->confirmInterview->name_en : "-" }}</td>
                <td>{{ $company_user->confirmNeed ? app()->getLocale() == 'ar' ? $company_user->confirmNeed->name : $company_user->confirmNeed->name_en : "-" }}</td>
                <td>{{ $company_user->confirmContract ? app()->getLocale() == 'ar' ? $company_user->confirmContract->name : $company_user->confirmContract->name_en : "-" }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $data['companies_user']->links() !!}
