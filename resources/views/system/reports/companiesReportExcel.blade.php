<style>

    th {
        text-align: center;
    }
</style>
<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">#</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Sector') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Company Type') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Evaluation status') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Evaluator')}}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Confirm Connection') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Confirm Interview') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Confirm Need') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000">{{ trans('dashboard.Confirm Contract') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($companies as $company)
        <tr>
            <td style="text-align: center; border: 1px solid #000000">{{$company->id}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->name}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->sector ? $company->sector->name : "-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->subSector ? $company->subSector->name : "-"}}</td>
            @if($company->evaluation_status ==1)
                <td style="text-align: center; border: 1px solid #000000">A</td>
            @elseif($company->evaluation_status ==2)
                <td style="text-align: center; border: 1px solid #000000">B</td>
            @elseif($company->evaluation_status ==3)
                <td style="text-align: center; border: 1px solid #000000">C</td>
            @else
                <td style="text-align: center; border: 1px solid #000000">-</td>
            @endif
            <td style="text-align: center; border: 1px solid #000000">{{$company->evaluator ? $company->evaluator->name :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_connected_user ? $company->confirm_connected_user->name :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_interview_user ? $company->confirm_interview_user->name :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_need_user ? $company->confirm_need_user->name :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_contract_user ? $company->confirm_contract_user->name :"-"}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
