<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
class EmployeeDetailsController extends Controller
{
    function employeeDetails($id){
        $employee = Employee::getInstance()->where('id',$id)->with(['empDetails','empContacts'])->get();
        return view("admin.details",compact('employee'));
    }
}
