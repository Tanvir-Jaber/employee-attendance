<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;


class RegisterController extends Controller
{
    function store(Request $req){


        $is_employee = Employee::getInstance()->where('email', $req->email)->first();
        $rules = [
            'name' => 'required',
            'email'    => 'required|email',
            'password' => [
                'required',
                'string',
                'min:7',             // must be at least 7 characters in length
                // 'regex:/[a-z]/',      // must contain at least one lowercase letter
                // 'regex:/[A-Z]/',      // must contain at least one uppercase letter
                // 'regex:/[0-9]/',      // must contain at least one digit
                // 'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    
        $validator = Validator::make($req->input(), $rules);
    
        if ( $validator->fails() ) {
            return \Redirect::back()->withErrors($validator);
        }
        if ($is_employee){
            return \Redirect::back()->withErrors(["errors" => "Email is already in use."]);
        }
       
        $employee = Employee::getInstance();
        $employee->fullname = $req->name;
        $employee->email = $req->email;
        $employee->password = \Hash::make($req->password);
        $employee->save();

        $employee->empDetails()->create([
            "photo"=> "https://www.pngitem.com/pimgs/m/22-224000_profile-pic-dummy-png-transparent-png.png",
            "employee_id"=> $employee->id
        ]);

        $employee->empContacts()->create([
            "employee_id"=> $employee->id
        ]);
        
        $req->session()->put("user",$req->email);
        return redirect("/login");
    }
}
