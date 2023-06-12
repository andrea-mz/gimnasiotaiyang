<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index() {

        $users=User::all();
        return view('auth.admin.users.index',compact("users"));

    }

    public function edit(User $user) {

        dd($user);
        $roles=Role::all();
        return view('auth.admin.users.edit', compact('user','roles'));

    }

    public function update(Request $request, User $user) {

        $user->roles()->sync($request->roles);
        return redirect()->route('auth.admin.users.edit',$user)->with("success", __("¡Role asignado con éxito!"));
    }

}
