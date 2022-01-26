<style>

    th {
        text-align: center;
    }
</style>
<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="17"> <h1 style="width: 100%; text-align: center"> {{ trans('dashboard.Managers Report') }} {{ $manager_name }}</h1>
        </th>
    </tr>
    </tbody>
</table>
<br/>


<table style="text-align: center; border: 1px solid #000000">
    <thead>
        <tr>
        <th> </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Manager') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;"> {{ trans('dashboard.Salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.rest salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Agreement Closed') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Total Orders') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;" colspan="2"> {{ trans('dashboard.Due from salary') }} </th>
  </tr>
    </thead>
    <tbody>
    <tr>
        <td> </td>
        <td style="text-align: center; border: 1px solid #000000;"> {{ $manager_name }}</td>
        <td style="text-align: center; border: 1px solid #000000;"> {{ $manager_salary ? $manager_salary : '-' }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $manager_rest_salary }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $manager_agreement_closed }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $manager_total_orders }}</td>
        <td style="text-align: center; border: 1px solid #000000;" colspan="2"> {{ $manager_salary ? $manager_salary - $manager_rest_salary : '-' }}</td>
    </tr>
    </tbody>
</table>

<table style="text-align: center; border: 1px solid #000000">
    <thead>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Representative') }}</th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Daily visits') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Target') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Achieved') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Residual') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Agreement Closed') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Total Orders') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.Due from salary') }} </th>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000;background-color:#c7d9f1;">{{ trans('dashboard.rest salary') }} </th>
    </tr>
    </thead>

    <tbody>
    @foreach($users as $user)
        <tr>
            <td style="text-align: center; border: 1px solid #000000;background-color:#ffc50c; ">{{ $user['name']  }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? $user['salary'] : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? $user['num_visits_per_day'] : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? round($user['num_visits_per_day']) * 22 : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['sum_visited']  }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? (round($user['num_visits_per_day']) * 22) - $user['sum_visited'] : '-' }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['agreement_closed']  }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['total_orders']  }}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? $user['sum_visited'] * $user['visit_price'] : '-'}}</td>
            <td style="text-align: center; border: 1px solid #000000">{{ $user['salary'] ? $user['user_rest_salary'] : '-' }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
