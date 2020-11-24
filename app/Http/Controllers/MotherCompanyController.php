<?php

namespace App\Http\Controllers;

use App\Http\Requests\MotherCompanyRequest;
use App\Models\MotherCompany;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use RealRashid\SweetAlert\Facades\Alert;

class MotherCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   use logTrait;
    use UploadTrait;

    /** View All MotherCompanies */
    public function index()
    {
        $mother_companies = MotherCompany::paginate(20);

        return view('system.mother_companis.index')->with('mother_companies' , $mother_companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /** Create MotherCompany */
    public function create()
    {
        return view('system.mother_companis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /** Store MotherCompany */
    public function store(MotherCompanyRequest $request)
    {
        $logo = $this->verifyAndStoreFile($request, 'logo');
        $header = $this->verifyAndStoreFile($request, 'header');
        $footer = $this->verifyAndStoreFile($request, 'footer');

        //dd($logo);

        $mother_company = MotherCompany::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'logo' => $logo,
            'header' => $header,
            'footer' => $footer,
        ]);

        $this->addLog(auth()->id() , $mother_company->id , 'motherCompany' , 'تم اضافة شركة ام جديدة' , 'New Mother Company has been added');

        Alert::success('success', trans('dashboard. added successfully'));

        return redirect(route('motherCompany.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /** Show One MotherCompany */
    public function show(Company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Edit MotherCompany */
    public function edit(MotherCompany $motherCompany)
    {
        return view('system.mother_companis.edit')->with('motherCompany' , $motherCompany);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Submit Edit Mother Company */
    public function update(MotherCompanyRequest $request, MotherCompany $motherCompany)
    {
        if ($request->hasFile('logo')) {
            $logo = $this->verifyAndStoreFile($request, 'logo');
        } else {
            $logo = $motherCompany->logo;
        }

        if ($request->hasFile('header')) {
            $header = $this->verifyAndStoreFile($request, 'header');
        } else {
            $header = $motherCompany->header;
        }

        if ($request->hasFile('footer')) {
            $footer = $this->verifyAndStoreFile($request, 'footer');
        } else {
            $footer = $motherCompany->footer;
        }

        $motherCompany->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'logo' => $logo,
            'header' => $header,
            'footer' => $footer,
        ]);

        $this->addLog(auth()->id() , $motherCompany->id , 'motherCompany' , 'تم تعديل شركة ام ' , 'Mother Company has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));

        return redirect(route('motherCompany.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Delete MotherCompany */
    public function destroy(MotherCompany $motherCompany)
    {
        $motherCompany->delete();

        $this->addLog(auth()->id() , $motherCompany->id , 'MotherCompany' , 'تم حذف الشركة الام ' , 'Mother Company has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('motherCompany.index'));
    }



}
