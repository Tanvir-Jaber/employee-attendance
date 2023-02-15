<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeContactsController extends Controller
{
    function showContactInfo(Request $req){
        $employee =  Employee::where('status',1)->where('role','employee')->with(['empDetails','empContacts'])->get();
        // return $employee; 
        return view("admin.emergencyContact",compact("employee"));
    }
}
