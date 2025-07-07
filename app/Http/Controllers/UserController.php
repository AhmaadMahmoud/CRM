<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('crm.users.index', [
            'users' => User::with('roles')->get(),
        ]);
    }
    public function create(){
        $roles = Role::all();
        return view('crm.users.create',['roles'=>$roles]);
    }
public function show(){

}
    public function store(UserStoreRequest $request){
        $users = $request->validated();
        $user = User::create($users);
        $role = Role::find($request->role);
        if($role){
            $user->assignRole($role->name);
        }
        return to_route('crm.users.index')->with('success','User Added Successfully!');
    }

    public function edit(User $user){
        $roles = Role::all();
        return view('crm.users.edit',compact('user','roles'));
    }
    public function update(User $user, Request $request){
        $user->update($request->all());
        if ($request->role) {
            $role = Role::find($request->role);
            if ($role) {
                $user->syncRoles([$role->name]);
            }
        }
        return to_route('crm.users.index')->with('success', 'User Updated Successfully!');
    }
    public function destroy(User $user){
        $user->delete();
        return to_route('crm.users.index')->with('success', 'User Deleted Successfully!');
    }

}
