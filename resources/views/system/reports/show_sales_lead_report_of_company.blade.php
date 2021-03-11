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
                            {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                        </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->

                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('show_company' , [$company->id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ $company->name }}
                            </a>

                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
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
                    <a href="{{route('companySalesTeamReports.create' , [$company->id , $mother_company_id])}}"
                       class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.create Report') }}
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
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
                                        {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('dashboard.Sl.No') }}</th>
                                            <th>{{ trans('dashboard.Date') }}</th>
                                            <th>{{ trans('dashboard.Lead Source') }}</th>
                                            <th>{{ trans('dashboard.Lead status') }}</th>
                                            <th>{{ trans('dashboard.Company Name') }}</th>
                                            <th>{{ trans('dashboard.Contact Person') }}</th>
                                            <th>{{ trans('dashboard.Contact No') }}</th>
                                            <th>{{ trans('dashboard.Whatsapp') }}</th>
                                            <th>{{ trans('dashboard.Email') }}</th>
                                            <th>{{ trans('dashboard.Brochure status') }}</th>
                                            <th>{{ trans('dashboard.Category of Requirement') }}</th>
                                            <th>{{ trans('dashboard.Quantity') }}</th>
                                            <th>{{ trans('dashboard.Type of Service required') }}</th>
                                            <th>{{ trans('dashboard.Company Representative name') }}</th>
                                            <th>{{ trans('dashboard.Location') }}</th>
                                            <th>{{ trans('dashboard.Client Feedback') }}</th>


                                            <th>{{ trans('dashboard.Next FollowUp') }}</th>
                                        </tr>

                                        </thead>

                                        <tbody>
                                        @foreach($reports as $report)
                                            <tr>
                                                <td>{{$report->id}}</td>
                                                <td>{{$report->created_at->format('d/m/Y')}}</td>
                                                <td>Marketing-Hc</td>
                                                <td>{{ $report->statue ? $report->statue : '-' }}
                                                    {{--@if($report->statue)--}}
                                                    {{--@if($report->statue == 1)--}}
                                                    {{--{{ trans('dashboard.Hot') }}--}}
                                                    {{--@elseif($report->statue == 2)--}}
                                                    {{--{{ trans('dashboard.Warm') }}--}}
                                                    {{--@elseif($report->statue == 3)--}}
                                                    {{--{{ trans('dashboard.Cold') }}--}}
                                                    {{--@elseif($report->statue == 4)--}}
                                                    {{--{{ trans('dashboard.Awarded') }}--}}
                                                    {{--@endif--}}
                                                    {{--@else--}}
                                                    {{-----}}
                                                    {{--@endif--}}
                                                </td>
                                                <td>{{$report->company->name ?? '-'}}</td>
                                                {{--<td><a target="_blank" href="{{route('companies.show',$report->company->id)}}">{{$report->company->name ?? '-'}}</a></td>--}}
                                                <td>{{$report->company->company_representative_name ?? '-'}}</td>
                                                <td>{{$report->company->company_representative_phone?? '-'}}</td>
                                                <td>{{$report->company->company_representative_mobile?? '-'}}</td>
                                                <td><a href="mailto:{{$report->company->company_representative_email}}">{{$report->company->company_representative_email?? '-'}}</a></td>
                                                <td>{{$report->brochurs_status?? '-'}}</td>
                                                <td>{{$report->type_of_serves?? '-'}}</td>

                                                <td>{{$report->quanity?? '-'}}</td>
                                                <td>{{$report->cat_of_req?? '-'}}</td>
                                                <td>{{app()->getLocale() == 'ar' ? $report->user->name : $report->user->name_en}}</td>

                                                <td>{{$report->company->city->name ?? '-'}}</td>
                                                <td><span style="width: 500px !important;display: block;">{{$report->client_feeback?? '-'}}</span></td>
                                                <td>{{$report->nextFollowUp?? '-'}}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>
                                {!! $reports->links() !!}

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
