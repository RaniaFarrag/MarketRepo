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
                            {{ trans('dashboard.Rep Reports') }}
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
                                {{ trans('dashboard.Rep Reports') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <a href="#" class="btn btn-white font-weight-bold py-3 px-6">
                        {{ trans('dashboard.Companies') }} <span id="counter"></span>
                    </a>

                </div>

            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->

                <!--begin::Row-->
                <div class="row">

                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">

                            <div class="card-body">

                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Rep Reports') }}
                                            </div>
                                        </div>
                                        <form id="exportExcelForm" action="{{route('export_representative_company_report')}}">

                                            <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <div class="row fliter_serch">
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label> {{ trans('dashboard.Company Representative name') }}  </label>
                                                            <select class="form-control select2" id="rep_id" name="rep_id">
                                                                <option value="" disabled selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($reps as $rep)
                                                                    <option value="{{$rep->id}}">{{app()->getLocale() == 'ar' ? $rep->name : $rep->name_en}}
                                                                    </option>
                                                                @endforeach
                                                                @if(auth()->user()->roles[0]->name == 'Sales Manager')
                                                                    <option value="{{auth()->user()->id}}">{{app()->getLocale() == 'ar' ? auth()->user()->name : auth()->user()->name_en}}
                                                                    </option>
                                                                @endif
                                                            </select>
                                                        </div>

                                                    </div>


                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-block btn-success font-weight-bold  py-3 px-6 mr-2">
                                                                {{ trans('dashboard.Export Excel ') }}
                                                            </button>
                                                            <button type="button" id="searchBtn" class="btn btn-block btn-success spinner-white spinner-right">{{ trans('dashboard.Search') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="renderTable">

                                </div>

                            </div>
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
                <!--end::Row-->


                <!--end::Dashboard-->
            </div>


            <!--end::Container-->
        </div>
        <!--end::Entry-->

    </div>
    <!--end::Content-->

@endsection



@section('script')

    <script>
        $('body').on('click', '.pagination a, #searchBtn', function (e) {
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: "{{ route('rep_report') }}",
                beforeSend: function () {
                    $('#searchFilter').addClass('spinner');
                    $('#searchFilter').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchFilter').removeClass('spinner');
                    $('#searchFilter').removeAttr('disabled');

                },
                "data": {
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "rep_id": $("#rep_id").val(),
                },
                success: function (data) {
                    // $('.renderTable').html(data);
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                }
            });
        });
    </script>

@endsection
