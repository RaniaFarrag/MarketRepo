@if(count($companies)>0)
<div class="separator separator-dashed mt-8 mb-5"></div>
<div class="table-responsive">
    <table class="table table-bordered text-center">
        <tbody>
        <tr>
            <th>{{ trans('dashboard.Company Representative name') }}</th>
            <th>{{ trans('dashboard.Total contacts') }} </th>
            <th>{{ trans('dashboard.Total interviews') }} </th>
            <th>{{ trans('dashboard.Total needs') }} </th>
            <th>{{ trans('dashboard.Total contracts') }} </th>

        </tr>
        <tr>
            <td> {{$rep->name}}</td>

            <td> {{$confirm_connected}}</td>
            <td> {{$confirm_interview}}</td>
            <td> {{$confirm_need}}</td>
            <td> {{$confirm_contract}}</td>
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
                <td> {{$company->assigned_to ? $company->assigned_to->name :"-" }}</td>
                <td><a target="_blank" href="{{route('companies.show',$company)}}">{{$company->name}}</a></td>

                <td>
                    @if($company->confirm_connected)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->confirm_interview)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->confirm_need)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>

                <td>
                    @if($company->confirm_contract)
                        <i class="icon-xl far fa-check-circle text-success"></i>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    <!--end: Datatable-->
</div>
@endif
