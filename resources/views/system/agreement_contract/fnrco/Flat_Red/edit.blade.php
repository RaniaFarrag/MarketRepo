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
                            {{ trans('dashboard.Edit Company Agreement') }}
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
                            <a href="{{ route('companies.index') }}"
                               class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Companies Data') }}  </a>
                            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
                            <a href="{{ route('openFnrcoAgreement' , [$flatred_agreement->id]) }}" class="text-white text-hover-white opacity-75 hover-opacity-100">
                                {{ trans('dashboard.Fnrco FlatRed Agreements') }}
                            </a>
                            <!--end::Item-->
                        </div>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Dashboard-->
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <form method="post" action="{{ route('update_FlatRedAgreement' , [$flatred_agreement->id]) }}" class="form"
                                  enctype="multipart/form-data">
                                @csrf
                                {{--@method('PUT')--}}

                                {{--<input value="{{ $company_id }}" name="company_id" type="hidden" />--}}
                                <input value="{{ $mother_company_id }}" name="mother_company_id" type="hidden" />

                                <div class="card-body">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.mol') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->mol }}" name="mol" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.mol') }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.location') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->location }}" name="location" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.location') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.agreement_num') }} :</label>
                                            <input value="{{ $flatred_agreement->agreement_num }}" name="agreement_num" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.agreement_num') }}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.cr_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->cr_date }}" name="cr_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.cr_date') }}"/>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.hr_system') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->hr_system }}" name="hr_system" type="text"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.hr_system') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.signing_by') }} :</label>
                                            <input value="{{ $flatred_agreement->signing_by }}" name="signing_by" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.signing_by') }}" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.by_as') }} :</label>
                                            <input value="{{ $flatred_agreement->by_as }}" name="by_as" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.by_as') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.address_en') }} :</label>
                                            <input value="{{ $flatred_agreement->address_en }} " name="address_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.address_en') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.address_ar') }}:</label>
                                            <input value="{{ $flatred_agreement->address_ar }}" name="address_ar" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.address_ar') }}" required/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.agreement_issue_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->agreement_issue_date }}" name="agreement_issue_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.agreement_issue_date') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.agreement_expiry_date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->agreement_expiry_date }}" name="agreement_expiry_date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.agreement_expiry_date') }}"/>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.Phone') }} :</label>
                                            <input value="{{ $flatred_agreement->company->phone }}" name="phone" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.Phone') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.fax') }} :</label>
                                            <input value="{{ $flatred_agreement->fax }}" name="fax" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.fax') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.mailing_address') }} :</label>
                                            <input value="{{ $flatred_agreement->mailing_address }}" name="mailing_address" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.mailing_address') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.postal_code') }} :</label>
                                            <input value="{{ $flatred_agreement->postal_code }}" name="postal_code" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.postal_code') }}" />
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work hours') }} :</label>
                                            <input value="{{ $flatred_agreement->work_hours }}" name="work_hours" type="text"
                                                   class="form-control" placeholder="8" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work_hours_ar') }} :</label>
                                            <input value="{{ $flatred_agreement->work_hours_ar }}" name="work_hours_ar" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.eight') }}" />
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work_days') }} :</label>
                                            <input value="{{ $flatred_agreement->work_days }}" name="work_days" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.six') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work_days_en') }} :</label>
                                            <input value="{{ $flatred_agreement->work_days_en }}" name="work_days_en" type="text" class="form-control"
                                                   placeholder="6" />
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work_hours_weekly') }} :</label>
                                            <input value="{{ $flatred_agreement->work_hours_weekly }}" name="work_hours_weekly" type="text"
                                                   class="form-control" placeholder="48" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.work_hours_weekly_ar') }} :</label>
                                            <input value="{{ $flatred_agreement->work_hours_weekly_ar }}" name="work_hours_weekly_ar" type="text" class="form-control"
                                                   placeholder="ثمانية واربعون" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.first_party') }} :</label>
                                            <input value="{{ $flatred_agreement->first_party }}" name="first_party" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.first_party') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.first_party_en') }} :</label>
                                            <input value="{{ $flatred_agreement->first_party_en }}" name="first_party_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.first_party_en') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_party') }} :</label>
                                            <input value="{{ $flatred_agreement->second_party }}" name="second_party" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_party') }}" required/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.second_party_en') }} :</label>
                                            <input value="{{ $flatred_agreement->second_party_en }}" name="second_party_en" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_party_en') }}" />
                                        </div>

                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.date') }} :</label>
                                            <div class="input-group input-group-solid date"
                                                 data-target-input="nearest">
                                                <input value="{{ $flatred_agreement->date }}" name="date" type="date"
                                                       class="form-control form-control-solid "
                                                       placeholder="{{ trans('dashboard.date') }}"/>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_address') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_address }}" name="second_address" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_address') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_location') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_location }}" name="second_location" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_location') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_project_representative_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_project_representative_name }}" name="second_project_representative_name" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_project_representative_name') }}" required/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_project_representative_designation') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_project_representative_designation }}" name="second_project_representative_designation" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_project_representative_designation') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_project_representative_contact_num') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_project_representative_contact_num }}" name="second_project_representative_contact_num" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_project_representative_contact_num') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_project_representative_email') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_project_representative_email }}" name="second_project_representative_email" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_project_representative_email') }}" />
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_account_representative_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_account_representative_name }}" name="second_account_representative_name" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_account_representative_name') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_account_representative_designation') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_account_representative_designation }}" name="second_account_representative_designation" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_account_representative_designation') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_account_representative_contact_num') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_account_representative_contact_num }}" name="second_account_representative_contact_num" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_account_representative_contact_num') }}" required/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_account_representative_email') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_account_representative_email }}" name="second_account_representative_email" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_account_representative_email') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_name_beneficiary') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_name_beneficiary }}" name="second_bank_name_beneficiary" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_bank_name_beneficiary') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_name }}" name="second_bank_name" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_bank_name') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_branch') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_branch }}" name="second_bank_branch" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_bank_branch') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_type_account') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_type_account }}" name="second_bank_type_account" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_bank_type_account') }}" />
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_account_num') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_account_num }}" name="second_bank_account_num" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.second_bank_account_num') }}" required/>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.second_bank_iban_num') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->second_bank_iban_num }}" name="second_bank_iban_num" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.second_bank_iban_num') }}" />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.hr_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->hr_name }}" name="hr_name" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.hr_name') }}" required/>
                                        </div>

                                        <div class="col-lg-4">
                                            <label>{{ trans('dashboard.hr_designation') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->hr_designation }}" name="hr_designation" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.hr_designation') }}" />
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.finance_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->finance_name }}" name="finance_name" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.finance_name') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.finance_designation') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->finance_designation }}" name="finance_designation" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.finance_designation') }}" />
                                        </div>
                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.approved_by_name') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->approved_by_name }}" name="approved_by_name" type="text"
                                                   class="form-control" placeholder="{{ trans('dashboard.approved_by_name') }}" required/>
                                        </div>

                                        <div class="col-lg-3">
                                            <label>{{ trans('dashboard.approved_by_designation') }} :</label>
                                            <input value="{{ $flatred_agreement->agreementFlatRedAnnexure->approved_by_designation }}" name="approved_by_designation" type="text" class="form-control"
                                                   placeholder="{{ trans('dashboard.approved_by_designation') }}" />
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.Notes') }} :</label>
                                            {{--{{ dd(json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[0]."\n".json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[1]) }}--}}
                                            <textarea rows="5" class="form-control" name="notes">@foreach(json_decode($flatred_agreement->agreementFlatRedAnnexure->notes) as $note){!!$note."\n"!!}@endforeach</textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.general_terms') }} :</label>
                                            <textarea rows="5" class="form-control" name="general_terms">@foreach(json_decode($flatred_agreement->agreementFlatRedAnnexure->general_terms) as $general_term){!!$general_term."\n"!!}@endforeach</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.recruitment_procedure') }} :</label>
                                            {{--{{ dd(json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[0]."\n".json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[1]) }}--}}
                                            <textarea rows="5" class="form-control" name="recruitment_procedure">@foreach(json_decode($flatred_agreement->agreementFlatRedAnnexure->recruitment_procedure) as $recruitment_procedure){!!$recruitment_procedure."\n"!!}@endforeach</textarea>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>{{ trans('dashboard.post_recruiment_procedure') }} :</label>
                                            <textarea rows="5" class="form-control" name="post_recruiment_procedure">@foreach(json_decode($flatred_agreement->agreementFlatRedAnnexure->post_recruiment_procedure) as $post_recruiment_procedure){!!$post_recruiment_procedure."\n"!!}@endforeach</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label>{{ trans('dashboard.payment_default') }} :</label>
                                            {{--{{ dd(json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[0]."\n".json_decode($flatred_agreement->agreementFlatRedAnnexure->notes)[1]) }}--}}
                                            <textarea rows="4" class="form-control" name="payment_default">@foreach(json_decode($flatred_agreement->agreementFlatRedAnnexure->payment_default) as $payment_default){!!$payment_default."\n"!!}@endforeach</textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <button type="submit"
                                                    class="btn btn-primary mr-2">{{ trans('dashboard.Submit') }}</button>
                                            <a href="{{ route('open_FlatRedAgreement' , [$flatred_agreement->id]) }}"
                                               class="btn btn-secondary">{{ trans('dashboard.cancel') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
            </div>
            <!--end::Row-->

        </div>
        <!--end::Container-->
    </div>

@endsection



@section('script')


@endsection