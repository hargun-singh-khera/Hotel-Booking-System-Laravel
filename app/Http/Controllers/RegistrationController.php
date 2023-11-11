<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Hash;


class RegistrationController extends Controller
{
    public function index() {
        return view('signup');
    }

    public function register(Request $request) {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'password' => 'required',
                'password_confirmation' => 'required'
            ]
        );

        $customer = new User;
        $customer->name = $request['name'];
        $customer->email = $request['email'];
        $customer->password = bcrypt($request['password']);
        // echo "Password: " . $customer->password;
        $customer->save();
        return redirect('login');
    }

    
}
