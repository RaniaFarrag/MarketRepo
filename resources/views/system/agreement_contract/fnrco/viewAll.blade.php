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
                            {{ trans('dashboard.Fnrco Agreement') }} {{ $company->name }}
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
                            <a href="{{ route('companyQuotation.index' , [$company->id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Fnrco Quotations') }} {{ $company->name }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                {{--<div class="d-flex align-items-center">--}}
                    {{--<!--begin::Button-->--}}
                    {{--<a href="{{ route('CompanyAgreement.create' , [$company->id , $mother_company_id]) }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">--}}
                        {{--{{ trans('dashboard.Add New Agreement') }}--}}
                    {{--</a>--}}
                    {{--<!--end::Button-->--}}
                {{--</div>--}}

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
                                        {{ trans('dashboard.Fnrco Agreements') }} {{ $company->name }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('dashboard.Quotation No') }}</th>
                                            <th>{{ trans('dashboard.type') }}</th>
                                            <th>{{ trans('dashboard.Contarct Period') }}</th>
                                            <th>{{ trans('dashboard.By') }}</th>
                                            <th>{{ trans('dashboard.Agreement Details') }}</th>
                                            {{--<th>{{ trans('dashboard.edit') }}</th>--}}
                                            {{--<th>{{ trans('dashboard.delete') }}</th>--}}
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($data['agreement_readyman_power'] as $k=>$agreement)
                                            <tr>
                                                <td>{{ $agreement->id }}</td>
                                                <td>{{ $agreement->fnrcoQuotation ? $agreement->fnrcoQuotation->Quotation_No : '' }}</td>
                                                <td>
                                                    @if($agreement->fnrcoQuotation)
                                                        @if($agreement->fnrcoQuotation->saudization == 1)
                                                            {{ trans('dashboard.Ageer') }}
                                                        @elseif($agreement->fnrcoQuotation->saudization == 0)
                                                            {{ trans('dashboard.Services') }}
                                                        @endif
                                                    @endif
                                                </td>
                                                <td>{{ $agreement->fnrcoQuotation ? $agreement->fnrcoQuotation->Contract_period : ''}}</td>
                                                <td>{{ app()->getLocale() == 'ar' ? $agreement->user->name : $agreement->user->name_en }}</td>
                                                <td><a class="btn btn-success font-weight-bold" target="_blank" href="{{ route('print_FnrcoAgreement' , $agreement->id) }}">{{ trans('dashboard.Agreement Details') }}</a></td>
                                                {{--<td><a href="{{ route('CompanyAgreement.edit' , [$agreement->id , 2]) }}" class="btn btn-success font-weight-bold">{{ trans('dashboard.edit') }}</a></td>--}}
                                                {{--<td><a onclick="return confirm('Are you sure?')" class="btn btn-danger font-weight-bold" href="{{ route('CompanyAgreement.destroy' , [$agreement->id , 2]) }}"><i class="fa fa-trash"></i></a></td>--}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
                                </div>
                            </div>


                                <div class="card-header flex-wrap">
                                    <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                        <h3 class="card-label" style="line-height: 70px;">
                                            {{ trans('dashboard.Fnrco FlatRed Agreements') }} {{ $company->name }}
                                        </h3>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <!--begin: Datatable-->
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ trans('dashboard.Quotation No') }}</th>
                                                <th>{{ trans('dashboard.type') }}</th>
                                                <th>{{ trans('dashboard.Contarct Period') }}</th>
                                                <th>{{ trans('dashboard.By') }}</th>
                                                <th>{{ trans('dashboard.Agreement Details') }}</th>
                                                {{--<th>{{ trans('dashboard.edit') }}</th>--}}
                                                {{--<th>{{ trans('dashboard.delete') }}</th>--}}
                                            </tr>
                                            </thead>

                                            <tbody>

                                            @foreach($data['agreement_flatRed'] as $k=>$agreement)
                                                <tr>
                                                    <td>{{ $agreement->id }}</td>
                                                    <td>{{ $agreement->fnrcoFlatRedQuotation ? $agreement->fnrcoFlatRedQuotation->Quotation_No : '' }}</td>
                                                    <td>
                                                        @if($agreement->fnrcoFlatRedQuotation)
                                                            @if($agreement->fnrcoFlatRedQuotation->saudization == 1)
                                                                {{ trans('dashboard.Ageer') }}
                                                            @elseif($agreement->fnrcoFlatRedQuotation->saudization == 0)
                                                                {{ trans('dashboard.Services') }}
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>{{ $agreement->fnrcoFlatRedQuotation ? $agreement->fnrcoFlatRedQuotation->Contract_period : ''}}</td>
                                                    <td>{{ app()->getLocale() == 'ar' ? $agreement->user->name : $agreement->user->name_en }}</td>
                                                    <td><a class="btn btn-success font-weight-bold" target="_blank" href="{{ route('flatRed_print_FnrcoAgreement' , $agreement->id) }}">{{ trans('dashboard.Agreement Details') }}</a></td>
                                                    {{--<td><a href="{{ route('edit_FlatRedAgreement' , [$agreement->id , 2]) }}" class="btn btn-success font-weight-bold">{{ trans('dashboard.edit') }}</a></td>--}}
                                                    {{--<td><a onclick="return confirm('Are you sure?')" class="btn btn-danger font-weight-bold" href="{{ route('flatRed_delete_FnrcoAgreement' , [$agreement->id , 2]) }}"><i class="fa fa-trash"></i></a></td>--}}
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