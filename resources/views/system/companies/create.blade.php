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
                                            <input name="name" type="text" class="form-control" placeholder="{{ trans('dashboard.Company Name Arabic') }}"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Company Name English') }} :</label>
                                            <input name="name_en" type="text" class="form-control" placeholder="{{ trans('dashboard.Company Name English') }} "/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Mobile / WhatsApp number') }} :</label>
                                            <input name="whatsapp" type="number" class="form-control"
                                                   placeholder="Mobile / WhatsApp number"/>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.phone number') }} :</label>
                                            <input name="phone" type="number" class="form-control" placeholder="phone number"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.Sector') }} :</label>
                                            <select id="sector" name="sector_id" class="form-control select2" >
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
                                            <label>District:</label>
                                            <input type="text" class="form-control" placeholder="District"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Location:</label>
                                            <input type="text" class="form-control" placeholder="Location"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Branches Number:</label>
                                            <input type="text" class="form-control" placeholder="Branches Number"/>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Number of Employees Company:</label>
                                            <input type="text" class="form-control"
                                                   placeholder="Number of Employees Company"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>Website:</label>
                                            <input type="url" class="form-control" placeholder="Website"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>E-mail:</label>
                                            <input type="email" class="form-control" placeholder="E-mail"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Linkedin:</label>
                                            <input type="text" class="form-control" placeholder="Linkedin"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <label>Twitter:</label>
                                            <input type="text" class="form-control" placeholder="Twitter"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">2</span>Designated contact
                                    </h3>
                                    <div class="row">
                                        @for($i = 0 ; $i<3 ; $i++)
                                            <div class="col-md-4 border">
                                            <span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">1</span>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Name') }}:</label>
                                                <input name="name[]"  type="text" class="form-control" placeholder="{{ trans('dashboard.Name') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Job Title') }}:</label>
                                                <input name="job_title[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Job Title') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Mobile') }}:</label>
                                                <input name="mobile[]" type="number" class="form-control" placeholder="{{ trans('dashboard.Mobile') }}"/>

                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Linkedin') }}:</label>
                                                <input name="linkedin[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Linkedin') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.Whatsapp') }}:</label>
                                                <input name="whatsapp[]" type="text" class="form-control" placeholder="{{ trans('dashboard.Whatsapp') }}"/>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ trans('dashboard.E-Mail') }}:</label>
                                                <input name="email[]" type="email" class="form-control" placeholder="{{ trans('dashboard.E-Mail') }}"/>
                                            </div>
                                        </div>
                                        @endfor
                                            {{--<div class="col-md-4 border">--}}

                                                {{--<span class="label label-xl label-rounded label-primary mr-2 mt-2 mb-2">3</span>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Name:</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="Name"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Job Title:</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="Job Title"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Mobile:</label>--}}
                                                    {{--<input type="number" class="form-control" placeholder="Mobile"/>--}}

                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Linkedin:</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="Linkedin"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Whatsapp:</label>--}}
                                                    {{--<input type="text" class="form-control" placeholder="Whatsapp"/>--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>E-mail:</label>--}}
                                                    {{--<input type="email" class="form-control" placeholder="E-mail"/>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                    </div>


                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">3</span>Confirm Meeting
                                    </h3>
                                    <div id="kt_repeater_1">
                                        <div id="kt_repeater_1" class="form-group row">
                                            <div data-repeater-list="" class="col-lg-12">
                                                <div data-repeater-item class="form-group row align-items-center">
                                                    <div class="col-lg-4">
                                                        <label>Date :</label>

                                                        <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                                             data-target-input="nearest">
                                                            <input type="text"
                                                                   class="form-control form-control-solid datetimepicker-input"
                                                                   placeholder="Select date" data-target="#kt_datetimepicker_3"/>
                                                            <div class="input-group-append" data-target="#kt_datetimepicker_3"
                                                                 data-toggle="datetimepicker">
                                                    <span class="input-group-text">
                                                        <i class="ki ki-calendar"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Time :</label>

                                                        <div class="input-group input-group-solid date" id="kt_datetimepicker_4"
                                                             data-target-input="nearest">
                                                            <input type="text"
                                                                   class="form-control form-control-solid datetimepicker-input"
                                                                   placeholder="Select time" data-target="#kt_datetimepicker_4"/>
                                                            <div class="input-group-append" data-target="#kt_datetimepicker_4"
                                                                 data-toggle="datetimepicker">
                                            <span class="input-group-text">
                                                <i class="ki ki-clock"></i>
                                            </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label>Name of Confirmed:</label>
                                                        <input type="text" disabled class="form-control disabled"
                                                               placeholder="name of Confirmed"/>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-center" >

                                            <div class="col-lg-3 float-right" style="float: none !important;margin: 0 auto;">
                                                <a href="javascript:;" data-repeater-create="" class="btn btn-block font-weight-bolder btn-light-primary">
                                                    <i class="la la-plus"></i> Add a new Meeting
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">4</span>Company Representative
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" placeholder="Name"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Job Title:</label>
                                            <input type="text" class="form-control" placeholder="Job Title"/>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Mobile:</label>
                                            <input type="number" class="form-control"
                                                   placeholder="Mobile"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>Email:</label>
                                            <input type="email" class="form-control" placeholder="Email"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>Phone:</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon2">
                                                <div class="input-group-append" style="width: 20%">
                                                <span class="input-group-text p-0">
                                                    <input type="text" class="form-control" placeholder="EX." aria-describedby="basic-addon2" style="border-radius: 0px;height: calc(1.5em + 1.3rem + 0px); ">
                                                </span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">5</span>HR Director
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Name:</label>
                                            <input type="text" class="form-control" placeholder="Name"/>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Email:</label>
                                            <input type="text" class="form-control" placeholder="Mobile"/>
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Mobile:</label>
                                            <input type="number" class="form-control"
                                                   placeholder="Mobile"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>Phone:</label>
                                            <input type="number" class="form-control" placeholder="Phone"/>

                                        </div>
                                        <div class="col-lg-4">
                                            <label>HR Whatsapp:</label>
                                            <input type="number" class="form-control" placeholder="HR Whatsapp"/>

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                        <span class="label label-lg label-primary mr-2">6</span>Notes
                                    </h3>
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>Notes:</label>
                                            <textarea name="notes" class="form-control"   rows="5"></textarea>
                                        </div>


                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-8">
                                            <button type="reset" class="btn btn-primary mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
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
                                var html = ''
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