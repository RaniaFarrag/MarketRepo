<style>

    th {
        text-align: center;
    }
</style>
<br/>
<table>
    <tbody>
    <tr>
        <th style="text-align: center; font-weight: bold; border: 1px solid #000000; font-size: 24px; " colspan="10"> <h1 style="width: 100%; text-align: center"> {{ trans('dashboard.Monitor All Log') }}</h1>
        </th>
    </tr>
    </tbody>
</table>
 <br/>



<table style="text-align: center; border: 1px solid #000000">
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
