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
                            {{ trans('dashboard.Assign companies to a representative') }}
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

                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>

                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Assign companies to a representative') }}
                            </a>
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
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <form method="post" action="{{ route('companies.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Representative') }} :</label>
                                            <select name="" class="form-control select2" required>
                                                <option value="0">{{ trans('dashboard.Select All') }}</option>
                                                <option value="1">{{ trans('dashboard.BABU ANSARI') }}</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Country') }} :</label>
                                            <select name="" class="form-control select2" required>
                                                <option value="0">{{ trans('dashboard.Select All') }}</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Sectors') }} :</label>
                                            <select class="form-control select2" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.City') }} :</label>
                                            <select class="form-control select2" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>

                                            </select>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Company Type') }}:</label>
                                            <select class="form-control select2" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Companies') }} :</label>
                                            <select id="subSector" multiple class="form-control select2"
                                                    name="sub_sector_id"
                                                    required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option value="">{{ trans('dashboard.Male') }}</option>
                                                <option value="" selected="">{{ trans('dashboard.Female') }}</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div class="row">

                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('companies.index') }}"
                                               class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>

@endsection



@section('script')


@endsection