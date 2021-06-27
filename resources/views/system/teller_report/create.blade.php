@extends('layouts.dashboard')

@section('body')
    <style>
        .switch label {
            margin: 0 auto;
        }
        table.table.table-bordered.text-center tbody tr.sprated td {
            background: #6993FF !important;
            color: #6993FF;
            height: 3px !important;
            padding: 0 !important;
            margin: 0 !important;
            line-height: 1px;
            font-size: 0;}
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
                            {{ trans('dashboard.Add Teller Report') }}
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
                            <a href="{{ route('get_teller_report') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Teller REPORT') }} </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Add Teller Report') }}
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

                            <form method="post" action="{{ route('store_teller_report') }}" class="form">
                                @csrf

                                <input id="mother_company_id" name="mother_company_id" type="hidden" value="">

                                <div class="card-body">
                                    <h3 class="card-label text-center border-bottom pb-2">
                                      {{ trans('dashboard.Add Teller Report') }}
                                    </h3>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Representative name') }} :</label>
                                            <select id="representative_id" name="representative_id" class="form-control select2" required>
                                                <option value=""
                                                        selected="">{{ trans('dashboard.Select All') }}</option>
                                                @foreach($representatives as $representative)
                                                    <option value="{{ $representative->id }}">
                                                        {{ app()->getLocale() == 'ar' ? $representative->name : $representative->name_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Company Name') }} :</label>
                                            <select id="companies" name="company_id" class="form-control select2" required>
                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.date_call') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ old('date_call') }}" name="date_call" type="date"
                                                       arr-name="item"
                                                       class="form-control form-control-solid "
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.time_call') }} :</label>
                                            <div class="input-group timepicker">
                                                {{--<input value="{{ old('time') }}" name="time" arr-name="item" class="form-control" id="kt_timepicker_2" readonly placeholder="Select time" type="text"/>--}}
                                                <input value="{{ old('time_call') }}" name="time_call"
                                                       arr-name="item" class="form-control"
                                                       placeholder="Select time" type="time"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.feedback') }} :</label>
                                           <textarea class="form-control" rows="5" name="feedback"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.date_meeting') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ old('date_meeting') }}" name="date_meeting" type="date"
                                                       arr-name="item"
                                                       class="form-control form-control-solid "
                                                       placeholder="Select date"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.time_meeting') }} :</label>
                                            <div class="input-group timepicker">
                                                {{--<input value="{{ old('time') }}" name="time" arr-name="item" class="form-control" id="kt_timepicker_2" readonly placeholder="Select time" type="text"/>--}}
                                                <input value="{{ old('time_meeting') }}" name="time_meeting"
                                                       arr-name="item" class="form-control"
                                                       placeholder="Select time" type="time"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.submit') }}</button>
                                            <a href="{{ route('get_teller_report') }}"
                                               class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Card-->
                    </div>

                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function (){
           $('#representative_id').on('change' , function (){
              var representative_id = $(this).val();
              var url = "{{ route('get_assigned_companies', ":representative_id") }}";
              url = url.replace(':representative_id', representative_id);
              if (representative_id){
                  $.ajax({
                      type : "get",
                      url : url,
                      dataType: "json",
                      success : function (response){
                          var companies = response.companies;
                          if (companies.length) {
                              console.log(companies);
                              console.log(response.mother_company_id);
                              var html = '<option value="">{{ trans('dashboard.Select Company') }}</option>'
                              for (let i = 0; i < companies.length; i++) {
                                  html += '<option value="' + companies[i].id + '">' + companies[i].name + '</option>';
                              }
                          }
                          else {
                              var html = '<option value="" selected="">{{ trans('dashboard.Not Found') }}</option>'
                          }
                          $("#companies").html(html);
                          $("#mother_company_id").val(response.mother_company_id);
                      }
                  })
              }
           });
        });
    </script>
@endsection
