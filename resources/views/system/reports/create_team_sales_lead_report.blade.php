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
                            {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
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
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                            {{--{{ trans('dashboard.Region') }}--}}
                            {{--</a>--}}
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('countries.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                            </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
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

                            <form method="post" action="{{ route('companySalesTeamReports.store',$company->id) }}"
                                  class="form">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        {{ trans('dashboard.TEAM SALES LEAD REPORT') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{__('dashboard.Brochure status')}} :</label>
                                            <select name="brochurs_status" class="form-control" required>
                                                <option value="">select</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>

                                        </div>
                                        <div class="col-lg-3">
                                            <label for="name">{{__('dashboard.Category of Requirement')}}</label>
                                            <input type="text" class="form-control" required="" name="cat_of_req"
                                                   value="" placeholder="{{__('dashboard.Category of Requirement')}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="name">{{__('dashboard.Quanity')}}</label>
                                            <input type="number" class="form-control" required="" name="quanity"
                                                   value="" placeholder="{{__('dashboard.Quanity')}}">
                                        </div>
                                        <div class="col-lg-3">
                                            <label for="name">{{__('dashboard.Type of Service required')}}</label>
                                            <input type="text" class="form-control def-input def-select"
                                                   required
                                                   name="type_of_serves"
                                                   value=""
                                                   placeholder="{{__('dashboard.Type of Service required')}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.Client Feedback')}}</label>
                                            <textarea name="client_feeback" id="" class="form-control"
                                                      style="width: 100%"
                                                      rows="5"> </textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.Updates')}}</label>
                                            <textarea name="updates" id="" class="form-control" style="width: 100%"
                                                      rows="5"> </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.Remarks')}}</label>
                                            <textarea name="remarks" id="" class="form-control" style="width: 100%"
                                                      rows="5"> </textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.Notes')}}</label>
                                            <textarea name="notes" id="" class="form-control" style="width: 100%"
                                                      rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.Lead status')}}</label>
                                            <select name="statue" class="form-control">
                                                <option value="">There is no status</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Warm">Warm</option>
                                                <option value="Cold">Cold</option>
                                                <option value="CLOSED-WON">CLOSED-WON</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="name">{{__('dashboard.nextFollowUp')}}</label>
                                            <input type="date" class="form-control"
                                                   name="nextFollowUp"
                                                   value=""
                                                   placeholder="dd-mm-yyyy">
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">

                                            <div class="col-lg-12 text-center">
                                                <button type="submit"
                                                        class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                                <a href="{{ route('countries.index') }}"
                                                   class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                            </div>
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
