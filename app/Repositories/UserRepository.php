<?php
/**
 * Created by PhpStorm.
 * User: Rania
 * Date: 8/10/2020
 * Time: 3:58 PM
 */

namespace App\Repositories;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Sector;
use App\Traits\logTrait;
use App\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class UserRepository implements UserRepositoryInterface
{
    use LogTrait;

    protected $user_model;
    protected $role_model;
    protected $sector_model;


    public function __construct(User $user , Role $role , Sector $sector)
    {
        $this->user_model = $user;
        $this->role_model = $role;
        $this->sector_model = $sector;
    }

    /** View All Users */
    public function index(){
        return  $this->user_model->paginate(20);
    }

    /** Create User */
    public function create()
    {
        $data = array();

        $data['sectors'] = $this->sector_model::all();
        $data['managers'] = $this->user_model::where('parent_id' , null)->get();
        $data['roles'] = $this->role_model::all();

        return $data;
    }

    /** Store User */
    public function store($request)
    {
        if ($request->role == 'Sales Representative'){
            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
                'parent_id' => $request->parent_id,
            ]);
        }
        elseif($request->role == 'Sales Manager'){
            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
            ]);
            $user->sectors()->sync($request->sector_ids);
//            foreach ($request->sector_ids as $sector_id) {
//                $sector = $this->sector_model::findOrFail($sector_id);
//                $user->sectors()->attach($sector);
//            }
        }
        else{
            $user = $this->user_model::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
            ]);
        }
        $user->assignRole($request->role);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم اضافة مستخدم جديد' , 'New User has been added');

        Alert::success('success', trans('dashboard. added successfully'));
        return redirect(route('users.index'));

    }

    /** Edit User */
    public function edit()
    {
        $data = array();

        $data['sectors'] = $this->sector_model::all();
        $data['managers'] = $this->user_model::where('parent_id' , null)->get();
        $data['roles'] = $this->role_model::all();

        return $data;
    }


    /** Submit Edit User */
    public function update($request , $user){

        if ($user->hasRole('Sales Representative')){
            $user->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
                'parent_id' => $request->parent_id,
            ]);
        }

        elseif($user->hasRole('Sales Manager')){
            //dd($request->sector_ids);
            $user->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1,
            ]);
            $user->sectors()->sync($request->sector_ids);
        }

        else{
            $user->update([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1
            ]);
        }
        //$user->removeRole($user->roles->first()->name);
        //$user->assignRole($request->role);

        $this->addLog(auth()->id() , $user->id , 'users' , 'تم تعديل مستخدم ' , 'User has been updated');

        Alert::success('success', trans('dashboard. updated successfully'));
        return redirect(route('users.index'));

    }

    /** Delete User */
    public function destroy($user){
        $user->delete();
        $this->addLog(auth()->id() , $user->id , 'users' , 'تم حذف مستخدم' , 'User has been deleted');

        Alert::success('success', trans('dashboard. deleted successfully'));
        return redirect(route('users.index'));
    }

}
