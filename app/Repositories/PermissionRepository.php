<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\PermissionRepositoryInterface;
use App\Traits\logTrait;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationData;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionRepository implements PermissionRepositoryInterface
{
    use LogTrait;

    protected $permission_model;


    public function __construct(Permission $permission)
    {
        $this->permission_model = $permission;

    }

    /** View All Roles */
    public function index(){
        return $this->permission_model->paginate(20);
    }

    /** Store Role */
    public function store($request)
    {
        $permission = $this->permission_model::create([
            'name_ar' => $request->name_ar,
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم اضافة صلاحية جديد' , 'New Permission has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('permissions.index'));

    }


    /** Submit Edit Role */
    public function update($request , $permission){
        $permission->update([
            'name_ar' => $request->name_ar,
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم تعديل صلاحية ' , 'Permission has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('permissions.index'));

    }

    /** Delete Role */
    public function destroy($permission){
        $permission->delete();
        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم حذف صلاحية' , 'Permission has been deleted');

        Alert::success('success', trans('dashboard.deleted successfully'));
        return redirect(route('permissions.index'));
    }

}