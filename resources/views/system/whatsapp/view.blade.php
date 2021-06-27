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
                            {{ trans('dashboard.Send Message') }}
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
                                {{ trans('dashboard.Send Message') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->

                <div class="d-flex align-items-center">
                {{--CLASS sendMessage TO MAKE ACTION WHEN CLIKC ON BUTTON--}}
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
                                        {{ trans('dashboard.Send Message') }}
                                    </h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive renderTable">
                                    @include('system.whatsapp.view_whatsapp_partial')
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

{{--                                <input type="hidden" name="checkAll" class="checkAllInput" value="">--}}
{{--                                <input type="hidden" name="company_ids" class="company_ids" value="">--}}

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
        $(document).on('change', '.checkPhones' ,function () {
            if (contains(phones, $(this).val())) {
                var index = phones.indexOf($(this).val());
                phones.splice(index, 1);
            } else {
                phones.push($(this).val());

            }
            //console.log(phones)
             $('.company_ids').val(JSON.stringify(phones));
            console.log($('.company_ids').val());
        });

        $(document).on('click', '.sendMessage', function (e) {
            var phonesText="";
            console.log(phones.length)

            for (var i = 0 ; i<phones.length ;i++)
            {
                phonesText+=phones[i];
                phonesText+="\n";
            }
            $('#mobile_val').html("");
            $('#mobile_val').html(phonesText);

            // if (phones.length == 0) {
            //     e.preventDefault();
            //     alert("Please Select Any Data .")
            // }

        });
    </script>


    <script>
        $('body').on('click', '.pagination a ', function (e) {
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: '{{route("whatsapp_message")}}',
                data: {
                    "ids": phones,
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                }
            });
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


    <script>
        $(document).on('click', '#checkAll', function (e) {
            if ($('.items:checked').length == $('.items:checkbox').length) {
                $('.items:checkbox').prop('checked', false);
                $('.checkAllInput').val(0);
                console.log(15)
                phones.length = 0;
            }
            else {
                 console.log(55)
                $('.items:checkbox').prop('checked', true);
                $('.checkAllInput').val(1);

                $("input[name='company_ids[]']:checked").each(function() {
                    phones.push($(this).val());
                });

            }

            // $(':checkbox:checked').each(function(i){
            //     phones.push($(this).val());
            // });


            $('.company_ids').val(JSON.stringify(phones));
            console.log(JSON.stringify(phones))
        });

    </script>



@endsection
