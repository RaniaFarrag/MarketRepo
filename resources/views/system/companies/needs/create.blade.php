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
                            {{ trans('dashboard.Company Needs') }}
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
                            <a href="{{ route('companies.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Company Needs') }}
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

                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <div class="col-lg-12 mb-3">
                                                    <label>{{ trans('dashboard.Recruitment Type') }} :</label>
                                                    <select name="" class="form-control select2" required>
                                                        <option value="0">{{ trans('dashboard.Select All') }}</option>
                                                        <option value="1">{{ trans('dashboard.International') }}</option>
                                                        <option value="2">{{ trans('dashboard.local') }}</option>
                                                        <option value="3">{{ trans('dashboard.International/local') }}</option>

                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>{{ trans('dashboard.Required Position') }} :</label>
                                                    <input value="" name="" type="number" class="form-control"
                                                           placeholder="Required Position"/>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Job Description') }} :</label>
                                            <textarea name="notes" class="form-control" rows="5"></textarea>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.No of candidates') }} :</label>
                                            <input value="" name="phone" type="number"
                                                   class="form-control" placeholder="No of candidates" required/>
                                            @error('phone')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Nationality') }} :</label>
                                            <select  class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>

                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Gender') }} :</label>
                                            <select id="subSector" class="form-control select2" name="sub_sector_id"
                                                    required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option value="" selected="">{{ trans('dashboard.Male') }}</option>
                                                <option value="" selected="">{{ trans('dashboard.Female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Age Limit') }}:</label>
                                            <input value="" name="Contract_Duration" type="number"
                                                   class="form-control" placeholder="{{ trans('dashboard.Age Limit') }}" required/>
                                            @error('phone')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Contract Duration') }}:</label>
                                            <input value="" name="phone" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Contract Duration') }}" required/>
                                            @error('phone')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Work Location') }}:</label>
                                            <input value="" name="district" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Work Location') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Working Hours') }}:</label>
                                            <input value="" name="location" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Working Hours') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Total Salary') }}:</label>
                                            <input value="" name="branch_number" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Total Salary') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Number of Employees Company') }}:</label>
                                            <input value="" name="num_of_employees" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Number of Employees Company') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Deadline') }}:</label>
                                            <input value="" name="website" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Deadline') }}"/>
                                        </div>
                                        <div class="col-lg-9">
                                            <label>{{ trans('dashboard.Special Remarks') }}:</label>
                                            <input value="" name="email" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Special Remarks') }}"/>
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