@extends('layouts.dashboard')
<style>
    .switch label {
        margin: auto;
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
                            {{ trans('dashboard.All Users') }}
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
                                {{ trans('dashboard.All Users') }}
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
                    <a href="{{ route('users.create') }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Add New user') }}
                    </a>
                    <!--end::Button-->

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
                                        {{ trans('dashboard.All Users') }}
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
                                        <th>{{ trans('dashboard.Name Arabic') }}</th>
                                        <th>{{ trans('dashboard.Name English') }}</th>
                                        <th>{{ trans('dashboard.User E-mail') }}</th>
                                        <th>{{ trans('dashboard.User Roles') }}</th>
                                        <th>{{ trans('dashboard.Sector') }}</th>
                                        <th>{{ trans('dashboard.active') }}</th>
                                        <th>{{ trans('dashboard.edit') }}</th>
                                        <th>{{ trans('dashboard.delete') }}</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $k=>$user)
                                        <tr>
                                            <td>{{ $k+1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->name_en }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roles[0]->name ?? "-" }}</td>
                                            <td>
                                                @foreach($user->sectors as $sector)
                                                    {{ $sector->name }} -
                                                @endforeach
                                            </td>
                                            <td>
                                                <span class="switch switch-icon">
                                                     <label>
                                                        <input data-id="{{ $user->id }}" id="active" name="active" value="1" type="checkbox"
                                                                {{ $user->active == 1 ? 'checked' : '' }}/>
                                                        <span></span>
                                                    </label>
                                                </span>
                                            </td>
                                            <td><a class="btn btn-success font-weight-bold" href="{{ route('users.edit' , $user->id) }}">{{ trans('dashboard.edit') }}</a></td>
                                            <td>
                                                <form method="post" action="{{ route('users.destroy' , $user->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger mr-2" type="submit"><i class="fa fa-trash p-0"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                                {{ $users->links() }}
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <script>
        // $("#active").on('change' , function () {
            $('body').on('click', '#active', function (e) {
                var user_id =  $(this).attr('data-id') ;
                var active = this.checked ? this.value : '';
                if(active) {
                    $.ajax({
                        type: "get",
                        data: {
                            'user_id' : user_id
                        },
                        url: "{{ route('active_user') }}",
                        success:function (response) {
                            swal('Success' , response , 'success');
                        },
                        error:function () {
                            swal('Faild' , response , 'failed');
                        }
                    });
                }
                else {
                    $.ajax({
                        type: "get",
                        data: {
                            'user_id' : user_id
                        },
                        url: "{{ route('deactivate_user') }}" ,
                        success:function (response) {
                            swal('Success' , response , 'success');
                        },
                        error:function () {
                            swal('Faild' , response , 'failed');
                        }
                    });
                }

        })
    </script>

@endsection