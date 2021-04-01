<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('link', function () {
    \Artisan::call('storage:link');

});*/

//Route::get('link', function () {
//    \Artisan::call('permission:cache-reset');
//
//});

//Route::get('link', function () {
//    \Artisan::call('cache:clear');
//
//});

Route::get('config/cache' , function (){
    \Artisan::call('config:cache');
});



Auth::routes();

/** Add This before upload */
//Route::get('login',array('as'=>'login',function(){
//    return redirect('https://marketing-hc.com/');
//}));

Route::get('locale/{locale}' , function ($locale){
    \Session::put('locale' , $locale);

    return redirect()->back();
})->name('locale');

Route::group(['middleware'=>['auth' , 'locale']] , function (){

    Route::get('/' , 'HomeController@index')->name('home');

    /***********************************************RESOURCES***************************************************/

    /** Manage Mother Company */
    Route::resource('motherCompany' , 'MotherCompanyController');

    /** Manage Roles */
    Route::resource('roles' , 'RoleController')->middleware(['permission:Menu Users']);

    /** Manage Permissions */
    Route::resource('permissions' , 'PermissionController')->middleware(['permission:Menu Users']);

    /** Manage Countries */
    Route::resource('countries' , 'CountryController')->middleware(['permission:Menu Region']);

    /** Manage Cities */
    Route::resource('cities' , 'CityController')->middleware(['permission:Menu Region']);

    /** Manage Users */
    Route::resource('users' , 'UserController')->middleware(['permission:Menu Users']);

    /** Active User */
    Route::get('active' , 'UserController@activeUser')->name('active_user')->middleware(['permission:Menu Users']);
    /** Deactivate User */
    Route::get('deactivate' , 'UserController@deactivateUser')->name('deactivate_user')->middleware(['permission:Menu Users']);

    /** Manage Sectors */
    Route::resource('sectors' , 'SectorController')->middleware(['permission:Menu Sectors']);

    /** Manage Sub-Sectors */
    //Route::resource('sub_sectors', 'SubSectorController', ['except' => 'index' , 'create']);
    Route::resource('sub_sectors', 'SubSectorController')->except('index' , 'create')->middleware(['permission:Menu Sectors']);
    /** Custom index route */
    Route::get('sub_sectors/index/{sector_id}', [
        'as' => 'sub_sectors.index',
        'uses' => 'SubSectorController@index'
    ])->middleware(['permission:Menu Sectors']);

    Route::get('sub_sectors/create/{sector_id}' , [
        'as' => 'sub_sectors.create',
        'uses' => 'SubSectorController@create'
    ])->middleware(['permission:Menu Sectors']);

    /** Manage Company */
    Route::resource('companies' , 'CompanyController');

    /** Custom edit route */
    Route::get('companies/edit/{company_id}/{mother_company_id}', [
        'as' => 'companies.edit',
        'uses' => 'CompanyController@edit'
    ]);

    Route::get('show_company/{company_id}/{mother_company_id}' , 'CompanyController@showCompany')->name('show_company');

    /** Manage Company Needs */
    Route::resource('company_needs' , 'CompanyNeedController')->middleware(['permission:Show Company Needs']);
    /** Custom index route */
    Route::get('company_needs/index/{company_id}/{mother_company_id}', [
        'as' => 'company_needs.index',
        'uses' => 'CompanyNeedController@index'
    ])->middleware(['permission:Show Company Needs']);
    /** Custom create route */
    Route::get('company_needs/create/{company_id}/{mother_company_id}', [
        'as' => 'company_needs.create',
        'uses' => 'CompanyNeedController@create'
    ])->middleware(['permission:Show Company Needs']);
    /** Custom edit route */
    Route::get('company_needs/edit/{need_id}/{mother_company_id}', [
        'as' => 'company_needs.edit',
        'uses' => 'CompanyNeedController@edit'
    ])->middleware(['permission:Show Company Needs']);

    /** Custom edit route */
    Route::get('company_needs/destroy/{need_id}/{mother_company_id}', [
        'as' => 'company_needs.destroy',
        'uses' => 'CompanyNeedController@destroy'
    ])->middleware(['permission:Show Company Needs']);


    Route::get('print/need/{need_id}/{mother_company_id}' , 'CompanyNeedController@printNeed')->name('print_need')
        ->middleware(['permission:Show Company Needs']);

    /** Get Sub-Sectors Of Sector */
    Route::get('/get/sub/sectors/of/sector/{sector_id}' , 'SubSectorController@getSubsectorOfsector')->name('get_sub_sectros_of_sector');

    /** Get Cities Of Country */
    Route::get('/get/cities/of/country/{country_id}' , 'CityController@getCitiesOfcountry')->name('get_cities_of_country');

    /** Assign Company To Representative Form */
    Route::get('assign/company/representative' , 'AssignCompanyController@assignCompanyToRepresentativeForm')
        ->name('assign_company_to_representative')->middleware(['permission:Menu Corporate Assignment']);

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector */
    Route::get('fetch/company/data' , 'AssignCompanyController@fetchCompanyData')->name('fetch_company_data');

    /** Submit Assign Company To Representative */
    Route::post('assign/company' , 'AssignCompanyController@submitAssignCompanyToRepresentative')
        ->name('assign_company')->middleware(['permission:Menu Corporate Assignment']);

    /** Get All Representatives */
    Route::get('get/all/representatives' , 'AssignCompanyController@getAllRepresentatives')
        ->name('get_all_representatives')->middleware(['permission:Menu Corporate Assignment']);

    /** Get Companies Of Representative */
    Route::get('get/companies/of/representative/{representative_id}' , 'AssignCompanyController@getCompaniesofRepresentative')
        ->name('get_companies_of_representative')->middleware(['permission:Menu Corporate Assignment']);

    /** Cancel The Company Assignment */
    Route::get('cancel/company/assignment/{company_id}/{rep_id}' , 'AssignCompanyController@cancelCompanyassignment')
        ->name('cancel_company_assignment')->middleware(['permission:Menu Corporate Assignment']);

    /** Whatsapp Messages */
    Route::get('whatsapp/messages' , 'WhatsAppController@WhatsappMessages')->name('whatsapp_message');

    /** Send Whatsapp Messages */
    Route::post('send/whatsapp/message','WhatsAppController@sendWhatsappMessage')->name('send_whatsapp_message');

    Route::get('print/show/company/{company_id}' , 'CompanyController@print_show_company')->name('print_show_company');

    /** Send Email To Company */
    Route::post('send/email','CompanyController@sendEmail')->name('send_email')->middleware(['permission:Send Mail']);


    /*********************************************MANAGE CHECK BOXES****************************************************/
    /** Confirm Connected */
    Route::get('/confirm/connected/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmConnected')
        ->name('confirm_connected');

    /** Confirm Interview */
    Route::get('/confirm/interview/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmInterview')
        ->name('confirm_interview');

    /** Confirm Need */
    Route::get('/confirm/need/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmNeed')
        ->name('confirm_need');

    /** Confirm Contract */
    Route::get('/confirm/contract/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmContract')
        ->name('confirm_contract');


    /**************************************************REPORTS******************************************************************/
    /** Company Report */
    Route::get('company/report','CompanyController@companiesReports')->name('company_report')
        ->middleware(['permission:Reports']);

    Route::get('export/company/report','CompanyController@extractCompanyReportExcel')->name('extract_company_report_excel')
        ->middleware(['permission:Reports']);

    /** Representative Report */
    Route::get('representative/company/report','UserController@rep_companies_report')->name('rep_report')
        ->middleware(['permission:Reports']);

    Route::get('export/representative/company/report','UserController@export_representative_company_report')
        ->name('export_representative_company_report')->middleware(['permission:Reports']);

    /** Monitor Report */
    Route::get('monitor/report' , 'LogController@monitorReport')->name('monitor_report')->middleware(['permission:Reports']);
    Route::get('export/monitor/report' , 'LogController@exportMonitorReport')->name('export_monitor_report')
        ->middleware(['permission:Reports']);


    /** sales Team Report */

//    Route::resource('companySalesTeamReports' , 'SalesLeadReportController');
    Route::get('companySalesTeamReports','SalesLeadReportController@index')->name('companySalesTeamReports.index')
        ->middleware(['permission:Reports']);

    Route::get('companySalesTeamReports/{company_id}/{mother_company_id}','SalesLeadReportController@show')
        ->name('companySalesTeamReports.show')->middleware(['permission:Reports']);

    Route::get('create/companySalesTeamReports/{company}/{mother_company_id}','SalesLeadReportController@create')
        ->name('companySalesTeamReports.create')->middleware(['permission:Reports']);

    Route::post('companySalesTeamReports/{company}','SalesLeadReportController@store')
        ->name('companySalesTeamReports.store')->middleware(['permission:Reports']);

    Route::get('export/sales/lead/report','SalesLeadReportController@extractSalesLeadReportExcel')
        ->name('extract_sales_lead_report_excel')->middleware(['permission:Reports']);


    Route::get('visit/report','SalesLeadReportController@visitReport')
        ->name('visit_report')->middleware(['permission:Reports']);


    //NEW
    Route::get('/get/reps/of/mothercompany/{mother_company_id}','AssignCompanyController@getRepofMothercompany');


    /** Manage Company Quotation */
    Route::resource('companyQuotation' , 'CompanyQuotationController')->middleware(['permission:quotations']);

    /** Custom index route */
    Route::get('companyQuotation/index/{company_id}/{mother_company_id}', [
        'as' =>   'companyQuotation.index',
        'uses' => 'CompanyQuotationController@index'
    ])->middleware(['permission:quotations']);

    /** Custom create route */
    Route::get('companyQuotation/create/{company_id}/{mother_company_id}/{saudization}', [
        'as' => 'companyQuotation.create',
        'uses' => 'CompanyQuotationController@create'
    ])->middleware(['permission:Create a quote']);

    /** Custom edit route */
    Route::get('companyQuotation/edit/{quotation_id}/{mother_company_id}', [
        'as' => 'companyQuotation.edit',
        'uses' => 'CompanyQuotationController@edit'
    ])->middleware(['permission:quotations']);

    /** Custom destroy route */
    Route::get('companyQuotation/destroy/{quotation_id}/{mother_company_id}', [
        'as' => 'companyQuotation.destroy',
        'uses' => 'CompanyQuotationController@destroy'
    ])->middleware(['permission:quotations']);

    Route::get('print/quotation/{quotation_id}/{mother_company_id}' , 'CompanyQuotationController@printQuotation')
        ->name('print_quotation')->middleware(['permission:quotations']);

    /*********************************************Fnrco VISA Quotations**********************************************/

    Route::get('create/visa/flatred/quotation/{company_id}/{mother_company_id}/{saudization}',
        'CompanyQuotationController@createVisaFlatredQuotation')
                ->name('create_visa_flatred_quotation');

    Route::post('store/visa/flatred/quotation/',
        'CompanyQuotationController@storeVisaFlatredQuotation')
        ->name('store_visa_flatred_quotation');

    Route::get('edit/visa/flatred/quotation/{quotation_id}/{mother_company_id}',
        'CompanyQuotationController@editVisaFlatredQuotation')
        ->name('edit_visa_flatred_quotation');

    Route::post('update/visa/flatred/quotation/{quotation_id}',
        'CompanyQuotationController@updateVisaFlatredQuotation')
        ->name('update_visa_flatred_quotation');

    Route::get('delete/visa/flatred/quotation/{quotation_id}/{mother_company_id}',
        'CompanyQuotationController@deleteVisaFlatredQuotation')
        ->name('delete_visa_flatred_quotation');

    Route::get('print/flat/red/quotation/{quotation_id}/{mother_company_id}' , 'CompanyQuotationController@printFlatRedQuotation')
        ->name('print_flat_red_quotation');


    Route::resource('CompanyAgreement' , 'CompanyAgreementController');

    Route::get('CompanyAgreement/index/{company_id}/{mother_company_id}', [
        'as' => 'CompanyAgreement.index',
        'uses' => 'CompanyAgreementController@index'
    ]);

    Route::get('CompanyAgreement/create/{company_id}/{mother_company_id}', [
        'as' => 'CompanyAgreement.create',
        'uses' => 'CompanyAgreementController@create'
    ]);

    Route::get('CompanyAgreement/edit/{agreement_id}/{mother_company_id}', [
        'as' => 'CompanyAgreement.edit',
        'uses' => 'CompanyAgreementController@edit'
    ]);

    Route::get('CompanyAgreement/destroy/{agreement_id}/{mother_company_id}', [
        'as' => 'CompanyAgreement.destroy',
        'uses' => 'CompanyAgreementController@destroy'
    ]);

    Route::get('CompanyAgreement/print/{agreement_id}/{mother_company_id}' , 'CompanyAgreementController@printAgreement')->name('CompanyAgreement_print');

    //Fnrco Agreement Route
    Route::get('convertToAgreement/{quotation_id}' , 'CompanyAgreementController@convertFnrcoquotationToAgreement')->name('convertToAgreement');

    Route::get('openFnrcoAgreement/{fnrco_agreement_id}' , 'CompanyAgreementController@openFnrcoAgreement')->name('openFnrcoAgreement');

    Route::get('FnrcoAgreement/print/{fnrco_agreement_id}' , 'CompanyAgreementController@printFnrcoAgreement')->name('print_FnrcoAgreement');

    /********************************************************FLATE RED AGREEMENT*********************************************************/

    Route::get('convert/flat/red/quotation/agreement/{quotation_id}' , 'CompanyAgreementController@convertFnrcoFlatRedQuotationToAgreement')
        ->name('convert_flatred_quotation_agreement');

    Route::get('open/FlatRedAgreement/{flatred_agreement_id}' , 'CompanyAgreementController@openFlatRedAgreement')
        ->name('open_FlatRedAgreement');

    Route::get('edit/FlatRedAgreement/{flatred_agreement_id}/{mother_company_id}' , 'CompanyAgreementController@editFlatRedAgreement')
        ->name('edit_FlatRedAgreement');

    Route::post('update/FlatRedAgreement/{flatred_agreement_id}' , 'CompanyAgreementController@updateFlatRedAgreement')
        ->name('update_FlatRedAgreement');

    Route::get('FlatRedAgreement/print/{flatred_agreement_id}' , 'CompanyAgreementController@flatRedAgeerAgreementprint')->name('flatRed_print_FnrcoAgreement');

    Route::get('FlatRedAgreement/delete/{flatred_agreement_id}/{mother_company_id}' , 'CompanyAgreementController@deleteflatRedAgreement')->name('flatRed_delete_FnrcoAgreement');




    Route::resource('CompanyUndertaking' , 'CompanyUndertakingController');

    /** Custom index route */
    Route::get('CompanyUndertaking/index/{company_id}/{mother_company_id}', [
        'as' => 'CompanyUndertaking.index',
        'uses' => 'CompanyUndertakingController@index'
    ]);

    /** Custom create route */
    Route::get('CompanyUndertaking/create/{company_id}/{mother_company_id}', [
        'as' => 'CompanyUndertaking.create',
        'uses' => 'CompanyUndertakingController@create'
    ]);

    /** Custom edit route */
    Route::get('CompanyUndertaking/edit/{undertaking_id}/{mother_company_id}', [
        'as' => 'CompanyUndertaking.edit',
        'uses' => 'CompanyUndertakingController@edit'
    ]);

    /** Custom destroy route */
    Route::get('CompanyUndertaking/destroy/{undertaking_id}/{mother_company_id}', [
        'as' => 'CompanyUndertaking.destroy',
        'uses' => 'CompanyUndertakingController@destroy'
    ]);

    Route::get('CompanyUndertaking/print/{undertaking_id}/{mother_company_id}' , 'CompanyUndertakingController@printUndertaking')->name('undertaking_print');


    Route::resource('companyInvoice' , 'CompanyInvoiceController');

    /** Custom index route */
    Route::get('companyInvoice/index/{agreement_id}/{mother_company_id}', [
        'as' => 'companyInvoice.index',
        'uses' => 'CompanyInvoiceController@index'
    ]);

    Route::get('companyInvoice/create/{agreement_id}/{mother_company_id}', [
        'as' => 'companyInvoice.create',
        'uses' => 'CompanyInvoiceController@create'
    ]);

    Route::get('companyInvoice/edit/{invoice_id}/{mother_company_id}', [
        'as' => 'companyInvoice.edit',
        'uses' => 'CompanyInvoiceController@edit'
    ]);

    Route::get('companyInvoice/destroy/{invoice_id}/{mother_company_id}', [
        'as' => 'companyInvoice.destroy',
        'uses' => 'CompanyInvoiceController@destroy'
    ]);

    Route::get('companyInvoice/print/{invoice_id}/{mother_company_id}' , 'CompanyInvoiceController@printLinrcoinvoice')->name('linrco_invoice_print');
    Route::get('viewAllinvoices/{company_id}/{mother_company_id}' , 'CompanyInvoiceController@viewAllinvoices')->name('view_all_invoices');
    Route::post('upload/invoice' , 'CompanyInvoiceController@uploadInvoice')->name('upload_invoice');
    //Route::get('view/invoice/pdf/{file_name}' , 'CompanyInvoiceController@downloadInvoice')->name('view_invoice_pdf');


    Route::post('assign/one/company' , 'AssignCompanyController@assignOnecompany')->name('assign_one_company');


});

//-------------------------------------EXPORT OLD DATA--------------------------------------------------


/** Export Companies Data */
Route::get('update/database/companies',function (){
    $oldData = \App\Models\companies_old::withTrashed()->get();
    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            $company= \App\Models\Company::create([
                'id' => $value->id , // add id in fillable
                'logo' => $value->logo , // Make name null in phpMyAdmin
                'first_business_card' => $value->first_business_card , // Make name null in phpMyAdmin
                'second_business_card' => $value->second_business_card ,
                'third_business_card' => $value->third_business_card ,
                'whatsapp' => $value->whatsapp ,
                'phone' => $value->phone ,
                'sector_id' => $value->sector_id ,
                'sub_sector_id' => $value->sub_sector_id ,
                'country_id' => $value->country_id ,
                'city_id' => $value->city_id ,
                'district' => $value->district ,
                'location' => $value->location,
                'branch_number' => $value->branch_number,
                'num_of_employees' => $value->num_of_employees ,
                'website' => $value->website ,
                'email' => $value->email ,
                'linkedin' => $value->linkedin ,
                'twitter' => $value->twitter,
                'ecn' => $value->ecn,
                'cr' => $value->cr,
                'ksa_branch' => $value->ksa_branch,
                'company_representative_name' => $value->company_representative_name ,
                'company_representative_title' => $value->company_representative_title ,
                'company_representative_mobile' => $value->company_representative_mobile ,
                'company_representative_phone' => $value->company_representative_phone ,
                'company_representative_email' => $value->company_representative_email ,

                'hr_director_name' => $value->hr_director_name ,
                'hr_director_email' => $value->hr_director_email ,
                'hr_director_mobile' => $value->hr_director_mobile ,
                'hr_director_phone' => $value->hr_director_phone ,
                'hr_director_whatsapp' => $value->hr_director_whatsapp ,
                'hr_director_linkedin' => $value->hr_director_linkedin ,

                'contract_manager_name' => $value->contract_manager_name ,
                'contract_manager_email' => $value->contract_manager_email ,
                'contract_manager_mobile' => $value->contract_manager_mobile ,
                'contract_manager_phone' => $value->contract_manager_phone ,
                'contract_manager_whatsapp' => $value->contract_manager_whatsapp ,
                'contract_manager_linkedin' => $value->contract_manager_linkedin ,

                'notes' => $value->notes ,

                'user_id' => $value->user_id ,

                'created_at' => $value->created_at ,
                'updated_at' => $value->updated_at ,
                'deleted_at' => $value->deleted_at ,

            ]);

//                if (count($value->images)){
//                    //dd($value->id);
//                    foreach ($value->images as $k=>$image){
//                        if(count($value->images) == 1){
//                            //dd(4);
//                            $company->update([
//                                'first_business_card' => $image->image ,
//                            ]);
//                        }
//                        elseif (count($value->images) == 2){
//                            //dd(5);
//                            $company->update([
//                                'first_business_card' => $image->image,
//                                'second_business_card' => $image->image,
//                            ]);
//                        }
//                        elseif (count($value->images) ==3){
//                            //dd(6);
//                            $company->update([
//                                'first_business_card' => $image->image,
//                                'second_business_card' => $image->image,
//                                'third_business_card' => $image->image,
//                            ]);
//                        }
//                    }
//                }

//                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
//                    'name' => $value->name_1,
//                    'job_title' => $value->jobTitle_1,
//                    'mobile' => $value->phone_1,
//                    'linkedin' => $value->linkedin_1,
//                    'whatsapp' => $value->whatsApp_1,
//                    'email' => $value->d_email_1,
//                    'company_id' => $company->id,
//                ]);
//
//                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
//                    'name' => $value->name_2,
//                    'job_title' => $value->jobTitle_2,
//                    'mobile' => $value->phone_2,
//                    'linkedin' => $value->linkedin_2,
//                    'whatsapp' => $value->whatsApp_2,
//                    'email' => $value->d_email_2,
//                    'company_id' => $company->id,
//                ]);
//
//                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
//                    'name' => $value->name_3,
//                    'job_title' => $value->jobTitle_3,
//                    'mobile' => $value->phone_3,
//                    'linkedin' => $value->linkedin_3,
//                    'whatsapp' => $value->whatsApp_3,
//                    'email' => $value->email_3,
//                    'company_id' => $company->id,
//                ]);

//                $oldRepCompany = \App\Models\rep_companies_old::where('company_id' , $company->id)->first();
//                if($oldRepCompany){
//                    //dd($oldRepCompany);
//                    $company->update([
//                        'representative_id' => $oldRepCompany->rep_id ,
//                    ]);
//                }


        }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }

});

/**  Export Company Translation*/
Route::get('update/database/company_translations',function (){
    $oldData = \App\Models\companies_old::withTrashed()->get();
    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            $company = \App\Models\CompanyTranslation::create([
                'id' => $value->id , // add id in fillable
                'company_id' => $value->company_id , // Make name null in phpMyAdmin
                'locale' => $value->locale , // Make name null in phpMyAdmin
                'name' => $value->name ,
                'created_at' => $value->created_at ,
                'updated_at' => $value->updated_at ,

            ]);

        }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }

});


/** Divide Table Companies To Two Tables */
Route::get('update/database/companies/to',function (){
    $oldData = \App\Models\companies_old::withTrashed()->get();

    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
//            if (!$value->deleted_at){
                if ($value->representative_id){
                    $rep = \App\User::find($value->representative_id);
                    $company_user = \App\Models\CompanyUser::create([
                        'company_id' => $value->id ,
                        'user_id' => $value->representative_id ,
                        'mother_company_id' => $rep->mother_company_id ,
                        'client_status' => $value->client_status ,
                        'client_status_user_id' => $value->client_status_user_id ,
                        'evaluation_status' => $value->evaluation_status ,
                        'evaluation_status_user_id' => $value->evaluation_status_user_id ,
                        'confirm_connected' => $value->confirm_connected ,
                        'confirm_connected_user_id' => $value->confirm_connected_user_id ,
                        'confirm_interview' => $value->confirm_interview ,
                        'confirm_interview_user_id' => $value->confirm_interview_user_id ,
                        'confirm_need' => $value->confirm_need ,
                        'confirm_need_user_id' => $value->confirm_need_user_id ,
                        'confirm_contract' => $value->confirm_contract ,
                        'confirm_contract_user_id' => $value->confirm_contract_user_id ,
                    ]);
                }

//            }

        }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }

});


/** Export Company Need */
Route::get('update/database/company/needs' , function (){
    $oldData = \App\Models\CompanyNeedOld::all();

    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value) {
            if (!$value->delated_at){
            $company = App\Models\Company::where('id',$value->company_id)->withTrashed()->first();
                if($company){
                    if($company->sector_id != 1){
                        $fnrco_need = \App\Models\FnrcoNeed::create([
                            'id' => $value->id , // add id in fillable
                            'employment_type_id' => $value->employment_type_id ,
                            'required_position' => $value->required_position ,
                            'job_description' => $value->job_description ,
                            'candidates_number' => $value->candidates_number ,
                            'country_id' => $value->country_id ,
                            'gender' => $value->gender ,
                            'minimum_age' => $value->minimum_age ,
                            'total_salary' => $value->total_salary ,
                            'special_note' => $value->special_note ,
                            'contract_duration' => $value->contract_duration ,
                            'experience_range' => $value->experience_range ,
                            'work_location' => $value->work_location ,
                            'work_hours' => $value->work_hours ,
                            'deadline' => $value->deadline ,
                            'educational_qualification' => $value->educational_qualification ,
                            'data_flow' => $value->data_flow ,
                            'prometric' => $value->prometric ,
                            'classification' => $value->classification ,
                            'total_experience' => $value->total_experience ,
                            'area_of_experience' => $value->area_of_experience ,
                            'other_skills' => $value->other_skills ,
                            'company_id' => $value->company_id ,
                            'user_id' => $value->user_id ,
                            'created_at' => $value->created_at ,
                            'updated_at' => $value->updated_at ,
                        ]);
                    }
                    else{
                        $linrco_need = \App\Models\LinrcoNeed::create([
                            'id' => $value->id , // add id in fillable
                            'employment_type_id' => $value->employment_type_id ,
                            'required_position' => $value->required_position ,
                            'job_description' => $value->job_description ,
                            'candidates_number' => $value->candidates_number ,
                            'country_id' => $value->country_id ,
                            'gender' => $value->gender ,
                            'minimum_age' => $value->minimum_age ,
                            'total_salary' => $value->total_salary ,
                            'special_note' => $value->special_note ,
                            'contract_duration' => $value->contract_duration ,
                            'experience_range' => $value->experience_range ,
                            'work_location' => $value->work_location ,
                            'work_hours' => $value->work_hours ,
                            'deadline' => $value->deadline ,
                            'educational_qualification' => $value->educational_qualification ,
                            'data_flow' => $value->data_flow ,
                            'prometric' => $value->prometric ,
                            'classification' => $value->classification ,
                            'total_experience' => $value->total_experience ,
                            'area_of_experience' => $value->area_of_experience ,
                            'other_skills' => $value->other_skills ,
                            'company_id' => $value->company_id ,
                            'user_id' => $value->user_id ,
                            'created_at' => $value->created_at ,
                            'updated_at' => $value->updated_at ,
                        ]);
                    }
                }

        }
    }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }
});

/** Export Meetings Data */
Route::get('update/database/meetings',function (){
    $oldData = \App\Models\CompanyMeetingOld::all();

    try {
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            //dd($value->by);
            $company_meeting= \App\Models\CompanyMeeting::create([
                'id' => $value->id , // add id in fillable
                'date' => $value->verified_date ,
                'time' => $value->verified_time ,
                'company_id' => $value->company_id ,
                'user_id' => $value->by ,
            ]);
        }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }


});

/** Export Sales-Report Data */
Route::get('update/database/sales/report',function (){
    $oldData = \App\Models\Company_sales_lead_report_old::all();

    try {
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            //dd($value->by);
            $company_sales_report= \App\Models\Company_sales_lead_report::create([
                'id' => $value->id  , // add id in fillable
                'company_id' => $value->company_id  ,
                'brochurs_status' => $value->brochurs_status ,
                'cat_of_req' => $value->cat_of_req ,
                'quanity' => $value->quanity ,
                'type_of_serves' => $value->type_of_serves ,
                'client_feeback' => $value->client_feeback ,
                'updates' => $value->updates ,
                'remarks' => $value->remarks ,
                'nextFollowUp' => $value->nextFollowUp ,
                'statue' => $value->statue ,
                'user_id' => $value->user_id ,
                'created_at' => $value->created_at ,
                'updated_at' => $value->updated_at ,
            ]);
        }
        \Illuminate\Support\Facades\DB::commit();
    }

    catch (\Exception $e) {
        \Illuminate\Support\Facades\DB::rollback();
        throw $e;
    }


});

/** Export Users Data */
Route::get('update/database/users',function (){
    $oldData = \App\Models\users_old::all();

    foreach ($oldData as $value)
    {
        $user= \App\User::create([
            'id' => $value->id , // add id in fillable
            'name' => $value->name ,
            'name_en' => $value->name_en ,
            'email' => $value->email ,
            'password' => $value->password ,
            'active' => $value->active ,
        ]);
    }
});

/** Export Countries Data */
Route::get('update/database/countries',function (){
    $oldData = \App\Models\countries_old::all();

    foreach ($oldData as $value)
    {
        $countries= \App\Models\Country::create([
            'id' => $value->id , // add id in fillable
            'name:ar' => $value->name_ar ,
            'name:en' => $value->name_en ,
            'code' => $value->code ,
        ]);

    }
});

/** Export Cities Data */
Route::get('update/database/cities',function (){
    $oldData = \App\Models\cities_old::all();

    foreach ($oldData as $value)
    {
        $city= \App\Models\City::create([
            'id' => $value->id , // add id in fillable
            'name:ar' => $value->name_ar ,
            'name:en' => $value->name_en ,
            'country_id' => $value->country_id ,
            'code' => $value->code ,
        ]);

    }
});

/** Export Sectors Data */
Route::get('update/database/sectors' , function (){
    $old_sectors = App\Models\Sector_old::all();

    foreach ($old_sectors as $value){
        $sector = \App\Models\Sector::create([
           'id' => $value->id,
           'name:ar' => $value->name,
           'name:en' => $value->name_en,
        ]);
    }
});

/** Export Sub-Sectors Data */
Route::get('update/database/sub/sectors' , function (){
    $old_sub_sectors = App\Models\SubSector_old::all();

    foreach ($old_sub_sectors as $value){
        $sub_sector = \App\Models\SubSector::create([
            'id' => $value->id,
            'sector_id' => $value->sector_id,
            'name:ar' => $value->title,
            'name:en' => $value->title_en,
        ]);
    }
});



/** Get Deleted companies */
Route::get('deleted/at' , function (){
    $deleted_companies = App\Models\Company::onlyTrashed()->get();
    //dd($deleted_companies);
    foreach ($deleted_companies as $deleted_company){
//        dd($deleted_company);
        DB::table('company_user')
            ->where('company_id', $deleted_company->id)
            ->update(['deleted_at' => $deleted_company->deleted_at]);
    }
});


