<div class="table-responsive">
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>{{ trans('dashboard.Manager') }}</th>
            <th>{{ trans('dashboard.Salary') }} </th>
            <th>{{ trans('dashboard.rest salary') }} </th>
            <th>{{ trans('dashboard.Agreement Closed') }} </th>
            <th>{{ trans('dashboard.Total Orders') }} </th>
            <th>{{ trans('dashboard.Due from salary') }} </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $manager_name  }}</td>
                <td>{{ $manager_salary ? $manager_salary : '-' }}</td>
                <td>{{ $manager_rest_salary  }}</td>
                <td>{{ $manager_agreement_closed  }}</td>
                <td>{{ $manager_total_orders  }}</td>
                <td>{{ $manager_salary ? $manager_salary - $manager_rest_salary : '-' }}</td>
            </tr>
       </tbody>
   </table>

    <div class="separator separator-dashed mt-8 mb-5"></div>

    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>{{ trans('dashboard.Representative') }}</th>
            <th>{{ trans('dashboard.Salary') }} </th>
            <th>{{ trans('dashboard.Daily visits') }} </th>
            <th>{{ trans('dashboard.Target') }} </th>
            <th>{{ trans('dashboard.Achieved') }} </th>
            <th>{{ trans('dashboard.Residual') }} </th>
            <th>{{ trans('dashboard.Agreement Closed') }} </th>
            <th>{{ trans('dashboard.Total Orders') }} </th>
            <th>{{ trans('dashboard.Due from salary') }} </th>
            <th>{{ trans('dashboard.rest salary') }} </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user['name']  }}</td>
                <td>{{ $user['salary'] ? $user['salary'] : '-' }}</td>
                <td>{{ $user['salary'] ? round($user['num_visits_per_day']) : '-' }}</td>
                <td>{{ $user['salary'] ? round($user['num_visits_per_day']) * 22 : '-' }}</td>
                <td>{{ $user['sum_visited']  }}</td>
                <td>{{ $user['salary'] ? (round($user['num_visits_per_day']) * 22) - $user['sum_visited'] : '-' }}</td>
                <td>{{ $user['agreement_closed']  }}</td>
                <td>{{ $user['total_orders']  }}</td>
                <td>{{ $user['salary'] ? $user['sum_visited'] * $user['visit_price'] : '-'}}</td>
                <td>{{ $user['salary'] ? $user['user_rest_salary'] : '-' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
