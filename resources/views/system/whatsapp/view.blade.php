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
                    <a href="#btnModal" data-toggle="modal" class="btn btn-success font-weight-bold sendMessage py-3 px-6 mr-2">
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
                                            <th>#</th>
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
                                        @foreach($companies as $company)
                                            <tr>
                                                <td>
                                                    <div class="checkbox-inline">
                                                        <label class="checkbox checkbox-outline checkbox-success m-auto ">
                                                            <input type="checkbox" name="company_ids[]" class="checkPhones"
                                                                   value="{{ $company->whatsapp }}">
                                                            <span class="m-0"></span>
                                                        </label>
                                                    </div>
                                                </td>

                                                <td style="width: 34px;"><a href="#"
                                                                            target="_blank">{{ $company->id }}</a></td>

                                                <td><a href="#">{{ $company->name }}</a></td>
                                                <td>{{ $company->sector ? $company->sector->name : '-' }}</td>
                                                <td>{{ $company->subSector ? $company->subSector->name : '-'}}</td>

                                                <td>{{ $company->email ? $company->email : '-' }}</td>
                                                <td>{{ $company->whatsapp ? $company->whatsapp : '-' }}</td>

                                                <td>
                                                    <a data-id="{{ $company->whatsapp }}" href="#btnModal" class="singlePhone"
                                                       data-toggle="modal">
                                                        <i class="fab fa-2x text-success fa-whatsapp"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                {{ $companies->links() }}
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
            <div class="modal fade" id="btnModal" data-backdrop="static" tabindex="-1" role="dialog"
                 aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> {{ trans('dashboard.WhatsApp') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i aria-hidden="true" class="ki ki-close"></i>
                            </button>
                        </div>
                        <form class="form-group form-horizontal" action="{{ route('send_whatsapp_message') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>{{ trans('dashboard.WhatsApp Number') }}</label>
                                    <textarea id="mobile_val"  name="whatsapp"  class="form-control"
                                              rows="3">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('dashboard.Message Type') }}</label>
                                    <select id="msg_type" name="type" class="form-control" required>
                                        <option value="" selected="">{{ trans('dashboard.Select One') }}</option>
                                        <option value="text">{{ trans('dashboard.text') }}</option>
                                        <option value="image">{{ trans('dashboard.image') }}</option>
                                        <option value="document">{{ trans('dashboard.document') }}</option>
                                        <option value="video">{{ trans('dashboard.Video') }}</option>
                                    </select>
                                </div>
                                <div id="file" style="display:none;" class="form-group">
                                    <label>{{ trans('dashboard.attachment') }}</label>
                                    <div></div>
                                    <div class="custom-file">
                                        <input type="file" name="document" class="custom-file-input">
                                        <label class="custom-file-label"
                                               for="customFile">{{ trans('dashboard.Choose file') }}</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('dashboard.Message') }}</label>
                                    <textarea name="messagetxt" class="form-control" id="exampleTextarea" rows="2"
                                              required></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                        class="btn btn-primary font-weight-bold">{{ trans('dashboard.Send Message') }}</button>
                                <button type="button" class="btn btn-light-primary font-weight-bold"
                                        data-dismiss="modal">{{ trans('dashboard.cancel') }}</button>

                            </div>
                        </form>

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
    <script>
        function contains(arr, element) {
            for (var i = 0; i < arr.length; i++) {
                if (arr[i] === element) {
                    return true;
                }
            }
            return false;
        }
    </script>


    <script>
        var phones = [];
        $(document).on('change', '.checkPhones', function () {
            if (contains(phones, $(this).val())) {
                var index = phones.indexOf($(this).val());
                phones.splice(index, 1);
            } else {
                phones.push($(this).val());

            }


            console.log(phones)
            // $('.ids').val(JSON.stringify(phones));
            // console.log($('.ids').val());
        });
        $(document).on('click', '.sendMessage', function (e) {

            var phonesText="";

            for (var i = 0 ; i<phones.length ;i++)
            {
                phonesText+=phones[i];
                phonesText+="\n";
            }
            $('#mobile_val').html("");
            $('#mobile_val').html(phonesText);


            if (phones.length == 0) {
                e.preventDefault();
                alert("Please Select Any Data .")
            }

        });
    </script>

    <script>
        $('.singlePhone').on('click', function () {
            var phone = $(this).attr('data-id');
            $('textarea[name="whatsapp"]').html(phone);
        });

        $('#msg_type').on('change', function () {
            var selection = $(this).val();
            switch (selection) {
                case "image":
                case "document":
                case "video":
                    $("#file").show()
                    break;
                default:
                    $("#file").hide()
            }
        });
    </script>



@endsection