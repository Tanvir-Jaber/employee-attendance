<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class LoginController extends Controller
{
    function check(Request $req){
        $is_employee = Employee::getInstance()->where('email', $req->email)->first();
        if($is_employee){
            $is_pass = \Hash::check($req->password,$is_employee->password);
            
            if ($is_employee && $is_pass){
                $session = ["user"=> $req->email,"role" => $is_employee->role, "user-status" => $is_employee->status, "user-name" => $is_employee->fullname];
                if($is_employee->role == "admin"){
                    $req->session()->put($session);
                    return redirect("admin/index");
                }else{
                    $req->session()->put($session);
                    return redirect("employee/index");
                }   
            }
        }
        
        return \Redirect::back()->withErrors(["errors" => "OOPS! Email and Password not matched."]);
    }
    function logout (Request $req){
        \Session::flush();
        return \redirect("login");
    }
}
