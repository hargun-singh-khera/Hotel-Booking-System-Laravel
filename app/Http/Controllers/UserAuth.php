<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuth extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        validator($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ])->validate();

        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if($user) {
            if (Hash::check($password, $user->password)) {
                $request->session()->put('email', $email);
                $request->session()->put('password', $password);
                session()->put('filtered', 'false');
                return redirect('/');
            }
            else {
                return redirect()->back()->withErrors(['email' => 'Invalid login credentials']);
            }
        }
        else {
            // Invalid credentials
            return redirect()->back()->withErrors(['email' => 'Sorry, there is no such account that exists.']);
        }
    }


    public function logout() {
        session()->flush();
        return redirect('login');
    }

    public function admin() {
        return view('admin.login');
    }
}
