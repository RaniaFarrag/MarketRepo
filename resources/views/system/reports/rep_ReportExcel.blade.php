<style>

    th {
        text-align: center;
    }
</style>
<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="10"> <h1 style="width: 100%; text-align: center"> {{ trans('dashboard.Rep Reports') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>

{{--


<table style="text-align: center; border: 1px solid #000000">
    <thead>

    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Company Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Total contacts') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Total interviews') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Total needs') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Total contracts') }} </th>
  </tr>
    <tbody>
    <tr>
        <td style="text-align: center; border: 1px solid #000000;"> {{app()->getLocale() == 'ar' ? $rep->name : $rep->name_en}}</td>

        <td style="text-align: center; border: 1px solid #000000;"> {{$confirm_connected}}</td>
        <td style="text-align: center; border: 1px solid #000000;"> {{$confirm_interview}}</td>
        <td style="text-align: center; border: 1px solid #000000;"> {{$confirm_need}}</td>
        <td style="text-align: center; border: 1px solid #000000;"> {{$confirm_contract}}</td>
    </tr>
    </tbody>
</table>

--}}

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; background-color:#ffc50c; ">#</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Representative name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Company Name') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Connection') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Interview') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Need') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Confirm Contract') }}</th>
    </tr>
    </thead>

    <tbody>
    @foreach($companies as $company)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{$company->id}}</td>
            <td style="text-align: center; border: 1px solid #000000;">{{ app()->getLocale() == 'ar' ?
            $company->representative->name : $company->representative->name_en }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->name}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_connected_user ? (app()->getLocale() == 'ar' ? $company->confirm_connected_user->name : $company->confirm_connected_user->name_en)  :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_interview_user ? (app()->getLocale() == 'ar' ? $company->confirm_interview_user->name : $company->confirm_interview_user->name_en) :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_need_user ? (app()->getLocale() == 'ar' ? $company->confirm_need_user->name : $company->confirm_need_user->name_en) :"-"}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{$company->confirm_contract_user ? (app()->getLocale() == 'ar' ? $company->confirm_contract_user->name : $company->confirm_contract_user->name_en) : "-"}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
