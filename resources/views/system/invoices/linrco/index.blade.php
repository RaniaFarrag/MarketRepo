@extends('layouts.dashboard')

@section('body')

    <div class="modal fade" id="upload_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <form class="form-group form-horizontal" action="{{ route('upload_invoice') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="mother_company_id" value="">
                    <input type="hidden" name="linrco_invoice_id" value="">

                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ trans('dashboard.Upload Invoice') }}</label>
                            <input type="file" name="file" value="" class="form-control" required>
                            <a id="demo" target="_blank"></a>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit"
                                class="btn btn-primary font-weight-bold">{{ trans('dashboard.Upload') }}</button>
                        <button type="button" class="btn btn-light-primary font-weight-bold"
                                data-dismiss="modal">{{ trans('dashboard.cancel') }}</button>

                    </div>
                </form>

            </div>
        </div>
    </div>

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
                            {{ trans('dashboard.Linrco Invoice') }} {{ $linrco_agreement ? $linrco_agreement->company ? $linrco_agreement->company->name : '' : ''}}
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
                            <a href="{{ route('companies.index') }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}
                            </a>

                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('show_company' , [$linrco_agreement->company->id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ $linrco_agreement->company->name }}
                            </a>
                            <!--end::Item-->

                            <!--begin::Item-->
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('CompanyAgreement.index' , [$linrco_agreement->company->id , $mother_company_id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Linrco Agreement') }} {{ $linrco_agreement->company ? $linrco_agreement->company->name : ''  }}
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
                    {{--@if(!$linrco_invoice)--}}
                        <a href="{{ route('companyInvoice.create' , [$agreement_id , $mother_company_id]) }}" class="btn btn-success font-weight-bold  py-3 px-6 mr-2">
                            {{ trans('dashboard.Add Invoice') }}
                        </a>
                    {{--@endif--}}
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
                                        {{ trans('dashboard.Invoice') }} {{ $linrco_agreement->company ? $linrco_agreement->company->name : ''  }}
                                    </h3>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <!--begin: Datatable-->
                                    <table class="table table-bordered text-center">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('dashboard.Invoice No') }}</th>
                                            <th>{{ trans('dashboard.date') }}</th>
                                            <th>{{ trans('dashboard.agreement_no') }}</th>
                                            <th>{{ trans('dashboard.Client Code') }}</th>
                                            <th>{{ trans('dashboard.Internal Contact') }}</th>
                                            <th>{{ trans('dashboard.By') }}</th>
                                            <th>{{ trans('dashboard.Invoice Details') }}</th>
                                            <th>{{ trans('dashboard.Upload') }}</th>
                                            <th>{{ trans('dashboard.edit') }}</th>
                                            <th>{{ trans('dashboard.delete') }}</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if($linrco_invoices)
                                            @foreach($linrco_invoices as $linrco_invoice)
                                                <tr>
                                                    <td>{{ $linrco_invoice->id }}</td>
                                                    <td>{{ $linrco_invoice->date }}</td>
                                                    <td>{{ $linrco_agreement->agreement_no }}</td>
                                                    <td>{{ $linrco_agreement->company->client_code }}</td>
                                                    <td>{{ $linrco_invoice->internal_contact }}</td>
                                                    <td>{{ app()->getLocale() == 'ar' ? $linrco_invoice->user->name : $linrco_invoice->user->name_en }}</td>
                                                    <td><a class="btn btn-success font-weight-bold" target="_blank" href="{{ route('linrco_invoice_print' ,  [$linrco_invoice->id , $mother_company_id]) }}">{{ trans('dashboard.Invoice Details') }}</a></td>

                                                    <td>
                                                        @if($linrco_invoice->file)
                                                            <a linrco_invoice_id="{{ $linrco_invoice->id }}" file_link="{{ $linrco_invoice->file }}"
                                                               mother_company_id="{{ $mother_company_id }}" data-toggle="modal" class="btn btn-success font-weight-bold"
                                                               target="_blank" href="#upload_Modal">{{ trans('dashboard.Upload') }}</a>
                                                        @else
                                                            <a linrco_invoice_id="{{ $linrco_invoice->id }}" file_link="{{ $linrco_invoice->file }}"
                                                               mother_company_id="{{ $mother_company_id }}" data-toggle="modal" class="btn btn-danger font-weight-bold"
                                                               target="_blank" href="#upload_Modal">{{ trans('dashboard.Upload') }}</a>
                                                        @endif
                                                    </td>

                                                    <td><a href="{{ route('companyInvoice.edit' ,  [$linrco_invoice->id, $mother_company_id]) }}" class="btn btn-success font-weight-bold">{{ trans('dashboard.edit') }}</a></td>
                                                    <td><a onclick="return confirm('Are you sure?')" class="btn btn-danger font-weight-bold" href="{{ route('companyInvoice.destroy' ,  [$linrco_invoice->id , $mother_company_id]) }}"><i class="fa fa-trash"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @endif
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
        $('a[href="#upload_Modal"]').on('click',function(){
            var linrco_invoice_id = $(this).attr('linrco_invoice_id');
            var mother_company_id = $(this).attr('mother_company_id');
            var file_name = $(this).attr('file_link');

            $('input[name="linrco_invoice_id"]').val(linrco_invoice_id);
            $('input[name="mother_company_id"]').val(mother_company_id);

            //var url = '{{ url("view/invoice/pdf/") }}' + '/' + file_name;
            // var link = file_name.link(url);
            // document.getElementById("demo").innerHTML = link;

            var url = '{{ asset("storage/images") }}/' + file_name;
            $('#demo').attr('href',url)
            $('#demo').html(file_name)
        });
    </script>
@endsection

