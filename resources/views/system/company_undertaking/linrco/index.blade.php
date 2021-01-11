@extends('layouts.dashboard')

@section('body')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-12  subheader-transparent " id="kt_subheader">
            <div class=" container  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Heading-->
                    <div class="d-flex flex-column">
                        <!--begin::Title-->
                        <h2 class="text-white font-weight-bold my-2 mr-5">
                            {{ trans('dashboard.Linrco Undertaking') }} {{ $company->name }}
                        </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('companies.index') }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}
                            </a>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Linrco Undertaking') }} {{ $company->name }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="{{ route('CompanyUndertaking.create' , [$company->id , $mother_company_id]) }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Add New Undertaking') }}
                    </a>
                    <!--end::Button-->
                </div>

            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->

                <!--begin::Row-->
                <div class="row">

                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.Linrco Undertakings') }} {{ $company->name }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('dashboard.date') }}</th>
                                            <th>{{ trans('dashboard.Company Name') }}</th>
                                            <th>{{ trans('dashboard.Company Representative') }}</th>
                                            <th>{{ trans('dashboard.Undertaking Details') }}</th>
                                            <th>{{ trans('dashboard.edit') }}</th>
                                            <th>{{ trans('dashboard.delete') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($linrco_undertakings as $k=>$linrco_undertaking)
                                            <tr>
                                                <td>{{ $linrco_undertaking->date }}</td>
                                                <td>{{ $linrco_undertaking->company->name }}</td>
                                                <td>{{ $linrco_undertaking->company_representative }}</td>
                                                <td><a class="btn btn-success font-weight-bold" target="_blank" href="{{ route('undertaking_print' , [$linrco_undertaking->id , $mother_company_id]) }}">{{ trans('dashboard.Undertaking Details') }}</a></td>
                                                <td><a href="{{ route('CompanyUndertaking.edit' , [$linrco_undertaking->id , $mother_company_id]) }}" class="btn btn-success font-weight-bold">{{ trans('dashboard.edit') }}</a></td>
                                                <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger font-weight-bold" href="{{ route('CompanyUndertaking.destroy' , [$linrco_undertaking->id , $mother_company_id]) }}"><i class="fa fa-trash"></i></a></td>

                                                {{--<td>--}}
                                                    {{--<form method="post" action="{{ route('CompanyUndertaking.destroy' , [$linrco_undertaking->id , $mother_company_id]) }}">--}}
                                                        {{--@method('DELETE')--}}
                                                        {{--@csrf--}}
                                                        {{--<button onclick="return confirm('Are you sure?')" class="btn btn-danger mr-2" type="submit"><i class="fa fa-trash p-0"></i></button>--}}
                                                    {{--</form>--}}
                                                {{--</td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->

                <!--end::Dashboard-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

@endsection

@section('script')

@endsection