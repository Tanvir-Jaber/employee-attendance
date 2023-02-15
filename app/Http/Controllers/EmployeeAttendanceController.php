<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeAttendance;
use App\Models\Employee;
use PDF;

class EmployeeAttendanceController extends Controller
{
    function attendanceList(Request $req){
        $data = Employee::where('email',session('user'))->get(); 
        $list = EmployeeAttendance::where('employee_id',$data[0]->id)->orderBy("id","Desc")->get();
        
        // return  $list;
        
        return view("employee.employeeAttendanceList",compact('list'));
    }

    function inTime(Request $req){
        date_default_timezone_set('Asia/Dhaka');  
        
        $data = Employee::where('email',session('user'))->get(); 
        $attendance = new EmployeeAttendance;
        $attendance->enter_date = now();
        $attendance->enter_time = now();
        $attendance->employee_id = $data[0]->id;
        $attendance->save();
        return \redirect()->back();
    }
    function leaveTime(Request $req){
        date_default_timezone_set("Asia/Dhaka");
        $attendance = EmployeeAttendance::find($req->id);
        $attendance->leave_time = now(); 
        $attendance->status = 1; 
        $attendance->save();
       
        return redirect()->back();
    }

    function show(Request $req){

        $data = Employee::where('email',session('user'))->get(); 
        $list = EmployeeAttendance::where('enter_date', date("Y-m-d"))->where('employee_id',$data[0]->id)->get();

        $list['chart'] = EmployeeAttendance::where("employee_id",$data[0]->id )->selectRaw('
                    COUNT(MONTH(enter_date)) as total,
                    MONTHNAME(enter_date) as month,
                    YEAR(enter_date) as year
                ')->groupBy(\DB::raw('MONTH(enter_date)'))->orderBy('enter_date',"asc")->get();
        // return $datos;
      
        return view("employee.index",compact("list"));
    }

    function adminReport(Request $req){
       
        $report = EmployeeAttendance::with('employee')->selectRaw('
        COUNT(*) as working,
        MONTHNAME(enter_date) as month,
        YEAR(enter_date) as year,employee_id
    ')->groupBy(\DB::raw('employee_id,MONTH(enter_date),YEAR(enter_date)'))->orderBy("id","Desc")->get();
        // return $report;
        return view("admin.reports",compact("report"));
    }

    function report(Request $req){
        $data = Employee::where('email',session('user'))->get(); 
        $report = EmployeeAttendance::where("employee_id",$data[0]->id )->selectRaw('
        COUNT(MONTHNAME(enter_date)) as total,
        MONTHNAME(enter_date) as month,
        YEAR(enter_date) as year
    ')->groupBy(\DB::raw('MONTH(enter_date)'))->orderBy("id","Desc")->get();
        // return $report;
        return view("employee.reports",compact("report"));
    }

    function createAdminPDF(){
        $report = EmployeeAttendance::with('employee')->selectRaw('
        COUNT(*) as working,
        MONTHNAME(enter_date) as month,
        YEAR(enter_date) as year,employee_id
    ')->groupBy(\DB::raw('employee_id,MONTH(enter_date),YEAR(enter_date)'))->orderBy("id","Desc")->get();
        
        $pdf = PDF::loadView("pdf.adminreport",["report"=>$report])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('attendance report.pdf');
    }
    function createPDF(){
        $data = Employee::where('email',session('user'))->get(); 
        $report = EmployeeAttendance::where("employee_id",$data[0]->id )->selectRaw('
        COUNT(MONTHNAME(enter_date)) as total,
        MONTHNAME(enter_date) as month,
        YEAR(enter_date) as year
    ')->groupBy(\DB::raw('MONTH(enter_date)'))->orderBy("id","Desc")->get();
        
        $pdf = PDF::loadView("pdf.empreport",["report"=>$report,"fullname"=>$data[0]->fullname])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download($data[0]->fullname.'.pdf');
    }
    function showAttendanceList(Request $req){
        $list = EmployeeAttendance::with("employee")->orderBy('id',"desc")->get();
        // return $datos;
      
        return view("admin.employeeAttendanceList",compact("list"));
    }

}
