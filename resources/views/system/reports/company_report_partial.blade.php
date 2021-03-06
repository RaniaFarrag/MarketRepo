<table class="table table-bordered text-center">
    <thead>
    <tr>
        <th>#</th>
        <th> {{ trans('dashboard.Company Name') }}</th>
        <th>{{ trans('dashboard.Sector') }}</th>
        <th>{{ trans('dashboard.Company Type') }}</th>
        <th>{{ trans('dashboard.Representative') }}</th>
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

            <tr>
                <td style="width: 34px;"><a href="{{ route('show_company',[$company_user->company->id , $mother_company_id]) }}" target="_blank">{{$company_user->company ? $company_user->company->id : '-'}}</a></td>
                <td><a target="_blank" href="{{ route('show_company',[$company_user->company->id , $mother_company_id]) }}">{{ $company_user->company ? $company_user->company->name : '-' }}</a></td>
                <td>{{$company_user->company ? $company_user->company->sector->name : "-"}}</td>
                <td>{{$company_user->company ? $company_user->company->subSector->name : "-"}}</td>
                <td>{{$company_user->representative ? app()->getLocale() == 'ar' ? $company_user->representative->name : $company_user->representative->name_en : "-"}}</td>

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

                @if($company_user->confirmConnect && $company_user->confirm_connected == 1)
                    <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmConnect->name : $company_user->confirmConnect->name_en}}</td>
                @else
                    <td>-</td>
                @endif

                @if($company_user->confirmInterview && $company_user->confirm_interview == 1)
                    <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmInterview->name : $company_user->confirmInterview->name_en}}</td>
                @else
                    <td>-</td>
                @endif

                @if($company_user->confirmNeed && $company_user->confirm_need == 1)
                    <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmNeed->name : $company_user->confirmNeed->name_en}}</td>
                @else
                    <td>-</td>
                @endif

                @if($company_user->confirmContract && $company_user->confirm_contract == 1)
                    <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmContract->name : $company_user->confirmContract->name_en}}</td>
                @else
                    <td>-</td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
{!! $data['companies_user']->links() !!}
