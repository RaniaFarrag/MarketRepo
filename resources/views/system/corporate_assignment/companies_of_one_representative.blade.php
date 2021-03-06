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
                            {{ trans('dashboard.Representative companies') }}
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
                                {{ trans('dashboard.Representative companies') }}
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
                                        {{ trans('dashboard.Representative companies') }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table id="myTable" class="table table-bordered text-center">
                                        <thead>
                                        <tr>

                                            <th>#</th>
                                            <th>#</th>
                                            <th>{{ trans('dashboard.Representative') }}</th>
                                            <th>{{ trans('dashboard.Company Name') }}</th>
                                            <th>{{ trans('dashboard.City') }}</th>
                                            <th>{{ trans('dashboard.Sectors') }}</th>
                                            <th>{{ trans('dashboard.Company Type') }}</th>
                                            <th>{{ trans('dashboard.Remove') }}</th>

                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($companies_of_representative as $k=>$company_of_representative)
                                            <tr>
                                                <td><div class="checkbox-inline">
                                                        <label class="checkbox checkbox-outline checkbox-success m-auto ">
                                                            <input type="checkbox" name="company_ids[]" class="checkPhones"
                                                                   value="{{ $company_of_representative->id }}">
                                                            <span class="m-0"></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ app()->getLocale()=='ar' ?  $representative->name : $representative->name_en }}</td>
                                                <td>{{ $company_of_representative->name }}</td>
                                                <td>{{ $company_of_representative->city ? $company_of_representative->city->name : '-' }}</td>
                                                <td>{{ $company_of_representative->sector ? $company_of_representative->sector->name : '-'}}</td>
                                                <td>{{ $company_of_representative->subSector ? $company_of_representative->subSector->name : '-'}}</td>


                                                <td>
                                                    <a href="{{ route('cancel_company_assignment' , [$company_of_representative->id , $representative->id])  }}"
                                                       onclick="return confirm('Are you sure?')"  class="btn btn-danger mr-2"><i class="fa fa-trash p-0"></i></a>
                                                    {{--<form method="post" action="#">--}}
                                                    {{--@method('DELETE')--}}
                                                    {{--@csrf--}}
                                                    {{--<button onclick="return confirm('Are you sure?')" class="btn btn-danger mr-2" type="submit"><i class="fa fa-trash p-0"></i></button>--}}
                                                    {{--</form>--}}
                                                </td>
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
    <link href="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css"/>

    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('dashboard/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.6') }}"></script>
    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('dashboard/assets/js/pages/crud/datatables/basic/basic.js?v=7.0.6') }}"></script>



    <script>
        $(document).ready( function () {
            $('#myTable').DataTable( {
                select: true
            } );
        } );
    </script>
@endsection
