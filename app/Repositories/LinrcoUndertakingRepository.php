<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\LinrcoUndertakingRepositoryInterface;
use App\Models\LinrcoUndertaking;
use App\Traits\logTrait;
use App\Traits\UploadTrait;
use function GuzzleHttp\Promise\all;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class LinrcoUndertakingRepository implements LinrcoUndertakingRepositoryInterface
{
    use LogTrait;
    use UploadTrait;

    protected $linrco_undertakings_model;

    public function __construct(LinrcoUndertaking $linrcoUndertaking)
    {  
        $this->linrco_undertakings_model = $linrcoUndertaking;
    }


    /** View All LinrcoUndertakings */
    public function index($company_id , $mother_company_id){
        return $this->linrco_undertakings_model::where('company_id' , $company_id)->paginate(20);
    }


    /** Store LinrcoUndertaking */
    public function store($request)
    {
        $linrco_undertakings_model = $this->linrco_undertakings_model::create([
            'date' => $request->date,
            'linrco_representative' => $request->linrco_representative,
            'linrco_cr' => $request->linrco_cr,
            'linrco_mail_box' => $request->linrco_mail_box,
            'company_representative' => $request->company_representative,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'company_cr' => $request->company_cr,
            'company_id' => $request->company_id,
            'user_id' => Auth::user()->id,
        ]);

        
        $this->addLog(auth()->id() , $linrco_undertakings_model->id , 'LinrcoUndertaking' , 'تم اضافة تفويض  لشركة ليناركو ' , 'New Linrco Undertaking has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('CompanyUndertaking.index' , [$request->company_id , $request->mother_company_id]));
    }


    /** Submit Edit LinrcoUndertaking */
    public function update($request , $linrco_undertaking){

        $linrco_undertaking->update([
            'date' => $request->date,
            'linrco_representative' => $request->linrco_representative,
            'linrco_cr' => $request->linrco_cr,
            'linrco_mail_box' => $request->linrco_mail_box,
            'company_representative' => $request->company_representative,
            'postal_code' => $request->postal_code,
            'email' => $request->email,
            'company_cr' => $request->company_cr,
            'company_id' => $linrco_undertaking->company_id,
            'user_id' => Auth::user()->id,
        ]);

        $this->addLog(auth()->id() , $linrco_undertaking->id , 'LinrcoUndertaking' , 'تم تعديل  تفويض لشركة ليناركو ' , 'Linrco Undertaking has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('CompanyUndertaking.index' , [$linrco_undertaking->company_id , $request->mother_company_id]));
    }


    /** Delete LinrcoUndertaking */
    public function destroy($linrco_undertaking , $mother_company_id){

        $linrco_undertaking->delete();

        $this->addLog(auth()->id() , $linrco_undertaking->id , 'LinrcoUndertaking' , 'تم حذف تفويض لشركة ليناركو ' , 'Linrco Undertaking has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('CompanyUndertaking.index' , [$linrco_undertaking->company_id , $mother_company_id]));
    }

}