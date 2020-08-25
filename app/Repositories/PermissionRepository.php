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
            'name' => $request->name_ar,
            'name_en' => $request->name_en,
            'guard_name' => 'web'
        ]);

        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم اضافة صلاحية جديد' , 'New Permission has been added');

        return redirect(route('permissions.index'))->with('success' , trans('dashboard.added successfully'));

    }


    /** Submit Edit Role */
    public function update($request , $permission){
        $permission->update([
            'name' => $request->name_ar,
            'name_en' => $request->name_en,
            'guard_name' => 'web'
        ]);

        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم تعديل صلاحية ' , 'Permission has been updated');

        return redirect(route('permissions.index'))->with('success' , trans('dashboard.updated successfully'));

    }

    /** Delete Role */
    public function destroy($permission){
        $permission->delete();
        $this->addLog(auth()->id() , $permission->id , 'permissions' , 'تم حذف صلاحية' , 'Permission has been deleted');

        return redirect(route('permissions.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}