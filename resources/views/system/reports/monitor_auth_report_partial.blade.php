
    <!--begin: Datatable-->
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th> {{ trans('dashboard.User Name') }}</th>
            <th>{{ trans('dashboard.User Roles') }}</th>
            <th>{{ trans('dashboard.User status') }}</th>
            <th>{{ trans('dashboard.Model') }}</th>
            <th>{{ trans('dashboard.Date') }}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->user_id }}</td>
                <td>{{ $log->user->name }}</td>
                <td>{{ $log->user->roles[0]->name ?? "-" }}</td>
                <td>{{ $log->content }}</td>
                <td> <a href="{{route($log->model_name.'.edit',$log->row_id)}}">{{$log->row_id}}</a></td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--end: Datatable-->
    {{ $logs->links() }}