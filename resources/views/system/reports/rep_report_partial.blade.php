@if(count($companies)>0)
<div class="separator separator-dashed mt-8 mb-5"></div>
<div class="table-responsive">
    <table class="table table-bordered text-center">

        <thead>
        <tr>
            <th>{{ trans('dashboard.Company Representative name') }}</th>
            <th>{{ trans('dashboard.Total contacts') }} </th>
            <th>{{ trans('dashboard.Total interviews') }} </th>
            <th>{{ trans('dashboard.Total needs') }} </th>
            <th>{{ trans('dashboard.Total contracts') }} </th>
            <th>{{ trans('dashboard.Total meetings') }} </th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td> {{app()->getLocale() == 'ar' ? $rep->name : $rep->name_en}}</td>

            <td> {{$confirm_connected}}</td>
            <td> {{$confirm_interview}}</td>
            <td> {{$confirm_need}}</td>
            <td> {{$confirm_contract}}</td>
            <td> {{$count_meetings}}</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="separator separator-dashed mt-8 mb-5"></div>
<div class="table-responsive">
    <!--begin: Datatable-->
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('dashboard.Company Representative name') }}</th>
            <th> {{ trans('dashboard.Company Name') }}</th>
            <th>{{ trans('dashboard.Confirm Connection') }}</th>
            <th>{{ trans('dashboard.Confirm Interview') }}</th>
            <th>{{ trans('dashboard.Confirm Need') }}</th>
            <th>{{ trans('dashboard.Confirm Contract') }}</th>


        </tr>

        </thead>

        <tbody>

        @foreach($companies as $company)
            <tr>
                <td> {{$company->id}}</td>
                <td> {{ app()->getLocale() == 'ar' ? $rep->name : $rep->name_en }}</td>
                {{--<td> {{$company->assigned_to ? $company->assigned_to->name :"-" }}</td>--}}
                {{--<td><a target="_blank" href="{{route('companies.show',$company)}}">{{$company->name}}</a></td>--}}
                <td>{{$company->name}}</td>

                <td>
                    @if($company->representative[0]->pivot->confirm_connected)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->representative[0]->pivot->confirm_interview)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->representative[0]->pivot->confirm_need)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->representative[0]->pivot->confirm_contract)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
{{ $companies->links() }}
    <!--end: Datatable-->
</div>


@endif
<div class="separator separator-dashed mt-8 mb-5"></div>
<div class="table-responsive">
    <!--begin: Datatable-->
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('dashboard.Company Representative name') }}</th>
            <th> {{ trans('dashboard.Role') }}</th>
            <th>{{ trans('dashboard.Status') }}</th>
            <th>{{ trans('dashboard.Time') }}</th>
            <th>{{ trans('dashboard.Date') }}</th>


        </tr>

        </thead>

        <tbody>

        @foreach($user_log as $log)
            <tr>
                <td> {{$log->user_id}}</td>
                <td> {{ app()->getLocale() == 'ar' ? $rep->name : $rep->name_en }}</td>
                {{--<td> {{$company->assigned_to ? $company->assigned_to->name :"-" }}</td>--}}
                <td>{{ $rep->roles[0]->name ? (app()->getLocale() == 'ar' ? $rep->roles[0]->name_ar : $rep->roles[0]->name) : '-' }}</td>

                <td>{{ $log->content }}</td>

                <td>
                    {{ $log->created_at->format('d M Y') }}
                </td>

                <td>
                   {{ $log->created_at->format('H:i:s') }}

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>

<!--end: Datatable-->
</div>