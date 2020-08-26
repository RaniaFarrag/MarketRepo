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
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RoleRepository implements RoleRepositoryInterface
{
    use LogTrait;

    protected $role_model;
    protected $permission_model;


    public function __construct(Role $role , Permission $permission)
    {
        $this->role_model = $role;
        $this->permission_model = $permission;

    }

    /** View All Roles */
    public function index(){
        return $this->role_model->paginate(20);
    }

    /** Create Role */
    public function create()
    {
        return $this->permission_model::all();
    }

    /** Store Role */
    public function store($request)
    {
        //dd($request->all());
        $role = $this->role_model::create([
            'name' =>$request->name,
            'name_ar' =>$request->name_ar,
            'guard_name' => 'web'
        ]);

        $role->syncPermissions($request->permissions);

        $this->addLog(auth()->id() , $role->id , 'roles' , 'تم اضافة دور جديد' , 'New Role has been added');

        return redirect(route('roles.index'))->with('success' , trans('dashboard.added successfully'));

    }

    /** Edit Role */
    public function edit()
    {
        return $this->permission_model::all();
    }


    /** Submit Edit Role */
    public function update($request , $role){

        $role->update([
            'name' =>$request->name,
            'name_ar' =>$request->name_ar,
            'guard_name' =>'web',
        ]);

        $role->syncPermissions($request->permissions);

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