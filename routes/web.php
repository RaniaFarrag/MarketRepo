<?php

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
    Route::resource('roles' , 'RoleController');

    /** Manage Permissions */
    Route::resource('permissions' , 'PermissionController');

    /** Manage Countries */
    Route::resource('countries' , 'CountryController');

    /** Manage Cities */
    Route::resource('cities' , 'CityController');

    /** Manage Users */
    Route::resource('users' , 'UserController');

    /** Active User */
    Route::get('active' , 'UserController@activeUser')->name('active_user');
    /** Deactivate User */
    Route::get('deactivate' , 'UserController@deactivateUser')->name('deactivate_user');

    /** Manage Sectors */
    Route::resource('sectors' , 'SectorController');

    /** Manage Sub-Sectors */
    //Route::resource('sub_sectors', 'SubSectorController', ['except' => 'index' , 'create']);
    Route::resource('sub_sectors', 'SubSectorController')->except('index' , 'create');
    /** Custom index route */
    Route::get('sub_sectors/index/{sector_id}', [
        'as' => 'sub_sectors.index',
        'uses' => 'SubSectorController@index'
    ]);
    Route::get('sub_sectors/create/{sector_id}' , [
        'as' => 'sub_sectors.create',
        'uses' => 'SubSectorController@create'
    ]);

    /** Manage Company */
    Route::resource('companies' , 'CompanyController');

    /** Manage Company Needs */
    Route::resource('company_needs' , 'CompanyNeedController');
    /** Custom index route */
    Route::get('company_needs/index/{company_id}/{mother_company_id}', [
        'as' => 'company_needs.index',
        'uses' => 'CompanyNeedController@index'
    ]);
    /** Custom create route */
    Route::get('company_needs/create/{company_id}/{mother_company_id}', [
        'as' => 'company_needs.create',
        'uses' => 'CompanyNeedController@create'
    ]);
    /** Custom edit route */
    Route::get('company_needs/edit/{need_id}/{mother_company_id}', [
        'as' => 'company_needs.edit',
        'uses' => 'CompanyNeedController@edit'
    ]);

    /** Custom edit route */
    Route::get('company_needs/destroy/{need_id}/{mother_company_id}', [
        'as' => 'company_needs.destroy',
        'uses' => 'CompanyNeedController@destroy'
    ]);


    Route::get('print/need/{need_id}/{mother_company_id}' , 'CompanyNeedController@printNeed')->name('print_need');


    /** Manage Company Quotation */
    Route::resource('company_quotations' , 'CompanyQuotationController');

    /** Custom index route */
    Route::get('company_quotations/index/{company_id}', [
        'as' =>   'company_quotations.index',
        'uses' => 'CompanyQuotationController@index'
    ]);

    /** Custom create route */
    Route::get('company_quotations/create/{company_id}', [
        'as' => 'company_quotations.create',
        'uses' => 'CompanyQuotationController@create'
    ]);

    Route::get('print/quotation' , 'CompanyQuotationController@printQuotation')->name('print_quotation');


    /**************************************************GET******************************************************/

    /** Get Sub-Sectors Of Sector */
    Route::get('/get/sub/sectors/of/sector/{sector_id}' , 'SubSectorController@getSubsectorOfsector')->name('get_sub_sectros_of_sector');

    /** Get Cities Of Country */
    Route::get('/get/cities/of/country/{country_id}' , 'CityController@getCitiesOfcountry')->name('get_cities_of_country');

    /** Assign Company To Representative Form */
    Route::get('assign/company/representative' , 'AssignCompanyController@assignCompanyToRepresentativeForm')
        ->name('assign_company_to_representative');

    /** Get Fetch Companies Based On Country ,City, Sector And Sub-sector */
    Route::get('fetch/company/data' , 'AssignCompanyController@fetchCompanyData')->name('fetch_company_data');

    /** Submit Assign Company To Representative */
    Route::post('assign/company' , 'AssignCompanyController@submitAssignCompanyToRepresentative')
        ->name('assign_company');

    /** Get All Representatives */
    Route::get('get/all/representatives' , 'AssignCompanyController@getAllRepresentatives')
        ->name('get_all_representatives');

    /** Get Companies Of Representative */
    Route::get('get/companies/of/representative/{representative_id}' , 'AssignCompanyController@getCompaniesofRepresentative')
        ->name('get_companies_of_representative');

    /** Cancel The Company Assignment */
    Route::get('cancel/company/assignment/{company_id}/{rep_id}' , 'AssignCompanyController@cancelCompanyassignment')->name('cancel_company_assignment');

    /** Whatsapp Messages */
    Route::get('whatsapp/messages' , 'WhatsAppController@WhatsappMessages')->name('whatsapp_message');

    /** Send Whatsapp Messages */
    Route::post('send/whatsapp/message','WhatsAppController@sendWhatsappMessage')->name('send_whatsapp_message');

    Route::get('print/show/company/{company_id}' , 'CompanyController@print_show_company')->name('print_show_company');

    /** Send Email To Company */
    Route::post('send/email','CompanyController@sendEmail')->name('send_email');


    /*********************************************MANAGE CHECK BOXES****************************************************/
    /** Confirm Connected */
    Route::get('/confirm/connected/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmConnected')->name('confirm_connected');

    /** Confirm Interview */
    Route::get('/confirm/interview/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmInterview')->name('confirm_interview');

    /** Confirm Need */
    Route::get('/confirm/need/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmNeed')->name('confirm_need');

    /** Confirm Contract */
    Route::get('/confirm/contract/{company_id}/{user_mother_company_id}' , 'CompanyController@confirmContract')->name('confirm_contract');


    /**************************************************REPORTS******************************************************************/
    /** Company Report */
    Route::get('company/report','CompanyController@companiesReports')->name('company_report');
    Route::get('export/company/report','CompanyController@extractCompanyReportExcel')->name('extract_company_report_excel');

    /** Representative Report */

    Route::get('representative/company/report','UserController@rep_companies_report')->name('rep_report');
    Route::get('export/representative/company/report','UserController@export_representative_company_report')->name('export_representative_company_report');

    /** Monitor Report */
    Route::get('monitor/report' , 'LogController@monitorReport')->name('monitor_report');
    Route::get('export/monitor/report' , 'LogController@exportMonitorReport')->name('export_monitor_report');


    /** sales Team Report */

//    Route::resource('companySalesTeamReports' , 'SalesLeadReportController');
    Route::get('companySalesTeamReports','SalesLeadReportController@index')->name('companySalesTeamReports.index');
    Route::get('companySalesTeamReports/{company}','SalesLeadReportController@show')->name('companySalesTeamReports.show');
    Route::get('companySalesTeamReports/create/{company}','SalesLeadReportController@create')->name('companySalesTeamReports.create');
    Route::post('companySalesTeamReports/{company}','SalesLeadReportController@store')->name('companySalesTeamReports.store');
    Route::get('export/sales/lead/report','SalesLeadReportController@extractSalesLeadReportExcel')->name('extract_sales_lead_report_excel');


    Route::get('agreement' , 'CompanyController@agreement')->name('agreement');

    Route::get('agreement/service/fnrco' , 'CompanyController@agreement_service_fnrco')->name('agreement_service_fnrco');

    Route::get('invoice' , 'CompanyController@invoice')->name('invoice');

    Route::get('sales/quotation' , 'CompanyController@sales_quotation')->name('sales_quotation');

    Route::get('undertakeing/opal' , 'CompanyController@undertakeing_opal')->name('undertakeing_opal');

});

//-------------------------------------EXPORT OLD DATA--------------------------------------------------


/** Export Companies Data */
Route::get('update/database/companies',function (){
    $oldData = \App\Models\marking_companies_old::with('images')->get();


    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            if (!$value->deleted_at){
                $company= \App\Models\Company::create([
                    'id' => $value->id , // add id in fillable
                    'name:ar' => $value->com_name_ar , // Make name null in phpMyAdmin
                    'name:en' => $value->com_name_en , // Make name null in phpMyAdmin
                    'logo' => $value->com_photo ,
                    'whatsapp' => $value->com_mobile ,
                    'phone' => $value->com_phone ,
                    'sector_id' => $value->sector_id ,
                    'sub_sector_id' => $value->com_job_category ,
                    'country_id' => $value->com_country ,
                    'city_id' => $value->com_city ,
                    'district' => $value->district ,
                    'location' => $value->com_district ,
                    'branch_number' => $value->com_branches,
                    'num_of_employees' => $value->com_emplyee_nom,
                    'website' => $value->com_website ,
                    'email' => $value->com_email ,
                    'linkedin' => $value->com_linked_in ,
                    'twitter' => $value->com_facebook ,
                    'company_representative_name' => $value->man_name ,
                    'company_representative_job_title' => $value->man_job_title ,
                    'company_representative_job_mobile' => $value->man_mobile ,
                    'company_representative_job_phone' => $value->man_phone ,
                    'company_representative_job_email' => $value->man_email ,
                    'hr_director_job_name' => $value->hr_name ,
                    'hr_director_job_email' => $value->hr_email ,
                    'hr_director_job_mobile' => $value->hr_mobile ,
                    'hr_director_job_phone' => $value->hr_phone ,
                    'hr_director_job_whatsapp' => $value->hr_whats ,
                    'client_status' => $value->client_status ,
                    'evaluation_status' => $value->rate ,
                    'evaluation_status_user_id' => $value->user_rate ,
                    'confirm_connected' => $value->is_called ,
                    'confirm_connected_user_id' => $value->is_called_user ,
                    'confirm_interview' => $value->is_verified ,
                    'confirm_interview_user_id' => $value->is_verified_user ,
                    'confirm_need' => $value->confirm_register ,
                    'confirm_need_user_id' => $value->confirm_register_user ,
                    'confirm_contract' => $value->is_registered ,
                    'confirm_contract_user_id' => $value->is_registered_user ,
                    'notes' => $value->notes ,
                    'created_at' => $value->created_at ,
                    'updated_at' => $value->updated_at ,

                ]);

                if (count($value->images)){
                    //dd($value->id);
                    foreach ($value->images as $k=>$image){
                        if(count($value->images) == 1){
                            //dd(4);
                            $company->update([
                                'first_business_card' => $image->image ,
                            ]);
                        }
                        elseif (count($value->images) == 2){
                            //dd(5);
                            $company->update([
                                'first_business_card' => $image->image,
                                'second_business_card' => $image->image,
                            ]);
                        }
                        elseif (count($value->images) ==3){
                            //dd(6);
                            $company->update([
                                'first_business_card' => $image->image,
                                'second_business_card' => $image->image,
                                'third_business_card' => $image->image,
                            ]);
                        }
                    }
                }

                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                    'name' => $value->name_1,
                    'job_title' => $value->jobTitle_1,
                    'mobile' => $value->phone_1,
                    'linkedin' => $value->linkedin_1,
                    'whatsapp' => $value->whatsApp_1,
                    'email' => $value->d_email_1,
                    'company_id' => $company->id,
                ]);

                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                    'name' => $value->name_2,
                    'job_title' => $value->jobTitle_2,
                    'mobile' => $value->phone_2,
                    'linkedin' => $value->linkedin_2,
                    'whatsapp' => $value->whatsApp_2,
                    'email' => $value->d_email_2,
                    'company_id' => $company->id,
                ]);

                $company_designated_contact = App\Models\CompanyDesignatedContact::create([
                    'name' => $value->name_3,
                    'job_title' => $value->jobTitle_3,
                    'mobile' => $value->phone_3,
                    'linkedin' => $value->linkedin_3,
                    'whatsapp' => $value->whatsApp_3,
                    'email' => $value->email_3,
                    'company_id' => $company->id,
                ]);

                $oldRepCompany = \App\Models\rep_companies_old::where('company_id' , $company->id)->first();
                if($oldRepCompany){
                    //dd($oldRepCompany);
                    $company->update([
                        'representative_id' => $oldRepCompany->rep_id ,
                    ]);
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



/** Divide Table Companies To Two Tables */
Route::get('update/database/companies/to',function (){
    $oldData = \App\Models\marking_companies_old::all();

    try{
        \Illuminate\Support\Facades\DB::beginTransaction();
        foreach ($oldData as $value)
        {
            if (!$value->deleted_at){
                if ($value->representative_id){
                    //dd($value->representative_id);
                    $company_user = \App\Models\CompanyUser::create([
                        'company_id' => $value->id ,
                        'user_id' => $value->representative_id ,
                        'mother_company_id' => null ,
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

            }

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
            $Company_need = \App\Models\CompanyNeed::create([
                'id' => $value->id , // add id in fillable
                'employment_type_id' => $value->Manpower ,
                'required_position' => $value->RequiredPosition ,
                'job_description' => $value->JobDescription ,
                'candidates_number' => $value->candidates ,
                'country_id' => $value->nationality ,
                'gender' => $value->gender ,
                'minimum_age' => $value->AgeLimit ,
                'total_salary' => $value->TotalSalary ,
                'special_note' => $value->SpecialRemarks ,
                'contract_duration' => $value->Contract_Duration ,
                'experience_range' => $value->Experience_Range ,
                'work_location' => $value->Work_Location ,
                'work_hours' => $value->Working_Hours ,
                'deadline' => $value->Deadline ,
                'educational_qualification' => $value->EducationalQualification ,
                'data_flow' => $value->DataFlow ,
                'prometric' => $value->Pro_metric ,
                'classification' => $value->Classification ,
                'total_experience' => $value->InternationalExperience ,
                'area_of_experience' => $value->AreaOfExpertise ,
                'other_skills' => $value->OtherSkills ,
                'company_id' => $value->company_id ,
                'user_id' => $value->user ,
                'created_at' => $value->created_at ,
                'updated_at' => $value->updated_at ,

            ]);
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


