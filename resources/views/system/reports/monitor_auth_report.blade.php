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
                            {{ trans('dashboard.Monitor All Log') }}
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
                                {{ trans('dashboard.Monitor All Log') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <!--begin::Button-->
                    {{--<a href="{{ route('export_monitor_report') }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">--}}
                        {{--{{ trans('dashboard.Export Excel ') }}--}}
                    {{--</a>--}}

                    <button type="button" onclick='document.getElementById("exportExcelForm").submit();' class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Export Excel') }}
                    </button>
                    <!--end::Button-->
                    <!--begin::Button-->
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
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.Monitor All Log') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-title" data-toggle="collapse" data-target="#collapseOne1">
                                                {{ trans('dashboard.Filters') }}
                                            </div>
                                        </div>
                                        <form autocomplete="off" id="exportExcelForm" action="{{route('export_monitor_report')}}">
                                            <div id="collapseOne1" class="collapse show" data-parent="#accordionExample1">
                                            <div class="card-body">
                                                <div class="row fliter_serch">
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label> {{ trans('dashboard.Name') }}  </label>
                                                            <select id="user_id" class="form-control select2" name="user_id">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($users as $user)
                                                                    <option value="{{ $user->id }}"> {{ app()->getLocale() == 'ar' ? $user->name : $user->name_en }}</option>
                                                                @endforeach

                                                            </select>
                                                            {{--<input id="name" name="name" type="text" class="form-control"--}}
                                                                   {{--placeholder="{{ trans('dashboard.Name') }}">--}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.User Roles') }}</label>
                                                            <select id="role" class="form-control select2" name="role">
                                                                <option value="" selected="">{{ trans('dashboard.Select All') }}</option>
                                                                @foreach($roles as $role)
                                                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Date From') }}</label>
                                                            <input id="from_date" name="from_date" type="date" class="form-control"
                                                                   placeholder="{{ trans('dashboard.Date From') }}">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>{{ trans('dashboard.Date To') }}</label>
                                                            <input id="to_date" name="to_date" type="date" class="form-control"
                                                                   placeholder="{{ trans('dashboard.Date To') }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="form-group">
                                                            <label>&nbsp;</label>
                                                            <button id="searchFilter" type="button"
                                                                    class="btn btn-block btn-success">{{ trans('dashboard.Search') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="table-responsive renderTable">
                                    @include('system.reports.monitor_auth_report_partial')
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
        $('body').on('click', '.pagination a, #searchFilter', function (e) {
            console.log($("#role").val());
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: "{{ route('monitor_report') }}",
                "data": {
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "user_id": $("#user_id").val(),
                    "role": $("#role").val(),
                    "from_date": $("#from_date").val(),
                    "to_date": $("#to_date").val(),
                },
                success: function (data) {
                    $('.renderTable').html(data);

                }
            });
        });
    </script>


@endsection
