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
                            {{ trans('dashboard.Edit Note') }}
                        </h2>
                        <!--end::Title-->

                        <!--begin::Breadcrumb-->
                        <div class="d-flex align-items-center font-weight-bold my-2">
                            <!--begin::Item-->
                            <a href="{{ route('home') }}" class="opacity-75 hover-opacity-100">
                                <i class="flaticon2-shelter text-white icon-1x"></i>
                            </a>

                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Edit Note') }}
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

                            <form method="post" action="{{ route('update_notes_of_request_report' , $note->id) }}" class="form">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                         {{ trans('dashboard.Edit Note') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.feedback') }} :</label>
                                            <input value="{{ $note->feedback }}" name="feedback" type="text" class="form-control" placeholder="{{ trans('dashboard.feedback') }}"/>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.notes') }} :</label>
                                            <input value="{{ $note->note }}" name="note" type="text" class="form-control" placeholder="{{ trans('dashboard.notes') }}"/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.nextfollow_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $note->next_follow_date }}" name="next_follow_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.request_status') }} :</label>
                                            <select name="request_status" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                <option {{ $note->request_status == 'Open' ? 'selected' : '' }} value="Open">{{ trans('dashboard.Open') }}</option>
                                                <option {{ $note->request_status == 'Closed' ? 'selected' : '' }} value="Closed">{{ trans('dashboard.Closed') }}</option>
                                                <option {{ $note->request_status == 'Pending' ? 'selected' : '' }} value="Pending">{{ trans('dashboard.Pending') }}</option>
                                            </select>
                                        </div>


                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                            <a href="{{ route('get_notes_of_request_report' , $note->company_request_id) }}" class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
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
