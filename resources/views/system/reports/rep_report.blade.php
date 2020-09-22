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
                            {{ trans('dashboard.Rep Reports') }}
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
                                {{ trans('dashboard.Rep Reports') }}
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

                            <div class="card-body">

                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Rep Reports') }}
                                            </div>
                                        </div>
                                        <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <div class="row fliter_serch">
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label> {{ trans('dashboard.Company Representative name') }}  </label>
                                                            <select class="form-control select2" name="param">
                                                                <option value=""
                                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="13471" data-select2-id="94">BABU ANSARI
                                                                </option>
                                                                <option value="13473" data-select2-id="95">RAAFAT ALI
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <a href="#"
                                                               class="btn btn-block btn-success font-weight-bold  py-3 px-6 mr-2">
                                                                {{ trans('dashboard.Export Excel ') }}
                                                            </a>
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
                                    <table class="table table-bordered text-center">
                                        <tbody>
                                        <tr>
                                            <th>{{ trans('dashboard.Company Representative name') }}</th>
                                            <th>{{ trans('dashboard.Total contacts') }} </th>
                                            <th>{{ trans('dashboard.Total needs') }} </th>
                                            <th>{{ trans('dashboard.Total contracts') }} </th>
                                            <th>{{ trans('dashboard.Total interviews') }} </th>

                                        </tr>
                                        <tr>
                                            <td> BABU ANSARI</td>

                                            <td> 48</td>
                                            <td> 12</td>
                                            <td> 2</td>
                                            <td> 29</td>
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


                                        <tr>
                                            <td> 2371</td>
                                            <td> BABU ANSARI</td>
                                            <td><a href="#">Moodak Medical Clinics</a></td>
                                            <td><i class="icon-xl far fa-check-circle text-success"></i></td>

                                            <td></td>

                                            <td></td>

                                            <td><i class="icon-xl far fa-check-circle text-success"></i></td>
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