<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Traits\logTrait;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class UserRepository implements UserRepositoryInterface
{
    use LogTrait;

    protected $user_model;
    protected $role_model;


    public function __construct(User $user , Role $role)
    {
        $this->user_model = $user;
        $this->role_model = $role;

    }

    /** View All Users */
    public function index(){
        return  $this->user_model->paginate(20);
    }

    /** Create User */
    public function create()
    {
        return $this->role_model::all();
    }

    /** Store User */
    public function store($request)
    {
        $user = $this->user_model::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'active' => 1
        ]);

        //$user->syncPermissions($request->permissions);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم اضافة مستخدم جديد' , 'New User has been added');

        return redirect(route('users.index'))->with('success' , trans('dashboard.added successfully'));

    }

    /** Edit User */
    public function edit()
    {
        return $this->role_model::all();
    }


    /** Submit Edit User */
    public function update($request , $user){

        $user->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'active' => 1
        ]);

        //$user->syncPermissions($request->permissions);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم تعديل مستخدم ' , 'User has been updated');

        return redirect(route('users.index'))->with('success' , trans('dashboard.updated successfully'));

    }

    /** Delete User */
    public function destroy($user){
        $user->delete();
        $this->addLog(auth()->id() , $user->id , 'users' , 'تم حذف مستخدم' , 'User has been deleted');

        return redirect(route('users.index'))->with('success' , trans('dashboard.deleted successfully'));
    }

}