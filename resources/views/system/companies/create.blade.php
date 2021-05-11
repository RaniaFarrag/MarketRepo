@extends('layouts.dashboard')


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/css/intlTelInput.css"/>


@endsection
<style>
    .iti {
        position: relative;
        display: inline-block;
        width: 100%;
    }
</style>

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
                            <form id="createForm" method="post" action="{{ route('companies.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">1</span>
                                        {{ trans('dashboard.General information about the company') }}
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-3 text-center">
                                            <label style="width: 100%;">{{ trans('dashboard.Company logo') }}</label>
                                            <div class="image-input image-input-empty image-input-outline"
                                                 id="kt_image_5"
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
                                                      data-action="cancel" data-toggle="tooltip"
                                                      title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                      data-action="remove" data-toggle="tooltip"
                                                      title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @can('Upload Business card')
                                            <div class="col-lg-3">
                                                <label style="width: 100%;">{{ trans('dashboard.business card 1') }}</label>
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_image_6"
                                                     style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
                                                    max-height: 120px;">
                                                    <div class="image-input-wrapper"
                                                         style="width: 100%;display: inline-block;"></div>

                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                           data-action="change" data-toggle="tooltip" title=""
                                                           data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="first_business_card"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden"
                                                               name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                    </label>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="cancel" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="remove" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label style="width: 100%;">{{ trans('dashboard.business card 2') }}</label>
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_image_7"
                                                     style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
                                                    max-height: 120px;">
                                                    <div class="image-input-wrapper"
                                                         style="width: 100%;display: inline-block;"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                           data-action="change" data-toggle="tooltip" title=""
                                                           data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="second_business_card"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden"
                                                               name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                    </label>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="cancel" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="remove" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <label style="width: 100%;">{{ trans('dashboard.business card 3') }}</label>
                                                <div class="image-input image-input-empty image-input-outline"
                                                     id="kt_image_8"
                                                     style="background-image: url(https://www.printlinkonline.com/images/products_gallery_images/business-cards-premium-picture-data.jpg);width: 100%;
    max-height: 120px;">
                                                    <div class="image-input-wrapper"
                                                         style="width: 100%;display: inline-block;"></div>

                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                           data-action="change" data-toggle="tooltip" title=""
                                                           data-original-title="{{ trans('dashboard.Change avatar') }}">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="third_business_card"
                                                               accept=".png, .jpg, .jpeg"/>
                                                        <input type="hidden"
                                                               name="{{ trans('dashboard.profile_avatar_remove') }}"/>
                                                    </label>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="cancel" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Cancel avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>

                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                                          data-action="remove" data-toggle="tooltip"
                                                          title="{{ trans('dashboard.Remove avatar') }}">
                                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                </span>
                                                </div>
                                            </div>
                                        @endcan
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Name Arabic') }} :</label>
                                            <input value="{{ old('name_ar') }}" name="name_ar" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Company Name Arabic') }}" />
                                            @error('name_ar')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Name English') }} :</label>
                                            <input value="{{ old('name_en') }}" name="name_en" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Company Name English') }} "
                                                   required/>
                                            @error('name_en')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile / WhatsApp number') }} :</label>

                                            <input class="form-control tel leyka_donor_phone" type="tel" name="whatsapp"
                                                   inputmode="tel" value="{{ old('whatsapp') }}" />

                                            <input value="{{ old('whatsapp') }}" name="whatsapp" type="hidden"
                                                   class="form-control whatsapp"
                                                   placeholder="Mobile / WhatsApp number" />

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.phone number') }} :</label>
                                            <input value="{{ old('phone') }}" name="phone" type="tel"
                                                   class="form-control tel leyka_donor_phone" />

                                            <input class="form-control phone" type="hidden" name="phone"
                                                   value="{{ old('phone') }}"/>
                                            @error('phone')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Sector') }} :</label>
                                            <select id="sector" name="sector_id" class="form-control select2" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['sectors'] as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Type') }} :</label>
                                            <select id="subSector" class="form-control select2" name="sub_sector_id"
                                                    required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Country') }}:</label>
                                            <select id="countries" class="form-control select2" name="country_id" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['countries'] as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.City') }}:</label>
                                            <select id="cities" class="form-control select2" name="city_id" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.District') }}:</label>
                                            <input value="{{ old('district') }}" name="district" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.District') }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Location') }}:</label>
                                            <input value="{{ old('location') }}" name="location" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Location') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.address') }}:</label>
                                            <input value="{{ old('address') }}" name="address" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.address') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Branches Number') }}:</label>
                                            <input value="{{ old('branch_number') }}" name="branch_number" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Branches Number') }}"/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.ECN') }}:</label>
                                            <input value="{{ old('ecn') }}" name="ecn" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.ECN') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.CR') }}:</label>
                                            <input value="{{ old('cr') }}" name="cr" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.cr') }}"/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.ksa_branch') }}:</label>
                                            <select class="form-control select2" name="ksa_branch" required>
                                                <option value="" selected="">{{ trans('dashboard.Select') }}</option>
                                                <option value="1">{{ trans('dashboard.yes') }}</option>
                                                <option value="2">{{ trans('dashboard.No') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Number of Employees Company') }}:</label>
                                            <input value="{{ old('num_of_employees') }}" name="num_of_employees"
                                                   type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Number of Employees Company') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Client Code') }}:</label>
                                            <input value="{{ old('client_code') }}" name="client_code" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.Client Code') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.customer_vat_no') }}:</label>
                                            <input value="{{ old('customer_vat_no') }}" name="customer_vat_no" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.customer_vat_no') }}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Website') }}:</label>
                                            <input value="{{ old('website') }}" name="website" type="url"
                                                   class="form-control" placeholder="https://www.website.com"
                                                   />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.E-mail') }}:</label>
                                            <input value="{{ old('email') }}" name="email" type="email"
                                                   class="form-control" placeholder="{{ trans('dashboard.E-mail') }}"
                                                   />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Linkedin') }}:</label>
                                            <input value="{{ old('linkedin') }}" name="linkedin" type="text"
                                                   class="form-control"
                                                   placeholder="{{ trans('dashboard.Linkedin') }}"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Twitter') }}:</label>
                                            <input value="{{ old('twitter') }}" name="twitter" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Twitter') }}"/>
                                        </div>
                                    </div>


                                </div>
                                @can('Designated contact')
                                    <div class="card-body">
                                        <h3 class="card-label text-center border-bottom pb-2">
                                            <span class="label label-lg label-primary mr-2">2</span>{{ trans('dashboard.Designated contact') }}
                                        </h3>
                                        <div class="row">
                                            @for($i = 0 ; $i<3 ; $i++)
                                                {{--@if($i == 0) {{ $required = 'required' }} @else {{ $required = '' }} @endif--}}
                                                <div class="col-md-4 border">
                                                    <span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">{{ $i+1 }}</span>
                                                    <div class="form-group">
                                                        {{--@if(old('designated_contact_name'))--}}
                                                        {{--@for( $i =0; $i < count(old('designated_contact_name')); $i++)--}}
                                                        <label>{{ trans('dashboard.Name') }}:</label>
                                                        <input value="" name="designated_contact_name[]" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.Name') }}" {{ $i == 0 ? 'required' : ''}}/>
                                                        {{--@endfor--}}
                                                        {{--@endif--}}
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.Job Title') }}:</label>
                                                        <input value="" name="designated_contact_job_title[]"
                                                               type="text" class="form-control"
                                                               placeholder="{{ trans('dashboard.Job Title') }}" {{ $i == 0 ? 'required' : ''}}/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.Mobile') }}:</label>
                                                        <input value="" name="designated_contact_mobile[]" type="number"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.Mobile') }}" {{ $i == 0 ? 'required' : ''}}/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.citizenship') }}:</label>
                                                        <input value="" name="designated_contact_citizenship[]"
                                                               type="text" class="form-control"
                                                               placeholder="{{ trans('dashboard.citizenship') }}" {{ $i == 0 ? 'required' : ''}}/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.Linkedin') }}:</label>
                                                        <input value="" name="designated_contact_linkedin[]" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.Linkedin') }}"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.Whatsapp') }}:</label>
                                                        <input value="" name="designated_contact_whatsapp[]" type="text"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.Whatsapp') }}" {{ $i == 0 ? 'required' : ''}}/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>{{ trans('dashboard.E-Mail') }}:</label>
                                                        <input value="" name="designated_contact_email[]" type="email"
                                                               class="form-control"
                                                               placeholder="{{ trans('dashboard.E-Mail') }}" {{ $i == 0 ? 'required' : ''}}/>
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
                                @endcan
                                @can('Confirm Meeting')
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
                                                            <div class="input-group input-group-solid date"
                                                                 data-target-input="nearest">
                                                                {{--<input value="{{ old('date') }}" name="date" type="text" arr-name="item"--}}
                                                                {{--class="form-control form-control-solid datetimepicker-input"--}}
                                                                {{--placeholder="Select date" data-target="#kt_datetimepicker_3"/> --}}

                                                                <input value="{{ old('date') }}" name="date" type="date"
                                                                       arr-name="item"
                                                                       class="form-control form-control-solid "
                                                                       placeholder="Select date"/>
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
                                                                <input value="{{ old('time') }}" name="time"
                                                                       arr-name="item" class="form-control"
                                                                       placeholder="Select time" type="time"/>
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
                                            <div class="form-group row align-items-center">

                                                <div class="col-lg-3 float-right"
                                                     style="float: none !important;margin: 0 auto;">
                                                    <a href="javascript:;" data-repeater-create=""
                                                       class="btn btn-block font-weight-bolder btn-light-primary">
                                                        <i class="la la-plus"></i> {{ trans('dashboard.Add a new Meeting') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                @can('Company Representative')
                                    <div class="card-body">
                                        <h3 class="card-label text-center border-bottom pb-2">
                                            <span class="label label-lg label-primary mr-2">4</span>{{ trans('dashboard.Company Representative') }}
                                        </h3>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Name') }}:</label>
                                                <input value="{{ old('company_representative_name') }}"
                                                       name="company_representative_name" type="text"
                                                       class="form-control"
                                                       placeholder="{{ trans('dashboard.Name') }}"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Job Title') }}:</label>
                                                <input value="{{ old('company_representative_title') }}"
                                                       name="company_representative_title" type="text"
                                                       class="form-control"
                                                       placeholder="{{ trans('dashboard.Job Title') }}"/>
                                            </div>


                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label>{{ trans('dashboard.Mobile') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="company_representative_mobile" inputmode="tel"
                                                       value="{{ old('company_representative_mobile') }}"/>

                                                <input value="{{ old('company_representative_mobile') }}"
                                                       name="company_representative_mobile" type="hidden"
                                                       class="form-control company_representative_mobile"
                                                       placeholder="{{ trans('dashboard.Mobile') }}"/>

                                            </div>
                                            <div class="col-lg-4">
                                                <label>{{ trans('dashboard.Email') }}:</label>
                                                <input value="{{ old('company_representative_email') }}"
                                                       name="company_representative_email" type="email"
                                                       class="form-control"
                                                       placeholder="{{ trans('dashboard.Email') }}"/>

                                            </div>
                                            <div class="col-lg-4">
                                                <label>{{ trans('dashboard.Phone') }}:</label>
                                                <div class="input-group">
                                                    <input class="form-control tel leyka_donor_phone" type="tel"
                                                           name="company_representative_phone" inputmode="tel"
                                                           value="{{ old('company_representative_phone') }}"/>

                                                    <input value="{{ old('company_representative_phone') }}"
                                                           name="company_representative_phone" type="hidden"
                                                           class="form-control company_representative_phone"
                                                           placeholder="{{ trans('dashboard.Phone') }}">
                                                    {{--<div class="input-group-append" style="width: 20%">--}}
                                                    {{--<span class="input-group-text p-0">--}}
                                                    {{--<input name="company_representative_phone" type="text" class="form-control" placeholder="EX." aria-describedby="basic-addon2" style="border-radius: 0px;height: calc(1.5em + 1.3rem + 0px); ">--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                @can('HR Director')
                                    <div class="card-body">
                                        <h3 class="card-label text-center border-bottom pb-2">
                                            <span class="label label-lg label-primary mr-2">5</span>{{ trans('dashboard.HR Director') }}
                                        </h3>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Name') }}:</label>
                                                <input value="{{ old('hr_director_name') }}" name="hr_director_name"
                                                       type="text" class="form-control"
                                                       placeholder="{{ trans('dashboard.Name') }}"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Email') }}:</label>
                                                <input value="{{ old('hr_director_email') }}"
                                                       name="hr_director_email" type="text" class="form-control"
                                                       placeholder="Mobile"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Mobile') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="hr_director_mobile" inputmode="tel"
                                                       value="{{ old('hr_director_mobile') }}"/>
                                                <input value="{{ old('hr_director_mobile') }}"
                                                       name="hr_director_mobile" type="hidden"
                                                       class="form-control hr_director_mobile"
                                                       placeholder="{{ trans('dashboard.Mobile') }}"/>

                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Phone') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="hr_director_phone" inputmode="tel"
                                                       value="{{ old('hr_director_phone') }}"/>

                                                <input value="{{ old('hr_director_phone') }}" name="hr_director_phone"
                                                       type="hidden" class="form-control hr_director_phone"
                                                       placeholder="{{ trans('dashboard.Phone') }}"/>

                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.HR Whatsapp') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="hr_director_whatsapp" inputmode="tel"
                                                       value="{{ old('hr_director_whatsapp') }}"/>

                                                <input value="{{ old('hr_director_whatsapp') }}"
                                                       name="hr_director_whatsapp" type="hidden"
                                                       class="form-control hr_director_whatsapp"
                                                       placeholder="{{ trans('dashboard.HR Whatsapp') }}"/>

                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.HR Linkedin') }}:</label>
                                                <input value="{{ old('hr_director_linkedin') }}"
                                                       name="hr_director_linkedin" type="text"
                                                       class="form-control hr_director_linkedin"
                                                       placeholder="{{ trans('dashboard.HR Linkedin') }}"/>

                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                @can('Contract Manager')
                                    <div class="card-body">
                                        <h3 class="card-label text-center border-bottom pb-2">
                                            <span class="label label-lg label-primary mr-2">6</span>{{ trans('dashboard.Contract Manager') }}
                                        </h3>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Name') }}:</label>
                                                <input value="{{ old('contract_manager_name') }}"
                                                       name="contract_manager_name" type="text" class="form-control"
                                                       placeholder="{{ trans('dashboard.Name') }}"/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Email') }}:</label>
                                                <input value="{{ old('contract_manager_email') }}"
                                                       name="contract_manager_email" type="text" class="form-control"
                                                       placeholder="{{ trans('dashboard.Email') }}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Mobile') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="contract_manager_mobile" inputmode="tel"
                                                       value="{{ old('contract_manager_mobile') }}"/>

                                                <input value="{{ old('contract_manager_mobile') }}"
                                                       name="contract_manager_mobile" type="hidden"
                                                       class="form-control contract_manager_mobile"
                                                       placeholder="{{ trans('dashboard.Mobile') }}"/>

                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Phone') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="contract_manager_phone" inputmode="tel"
                                                       value="{{ old('contract_manager_phone') }}"/>

                                                <input value="{{ old('contract_manager_phone') }}"
                                                       name="contract_manager_phone" type="hidden"
                                                       class="form-control contract_manager_phone"
                                                       placeholder="{{ trans('dashboard.Phone') }}"/>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Whatsapp') }}:</label>
                                                <input class="form-control tel leyka_donor_phone" type="tel"
                                                       name="contract_manager_whatsapp" inputmode="tel"
                                                       value="{{ old('contract_manager_whatsapp') }}"/>

                                                <input value="{{ old('contract_manager_whatsapp') }}"
                                                       name="contract_manager_whatsapp" type="hidden"
                                                       class="form-control contract_manager_whatsapp"
                                                       placeholder="{{ trans('dashboard.Whatsapp') }}"/>

                                            </div>
                                            <div class="col-lg-6">
                                                <label>{{ trans('dashboard.Linkedin') }}:</label>
                                                <input value="{{ old('contract_manager_linkedin') }}"
                                                       name="contract_manager_linkedin" type="text"
                                                       class="form-control contract_manager_linkedin"
                                                       placeholder="{{ trans('dashboard.Linkedin') }}"/>

                                            </div>
                                        </div>

                                    </div>
                                @endcan
                                @can('Company Evaluation')
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>{{ trans('dashboard.Company Evaluation') }} :</label>
                                                <select name="evaluation_status" class="form-control select2" disabled>
                                                    <option value=""
                                                            selected="">{{ trans('dashboard.Select One') }}</option>
                                                    <option value="1">A</option>
                                                    <option value="2">B</option>
                                                    <option value="3">C</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>{{ trans('dashboard.Client Status') }} :</label>
                                                <select name="client_status" class="form-control select2" disabled>
                                                    <option value=""
                                                            selected="">{{ trans('dashboard.Select One') }}</option>
                                                    <option value="1">{{ trans('dashboard.Hot') }}</option>
                                                    <option value="2">{{ trans('dashboard.Warm') }}</option>
                                                    <option value="3">{{ trans('dashboard.Cold') }}</option>
                                                    <option value="4">{{ trans('dashboard.Awarded') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                @can('Notes')
                                    <div class="card-body">
                                        <h3 class="card-label text-center border-bottom pb-2">
                                            <span class="label label-lg label-primary mr-2">7</span>{{ trans('dashboard.Notes') }}
                                        </h3>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <label>{{ trans('dashboard.Notes') }}:</label>
                                                <textarea name="notes" class="form-control"
                                                          rows="5">{{ old('notes') }}</textarea>
                                            </div>
                                        </div>

                                    </div>
                                @endcan
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
    <script src="{{ asset('dashboard/assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js">
    </script>

    <script type='text/javascript'
            src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>


    <script>
        $(function () {

            var input = $('.leyka_donor_phone');
            var arr = [];
            for (var i = 0; i < input.length; i++) {
                console.log(input.eq(i).val());
                var iti_el = input.eq(i).parent();
                if (iti_el.hasClass('.iti.iti--allow-dropdown.iti--separate-dial-code')) {
                    iti.destroy();
                }
                arr[input.eq(i).attr('name')] = intlTelInput(input[i], {
                    autoHideDialCode: false,
                    autoPlaceholder: "aggressive",
                    initialCountry: "auto",
                    separateDialCode: true,
                    preferredCountries: ['ru', 'th'],
                    customPlaceholder: function (selectedCountryPlaceholder, selectedCountryData) {
                        return '' + selectedCountryPlaceholder.replace(/[0-9]/g, 'X');
                    },
                    geoIpLookup: function (callback) {
                        $.get('https://ipinfo.io', function () {
                        }, "jsonp").always(function (resp) {
                            var countryCode = (resp && resp.country) ? resp.country : "";
                            callback(countryCode);
                        });
                    },
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.0/js/utils.js" // just for
                });
                $('.leyka_donor_phone').on("focus click countrychange", function (e, countryData) {
                    var pl = $(this).attr('placeholder') + '';
                    var res = pl.replace(/X/g, '9');
                    if (res != 'undefined') {
                        $(this).inputmask(res, {placeholder: "X", clearMaskOnLostFocus: true});
                    }
                });

                $('.leyka_donor_phone').on("focusout", function (e, countryData) {
                    var intlNumber = arr[$(this).attr('name')].getNumber();
                    $('.' + $(this).attr('name')).val(intlNumber);
                    console.log(intlNumber);
                });

            }


        })

    </script>
    <!--begin::Page add company-->
    <script>
        var avatar5 = new KTImageInput('kt_image_5');

        avatar5.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar5.on('change', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
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
                @can('Upload Business card')

        var avatar6 = new KTImageInput('kt_image_6');
        var avatar7 = new KTImageInput('kt_image_7');
        var avatar8 = new KTImageInput('kt_image_8');

        avatar6.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar6.on('change', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar6.on('remove', function (imageInput) {
            swal.fire({
                title: 'Image successfully removed !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Got it!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar7.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar7.on('change', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar7.on('remove', function (imageInput) {
            swal.fire({
                title: 'Image successfully removed !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Got it!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar8.on('cancel', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar8.on('change', function (imageInput) {
            swal.fire({
                title: 'Image successfully changed !',
                type: 'success',
                buttonsStyling: false,
                confirmButtonText: 'successfully!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });

        avatar8.on('remove', function (imageInput) {
            swal.fire({
                title: 'Image successfully removed !',
                type: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Got it!',
                confirmButtonClass: 'btn btn-primary font-weight-bold'
            });
        });
        @endcan
        // Demo 3
        $('#kt_datetimepicker_3').datetimepicker({
            format: 'L'
        });

        // Demo 4
        $('#kt_datetimepicker_4').datetimepicker({
            format: 'LT'
        });


        // Class definition
        var KTFormRepeater = function () {
            // Private functions
            var demo1 = function () {
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
                init: function () {
                    demo1();
                }
            };
        }();

        jQuery(document).ready(function () {
            KTFormRepeater.init();
        });


    </script>


    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function () {

            $("#sector").on('change', function () {
                var sector_id = $(this).val();
                if (sector_id) {
                    $.ajax({
                        type: "get",
                        // url: "/get/sub/sectors/of/sector/" + sector_id,
                        {{--url: "{{ route('get_sub' ) }}" + '/' + sector_id,--}}
                                {{--url: "{{ route('get_sub' , ['sector_id'=>sector_id]) }}",--}}
                        url: "{{ url('/get/sub/sectors/of/sector/') }}" + '/' + sector_id,
                        dataType: "json",
                        success: function (response) {
                            var sub_sectors = response.sub_sectors;
                            if (sub_sectors.length) {
                                console.log(sub_sectors);
                                var html = '<option value="">{{ trans('dashboard.Select All') }}</option>'
                                for (let i = 0; i < sub_sectors.length; i++) {
                                    html += '<option value="' + sub_sectors[i].id + '">' + sub_sectors[i].name + '</option>';
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


            $("#countries").on('change', function () {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        type: "get",
                        url: "{{ url('/get/cities/of/country/') }}" + '/' + country_id,
                        dataType: "json",
                        success: function (response) {
                            var cities = response.cities;
                            if (cities.length) {
                                console.log(cities);
                                var html = ''
                                for (let i = 0; i < cities.length; i++) {
                                    html += '<option value="' + cities[i].id + '">' + cities[i].name + '</option>';
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
        $(document).ready(function () {
            $("#createForm1").submit(function (m) {
                m.preventDefault(); // avoid to execute the actual submit of the form momoomomomo.

                url=$(this).attr('action')
                $.ajax({
                    type: "POST",
                    url: url,
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('#btnSubmit').addClass('kt-spinner');
                    },
                    complete: function () {
                        $('#btnSubmit').removeClass('kt-spinner');
                    },
                    success: function (response) {
                        if (response.errors) {
                            jQuery.each(response.errors, function (key, value) {
                                toastr.error(value);
                            });
                        } else {
                            toastr.success('Saved.');
                            swal( 'Success', response, "success");
                            // $('#createForm').trigger("reset");
                            location.replace('{{route('companies.index')}}')

                        }
                    },
                    error: function (reject) {
                        if (reject.status === 422) {
                            var reponse = $.parseJSON(reject.responseText);
                            jQuery.each(reponse.errors, function (key, value) {
                                toastr.error(value);
                            });
                        }
                    }
                });

            });
        });
    </script>


@endsection
