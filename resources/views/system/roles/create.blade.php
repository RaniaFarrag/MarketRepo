@extends('layouts.dashboard')

@section('body')
    <style>
        .switch label {
            margin: 0 auto;
        }
        table.table.table-bordered.text-center tbody tr.sprated td {
            background: #6993FF !important;
            color: #6993FF;
            height: 3px !important;
            padding: 0 !important;
            margin: 0 !important;
            line-height: 1px;
            font-size: 0;}
    </style>
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
                            {{ trans('dashboard.Add New role') }}
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
                            <a href="{{ route('roles.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.All Roles') }} </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Add New role') }}
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

                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif

                            <form method="post" action="{{ route('roles.store') }}" class="form">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                      {{ trans('dashboard.Add New role') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Role Name Arabic') }} :</label>
                                            <input value="{{ old('name_ar') }}" name="name_ar" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Role Name Arabic') }}"/>
                                            @error('name_ar')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Role Name English') }} :</label>
                                            <input value="{{ old('name') }}" name="name" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Role Name English') }}"/>
                                            @error('name')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> {{ trans('dashboard.Permission Name') }}</th>
                                            <th>{{ trans('dashboard.Action') }}</th>


                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($permissions as $k => $permission)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>  {{ app()->getLocale()=='ar' ? $permission->name_ar : $permission->name }}  </td>
                                                <td>
                                                    <span class="switch switch-icon">
                                                        <label>
                                                            <input name="permissions[]" value="{{ $permission->name }}" type="checkbox"
                                                                    {{ old('permissions') && in_array($permission->name, old('permissions')) ? ' checked' : '' }}/>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>

                                            </tr>
                                        @endforeach

                                        </tbody>

                                    </table>

                                </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                            <a href="{{ route('roles.index') }}"
                                               class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--end::Card-->
                    </div>

                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>




@endsection