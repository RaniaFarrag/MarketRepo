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
                            {{ trans('dashboard.WhatsApp') }}
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
                                {{ trans('dashboard.WhatsApp') }}
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
                    <a href="#" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                        {{ trans('dashboard.Send WhatsApp Message') }}
                    </a>
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
                                        {{ trans('dashboard.WhatsApp') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15" checked="checked">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </th>
                                            <th>#</th>
                                            <th> {{ trans('dashboard.Company Name') }}</th>
                                            <th>{{ trans('dashboard.Sector') }}</th>
                                            <th>{{ trans('dashboard.Company Type') }}</th>
                                            <th>{{ trans('dashboard.E-mail') }}</th>
                                            <th>{{ trans('dashboard.Mobile / WhatsApp number') }}</th>
                                            <th>{{ trans('dashboard.Send Message') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>


                                        <tr>
                                            <td>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>

                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>

                                            <td>maen@operationfalafel.ae</td>
                                            <td>0536888399</td>


                                            <td>
                                                <a data-id="0536888399" href="#exampleModal" data-toggle="modal">
                                                    <i class="fab fa-2x text-success fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>

                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>

                                            <td>maen@operationfalafel.ae</td>
                                            <td>0536888399</td>


                                            <td>
                                                <a data-id="0536888399" href="#exampleModal" data-toggle="modal">
                                                    <i class="fab fa-2x text-success fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>

                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>

                                            <td>maen@operationfalafel.ae</td>
                                            <td>0536888399</td>


                                            <td>
                                                <a data-id="0536888399" href="#exampleModal" data-toggle="modal">
                                                    <i class="fab fa-2x text-success fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-outline checkbox-success m-auto">
                                                        <input type="checkbox" name="Checkboxes15">
                                                        <span class="m-0"></span>
                                                    </label>
                                                </div>
                                            </td>

                                            <td style="width: 34px;"><a href="#" target="_blank">2959</a></td>

                                            <td><a href="#">ADVANCED DENTAL CARE</a></td>
                                            <td>Food &amp; Beverage</td>
                                            <td>Food &amp; Beverage</td>

                                            <td>maen@operationfalafel.ae</td>
                                            <td>0536888399</td>


                                            <td>
                                                <a data-id="0536888399" href="#exampleModal" data-toggle="modal">
                                                    <i class="fab fa-2x text-success fa-whatsapp"></i>
                                                </a>
                                            </td>
                                        </tr>



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


            <!-- Modal-->
            <div class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> {{ trans('dashboard.WhatsApp') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>{{ trans('dashboard.WhatsApp Number') }}</label>
                                <textarea class="form-control" id="exampleTextarea" rows="3">9660536888399
9660536888399
9660536888399
9660536888399
9660536888399</textarea>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('dashboard.Message Type') }}</label>
                                <select name="client_status" class="form-control">
                                    <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                    <option value="1">{{ trans('dashboard.text') }}</option>
                                    <option value="2">{{ trans('dashboard.image') }}</option>
                                    <option value="3">{{ trans('dashboard.document') }}</option>
                                    <option value="4">{{ trans('dashboard.Video') }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('dashboard.attachment') }}</label>
                                <div></div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">{{ trans('dashboard.Choose file') }}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ trans('dashboard.Message') }}</label>
                                <textarea class="form-control" id="exampleTextarea" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button"
                                    class="btn btn-primary font-weight-bold">{{ trans('dashboard.Send Message') }}</button>
                            <button type="button" class="btn btn-light-primary font-weight-bold"
                                    data-dismiss="modal">{{ trans('dashboard.cancel') }}</button>

                        </div>
                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->

    </div>
    <!--end::Content-->

@endsection



@section('script')


@endsection