<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        $user = Auth::user();

        if($user->role === 'admin'){
            $users = User::simplePaginate(5);
            return view('dashboard',compact('user','users'));
        }else{
            return view('user-dashboard',compact('user'));
        }
    }

    public function showRegistratinoForm(){

        return view('auth.register');
    }

    public function register(Request $request){
        // dd($request->all());
        $validate = $request->validate([
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|unique:users',
            'password'=> 'required|min:5',
            'role'=> 'required|in:user,admin',
        ]);

        $user = User::create($validate);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function showUserLoginForm(){
        return view('auth.user-login');
    }

    public function userLogin(Request $request){
        // dd($request->all());
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        if(Auth::attempt([
            'email'=> $request->email,
            'password'=> $request->password,
            'role'=> 'user'
        ])){
            $user = Auth::user();
            return view('user-dashboard', compact('user'));
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function showAdminLoginForm(){
        return view('auth.admin-login');
    }

    public function adminLogin(Request $request){
        $validateReq = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
            'role'=> 'admin'
        ])){
            $user = Auth::user();
            $users = User::simplePaginate(5);
            return view('dashboard', compact('user', 'users'));
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function makeAdmin($id){
        $user = User::findOrFail($id);

        if($user->id === Auth::user()->id){
            return redirect()->route('dashboard')->with('error','can not modify your own role');
        }

        $user->update(['role' => 'admin']);

        return redirect()->route('dashboard')->with('success','user updarted successfully');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('register');

    }
}
