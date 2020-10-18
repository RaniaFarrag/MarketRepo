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
        @foreach($data['companies'] as $company)
            <tr>
                <td style="width: 34px;"><a href="{{route('companies.show',$company)}}" target="_blank">{{$company->id}}</a></td>
                <td><a target="_blank" href="{{route('companies.show',$company)}}">{{$company->name}}</a></td>
                <td>{{$company->sector ? $company->sector->name : "-"}}</td>
                <td>{{$company->subSector ? $company->subSector->name : "-"}}</td>
                @if($company->evaluation_status ==1)
                    <td>A</td>
                @elseif($company->evaluation_status ==2)
                    <td>B</td>
                @elseif($company->evaluation_status ==3)
                    <td>C</td>
                @else
                    <td>-</td>
                @endif
                <td>{{$company->evaluator ? app()->getLocale() == 'ar' ? $company->evaluator->name : $company->evaluator->name_en : "-"}}</td>
                <td>{{$company->confirm_connected_user ? app()->getLocale() == 'ar' ? $company->confirm_connected_user->name : $company->confirm_connected_user->name_en :"-"}}</td>
                <td>{{$company->confirm_interview_user ? app()->getLocale() == 'ar' ? $company->confirm_interview_user->name : $company->confirm_interview_user->name_en :"-"}}</td>
                <td>{{$company->confirm_need_user ? app()->getLocale() == 'ar' ? $company->confirm_need_user->name : $company->confirm_need_user->name_en : "-" }}</td>
                <td>{{$company->confirm_contract_user ? app()->getLocale() == 'ar' ? $company->confirm_contract_user->name : $company->confirm_contract_user->name_en :"-"}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $data['companies']->links() !!}
