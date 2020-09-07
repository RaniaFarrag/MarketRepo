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
                            {{ trans('dashboard.Add New Company') }}
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
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                Dashboard </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                Companies Data </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Add New Company') }}
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
                            <form method="post" action="{{ route('companies.store') }}" class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">1</span>
                                        {{ trans('dashboard.General information about the company') }}
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-center">
                                            <label style="width: 100%;">{{ trans('dashboard.Company logo') }}</label>
                                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                                 style="background-image: url({{ asset('dashboard/assets/media/users/blank.png') }})">
                                                <div class="image-input-wrapper"></div>

                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                       data-action="change" data-toggle="tooltip" title=""
                                                       data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="logo" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="profile_avatar_remove"/>
                                                </label>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="cancel" data-toggle="tooltip" title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="remove" data-toggle="tooltip" title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label style="width: 100%;">{{ trans('dashboard.business card 1') }}</label>
                                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                                 style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
                                                    max-height: 120px;">
                                                <div class="image-input-wrapper"
                                                     style="width: 100%;display: inline-block;"></div>

                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                       data-action="change" data-toggle="tooltip" title=""
                                                       data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="first_business_card" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                </label>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="cancel" data-toggle="tooltip" title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="remove" data-toggle="tooltip" title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label style="width: 100%;">{{ trans('dashboard.business card 2') }}</label>
                                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                                 style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
                                                    max-height: 120px;">
                                                <div class="image-input-wrapper"
                                                     style="width: 100%;display: inline-block;"></div>
                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                       data-action="change" data-toggle="tooltip" title=""
                                                       data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="second_business_card" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                </label>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="cancel" data-toggle="tooltip" title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="remove" data-toggle="tooltip" title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <label style="width: 100%;">{{ trans('dashboard.business card 3') }}</label>
                                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                                 style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
    max-height: 120px;">
                                                <div class="image-input-wrapper"
                                                     style="width: 100%;display: inline-block;"></div>

                                                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                       data-action="change" data-toggle="tooltip" title=""
                                                       data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                                    <input type="file" name="third_business_card" accept=".png, .jpg, .jpeg"/>
                                                    <input type="hidden" name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                </label>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="cancel" data-toggle="tooltip" title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="remove" data-toggle="tooltip" title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Name Arabic') }} :</label>
                                            <input value="{{ old('name_ar') }}" name="name_ar" type="text" class="form-control" placeholder="{{ trans('dashboard.Company Name Arabic') }}" required/>
                                            @error('name_ar')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Name English') }} :</label>
                                            <input value="{{ old('name_en') }}" name="name_en" type="text" class="form-control" placeholder="{{ trans('dashboard.Company Name English') }} " required/>
                                            @error('name_en')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile / WhatsApp number') }} :</label>
                                            <input value="{{ old('whatsapp') }}" name="whatsapp" type="number" class="form-control"
                                                   placeholder="Mobile / WhatsApp number"/>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.phone number') }} :</label>
                                            <input value="{{ old('phone') }}" name="phone" type="number" class="form-control" placeholder="phone number" required/>
                                            @error('phone')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Sector') }} :</label>
                                            <select id="sector" name="sector_id" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['sectors'] as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Type') }} :</label>
                                            <select id="subSector" class="form-control select2" name="sub_sector_id">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Country') }}:</label>
                                            <select id="countries" class="form-control select2" name="country_id">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['countries'] as $country)
                                                    <option value="{{ $country->id }}" data-select2-id="59">{{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.City') }}:</label>
                                            <select id="cities" class="form-control select2" name="city_id">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.District') }}:</label>
                                            <input value="{{ old('district') }}" name="district" type="text" class="form-control" placeholder="{{ trans('dashboard.District') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Location') }}:</label>
                                            <input value="{{ old('location') }}" name="location" type="text" class="form-control" placeholder="{{ trans('dashboard.Location') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Branches Number') }}:</label>
                                            <input value="{{ old('branch_number') }}" name="branch_number" type="text" class="form-control" placeholder="{{ trans('dashboard.Branches Number') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Number of Employees Company') }}:</label>
                                            <input value="{{ old('num_of_employees') }}" name="num_of_employees" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Number of Employees Company') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Website') }}:</label>
                                            <input value="{{ old('website') }}" name="website" type="url" class="form-control" placeholder="{{ trans('dashboard.Website') }}"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.E-mail') }}:</label>
                                            <input value="{{ old('email') }}" name="email" type="email" class="form-control" placeholder="{{ trans('dashboard.E-mail') }}"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Linkedin') }}:</label>
                                            <input value="{{ old('linkedin') }}" name="linkedin" type="text" class="form-control" placeholder="{{ trans('dashboard.Linkedin') }}"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Twitter') }}:</label>
                                            <input value="{{ old('twitter') }}" name="twitter" type="text" class="form-control" placeholder="{{ trans('dashboard.Twitter') }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">2</span>{{ trans('dashboard.Designated contact') }}
                                    </h3>
                                    <div class="row">
                                        @for($i = 0 ; $i<3 ; $i++)
                                            <div class="col-md-4 border">
                                            <span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">1</span>
                                            <div class="form-group">

                                                {{--@if(old('designated_contact_name'))--}}

                                                    {{--@for( $i =0; $i < count(old('designated_contact_name')); $i++)--}}
                                                        <label>{{ trans('dashboard.Name') }}:</label>
                                                        <input value="" name="designated_contact_name[]"  type="text" class="form-control" placeholder="{{ trans('dashboard.Name') }}"/>
                                                    {{--@endfor--}}
                                                {{--@endif--}}
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Job Title') }}:</label>
                                                <input value="" name="designated_contact_job_title[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Job Title') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Mobile') }}:</label>
                                                <input value="" name="designated_contact_mobile[]" type="number" class="form-control" placeholder="{{ trans('dashboard.Mobile') }}"/>

                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Linkedin') }}:</label>
                                                <input value="" name="designated_contact_linkedin[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Linkedin') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Whatsapp') }}:</label>
                                                <input value="" name="designated_contact_whatsapp[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Whatsapp') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.E-Mail') }}:</label>
                                                <input value="" name="designated_contact_email[]" type="email" class="form-control" placeholder="{{ trans('dashboard.E-Mail') }}"/>
                                            </div>
                                        </div>
                                        @endfor
                                            {{--<div class="col-md-4 border">--}}

                                                {{--<span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">3</span>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Name:</label>--}}
                                                    {{--<input value={{ old('') }} type="text" class="form-control" placeholder="Name"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Job Title:</label>--}}
                                                    {{--<input value={{ old('') }} type="text" class="form-control" placeholder="Job Title"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Mobile:</label>--}}
                                                    {{--<input value={{ old('') }} type="number" class="form-control" placeholder="Mobile"/>--}}

                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Linkedin:</label>--}}
                                                    {{--<input value={{ old('') }} type="text" class="form-control" placeholder="Linkedin"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Whatsapp:</label>--}}
                                                    {{--<input value={{ old('') }} type="text" class="form-control" placeholder="Whatsapp"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>E-mail:</label>--}}
                                                    {{--<input value={{ old('') }} type="email" class="form-control" placeholder="E-mail"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                    </div>


                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">3</span>{{ trans('dashboard.Confirm Meeting') }}
                                    </h3>
                                    <div id="kt_repeater_1">
                                        <div id="kt_repeater_1" class="form-group row">
                                            <div data-repeater-list="" class="col-lg-12">
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-lg-6">
                                                        <label>{{ trans('dashboard.Date') }} :</label>
                                                        <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                                             data-target-input="nearest">
                                                            {{--<input value="{{ old('date') }}" name="date" type="text" arr-name="item"--}}
                                                                   {{--class="form-control form-control-solid datetimepicker-input"--}}
                                                                   {{--placeholder="Select date" data-target="#kt_datetimepicker_3"/> --}}

                                                            <input value="{{ old('date') }}" name="date" type="date" arr-name="item"
                                                                   class="form-control form-control-solid "
                                                                   placeholder="Select date" />
                                                            {{--<div class="input-group-append" data-target="#kt_datetimepicker_3"--}}
                                                                 {{--data-toggle="datetimepicker">--}}
                                                                {{--<span class="input-group-text">--}}
                                                                    {{--<i class="ki ki-calendar"></i>--}}
                                                                {{--</span>--}}
                                                            {{--</div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>{{ trans('dashboard.Time') }} :</label>
                                                            {{--<div class="input-group input-group-solid date" id="kt_datetimepicker_4"--}}
                                                                 {{--data-target-input="nearest">--}}
                                                                {{--<input name="time" type="text" arr-name="item"--}}
                                                                       {{--class="form-control form-control-solid datetimepicker-input"--}}
                                                                       {{--placeholder="Select time" data-target="#kt_datetimepicker_4"/>--}}
                                                                {{--<div class="input-group-append" data-target="#kt_datetimepicker_4"--}}
                                                                     {{--data-toggle="datetimepicker">--}}
                                                                    {{--<span class="input-group-text">--}}
                                                                        {{--<i class="ki ki-clock"></i>--}}
                                                                    {{--</span>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}

                                                        <div class="input-group timepicker">
                                                            {{--<input value="{{ old('time') }}" name="time" arr-name="item" class="form-control" id="kt_timepicker_2" readonly placeholder="Select time" type="text"/>--}}
                                                            <input value="{{ old('time') }}" name="time" arr-name="item" class="form-control"  placeholder="Select time" type="time"/>
                                                            {{--<div class="input-group-append">--}}
                                                                {{--<span class="input-group-text">--}}
                                                                    {{--<i class="la la-clock-o"></i>--}}
                                                                {{--</span>--}}
                                                            {{--</div>--}}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center" >

                                            <div class="col-lg-3 float-right" style="float: none !important;margin: 0 auto;">
                                                <a href="javascript:;" data-repeater-create="" class="btn btn-block font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i> {{ trans('dashboard.Add a new Meeting') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">4</span>{{ trans('dashboard.Company Representative') }}
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Name') }}:</label>
                                            <input value="{{ old('company_representative_name') }}" name="company_representative_name" type="text" class="form-control" placeholder="{{ trans('dashboard.Name') }}"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Job Title') }}:</label>
                                            <input value="{{ old('company_representative_job_title') }}" name="company_representative_job_title" type="text" class="form-control" placeholder="{{ trans('dashboard.Job Title') }}"/>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile') }}:</label>
                                            <input value="{{ old('company_representative_job_mobile') }}" name="company_representative_job_mobile" type="number" class="form-control"
                                                   placeholder="{{ trans('dashboard.Mobile') }}"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Email') }}:</label>
                                            <input value="{{ old('company_representative_job_email') }}" name="company_representative_job_email" type="email" class="form-control" placeholder="{{ trans('dashboard.Email') }}"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Phone') }}:</label>
                                            <div class="input-group">
                                                <input value="{{ old('company_representative_job_phone') }}" name="company_representative_job_phone" type="number" class="form-control" placeholder="{{ trans('dashboard.Phone') }}" aria-describedby="basic-addon2">
                                                {{--<div class="input-group-append" style="width: 20%">--}}
                                                    {{--<span class="input-group-text p-0">--}}
                                                        {{--<input name="company_representative_job_phone" type="text" class="form-control" placeholder="EX." aria-describedby="basic-addon2" style="border-radius: 0px;height: calc(1.5em + 1.3rem + 0px); ">--}}
                                                    {{--</span>--}}
                                                {{--</div>--}}
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">5</span>{{ trans('dashboard.HR Director') }}
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Name') }}:</label>
                                            <input value="{{ old('hr_director_job_name') }}" name="hr_director_job_name" type="text" class="form-control" placeholder="{{ trans('dashboard.Name') }}"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Email') }}:</label>
                                            <input value="{{ old('hr_director_job_email') }}" name="hr_director_job_email" type="text" class="form-control" placeholder="Mobile"/>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile') }}:</label>
                                            <input value="{{ old('hr_director_job_mobile') }}" name="hr_director_job_mobile" type="number" class="form-control"
                                                   placeholder="{{ trans('dashboard.Mobile') }}"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Phone') }}:</label>
                                            <input value="{{ old('hr_director_job_phone') }}" name="hr_director_job_phone" type="number" class="form-control" placeholder="{{ trans('dashboard.Phone') }}"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.HR Whatsapp') }}:</label>
                                            <input value="{{ old('hr_director_job_whatsapp') }}" name="hr_director_job_whatsapp" type="number" class="form-control" placeholder="{{ trans('dashboard.HR Whatsapp') }}"/>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">6</span>{{ trans('dashboard.Notes') }}
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.Notes') }}:</label>
                                            <textarea name="notes" class="form-control"   rows="5">{{ old('notes') }}</textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('companies.index') }}" class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
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
    <script src="{{ asset('dashboard/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}"></script>

    <!--begin::Page add company-->
    <script>
        var avatar5 = new KTImageInput('kt_image_5');

        avatar5.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Awesome!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar5.on('change', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'Awesome!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar5.on('remove', function (imageInput) {
            swal.fire({
                title: 'Image successfully removed !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Got it!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        // Demo 3
        $('#kt_datetimepicker_3').datetimepicker({
            format: 'L'
        });

        // Demo 4
        $('#kt_datetimepicker_4').datetimepicker({
            format: 'LT'
        });


        // Class definition
        var KTFormRepeater = function() {

            // Private functions
            var demo1 = function() {
                $('#kt_repeater_1').repeater({
                    initEmpty: false,

                    defaultValues: {
                        'text-input': 'foo'
                    },

                    show: function () {
                        $(this).slideDown();
                    },

                    hide: function (deleteElement) {
                        $(this).slideUp(deleteElement);
                    }
                });
            }

            return {
                // public functions
                init: function() {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTFormRepeater.init();
        });


    </script>


    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function() {

            $("#sector").on('change' , function () {
                var sector_id = $(this).val();
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
                                var html = '<option value="">{{ trans(\'dashboard.Select All\') }}</option>'
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
                                var html = ''
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

@endsection