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
                            {{ $company->name }}
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
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}
                            </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.View Company Data') }}
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
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-body">
                        <div class="d-flex">
                            <!--begin::Pic-->
                            <div class="flex-shrink-0 mr-7">
                                <div class="symbol symbol-50 symbol-lg-120">
                                    <img alt="Pic" src="{{ $company->logo ? asset('storage/images/'.$company->logo) :  'https://marketing-hc.com/photos/5f154b2c6de301595231020.png'}}">
                                </div>
                            </div>
                            <!--end::Pic-->

                            <!--begin: Info-->
                            <div class="flex-grow-1">
                                <!--begin::Title-->
                                <div class="d-flex align-items-center justify-content-between flex-wrap">
                                    <!--begin::User-->
                                    <div class="mr-3">
                                        <div class="d-flex align-items-center mr-3">
                                            <!--begin::Name-->
                                            <a href="#"
                                               class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                                {{ $company->name }}
                                            </a>
                                            <!--end::Name-->
                                            <span class="label label-light-danger label-inline font-weight-bolder mr-1">Hot</span> {{ trans('dashboard.By User') }}
                                            <span class="label  label-dark label-inline font-weight-bolder ml-1">{{ auth()->user()->name }}</span>


                                        </div>

                                        <!--begin::Contacts-->
                                        <div class="d-flex flex-wrap my-2">
                                            <a href="#"
                                               class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                <i class="fa fa-envelope-open-text text-primary"></i>
                                </span> {{ $company->email }}
                                            </a>
                                            <a href="#"
                                               class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"> <i class="fa fa-suitcase text-primary"></i></span>
                                                {{ $company->subSector->name ? $company->subSector->name : '-' }}
                                            </a>
                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                               <i
                                       class="fas far fa-map-marker text-primary"></i>
                                </span> {{ $company->location ? $company->location : '-' }}
                                            </a>

                                            <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                               <i
                                       class="fab fa-whatsapp text-primary"></i>
                                </span>{{ $company->whatsapp }}
                                            </a>
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <!--begin::User-->

                                    <!--begin::Actions-->
                                    <div class="mb-10">
                                        <a href="#"
                                           class="btn btn-sm btn-light-primary font-weight-bolder text-uppercase mr-2">{{ trans('dashboard.Print') }}</a>

                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Title-->

                                <!--begin::Content-->
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <!--begin::Description-->
                                    <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">
                                        @if($company->first_business_card)
                                            <a class="business_card" data-toggle="modal"
                                               href="#exampleModal">
                                                <img style="width: 100px;"
                                                     src="{{ asset('storage/images/'.$company->first_business_card) }}">
                                            </a>
                                        @endif

                                        @if($company->second_business_card)
                                            <a class="business_card" data-toggle="modal"
                                               href="#exampleModal">
                                                <img style="width: 100px;"
                                                     src="{{ asset('storage/images/'.$company->second_business_card) }}">
                                            </a>
                                        @endif

                                        @if($company->third_business_card)
                                            <a class="business_card" data-toggle="modal"
                                               href="#exampleModal">
                                                <img style="width: 100px;"
                                                     src="{{ asset('storage/images/'.$company->third_business_card) }}">
                                            </a>
                                        @endif
                                    </div>
                                    <!--end::Description-->


                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Info-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->

                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-4">

                        <!--begin::Card-->
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header h-auto py-4">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{ $company->name }}
                                        <span class="d-block text-muted pt-2 font-size-sm">{{ trans('dashboard.General information about the company') }}
</span>
                                    </h3>
                                </div>

                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-4">
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.phone number') }}:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->phone }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Sector') }}:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->sector->name ? $company->sector->name : '-' }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Country') }}:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext"><span
                                                    class="font-weight-bolder">Saudia
                                                </span> &nbsp;<span
                                                    class="label label-inline label-danger label-bold">Riyadh</span></span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.District') }}:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->district }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Location') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                           {{ $company->location }}
                        </span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Branches Number') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                           {{ $company->branch_number }}
                        </span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Number of Employees Company') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                           {{ $company->num_of_employees }}
                        </span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Website') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                          <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                        </span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Linkedin') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                          <a href="{{ $company->linkedin }}" target="_blank">{{ $company->linkedin }}</a>
                        </span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">{{ trans('dashboard.Twitter') }}:</label>
                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                          <a href="{{ $company->twitter }}" target="_blank">{{ $company->twitter }}</a>
                        </span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <div class="col-xl-8">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header h-auto py-4">
                                <div class="card-title">
                                    <h3 class="card-label">
                                        {{ trans('dashboard.Designated contact') }}

                                    </h3>
                                </div>

                            </div>
                            <!--begin::Body-->
                            <div class="card-body p-0">
                                <div class="tab-content pt-5">
                                    <!--begin::Tab Content-->
                                    <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                                        <div class="container">
                              <div class="row">
                                  @for($i = 0 ; $i<3 ; $i++)
                                      @if(isset($company->companyDesignatedcontacts[$i]))
                                          <div class="col-md-4 border">

                                              <span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">{{ $i+1 }}</span>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Name') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder"> {{ $company->companyDesignatedcontacts[$i]->name }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Job Title') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder">{{ $company->companyDesignatedcontacts[$i]->job_title }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Mobile') }}:</label>
                                                  <div class="col-8">
                                        <span class="form-control-plaintext">
                                            <span class="font-weight-bolder">{{ $company->companyDesignatedcontacts[$i]->mobile }} </span> &nbsp;
                                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.District') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder">{{ $company->district }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.Linkedin') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href="{{ $company->companyDesignatedcontacts[$i]->linkedin }}">
                                <i class="fab fa-linkedin  text-primary"></i>
                            </a>

                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.Whatsapp') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href=" {{ $company->companyDesignatedcontacts[$i]->whatsapp }}"> <i class="fab fa-whatsapp  text-success"></i></a>
                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.E-Mail') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href="{{ $company->companyDesignatedcontacts[$i]->email }}"> <i class="fa fa-envelope-open-text text-primary"></i></a>
                        </span>
                                                  </div>
                                              </div>


                                          </div>
                                      @else
                                          <div class="col-md-4 border">

                                              <span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">{{ $i+1 }}</span>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Name') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder"> {{ $company->companyDesignatedcontacts[$i]->name }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Job Title') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder">{{ $company->companyDesignatedcontacts[$i]->job_title }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.Mobile') }}:</label>
                                                  <div class="col-8">
                                        <span class="form-control-plaintext">
                                            <span class="font-weight-bolder">{{ $company->companyDesignatedcontacts[$i]->mobile }} </span> &nbsp;
                                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-4 col-form-label">{{ trans('dashboard.District') }}:</label>
                                                  <div class="col-8">
                                                      <span class="form-control-plaintext font-weight-bolder">{{ $company->district }}</span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.Linkedin') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href="{{ $company->companyDesignatedcontacts[$i]->linkedin }}">
                                <i class="fab fa-linkedin  text-primary"></i>
                            </a>

                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.Whatsapp') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href=" {{ $company->companyDesignatedcontacts[$i]->whatsapp }}"> <i class="fab fa-whatsapp  text-success"></i></a>
                        </span>
                                                  </div>
                                              </div>
                                              <div class="form-group row my-2">
                                                  <label class="col-5 col-form-label">{{ trans('dashboard.E-Mail') }}:</label>
                                                  <div class="col-7">
                        <span class="form-control-plaintext font-weight-bolder">
                            <a href="{{ $company->companyDesignatedcontacts[$i]->email }}"> <i class="fa fa-envelope-open-text text-primary"></i></a>
                        </span>
                                                  </div>
                                              </div>


                                          </div>
                                      @endif
                                  @endfor
                              </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <div class="card-header h-auto p-0">
                                                <div class="card-title">
                                                    <h3 class="card-label">
                                                        {{ trans('dashboard.Confirm Meeting') }}

                                                    </h3>
                                                </div>

                                            </div>
                                            <div class="form-group row my-2">
                                                <label class="col-2 col-form-label">{{ trans('dashboard.Date') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder"> 12/12/1122</span>
                                                </div>
                                                <label class="col-2 col-form-label">{{ trans('dashboard.Time') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder"> 15:32:00</span>
                                                </div>
                                                    <label class="col-2 col-form-label">{{ trans('dashboard.By User') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder">Admin</span>
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>
                                            <div class="form-group row my-2">
                                                <label class="col-2 col-form-label">{{ trans('dashboard.Date') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder"> 12/12/1122</span>
                                                </div>
                                                <label class="col-2 col-form-label">{{ trans('dashboard.Time') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder"> 15:32:00</span>
                                                </div>
                                                <label class="col-2 col-form-label">{{ trans('dashboard.By User') }}:</label>
                                                <div class="col-2">
                                                    <span class="form-control-plaintext font-weight-bolder">Admin</span>
                                                </div>
                                            </div>
                                            <div class="separator separator-dashed my-5"></div>


                                            <div class="separator separator-dashed my-5"></div>
<div class="row">
                                            <div class="col-md-6 border">
                                                <div class="card-header h-auto p-5">
                                                    <div class="card-title m-0">
                                                        <h3 class="card-label  m-0">
                                                            {{ trans('dashboard.Company Representative') }}

                                                        </h3>
                                                    </div>

                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Name') }}:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->company_representative_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Job Title') }}:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->company_representative_job_title }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Mobile') }}:</label>
                                                    <div class="col-8">
                                        <span class="form-control-plaintext">
                                            <span class="font-weight-bolder">{{ $company->company_representative_job_mobile }} </span>
                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">>{{ trans('dashboard.Email') }}:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->company_representative_job_email }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Phone') }}:</label>
                                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                          {{ $company->company_representative_job_phone }}

                        </span>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-md-6 border">
                                                <div class="card-header h-auto p-5">
                                                    <div class="card-title m-0">
                                                        <h3 class="card-label  m-0">
                                                            {{ trans('dashboard.HR Director') }}

                                                        </h3>
                                                    </div>

                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Name') }}:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->hr_director_job_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Email') }}:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $company->hr_director_job_email }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Mobile') }}:</label>
                                                    <div class="col-8">
                                        <span class="form-control-plaintext">
                                            <span class="font-weight-bolder"> {{ $company->hr_director_job_mobile }}</span>
                                        </span>
                                                    </div>
                                                </div>

                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.Phone') }}:</label>
                                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                         {{ $company->hr_director_job_phone }}

                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">{{ trans('dashboard.HR Whatsapp') }}:</label>
                                                    <div class="col-8">
                        <span class="form-control-plaintext font-weight-bolder">
                        <a href="{{ $company->hr_director_job_whatsapp }}"> <i class="fab fa-whatsapp  text-success"></i></a>

                        </span>
                                                    </div>
                                                </div>


                                            </div>
</div>
                                            <div class="separator separator-dashed my-5"></div>

                                            <form class="form">
                                                <div class="form-group">
                                                    <textarea disabled class="form-control form-control-lg form-control-solid disabled" id="exampleTextarea" rows="3" placeholder="{{ trans('dashboard.Notes') }}">{{ $company->notes }}</textarea>
                                                </div>

                                            </form>
                                            <div class="separator separator-dashed my-5"></div>
                                        </div>
                                    </div>
                                    <!--end::Tab Content-->

                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


@endsection



@section('script')

@endsection