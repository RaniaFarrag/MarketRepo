<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\RoleRepositoryInterface;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use Spatie\Permission\Models\Role;


class RoleRepository implements RoleRepositoryInterface
{
    use LogTrait;

    protected $role_model;


    public function __construct(Role $role)
    {
        $this->role_model = $role;

    }

    /** View All Roles */
    public function index(){
        return view('system.roles.index')->with('roles' , $this->role_model->paginate(20));
    }

    /** View Add Role Form */
    public function create(){
        return view('system.roles.create');
    }

    /** Store Role */
    public function store($request)
    {
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
        ])->validate();

        $role = $this->role_model::create([
            'name' => $request->name_ar,
            'name_en' => $request->name_en,
            'guard_name' => 'web'
        ]);

        $this->addLog(auth()->id() , $role->id , 'roles' , 'تم اضافة دور جديد' , 'New Role has been added');

        return redirect(route('roles.index'))->with('success' , trans('dashboard.added successfully'));

    }

    /** View Edit Role Form */
    public function edit($role){
        return view('system.roles.edit')->with('role' , $role);
    }

    /** Submit Edit Role */
    public function update($request , $role){
        $validator = Validator::make($request->all() , [
            'name_ar' => 'required',
            'name_en' => 'required',
        ])->validate();

        $role->update([
            'name' =>$request->name_ar,
            'name_en' =>$request->name_en,
            'guard_name' =>'web',
        ]);

        $this->addLog(auth()->id() , $role->id , 'roles' , 'تم تعديل دور ' , 'Role has been updated');

        return redirect(route('roles.index'))->with('success' , trans('dashboard.updated successfully'));


    }

    /** Delete Role */
    public function destroy($role){
        $role->delete();
        $this->addLog(auth()->id() , $role->id , 'roles' , 'تم حذف الدور' , 'Role has been deleted');

        return redirect(route('roles.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}