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
                            <form method="post" action="{{ route('company_needs.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="company_id" value="{{ $company_id }}">
                                <input type="hidden" name="sector_id" value="{{ $sector_id }}">

                                <div class="card-body">

                                    <div class=" row">
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                                <div class="col-lg-12 mb-3">
                                                    <label>{{ trans('dashboard.Recruitment Type') }} :</label>
                                                    <select name="employment_type_id" class="form-control select2" required>
                                                        <option value="">{{ trans('dashboard.Select All') }}</option>
                                                        @foreach($employeement_types as $employeement_type)
                                                            <option value="{{ $employeement_type->id }}">{{ app()->getLocale() == 'ar' ? $employeement_type->name : $employeement_type->name_en }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12">
                                                    <label>{{ trans('dashboard.Required Position') }} :</label>
                                                    <input value="{{ old('required_position') }}" name="required_position" type="text" class="form-control"
                                                           placeholder="{{ trans('dashboard.Required Position') }}" required/>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Job Description') }} :</label>
                                            <textarea name="job_description" class="form-control" rows="5">{{ old('job_description') }}</textarea>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.No of candidates') }} :</label>
                                            <input value="{{ old('candidates_number') }}" name="candidates_number" type="number"
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
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Gender') }} :</label>
                                            <select id="gender" class="form-control select2" name="gender"
                                                    required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option value="1" >{{ trans('dashboard.Male') }}</option>
                                                <option value="2">{{ trans('dashboard.Female') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Age Limit') }}:</label>
                                            <input value="{{ old('minimum_age') }}" name="minimum_age" type="number"
                                                   class="form-control" placeholder="{{ trans('dashboard.Age Limit') }}" required/>
                                                    @error('minimum_age')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Qualification') }}:</label>
                                            <input value="{{ old('educational_qualification') }}" name="educational_qualification" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Qualification') }}" required/>
                                                    @error('educational_qualification')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.DataFlow') }}:</label>
                                            <select id="data_flow" class="form-control select2" name="data_flow"
                                                    required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option value="0">{{ trans('dashboard.Not required') }}</option>
                                                <option value="1" >{{ trans('dashboard.Required from inside the Kingdom') }}</option>
                                                <option value="2">{{ trans('dashboard.Required from outside the Kingdom') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.prometric') }}:</label>
                                            <select id="prometric" class="form-control select2" name="prometric"
                                                    required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                <option value="1">{{ trans('dashboard.yes') }}</option>
                                                <option value="2" >{{ trans('dashboard.No') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.classification') }}:</label>
                                            <input value="{{ old('classification') }}" name="classification" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.classification') }}" required/>
                                                    @error('classification')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.International Experience') }}:</label>
                                            <input value="{{ old('total_experience') }}" name="total_experience" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.International Experience') }}" required/>
                                                    @error('total_experience')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.area_of_experience') }}:</label>
                                            <input value="{{ old('area_of_experience') }}" name="area_of_experience" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.area_of_experience') }}" required/>
                                                    @error('area_of_experience')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.total_salary') }}:</label>
                                            <input value="{{ old('total_salary') }}" name="total_salary" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.total_salary') }}" required/>
                                                    @error('total_salary')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.other_skills') }}:</label>
                                            <input value="{{ old('other_skills') }}" name="other_skills" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.other_skills') }}" required/>
                                                    @error('other_skills')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.Special Remarks') }}:</label>
                                            <input value="{{ old('special_note') }}" name="special_note" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Special Remarks') }}" required/>
                                                    @error('special_note')
                                                    <div class="error">{{ $message }}</div>
                                                    @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('company_needs.index' , $company_id) }}"
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