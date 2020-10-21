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
                            {{ trans('dashboard.All Representative') }}
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
                                {{ trans('dashboard.All Representative') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">

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
                                        {{ trans('dashboard.All Representative') }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table id="myTable" class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('dashboard.Sl.No') }}</th>
                                            <th>{{ trans('dashboard.Representative') }}</th>
                                            <th>{{ trans('dashboard.Representative companies') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($representatives as $k=>$representative)
                                                <tr>
                                                    <td>{{ $representative->id }}</td>
                                                    <td>{{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}</td>
                                                    <td><a class="btn btn-success font-weight-bold"
                                                           href="{{ route('get_companies_of_representative' , $representative->id) }}">{{ trans('dashboard.Show Companies') }}</a></td>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if(auth()->user()->hasRole('Sales Manager'))
                                                <tr>
                                                    <td>{{ auth()->user()->id }}</td>
                                                    <td>{{ app()->getLocale() == 'ar' ? auth()->user()->name : auth()->user()->name_en }}</td>
                                                    <td><a class="btn btn-success font-weight-bold"
                                                           href="{{ route('get_companies_of_representative' , auth()->user()->id) }}">{{ trans('dashboard.Show Companies') }}</a></td>
                                                    </td>
                                                </tr>
                                            @endif
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
    <link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>

    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6') }}"></script>
    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js?v=7.0.6') }}"></script>



    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endsection