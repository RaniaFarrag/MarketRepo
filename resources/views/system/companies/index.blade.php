@extends('layouts.dashboard')

@section('body')
    <style>
        a.sociall img {
            width: 25px;
        }

        .checkbox-inline.company_Card label {
            display: inline-block;
            text-align: center;
        }

        .checkbox-inline .checkbox span {
            margin: auto;
        }

        .btn .badge {
            position: absolute;
            top: -1px;
            right: 0;
            color: #6993FF;
            border: 1px solid;
            padding: 7px 5px;
            line-height: 0;
            border-radius: 50%;
        }
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
                            {{ trans('dashboard.Companies View') }}</h2>
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
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <!--end::Item-->
                            <!--begin::Item-->
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                                {{--{{ trans('dashboard.Companies Data') }} </a>--}}
                            {{--<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>--}}
                            {{--<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">--}}
                                {{--{{ trans('dashboard.Companies View') }}  </a>--}}
                            <!--end::Item-->


                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
        <!-- Modal-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img class="img-fluid" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                            {{ trans('dashboard.Close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('script')
    {{--VIEW BUSINESS CARDS IN MODAL--}} {{--RANIA--}}
    <script>
        $('.business_card').on('click', function() {
            //$('#myModal').html('<img src="' + $(this).data('userphoto') + '"/>')
            $('#myModal img').attr('src', $(this).attr('data-img-url'));
            $("#myModal h5").html($(this).attr('data-name'));
        });
    </script>

    {{--CKECKBOXES IN COMPANY VIEW--}} {{--RANIA--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <script>

        $('input.confirm_connected_checked').on('change', function() {
            if ( this.checked ) {
                // if checked ...
                //alert( this.value );
                var company_id = $(this).attr('data-id');
                //console.log(company_id);
                $.ajax({
                    type: "get",
                    url: "{{ url('/confirm/connected/') }}" + '/' + company_id,
                    //dataType: "json",
                    success: function (response) {
                        // swal("Our First Alert", "With some body text and success icon!", "success");
                        swal( 'Success', response, "success");
                    }
                });

            }
            else {
                var company_id = $(this).attr('data-id');
                $.ajax({
                    type: "get",
                    url: "{{ url('/confirm/connected/') }}" + '/' + company_id,
                    success: function (response) {
                        swal( 'Cancel', response, "success");
                    }
                });
            }
        });

        $('input.confirm_interview_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/interview/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/interview/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

        $('input.confirm_need_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/need/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/need/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

        $('input.confirm_contract_checked').on('change' , function () {
            if( this.checked ){
                var company_id = $(this).attr('data-id');
                console.log(company_id);
                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/contract/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    },
                    error:function () {
                        swal('Faild' , response , 'failed');
                    }
                })
            }
            else {
                var company_id = $(this).attr('data-id');

                $.ajax({
                    type : "get",
                    url : "{{ url('/confirm/contract/') }}" + '/' + company_id,
                    success:function (response) {
                        swal('Success' , response , 'success');
                    }
                })
            }
        });

    </script>


    <script>
        {{-- GET ALL SUB-SECTORS OF SECTOR AND CITIES OF COUNTRY--}}

        $(document).ready(function() {

            $("#sector").on('change' , function () {
                var sector_id = $(this).val();
                console.log(sector_id)
                if (sector_id){
                    $.ajax({
                        type: "get",
                        // url: "/get/sub/sectors/of/sector/" + sector_id,
                        {{--url: "{{ route('get_sub' ) }}" + '/' + sector_id,--}}
                                {{--url: "{{ route('get_sub' , ['sector_id'=>sector_id]) }}",--}}
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
                            $("#subSector").html(html);

                        }
                    });
                }
                else {
                    var html = '<option value="" selected="">{{ trans('dashboard.Select All') }}</option>'
                    $("#subSector").html(html);
                }

            })


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

        });

    </script>


    <script>
        $('body').on('click', '.pagination a, #searchFilter', function (e) {
            //console.log($("#company_status").val());
            e.preventDefault();
            $.ajax({
                dataType: 'html',
                url: "{{ route('companies.index') }}",
                "data": {
                    "page": $(this).is("a") ? $(this).attr('href').split('page=')[1] : "",
                    "created_at": $("#created_at").val(),
                    "interview_date": $("#interview_date").val(),
                    "location": $("#location").val(),
                    "client_status": $("#client_status").val(),
                    "representative_id": $("#representative_id").val(),
                    "representative": $("#representative").val(),
                    "company_status": $("#company_status").val(),
                    "communication_type": $("#communication_type").val(),
                    "evaluation_ids": $("#evaluation_ids").val(),
                    "city_id": $("#cities").val(),
                    "country_id": $("#countries").val(),
                    "sub_sector_id": $("#subSector").val(),
                    "sector_id": $("#sector").val(),
                    "name": $("#name").val(),
                },
                success: function (data) {
                    $('.renderTable').html(JSON.parse(data).viewBlade);
                    $('#counter').html(JSON.parse(data).count)

                }
            });
        });
    </script>

@endsection





