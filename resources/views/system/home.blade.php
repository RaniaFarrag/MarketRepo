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
                            Dashboard                                    </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="#" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                Dashboard                            </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                Latest Updated                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->

                </div>
                <!--end::Info-->

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

                    <div class="col-xl-12">


                        <div class="row">
                            <div class="col-xl-12">

                                <div class="row">

                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="fa fa-building fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            COMPANIES REGISTERED TODAY
                                                            <div class="text-dark-75">
                                                                2

                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="fa fa-building fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            TOTAL COMPANIES
                                                            <div class="text-dark-75">
                                                                1398

                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="fa fa-users fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            TOTAL USERS

                                                            <div class="text-dark-75">
                                                                8

                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="far fa-chart-bar fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            REP DAILY REPORT

                                                            <div class="text-dark-75">
                                                                0

                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="fas fa-user-clock fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            TODAY MEETING

                                                            <div class="text-dark-75">
                                                                2


                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                    <div class="col-xl-4">

                                        <!--begin::Callout-->
                                        <div class="card card-custom wave wave-animate-slow wave-primary  mb-8 gutter-b">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center p-5">
                                                    <!--begin::Icon-->
                                                    <div class="mr-6">
                            <span class="svg-icon svg-icon-primary  svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->

                                                            <i class="far fa-clock fa-3x text-primary"></i>

                                <!--end::Svg Icon--></span>                        </div>
                                                    <!--end::Icon-->

                                                    <!--begin::Content-->
                                                    <div class="d-flex flex-column">
                                                        <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h5 mb-3">
                                                            COMING MEETING


                                                            <div class="text-dark-75">
                                                                1


                                                            </div>
                                                        </a>

                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Callout-->

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--begin::Row-->
                <div class="row">

                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        The Dates of Interviews With Companies
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <!--begin: Datatable-->
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Company Name</th>
                                        <th>Company Type	</th>
                                        <th>Interview Time	</th>
                                        <th>Interview Date	</th>
                                        <th>City</th>
                                        <th>BY</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td> 173</td>

                                        <td>  <a target="_blank" href="https://marketing-hc.com/acp/market/company/show/2731"> Adama Hospitals &amp; clinics </a></td>
                                        <td><a target="_blank" href="https://marketing-hc.com/search/acp/companyData?jobRole=69">medical Center</a></td>
                                        <td> 02:00 PM</td>
                                        <td> 2020-07-19</td>
                                        <td>
                                            <a target="_blank" href="https://marketing-hc.com/search/acp/companyData?city=3083">Al Riyad</a>

                                        </td>
                                        <td> BABU ANSARI</td>

                                    </tr>
                                    <tr>
                                        <td> 173</td>

                                        <td>  <a target="_blank" href="https://marketing-hc.com/acp/market/company/show/2731"> Adama Hospitals &amp; clinics </a></td>
                                        <td><a target="_blank" href="https://marketing-hc.com/search/acp/companyData?jobRole=69">medical Center</a></td>
                                        <td> 02:00 PM</td>
                                        <td> 2020-07-19</td>
                                        <td>
                                            <a target="_blank" href="https://marketing-hc.com/search/acp/companyData?city=3083">Al Riyad</a>

                                        </td>
                                        <td> BABU ANSARI</td>

                                    </tr>
                                    <tr>
                                        <td> 173</td>

                                        <td>  <a target="_blank" href="https://marketing-hc.com/acp/market/company/show/2731"> Adama Hospitals &amp; clinics </a></td>
                                        <td><a target="_blank" href="https://marketing-hc.com/search/acp/companyData?jobRole=69">medical Center</a></td>
                                        <td> 02:00 PM</td>
                                        <td> 2020-07-19</td>
                                        <td>
                                            <a target="_blank" href="https://marketing-hc.com/search/acp/companyData?city=3083">Al Riyad</a>

                                        </td>
                                        <td> BABU ANSARI</td>

                                    </tr>

                                    </tbody>

                                </table>
                                <!--end: Datatable-->
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



