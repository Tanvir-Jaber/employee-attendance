<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Employee;
class RegisterWithGoogleController extends Controller
{
    public function auth(Request $req){
        
        return Socialite::driver('google')->redirect();
    }
    public function callbackFromGoogle(Request $req)
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $is_employee = Employee::getInstance()->where('email', $user->email)->first();
            
            if($is_employee){
                $session = ["user"=> $user->email,"role" => $is_employee->role, "user-status" => $is_employee->status, "user-name" => $user->name];
               if($is_employee->role == "admin"){
                    // $session = ["user"=> $user->email,"role" => $is_employee->role];
                    $req->session()->put($session);
                    return redirect("/admin/index");
               }else{
                    // $session = ["user"=> $user->email,"role" => $is_employee->role];
                    $req->session()->put($session);
                    return redirect("/employee/index");
               } 
            }
            else{
                $employee = Employee::getInstance();
                $employee->fullname = $user->name;
                $employee->email = $user->email;
                $employee->save();
                $employee->empDetails()->create([
                    "photo"=>$user->avatar,
                    "employee_id"=>$employee->id
                ]);
                $employee->empContacts()->create([
                    "employee_id"=> $employee->id
                ]);

                // $session = ["user"=> $user->email,"role" => 'employee'];
                $session = ["user"=> $user->email,"role" => 'employee', "user-status" => 0, "user-name" => $user->name];
                $req->session()->put($session);
                return redirect("/employee/index");
            }
	        
            
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
