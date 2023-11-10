<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
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
        // $data = $request->input();
        
        echo "Email: " .$email . " , Password:" . $password;
        // Retrieve the user from the database based on the email
        $user = User::where('email', $email)->first();
        if($user) {
            // Check if the user exists and the password is correct
            if (Hash::check($password, $user->password)) {
                // Password is correct, proceed with login
                $request->session()->put('email', $email);
                $request->session()->put('password', $password);
                  return redirect('/');
            }
            else {
                // Invalid credentials
                return redirect()->back()->withErrors(['email' => 'Invalid login credentials']);
            }
        }
        else {
            // Invalid credentials
            return redirect()->back()->withErrors(['email' => 'Sorry, there is no such account that exists.']);
        }
    }


    public function logout() {
        session()->forget(['email', 'password', 'locations', 'checkin', 'checkout', 'guests', 'rooms']);
        // $request->session()->flush();
        return redirect('login');
    }
}
