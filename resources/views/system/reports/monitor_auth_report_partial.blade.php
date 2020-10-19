
    <!--begin: Datatable-->
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th> {{ trans('dashboard.User Name') }}</th>
            <th>{{ trans('dashboard.User Roles') }}</th>
            <th>{{ trans('dashboard.User status') }}</th>
            <th>{{ trans('dashboard.Model') }}</th>
            <th>{{ trans('dashboard.Model num') }}</th>
            <th>{{ trans('dashboard.Date') }}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{ $log->user_id }}</td>
                <td>{{$log->user->name ? app()->getLocale() == 'ar' ? $log->user->name : $log->user->name_en :"-"}}</td>
                <td>{{$log->user->roles[0]->name ? app()->getLocale() == 'ar' ? $log->user->roles[0]->name_ar : $log->user->roles[0]->name :"-"}}</td>

                <td>{{ $log->content }}</td>
                <td>{{$log->model_name}}</td>
                {{--<td> <a href="{{route($log->model_name.'.edit',$log->row_id)}}">{{$log->row_id}}</a></td>--}}
                <td>{{$log->row_id}}</td>
                <td>{{ $log->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!--end: Datatable-->
    {{ $logs->links() }}