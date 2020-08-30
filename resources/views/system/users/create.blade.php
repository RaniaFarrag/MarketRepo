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
                            {{ trans('dashboard.Add New user') }}
                        </h2>
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
                            <a href="{{ route('home') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.dashboard') }} </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Add New user') }}
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

                            <form method="post" action="{{ route('users.store') }}" class="form">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                      {{ trans('dashboard.Add New user') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Name Arabic') }} :</label>
                                            <input value="{{ old('name') }}" name="name" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.User Name Arabic') }}"/>
                                            @error('name')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Name English') }} :</label>
                                            <input value="{{ old('name_en') }}" name="name_en" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Name English') }}"/>
                                            @error('name_en')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.User E-mail') }} :</label>
                                            <input value="{{ old('email') }}" name="email" type="email"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Name Arabic') }}"/>
                                            @error('email')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-xs-6">
                                            <label>{{ trans('dashboard.Select Roles') }}</label>
                                            <select class="form-control select2" name="role">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->name }}">{{ app()->getLocale() == 'ar' ? $role->name_ar : $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Password') }} :</label>
                                            <input value="{{ old('password') }}" name="password" type="password"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Password') }}"/>
                                            @error('password')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Confirm Password') }} :</label>
                                            <input value="{{ old('password') }}" name="password_confirmation" type="password"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Password') }}" required autocomplete="new-password"/>
                                            @error('password')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 col-xs-6">
                                            <label>{{ trans('dashboard.Select Sector') }}</label>
                                            <select class="form-control select2" name="sector_id">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sector_id')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                            <a href="{{ route('users.index') }}"
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