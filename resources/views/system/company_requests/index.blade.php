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
                            {{ trans('dashboard.Requests') }}
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
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                                {{--{{ trans('dashboard.Region') }}--}}
                            {{--</a>--}}
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="#" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Requests') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                    <a href="{{ route('create_company_requests_of_user') }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Add New Request') }}
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
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="card-header flex-wrap">
                                <div class="card-title text-center" style="width: 100%;display: inline-block;">
                                    <h3 class="card-label" style="line-height: 70px;">
                                        {{ trans('dashboard.Requests') }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <!--begin: Datatable-->
                                <table class="table table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('dashboard.date') }}</th>
                                        <th>{{ trans('dashboard.Company Name') }}</th>
                                        <th>{{ trans('dashboard.Company Class') }}</th>
                                        <th>{{ trans('dashboard.Type') }}</th>
                                        <th>{{ trans('dashboard.Quantity') }}</th>
{{--                                        <th>{{ trans('dashboard.feedback') }}</th>--}}
{{--                                        <th>{{ trans('dashboard.notes') }}</th>--}}
{{--                                        <th>{{ trans('dashboard.nextfollow_date') }}</th>--}}
{{--                                        <th>{{ trans('dashboard.request_status') }}</th>--}}
                                    </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($requests as $k=>$request)
                                            <tr>
                                                <td>{{ $k+1 }}</td>
                                                <td>{{ $request->date }}</td>
                                                <td>{{ $request->company->name }}</td>
                                                <td>
                                                    @if($request->status)
                                                        @if($request->status == 1) A
                                                        @elseif($request->status == 2) B
                                                        @elseif($request->status == 3) C
                                                        @endif
                                                    @else {{ '-' }}
                                                    @endif
                                                </td>
                                                <td>{{ trans('dashboard.'.$request->request_type) }}</td>
                                                <td>{{ trans($request->quantity) }}</td>
{{--                                                <td></td>--}}
{{--                                                <td></td>--}}
{{--                                                <td></td>--}}
{{--                                                <td></td>--}}
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>{{ $requests->links() }}
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

<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle=confirmation]').confirmation({
            rootSelector: '[data-toggle=confirmation]',
            onConfirm: function (event, element) {
                element.trigger('confirm');
            }
        });


        $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();

            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

            return false;
        });
    });
</script>
