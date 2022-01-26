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
                            {{ trans('dashboard.History Report') }}
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
                            <a href="{{ route('sales_pipeline') }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.History Report') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                    <div class="d-flex align-items-center">
                        <a href="{{ route('create_history_sales_pipeline' , $sales_pipeline_id) }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                            {{ trans('dashboard.Add History') }}
                        </a>
                    </div>
                @endif

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
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.History Report') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive renderTable">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('dashboard.date') }}</th>
                                            <th>{{ trans('dashboard.total_volume') }}</th>
                                            <th>{{ trans('dashboard.Forecast') }}</th>
                                            <th>{{ trans('dashboard.comments') }}</th>
                                            <th>{{ trans('dashboard.project closing Month') }}</th>
                                            @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                                                <th>{{ trans('dashboard.edit') }}</th>
                                            @endif
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($history as $k=>$one_history)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $one_history->date }}</td>
                                                <td>{{ $one_history->total_volume }}</td>
                                                <td>{{ $one_history->forecast }}</td>
                                                <td>{{ $one_history->comments }}</td>
                                                <td>{{ $one_history->project_closing_month.' '.$one_history->project_closing_year }}</td>
                                                @if(\Illuminate\Support\Facades\Auth::user()->hasRole('Sales Representative'))
                                                    <td><a class="btn btn-success font-weight-bold" href="{{ route('edit_history_sales_pipeline' , $one_history->id) }}">{{ trans('dashboard.edit') }}</a></td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <!--end: Datatable-->
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
        $('body').on('click', '.pagination a , #searchBtn', function (e) {
            console.log($("#representative_id").val())
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: '{{ route("requests_report") }}',
                beforeSend: function () {
                    $('#searchFilter').addClass('spinner');
                    $('#searchFilter').attr('disabled', 'true');
                },
                complete: function () {
                    $('#searchFilter').removeClass('spinner');
                    $('#searchFilter').removeAttr('disabled');

                },
                data: {
                    "mother_company_id": $("#mother_company_id").val(),
                    "representative_id": $("#representative_id").val(),
                    "evaluation_ids": $("#evaluation_ids").val(),
                    "from": $("#from").val(),
                    "to": $("#to").val(),

                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)
                }
            });
        });
    </script>

@endsection
