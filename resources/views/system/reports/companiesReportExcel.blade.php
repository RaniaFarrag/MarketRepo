<style>

    th {
        text-align: center;
    }
</style>
<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="10"> <h1 style="width: 100%; text-align: center"> {{ trans('dashboard.Company Report') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
 <br/>



<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; background-color:#ffc50c; ">#</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Sector') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Type') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Evaluation status') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Evaluator')}}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Connection') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Interview') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Need') }}</th>
         <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Contract') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($companies_user as $company_user)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{$company_user->company->id}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company_user->company->name}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company_user->company ? $company_user->company->sector->name : "-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company_user->company ? $company_user->company->subSector->name : "-"}}</td>
            @if( $company_user->evaluation_status == 1 )
                <td>A</td>
            @elseif( $company_user->evaluation_status == 2 )
                <td>B</td>
            @elseif( $company_user->evaluation_status == 3 )
                <td>C</td>
            @else
                <td>-</td>
            @endif
            <td style="text-align: center; border: 1px solid #000000">{{$company_user->evaluator ? app()->getLocale() == 'ar' ? $company_user->evaluator->name : $company_user->evaluator->name_en : '-' }}</td>
            @if($company_user->confirmConnect)
                <td>{{ app()->getLocale() == 'ar' ? $company_user->confirmConnect->name : $company_user->confirmConnect->name_en}}</td>
            @else
                <td>-</td>
            @endif
            <td style="text-align: center; border: 1px solid #000000">{{ $company_user->confirmInterview ? app()->getLocale() == 'ar' ? $company_user->confirmInterview->name : $company_user->confirmInterview->name_en : "-" }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $company_user->confirmNeed ? app()->getLocale() == 'ar' ? $company_user->confirmNeed->name : $company_user->confirmNeed->name_en : "-" }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $company_user->confirmContract ? app()->getLocale() == 'ar' ? $company_user->confirmContract->name : $company_user->confirmContract->name_en : "-" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
