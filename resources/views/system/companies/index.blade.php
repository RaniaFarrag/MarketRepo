@extends('layouts.dashboard')

@section('body')
    <style>
        a.sociall img {
            width: 25px;
        }

        .checkbox-inline.company_Card label {
            display: inline-block;
            text-align: center;
        }

        .checkbox-inline .checkbox span {
            margin: auto;
        }

        .btn .badge {
            position: absolute;
            top: -1px;
            right: 0;
            color: #6993FF;
            border: 1px solid;
            padding: 7px 5px;
            line-height: 0;
            border-radius: 50%;
        }
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
                            {{ trans('dashboard.Companies View') }}</h2>
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
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                                {{--{{ trans('dashboard.Companies Data') }} </a>--}}
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                                {{--{{ trans('dashboard.Companies View') }}  </a>--}}
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->

                </div>
                <!--end::Info-->

                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    <a href="{{ route('companies.create') }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Add New Company') }}
                    </a>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6">
                        {{ trans('dashboard.Total companies') }} <span id="counter">{{ count($companies) }}</span>
                    </a>
                    <!--end::Button-->
                </div>
                <!--end::Toolbar-->
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
                            <div class="card-body">
                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Companies Filters') }}
                                            </div>
                                        </div>
                                        <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <div class="row fliter_serch">
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label> {{ trans('dashboard.Company Name') }}  </label>
                                                            <input id="name" name="name" type="text" class="form-control"
                                                                   placeholder="{{ trans('dashboard.Company Name') }}">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Sectors') }}</label>
                                                            <select id="sector" name="sector_id" class="form-control select2" >
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($sectors as $sector)
                                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Type') }}</label>
                                                            <select id="subSector" class="form-control select2" name="sub_sector_id">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Country') }}</label>
                                                            <select id="countries" class="form-control select2" name="country_id">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($countries as $country)
                                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.City') }}</label>
                                                            <select id="cities" class="form-control select2" name="city_id">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Evaluation status') }}</label>
                                                            <select id="evaluation_ids" class="form-control select2" name="evaluation_ids"
                                                                    multiple="multiple">
                                                                <option value="1">A</option>
                                                                <option value="2">B</option>
                                                                <option value="3">C</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Communication Type') }}</label>
                                                            <select id="communication_type" class="form-control select2" name="communication_type"
                                                                    multiple="multiple">
                                                                <option value="whatsapp" data-select2-id="71">Whatsapp</option>
                                                                <option value="email" data-select2-id="72">Email</option>
                                                                <option value="phone" data-select2-id="73">Phone</option>
                                                                <option value="twitter" data-select2-id="74">Twitter</option>
                                                                <option value="linkedin" data-select2-id="75">Linkedin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Status') }}</label>
                                                            <select class="form-control select2" id="company_status"
                                                                    name="company_status" multiple="multiple">
                                                                <option value="confirm_connected">Confirm Connection</option>
                                                                <option value="confirm_interview">Confirm Interview</option>
                                                                <option value="confirm_need">Confirm Need</option>
                                                                <option value="confirm_contract">Confirm Contract</option>
                                                                <option value="no_meeting">No Meeting</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Representative') }} </label>
                                                            <select id="representative" class="form-control select2" name="representative">
                                                                <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                <option value="1">{{ trans('dashboard.Existing') }}</option>
                                                                <option value="2">{{ trans('dashboard.Not Exist') }}
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Representative name') }}  </label>
                                                            <select id="representative_id" class="form-control select2" name="representative_id">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($representatives as $representative)
                                                                    <option value="{{ $representative->id }}">
                                                                        {{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Client Status') }}</label>
                                                            <select id="client_status" name="client_status" class="form-control select2">
                                                                <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                                                <option value="1">{{ trans('dashboard.Hot') }}</option>
                                                                <option value="2">{{ trans('dashboard.Warm') }}</option>
                                                                <option value="3">{{ trans('dashboard.Cold') }}</option>
                                                                <option value="4">{{ trans('dashboard.Awarded') }}</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Location') }}</label>
                                                            <select id="location" class="form-control select2" name="location">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                <option value="1">{{ trans('dashboard.Existing') }}</option>
                                                                <option value="2">{{ trans('dashboard.Not Exist') }}</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Confirm the interview') }}</label>
                                                            <div class="input-group input-group-solid date"
                                                                 id="kt_datetimepicker_3" data-target-input="nearest">
                                                                <input type="text" name="interview_date" id="interview_date"
                                                                       class="form-control form-control-solid datetimepicker-input"
                                                                       placeholder="Select date & time"
                                                                       data-target="#kt_datetimepicker_3"/>
                                                                <div class="input-group-append"
                                                                     data-target="#kt_datetimepicker_3"
                                                                     data-toggle="datetimepicker">
                                                                    <span class="input-group-text">
                                                                        <i class="ki ki-calendar"></i>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Company Date') }}</label>
                                                            <div class="input-group input-group-solid date"
                                                                 id="kt_datetimepicker_113" data-target-input="nearest">
                                                                <input type="text" name="created_at" id="created_at"
                                                                       class="form-control form-control-solid datetimepicker-input"
                                                                       placeholder="Select date & time"
                                                                       data-target="#kt_datetimepicker_113"/>
                                                                <div class="input-group-append"
                                                                     data-target="#kt_datetimepicker_113"
                                                                     data-toggle="datetimepicker">
                                                                        <span class="input-group-text">
                                                                            <i class="ki ki-calendar"></i>
                                                                        </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button type="button" id="searchFilter"
                                                                    class="btn btn-block btn-success">{{ trans('dashboard.Search') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
<<<<<<< HEAD
                                <div class="row">
                                    @foreach($companies as $company)
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom gutter-b card-stretch border-1 border-primary border">
                                                <!--begin::Body-->
                                                <div class="card-body p-4">
                                                    <!--begin::Toolbar-->
                                                    <div class="d-flex justify-content-end">

                                                        <div class="dropdown dropdown-inline" data-toggle="tooltip"
                                                             title=""
                                                             data-placement="left"
                                                             data-original-title="{{count($company->companyMeetings) ?  $company->companyMeetings[ count($company->companyMeetings) - 1 ]->date . ' ' .$company->companyMeetings[ count($company->companyMeetings) - 1 ]->time : ''  }}">
                                                            <a href="#"
                                                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon pulse pulse-primary text-primary">
                                                                <i class="far fa-bell text-primary"></i>
                                                               {{-- <span class="pulse-ring"></span>--}}

                                                                <span class="badge" id="count-alert2">{{ count($company->companyMeetings) ? count($company->companyMeetings) : 0 }}</span>
                                                            </a>
                                                        </div>

                                                        <div class="dropdown dropdown-inline">
                                                            <a href="#"
                                                               class="btn btn-clean btn-hover-light-primary btn-sm btn-icon"
                                                               data-toggle="dropdown" aria-haspopup="true"
                                                               aria-expanded="false">
                                                                <i class="ki ki-bold-more-hor"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right"
                                                                 style="">
                                                                <!--begin::Navigation-->
                                                                <ul class="navi navi-hover py-5">
                                                                    <li class="navi-item">
                                                                        <a href="{{ route('companies.show' , $company->id) }}" class="navi-link">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon2-list-3"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.View Company Data') }}</span>
                                                                        </a>
                                                                    </li>

                                                                    <li class="navi-item">
                                                                        <a href="{{ route('company_needs.index' , $company->id) }}" class="navi-link">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon2-list-3"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.View Company Needs') }}</span>
                                                                        </a>
                                                                    </li>

                                                                    <li class="navi-item">
                                                                        <a href="{{ route('companies.edit' , $company->id) }}"
                                                                           class="navi-link">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon-edit"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.Modifying Company Data') }}</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link"
                                                                           data-toggle="modal"
                                                                           data-target="#exampleModal">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon2-rocket-1"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.Send Email') }}</span>

                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <form id="del" method="post"
                                                                              action="{{ route('companies.destroy' , $company->id) }}">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <button onclick="return confirm('Are you sure?')"
                                                                                    class="navi-link" type="submit">
                                                                                <span class="navi-icon"><i
                                                                                            class="flaticon2-rubbish-bin"></i></span>
                                                                                <span class="navi-text">{{ trans('dashboard.Delete Company') }} </span>
                                                                            </button>
                                                                        </form>
                                                                        {{--<a href="javascript:{}" class="navi-link">--}}
                                                                        {{--<span class="navi-icon"><i--}}
                                                                        {{--class="flaticon2-rubbish-bin"></i></span>--}}
                                                                        {{--<span class="navi-text">{{ trans('dashboard.Delete Company') }} </span>--}}
                                                                        {{--</a>--}}
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon2-user-1"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.Assign companies to a representative') }} </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="{{ route('companySalesTeamReports.show',$company->id) }}" class="navi-link">
                                                                    <span class="navi-icon"><i
                                                                                class="flaticon-graph"></i></span>
                                                                            <span class="navi-text">{{ trans('dashboard.TEAM SALES LEAD REPORT') }} </span>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                                <!--end::Navigation-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Toolbar-->
                                                    <!--begin::User-->
                                                    <div class="d-flex align-items-center mb-7">
                                                        <!--begin::Pic-->
                                                        <div class="flex-shrink-0 mr-4 mt-lg-0 mt-3">
                                                            <div class="symbol symbol-circle symbol-lg-75 border">
                                                                <img src="{{ $company->logo ? asset('storage/images/'.$company->logo) :  'https://marketing-hc.com/photos/5f154b2c6de301595231020.png'}}"
                                                                     alt="image">
                                                            </div>
                                                        </div>
                                                        <!--end::Pic-->
                                                        <!--begin::Title-->
                                                        <div class="d-flex flex-column">
                                                            <a href="{{ route('companies.show' , $company->id) }}"
                                                               class="text-dark font-weight-bold text-hover-primary font-size-h4 mb-0">
                                                                {{ $company->name }}
                                                            </a>
                                                            <span class="text-muted font-weight-bold">
                                                                {{--RANIA--}}
                                                                {{--data-name :: IS ATT TO CARRY COMPANY NAME TO PASS IT TO MODAL--}}
                                                                {{--data-img-url :: IS ATT TO CARRY BUSINESS CARD IMAGE TO PASS IT TO MODAL--}}

                                                                @if($company->first_business_card)
                                                                    <a class="business_card" data-toggle="modal"
                                                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->first_business_card) }}">
                                                                        <img style="width: 60px;"
                                                                             src="{{ asset('storage/images/'.$company->first_business_card) }}">
                                                                    </a>
                                                                @endif

                                                                @if($company->second_business_card)
                                                                    <a class="business_card" data-toggle="modal"
                                                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->second_business_card) }}">
                                                                        <img style="width: 60px;"
                                                                             src="{{ asset('storage/images/'.$company->second_business_card) }}">
                                                                    </a>
                                                                @endif

                                                                @if($company->third_business_card)
                                                                    <a class="business_card" data-toggle="modal"
                                                                       href="#myModal" data-name="{{ $company->name }}" data-img-url="{{ asset('storage/images/'.$company->third_business_card) }}">
                                                                        <img style="width: 60px;"
                                                                             src="{{ asset('storage/images/'.$company->third_business_card) }}">
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::User-->

                                                    <!--begin::Info-->
                                                    <div class="mb-7">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Contact Information') }}
                                                                :</span>
                                                            <a href="#"
                                                               class="text-hover-primary">{{ $company->phone ? $company->phone : '-' }}</a>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-cente my-1">
                                                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Number of Employees') }}
                                                                : </span>
                                                            <span class=" text-hover-primary">{{ $company->num_of_employees ? $company->num_of_employees : '-' }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Company Location') }}
                                                                :</span>
                                                            <a href="#"> <span class="text-muted font-weight-bold">
                                                                    <i class="fas far fa-compass text-primary fa-spin"></i> {{ $company->location ? $company->location : '-' }}</span></a>
                                                        </div>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Company Type') }}
                                                                :</span>
                                                            <span class="text-muted font-weight-bold">{{ $company->subSector->name ? $company->subSector->name : '-' }}</span>
                                                        </div>
                                                        {{--@if($company->company_representative_name)--}}
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Company Representative name') }}
                                                                    :</span>
                                                                <span class="text-muted font-weight-bold">{{ $company->company_representative_name ? $company->company_representative_name : '-' }}</span>
                                                            </div>
                                                        {{--@endif--}}
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            {{--@if($company->email || $company->twitter || $company->linkedin || $company->whatsapp)--}}
                                                                <span class="text-dark-75 font-weight-bolder mr-2">{{ trans('dashboard.Communication Type') }}
                                                                    :</span>
                                                            {{--@endif--}}
                                                            <span class="text-muted font-weight-bold">
                                                                @if($company->email)
                                                                    <a class="md-effect sociall" data-toggle="modal"
                                                                       href="#btnMail-2863"
                                                                       data-effect="md-flipHor" req_id="1248">
                                                                        <img class="img-responsive"
                                                                             src="https://marketing-hc.com/system/assets/img/icon/mail.png">
                                                                    </a>
                                                                @endif

                                                                @if($company->twitter)
                                                                    <a class="sociall" href="{{ $company->twitter }}"
                                                                       target="_blank">
                                                                        <img class="img-responsive"
                                                                             src="https://marketing-hc.com/system/assets/img/icon/twit.png">
                                                                    </a>
                                                                @endif

                                                                @if($company->linkedin)
                                                                    <a class="sociall" href="{{ $company->linkedin }}"
                                                                       target="_blank">
                                                                        <img class="img-responsive"
                                                                             src="https://marketing-hc.com/system/assets/img/icon/linked.png">
                                                                    </a>
                                                                @endif
                                                                @if($company->whatsapp)
                                                                    <a class="sociall"
                                                                       href="https://api.whatsapp.com/send?phone=+{{ $company->whatsapp }}&amp;text=Hi,"
                                                                       target="_blank">
                                                                        <img class="img-responsive"
                                                                             src="https://marketing-hc.com/system/assets/img/icon/whats.png">
                                                                    </a>
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <!--end::Info-->

                                                    <div class="separator separator-dashed mt-1 mb-1"></div>

                                                    <div class="form-group mb-0">
                                                        <div class="col-form-label">
                                                            <div class="checkbox-inline company_Card">
                                                                {{--RANIA--}}
                                                                {{--data-id :: ATT TO ADD company_id IN INPUT FIELD--}}
                                                                {{--class confirm_interview_checked :: CLASS TO CALL THE INPUT FIELD IN JS--}}
                                                                <label class="checkbox checkbox-success">
                                                                    <input class="confirm_connected_checked" data-id="{{ $company->id }}" value="1"
                                                                           {{ $company->confirm_connected == 1 ? 'checked' : '' }}
                                                                           {{ $company->confirm_connected == 1 && $company->confirm_connected_user_id != auth()->id() ? 'disabled' : '' }}
                                                                           type="checkbox" name="confirm_connected"/>
                                                                    <span></span>
                                                                    {{ trans('dashboard.Confirm Connection') }}
                                                                </label>

                                                                <label class="checkbox checkbox-success">
                                                                    <input class="confirm_interview_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_interview"
                                                                            {{ $company->confirm_interview == 1 ? 'checked' : '' }}
                                                                            {{ count($company->companyMeetings) ? '' : 'disabled' }}
                                                                            {{ $company->confirm_interview == 1 && $company->confirm_interview_user_id != auth()->id() ? 'disabled' : '' }}/>
                                                                    <span></span>
                                                                    {{ trans('dashboard.Confirm Interview') }}
                                                                </label>

                                                                <label class="checkbox checkbox-success">
                                                                    <input class="confirm_need_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_need"
                                                                            {{ $company->confirm_need == 1 ? ' checked' : '' }}
                                                                            {{ count($company->companyNeeds) ? '' : 'disabled' }}
                                                                            {{ $company->confirm_need == 1 && $company->confirm_need_user_id != auth()->id() ? 'disabled' : '' }}/>
                                                                    <span></span>
                                                                    {{ trans('dashboard.Confirm Need') }}
                                                                </label>

                                                                <label class="checkbox checkbox-success">
                                                                    <input class="confirm_contract_checked" data-id="{{ $company->id }}" value="1" type="checkbox" name="confirm_contract"
                                                                            {{ $company->confirm_contract == 1 ? ' checked' : '' }}
                                                                            {{ $company->confirm_contract == 1 && $company->confirm_contract_user_id != auth()->id() ? 'disabled' : '' }}/>
                                                                    <span></span>{{ trans('dashboard.Confirm Contract') }}
                                                                </label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Body-->
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                    @endforeach
=======
                                <div class="row renderTable">
                                    @include('system.companies.index_partial')
>>>>>>> eae2da826f0eb24982dc3928f51b8f23d17a70e6
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        <!-- Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                            {{ trans('dashboard.Close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('script')
    {{--VIEW BUSINESS CARDS IN MODAL--}} {{--RANIA--}}
    <script>
        $('.business_card').on('click', function() {
            //$('#myModal').html('<img src="' + $(this).data('userphoto') + '"/>')
            $('#myModal img').attr('src', $(this).attr('data-img-url'));
            $("#myModal h5").html($(this).attr('data-name'));
        });
    </script>

    {{--CKECKBOXES IN COMPANY VIEW--}} {{--RANIA--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <script>

        $('input.confirm_connected_checked').on('change', function() {
            if ( this.checked ) {
                // if checked ...
                //alert( this.value );
                var company_id = $(this).attr('data-id');
                //console.log(company_id);
                $.ajax({
                    type: "get",
                    url: "{{ url('/confirm/connected/') }}" + '/' + company_id,
                    //dataType: "json",
                    success: function (response) {
                        // swal("Our First Alert", "With some body text and success icon!", "success");
                        swal( 'Success', response, "success");
                    }
                });

            }
            else {
                var company_id = $(this).attr('data-id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/confirm/connected/') }}" + '/' + company_id,
                    success: function (response) {
                        swal( 'Cancel', response, "success");
                    }
                });
            }
        });

        $('input.confirm_interview_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/interview/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/interview/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

        $('input.confirm_need_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/need/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/need/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

        $('input.confirm_contract_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/contract/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/contract/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

    </script>


    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function() {

            $("#sector").on('change' , function () {
                var sector_id = $(this).val();
                console.log(sector_id)
                if (sector_id){
                    $.ajax({
                        type: "get",
                        // url: "/get/sub/sectors/of/sector/" + sector_id,
                        {{--url: "{{ route('get_sub' ) }}" + '/' + sector_id,--}}
                                {{--url: "{{ route('get_sub' , ['sector_id'=>sector_id]) }}",--}}
                        url: "{{ url('/get/sub/sectors/of/sector/') }}" + '/' + sector_id,
                        dataType: "json",
                        success: function (response) {
                            var sub_sectors = response.sub_sectors;
                            if (sub_sectors.length){
                                console.log(sub_sectors);
                                var html = '<option value="">{{ trans('dashboard.Select All') }}</option>'
                                for (let i = 0; i < sub_sectors.length; i++) {
                                    html+= '<option value="'+ sub_sectors[i].id +'">' + sub_sectors[i].name +'</option>';
                                }
                            }
                            else {
                                var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                            }
                            $("#subSector").html(html);

                        }
                    });
                }
                else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#subSector").html(html);
                }

            })


            $("#countries").on('change' , function () {
                var country_id = $(this).val();
                if (country_id){
                    $.ajax({
                        type: "get",
                        url: "{{ url('/get/cities/of/country/') }}" + '/' + country_id,
                        dataType: "json",
                        success: function (response) {
                            var cities = response.cities;
                            if (cities.length){
                                console.log(cities);
                                var html = '<option value="">{{ trans('dashboard.Select All') }}</option>'
                                for (let i = 0; i < cities.length; i++) {
                                    html+= '<option value="'+ cities[i].id +'">' + cities[i].name +'</option>';
                                }
                            }
                            else {
                                var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                            }
                            $("#cities").html(html);

                        }
                    });
                }
                else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#cities").html(html);
                }

            })

        });

    </script>


    <script>
        $('body').on('click', '.pagination a, #searchFilter', function (e) {
            //console.log($("#company_status").val());
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: "{{ route('companies.index') }}",
                "data": {
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "created_at": $("#created_at").val(),
                    "interview_date": $("#interview_date").val(),
                    "location": $("#location").val(),
                    "client_status": $("#client_status").val(),
                    "representative_id": $("#representative_id").val(),
                    "representative": $("#representative").val(),
                    "company_status": $("#company_status").val(),
                    "communication_type": $("#communication_type").val(),
                    "evaluation_ids": $("#evaluation_ids").val(),
                    "city_id": $("#cities").val(),
                    "country_id": $("#countries").val(),
                    "sub_sector_id": $("#subSector").val(),
                    "sector_id": $("#sector").val(),
                    "name": $("#name").val(),
                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)

                }
            });
        });
    </script>

@endsection





