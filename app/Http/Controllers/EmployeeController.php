<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    function dashboard(Request $req){
        $employee = Employee::getInstance()->where("role","employee")->get();
        return view('admin.index',compact('employee'));
    }
    function store(Request $req){

        //return $req->input();
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
        $address = $req->address;
        $employee->save();

        $employee->empDetails()->create([
            "address" => $address,
            "photo"=> "https://www.pngitem.com/pimgs/m/22-224000_profile-pic-dummy-png-transparent-png.png",
            "employee_id"=> $employee->id
        ]);
        $employee->empContacts()->create([
            "employee_id"=> $employee->id
        ]);
        
        $req->session()->put("user",$req->email);
        return redirect()->back()->with([
            'Success Message' => '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <ul>
                    <li>New Row Created Successfully.</li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
        ]);
    }

    function show(Request $req){
        $employee = Employee::getInstance()->with('empDetails')->get();
       
        return view("admin.employeeList",compact('employee'));
    }

    function active($id){
        $status = Employee::getInstance()->where('id',$id)->update([
            "status" => 1
        ]);

        if($status){
            return redirect()->back()->with([
                'Message' => '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Activated Successfully.</li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                '
            ]);
        }

        return redirect()->back()->with([
            'Message' => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                    <li>OOPS! Something went wrong.</li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
        ]);
    }

    function delete($id){
        $status = Employee::getInstance()->where('id',$id)->delete();

        if($status){
            return redirect()->back()->with([
                'Message' => '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Record Deleted Successfully.</li>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                '
            ]);
        }

        return redirect()->back()->with([
            'Message' => '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                    <li>OOPS! Something went wrong.</li>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
        ]);
    }

    function employeeProfile(Request $req){
        $employee =  Employee::getInstance()->where('email',session('user'))->with(['empDetails','empContacts'])->get();
        return view("employee.profile",compact("employee")); 
    }

    function update(Request $req){

        $rules = [
            'address' => 'required',
            'cname'    => 'required',
            'cemail'    => 'required|email',
            'phone' => 'required|regex:/(01)[0-9]{9}/'
            
        ];
    
        $validator = Validator::make($req->input(), $rules);
    
        if ( $validator->fails() ) {
            return \Redirect::back()->withErrors($validator);
        }
        

        $data = Employee::getInstance()->with(['empDetails','empContacts'])->find($req->emp_id);
        $data->empDetails->update([
            'address' => $req->address,
        ]);
        $data->empContacts->update([
            'contact_name' => $req->cname,
            'contact_email' => $req->cemail,
            'contact_number' => $req->phone
        ]);
        return redirect()->back()->with([
            'Message' => '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Record Updated Successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            '
        ]);
    }
}
