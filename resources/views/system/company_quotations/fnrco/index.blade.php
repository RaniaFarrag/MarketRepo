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
                            {{ trans('dashboard.Fnrco Quotation') }} {{ $company->name }}
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
                            <a href="{{ route('companies.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}
                            </a>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Fnrco Quotation') }} {{ $company->name }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->
                <div class="d-flex align-items-center ">

                    <!--begin::Dropdowns-->
                    <div class="dropdown dropdown-inline  mr-2" >

                        <a target="_blank"
                           href="#"
                           class="btn   btn-light-primary" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ki ki-plus icon-1x"></i> {{ trans('dashboard.Add Ready Manpower Quotation') }}
                        </a>
                            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                <!--begin::Navigation-->
                                <ul class="navi navi-hover">
                                    <li class="navi-item pb-1">
                                        <a href="{{ route('companyQuotation.create' , [$company->id , $mother_company_id , 1]) }}" class="navi-link">
                                            <span class="navi-text"> {{ trans('dashboard.Ajeer') }}</span>
                                        </a>
                                    </li>
                                    <li class="navi-item pb-1">
                                        <a href="{{ route('companyQuotation.create' , [$company->id , $mother_company_id , 0]) }}" class="navi-link">
                                            <span class="navi-text"> {{ trans('dashboard.Services') }}</span>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Navigation-->
                            </div>
                    </div>
                    <div class="dropdown dropdown-inline">

                        <a target="_blank"
                           href="#"
                           class="btn   btn-light-primary" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <i class="ki ki-plus icon-1x"></i> {{ trans('dashboard.Add Visa Quotation') }}</a>

                        <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                            <!--begin::Navigation-->
                            <ul class="navi navi-hover">

                                <li class="navi-item pb-1">
                                    <a href="#" class="navi-link">

                                        <span class="navi-text"> {{ trans('dashboard.Ajeer Cost Plus') }}</span>
                                    </a>
                                </li>
                                <li class="navi-item pb-1">
                                    <a href="#" class="navi-link">

                                        <span class="navi-text"> {{ trans('dashboard.Ajeer Flat Red') }}</span>
                                    </a>
                                </li>

                                <li class="navi-item pb-1">
                                    <a href="#" class="navi-link">

                                        <span class="navi-text"> {{ trans('dashboard.Services Cost Plus') }}</span>
                                    </a>
                                </li>
                                <li class="navi-item pb-1">
                                    <a href="#" class="navi-link">

                                        <span class="navi-text"> {{ trans('dashboard.Services Flat Red') }}</span>
                                    </a>
                                </li>


                            </ul>
                            <!--end::Navigation-->
                        </div>
                    </div>
                    <!--end::Dropdowns-->
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
                                        {{ trans('dashboard.Fnrco Quotations') }} {{ $company->name }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('dashboard.Ref No') }}</th>
                                            <th>{{ trans('dashboard.Quotation No') }}</th>
                                            <th>{{ trans('dashboard.Attn') }}</th>
                                            <th>{{ trans('dashboard.Date') }}</th>
                                            <th>{{ trans('dashboard.type') }}</th>
                                            <th>{{ trans('dashboard.By') }}</th>
                                             <th>{{ trans('dashboard.Contract Period') }}</th>
                                            <th>{{ trans('dashboard.Company Quotations') }}</th>
                                            <th>{{ trans('dashboard.Convert To Contract') }}</th>
                                            <th>{{ trans('dashboard.The Contract') }}</th>
                                            <th>{{ trans('dashboard.edit') }}</th>
                                            <th>{{ trans('dashboard.delete') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($fnrco_quotations as $k=>$quotation)
                                            <tr>
                                                <td>{{ $quotation->ref_no }}</td>
                                                <td>{{ $quotation->Quotation_No }}</td>
                                                <td>{{ $quotation->attn }}</td>
                                                <td>{{ $quotation->created_at }}</td>
                                                <td>
                                                    @if($quotation->saudization == 1)
                                                        {{ trans('dashboard.Ageer') }}
                                                    @elseif($quotation->saudization == 0)
                                                        {{ trans('dashboard.Services') }}
                                                    @endif
                                                </td>
                                                <td>{{ $quotation->user->name }}</td>
                                                <td>{{ $quotation->Contract_period }} Month</td>
                                                {{--<td>{{ $quotation->user->name }}</td>--}}
                                                <td><a class="btn btn-success font-weight-bold" target="_blank"
                                                       href="{{ route('print_quotation' , [$quotation->id , $mother_company_id]) }}">{{ trans('dashboard.Details') }}</a>
                                                </td>

                                                <td>
                                                    @if($quotation->fnrcoAgreement)
                                                        <a  style="color: grey; pointer-events: none;
                                                                  cursor: default;
                                                                  text-decoration: none;
                                                                  " class="btn btn-success font-weight-bold" >
                                                            {{ trans('dashboard.Convert') }}
                                                        </a>

                                                    @else
                                                        <a class="btn btn-success font-weight-bold"
                                                           href="{{ route('convertToAgreement' , $quotation->id) }}">
                                                            {{ trans('dashboard.Convert') }}
                                                        </a>
                                                    @endif
                                                </td>

                                                <td>
                                                    @if($quotation->fnrcoAgreement)
                                                        <a class="btn btn-success font-weight-bold"
                                                           href="{{ route('openFnrcoAgreement' , $quotation->fnrcoAgreement->id) }}">
                                                            {{ trans('dashboard.Contract') }}
                                                        </a>
                                                    @else
                                                        <a  style="color: grey; pointer-events: none;
                                                                  cursor: default;
                                                                  text-decoration: none;
                                                                  " class="btn btn-success font-weight-bold" >
                                                            {{ trans('dashboard.Contract') }}
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('companyQuotation.edit' , [$quotation->id , $mother_company_id]) }}" class="btn
                                                       btn-success font-weight-bold">{{ trans('dashboard.edit') }}</a>
                                                </td>
                                                <td><a onclick="return confirm('Are you sure?')"
                                                       class="btn btn-danger font-weight-bold"
                                                       href="{{ route('companyQuotation.destroy' , [$quotation->id , $mother_company_id]) }}"><i
                                                                class="fa fa-trash"></i></a></td>
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

    <script>
        {{--RANIA--}}
        {{--CONFIRM TO DELETE NEED--}}
        function confirmDelete() {
            @if(app()->getLocale() == 'ar')
                return confirm('هل متاكد انك تريد حذف هذا الاحتياج ؟ ');
            @else
                return confirm('Are you sure you want to delete?');
            @endif
        }
    </script>
@endsection