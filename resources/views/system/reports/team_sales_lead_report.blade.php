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
                    <a href="{{route('companySalesTeamReports.create',$company->id)}}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Total Reports') }} (200)
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

                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Companies Filters') }}
                                            </div>
                                        </div>
                                        <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <div class="row fliter_serch">
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label> {{ trans('dashboard.Company Name') }}  </label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Company Name">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Sectors') }}</label>
                                                            <select class="form-control select2" name="param">
                                                                <option value=""
                                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="">Health Care</option>
                                                                <option value="">Oil & Gas</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Type') }}</label>
                                                            <select class="form-control select2" name="param">
                                                                <option value=""
                                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="72" data-select2-id="23">Senior
                                                                    management of
                                                                    pharmacies
                                                                </option>

                                                                <option value="71" data-select2-id="24">Pharmaceutical
                                                                    Company
                                                                </option>

                                                                <option value="70" data-select2-id="25">Medical complex
                                                                </option>

                                                                <option value="69" data-select2-id="26">medical Center
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Country') }}</label>
                                                            <select class="form-control select2" name="param">
                                                                <option value=""
                                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="1" data-select2-id="58">Saudi Arabia
                                                                </option>
                                                                <option value="2" data-select2-id="59">United Arab
                                                                    Emirates
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.City') }}</label>
                                                            <select class="form-control select2" name="param">
                                                                <option value=""
                                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="1" data-select2-id="58">Saudi Arabia
                                                                </option>
                                                                <option value="2" data-select2-id="59">United Arab
                                                                    Emirates
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Evaluation status') }}</label>
                                                            <select class="form-control select2" name="param"
                                                                    multiple="multiple">
                                                                <option value="A" data-select2-id="287">A</option>
                                                                <option value="B" data-select2-id="288">B</option>
                                                                <option value="C" data-select2-id="289">C</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Status') }}</label>
                                                            <select class="form-control select2" name="param"
                                                                    multiple="multiple">
                                                                <option value="is_called">Confirm Connection</option>
                                                                <option value="is_verified">Confirm Interview</option>
                                                                <option value="confirm_register">Confirm Need</option>
                                                                <option value="is_registered">Confirm Contract</option>
                                                                <option value="no_meeting">No Meeting</option>
                                                            </select>
                                                        </div>
                                                    </div>




                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="button"
                                                                    class="btn btn-block btn-success">{{ trans('dashboard.Search') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th style="padding-top: 30px;">
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15" checked="checked">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </th>
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

                                        <tr>
                                            <td>  <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                    <input type="checkbox" name="Checkboxes15" checked="checked">
                                                    <span class="m-0"></span>
                                                </label>
                                            </td>
                                            <td>518</td>
                                            <td>09/09/2020</td>
                                            <td>Marketing-Hc</td>
                                            <td>Cold</td>
                                            <td><a target="_blank" href="https://marketing-hc.com/acp/market/company/show/2821">Ok Clinics</a></td>
                                            <td>Mr. Adel Bin Ibrahim Al - warhi</td>
                                            <td>0543394223</td>
                                            <td>0543394223</td>
                                            <td><a href="mailto:info@okclinics.com">info@okclinics.com</a></td>

                                            <td>Yes</td>
                                            <td>N/A</td>
                                            <td>0</td>
                                            <td>N/A</td>
                                            <td>RAAFAT ALI</td>
                                            <td>
                                                Al Riyad

                                            </td>
                                            <td><span style="width: 500px !important;display: block;">08/09/2020: Client asked us to come and meet him at 5pm
09/09/2020: I went their to meet him but there was some miscommunication the HR team has two HR and I met one of them the other was on a vacation. but they said they have already authorized the visas to an agency in Philippines. They said they will get back to us if they plan to change their mind.</span> </td>


                                            <td>2020-10-20</td>
                                        </tr>


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
