<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function updateUser(Request $request){

        $user = Auth::user();

        $request->validate([
            'name'=>'nullable|string|max:255',
            'email'=>'nullable|email|unique:users,email,' .$user->id,
            'password'=> 'nullable|min:5'
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if($request->filled('password')){
            $user->password = bcrypt($request->password);
        }

        $user->save();

    return redirect()->back()->with('success', 'User updated successfully');
    }

    // admin side- delete user
    public function deleteUser($id){
        // dd($id);
        $user = User::find($id);

        if($user){
            $user->delete();
            return redirect()->back()->with('success','user deleted succesfully');
        }

          return redirect()->back()->with('error','Unable to delete user');

    }
}
