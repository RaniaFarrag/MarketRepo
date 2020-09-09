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
                            {{ trans('dashboard.Company Report') }}
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
                                {{ trans('dashboard.Company Report') }}
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
                    <a href="#" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Export Excel ') }}
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
                                        {{ trans('dashboard.Company Report') }}
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
                                            <th>#</th>
                                            <th> {{ trans('dashboard.Company Name') }}</th>
                                            <th>{{ trans('dashboard.Sector') }}</th>
                                            <th>{{ trans('dashboard.Company Type') }}</th>
                                            <th>{{ trans('dashboard.Evaluation status') }}</th>
                                            <th>{{ trans('dashboard.Evaluator') }}</th>
                                            <th>{{ trans('dashboard.Confirm Connection') }}</th>
                                            <th>{{ trans('dashboard.Confirm Interview') }}</th>
                                            <th>{{ trans('dashboard.Confirm Need') }}</th>
                                            <th>{{ trans('dashboard.Confirm Contract') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        <tr>
                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>
                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>
                                            <td>A</td>
                                            <td>hussein.saleh	</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>
                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>
                                            <td>A</td>
                                            <td>hussein.saleh	</td>
                                            <td>RAAFAT ALI	</td>
                                            <td>RAAFAT ALI	</td>
                                            <td>RAAFAT ALI	</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>
                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>
                                            <td>A</td>
                                            <td>hussein.saleh	</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>
                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>
                                            <td>A</td>
                                            <td>hussein.saleh	</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
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