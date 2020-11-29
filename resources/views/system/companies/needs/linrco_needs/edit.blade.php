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
                            {{ trans('dashboard.Linrco Company Needs') }}
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
                            <a href="{{ route('companies.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Linrco Company Needs') }}
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
                            <form method="post" action="{{ route('company_needs.update' , $need->id) }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="company_id" value="{{ $company_id }}">
                                <input type="hidden" name="mother_company_id" value="{{ $mother_company_id }}">
                                {{--<input type="hidden" name="sector_id" value="{{ $sector_id }}">--}}

                                <div class="card-body">

                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <div class="col-lg-12 mb-3">
                                                    <label>{{ trans('dashboard.Recruitment Type') }} :</label>
                                                    <select name="employment_type_id" class="form-control select2" required>
                                                        <option value="">{{ trans('dashboard.Select All') }}</option>
                                                        @foreach($employeement_types as $employeement_type)
                                                            <option {{ $employeement_type->id == $need->employment_type_id ? 'selected' : '' }} value="{{ $employeement_type->id }}">{{ app()->getLocale() == 'ar' ? $employeement_type->name : $employeement_type->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>{{ trans('dashboard.Required Position') }} :</label>
                                                    <input value="{{ $need->required_position }}" name="required_position" type="text" class="form-control"
                                                           placeholder="{{ trans('dashboard.Required Position') }}" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Job Description') }} :</label>
                                            <textarea name="job_description" class="form-control" rows="5">{{ $need->job_description }}</textarea>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.No of candidates') }} :</label>
                                            <input value="{{ $need->candidates_number }}" name="candidates_number" type="number"
                                                   class="form-control" placeholder="{{ trans('dashboard.No of candidates') }}" required/>
                                            @error('candidates_number')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Nationality') }} :</label>
                                            <select name="country_id" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($countries as $country)
                                                    <option {{ $country->id == $need->country_id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Gender') }} :</label>
                                            <select id="gender" class="form-control select2" name="gender"
                                                    required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option {{ $need->gender == 1 ? 'selected' : '' }} value="1" >{{ trans('dashboard.Male') }}</option>
                                                <option {{ $need->gender == 2 ? 'selected' : '' }} value="2">{{ trans('dashboard.Female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Age Limit') }}:</label>
                                            <input value="{{ $need->minimum_age }}" name="minimum_age" type="number"
                                                   class="form-control" placeholder="{{ trans('dashboard.Age Limit') }}" required/>
                                            @error('minimum_age')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Contract Duration') }}:</label>
                                            <input value="{{ $need->contract_duration }}" name="contract_duration" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Contract Duration') }}" required/>
                                            @error('contract_duration')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Experience Range') }}:</label>
                                            <input value="{{ $need->experience_range }}" name="experience_range" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Work Location') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Work Location') }}:</label>
                                            <input value="{{ $need->work_location }}" name="work_location" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Work Location') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Working Hours') }}:</label>
                                            <input value="{{ $need->work_hours }}" name="work_hours" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Working Hours') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Total Salary') }}:</label>
                                            <input value="{{ $need->total_salary }}" name="total_salary" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Total Salary') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Deadline') }}:</label>
                                            <input value="{{ $need->deadline }}" name="deadline" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Deadline') }}"/>
                                        </div>
                                        <div class="col-lg-9">
                                            <label>{{ trans('dashboard.Special Remarks') }}:</label>
                                            <input value="{{ $need->special_note }}" name="special_note" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Special Remarks') }}"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('company_needs.index' , [$need->company_id , $mother_company_id]) }}"
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