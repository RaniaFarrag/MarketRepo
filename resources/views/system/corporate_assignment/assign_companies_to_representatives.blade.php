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
                            {{ trans('dashboard.Assign companies to a representative') }}
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

                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Assign companies to a representative') }}
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
                            <form method="post" action="{{ route('companies.store') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Representative') }} :</label>
                                            <select name="" class="form-control select2" required>
                                                <option>{{ trans('dashboard.Select one') }}</option>
                                                @foreach($data['representatives'] as $representative)
                                                    <option value="{{ $representative->id }}">{{ app()->getLocale() == 'ar' ? $representative->name_en : $representative->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Country') }} :</label>
                                            <select id="countries" name="country" class="form-control select2" >
                                                <option value="">{{ trans('dashboard.Select All') }}</option>
                                                    @foreach($data['countries'] as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Sectors') }} :</label>
                                            <select name="sector_id" id="sector" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['sectors'] as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.City') }} :</label>
                                            <select id="cities" name="city" class="form-control select2" >
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Company Type') }}:</label>
                                            <select id="subSector" name="sub_sector_id" class="form-control select2" >
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Companies') }} :</label>
                                            <select id="companies" multiple class="form-control select2"
                                                    name="company_id">
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>

                                    </div>

                                </div>
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

    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function() {

            $("#sector").on('change' , function () {
                var sector_id = $(this).val();
                if (sector_id){
                    $.ajax({
                        type: "get",
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

            $("#companies").on('change' , function () {
                var sub_sector_id = $(this).val();
                if (sub_sector_id){
                    $.ajax({
                        type: "get",
                        url: "{{ url('/get/cities/of/country/') }}" + '/' + sub_sector_id,
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