<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FnrcoFlatRedAgreementAnnexure extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'fnrco_flat_red_agreement_id',
        'notes',
        'general_terms',
        'recruitment_procedure',
        'post_recruiment_procedure',
        'payment_default',

        'second_address',
        'second_location',
        'second_project_representative_name',
        'second_project_representative_designation',
        'second_project_representative_contact_num',
        'second_project_representative_email',

        'second_account_representative_name',
        'second_account_representative_designation',
        'second_account_representative_contact_num',
        'second_account_representative_email',

        'second_bank_name_beneficiary',
        'second_bank_name',
        'second_bank_branch',
        'second_bank_type_account',
        'second_bank_account_num',
        'second_bank_iban_num',

        'hr_name',
        'hr_designation',

        'finance_name',
        'finance_designation',

        'approved_by_name',
        'approved_by_designation',
    ];

    protected $dates = ['deleted_at'];

    public function fnrcoFlatRedAgreement(){
        return $this->belongsTo(FnrcoFlatRedAgreement::class , 'flatred_agreement_id' , 'id');
    }
}
