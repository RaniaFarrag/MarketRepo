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
                            <form method="post" action="{{ route('assign_company') }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    @can('Show Mother Company_coordinator')
                                        <div class="form-group row">
                                            <div class="col-md-12 col-xs-12">
                                                <label> {{ trans('dashboard.Mother Company') }}  </label>
                                                {{--<input name="mother_company_id" value="1" type="hidden">--}}
                                                <select id="mother_company_id" name="mother_company_id" class="form-control select2" >
                                                    {{--<option value="" selected="">{{ trans('dashboard.Select One') }}</option>--}}
                                                    @foreach($mother_companies as $key=> $mother_company)
                                                        <option {{ $key == 0 ? 'selected' : ''}} value="{{ $mother_company->id }}">
                                                            {{ app()->getLocale() == 'ar' ? $mother_company->name : $mother_company->name_en }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    @endcan

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Representative') }} :</label>
                                            @if(auth()->user()->hasRole('Sales Manager'))
                                                <select name="representative_id" class="form-control select2" required>
                                                    <option value="" selected>{{ trans('dashboard.Select one') }}</option>
                                                        @foreach($data['representatives'] as $representative)
                                                            <option value="{{ $representative->id }}">{{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}</option>
                                                        @endforeach
                                                    {{--@if(auth()->user()->hasRole('Sales Manager'))--}}
                                                        {{--<option value="{{ auth()->user()->id }}">{{ app()->getLocale() == 'ar' ? auth()->user()->name : auth()->user()->name_en }}</option>--}}
                                                    {{--@endif--}}
                                                </select>
                                            @else
                                                <select id="representatives" name="representative_id" class="form-control select2" required>
                                                    <option value="" selected>{{ trans('dashboard.Select one') }}</option>
                                                </select>
                                            @endif
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
                                            <select id="sectors" name="sector_id" class="form-control select2" required>
                                                <option value="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($data['sectors'] as $sector)
                                                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('sector_id')
                                            <div class="error">{{ $message }}</div>
                                            @enderror
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
                                            <select id="subSectors" name="subSector_id" class="form-control select2" >
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Companies') }} :</label>
                                            <select id="companies" name="company_ids[]"  class="form-control select2" multiple>
                                                {{--<option value="" disabled >{{ trans('dashboard.Select All') }}</option>--}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button id="sub" type="submit"
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
        $(document).ready(function() {
            {{-- GET ALL CITIES OF COUNTRY --}}
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

            {{-- GET ALL SUB-SECTORS OF SECTOR --}}
            $("#sectors").on('change' , function () {
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
                            $("#subSectors").html(html);

                        }
                    });
                }
                else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#subSectors").html(html);
                }
            })

            {{--  GET ALL COMPANIES OF BASED ON SECTOR , SUB-SECTOR , COUNTRY AND CITY --}}
            $(document).on('change', '#representatives , #countries , #cities ,#sectors , #subSectors', function() {
                var country_id = $('#countries').val()
                var city_id = $('#cities').val()
                var sector_id = $('#sectors').val()
                var subSector_id = $('#subSectors').val()
                var representatives = $('#representatives').val()
                if (sector_id){
                    $.ajax({
                        type: "get",
                        url: "{{ route('fetch_company_data') }}",
                        data:{
                            country_id : country_id,
                            city_id : city_id,
                            sector_id : sector_id,
                            subSector_id : subSector_id,
                            representatives : representatives
                        },
                        dataType: "json",
                        success: function (response) {
                            //console.log(response)
                            var companies = response.companies;
                            if (companies.length){
                                console.log(companies.length)
                                var html = '<option value="" disabled>{{ trans('dashboard.Select All') }}</option>'
                                for (let i =0 ; i<companies.length ; i++){
                                    html+= '<option value="' +companies[i].id+ '">' + companies[i].name + '</option>'
                                }
                            }
                            else {
                                {{--var html = '<option value="" disabled selected>{{ trans('dashboard.Not Found') }}</option>'--}}
                                // $(':input[type="submit"]').prop('disabled', true);
                            }
                            $("#companies").html(html);

                        }
                    });

                    console.log(city_id +"-"+ country_id  +"-"+ subSector_id  +"-"+ sector_id)
                }

                else {
                    var html = '<option value="" disabled selected>{{ trans('dashboard.Select Sector') }}</option>'
                    $("#companies").html(html);
                }

            });


        });

    </script>

    <script>
        $(document).on('change', '#mother_company_id', function (e) {
            var mother_company_id = $("#mother_company_id").val();
            console.log(mother_company_id)
            if (mother_company_id){
                $.ajax({
                    type: "get",
                    url: "{{ url('/get/reps/of/mothercompany/') }}" + '/' + mother_company_id,
                    dataType: "json",
                    success: function (response) {
                        var $representatives = response.representatives;
                        if ($representatives.length){

                            var html = '<option value="">{{ trans('dashboard.Select One') }}</option>'
                            for (let i = 0; i < $representatives.length; i++) {
                                if('{{ config('app.locale') }}' == 'ar')
                                    html+= '<option value="'+ $representatives[i].id +'">' + $representatives[i].name +'</option>';
                                else
                                    html+= '<option value="'+ $representatives[i].id +'">' + $representatives[i].name_en +'</option>';
                            }
                        }
                        else {
                            var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                        }
                        $("#representatives").html(html);

                    }
                });
            }
            else {
                var html = '<option value="" selected="">{{ trans('dashboard.Select one') }}</option>'
                $("#representatives").html(html);
            }
        })


        $(document).ready(function() {
            var mother_company_id = $("#mother_company_id").val();

            if (mother_company_id){
                $.ajax({
                    type: "get",
                    url: "{{ url('/get/reps/of/mothercompany/') }}" + '/' + mother_company_id,
                    dataType: "json",
                    success: function (response) {
                        console.log(response)
                        var $representatives = response.representatives;
                        console.log($representatives)
                        if ($representatives.length){
                            var html = '<option value="">{{ trans('dashboard.Select One') }}</option>'
                            for (let i = 0; i < $representatives.length; i++) {
                                if('{{ config('app.locale') }}' == 'ar')
                                    html+= '<option value="'+ $representatives[i].id +'">' + $representatives[i].name +'</option>';
                                else
                                    html+= '<option value="'+ $representatives[i].id +'">' + $representatives[i].name_en +'</option>';
                            }
                        }
                        else {
                            var html = '<option value="" selected="">{{ trans('dashboard.Not') }}</option>'
                        }
                        $("#representatives").html(html);

                    }
                });
            }
            else {
                var html = '<option value="" selected="">{{ trans('dashboard.Select one') }}</option>'
                $("#representatives").html(html);
            }

        })
    </script>




@endsection