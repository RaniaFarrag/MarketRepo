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
                            {{ trans('dashboard.Company Quotations') }}
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
                                {{ trans('dashboard.Company Quotations') }}
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
                            <form method="post" action="#" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                              

                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Ref: No') }} :</label>
                                            <input value=" " name=" " type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Ref: No') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Attn') }} :</label>
                                            <input value=" " name=" " type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Attn') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Tel') }} :</label>
                                            <input value=" " name=" " type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Tel') }}" />
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile') }} :</label>
                                            <input value=" " name=" " type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Mobile') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.E-mail') }} :</label>
                                            <input value=" " name="candidates_number" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.E-mail') }}" required/>

                                                   

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Quotation No.') }} :</label>
                                            <input value=" " name="candidates_number" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Quotation No.') }}" required/>

                                                   

                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.TRADE') }}:</label>
                                            <input value=" " name="minimum_age" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.TRADE') }}" required/>

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
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Qualification') }}:</label>
                                            <input value="{{ old('educational_qualification') }}" name="educational_qualification" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Qualification') }}" required/>
                                            @error('educational_qualification')
                                           
                                            @enderror
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.QTY') }}:</label>
                                            <input value="" name="minimum_age" type="number"
                                                   class="form-control" placeholder="{{ trans('dashboard.QTY') }}" required/>
                                            
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Contract Duration') }}:</label>
                                            <input value="{{ old('contract_duration') }}" name="contract_duration" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Contract Duration') }}" required/>
                                            @error('contract_duration')
                                           
                                            @enderror
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Experience Range') }}:</label>
                                            <input value="{{ old('experience_range') }}" name="experience_range" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Work Location') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Work Location') }}:</label>
                                            <input value="{{ old('work_location') }}" name="work_location" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Work Location') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Working Hours') }}:</label>
                                            <input value="{{ old('work_hours') }}" name="work_hours" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Working Hours') }}" required/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Total Salary') }}:</label>
                                            <input value="{{ old('total_salary') }}" name="total_salary" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Total Salary') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Deadline') }}:</label>
                                            <input value="{{ old('deadline') }}" name="deadline" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Deadline') }}"/>
                                        </div>
                                        <div class="col-lg-9">
                                            <label>{{ trans('dashboard.Special Remarks') }}:</label>
                                            <input name="special_note" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Special Remarks') }}"/>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="#"
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