<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RegisterWithGoogleController;
use App\Http\Controllers\EmployeeAttendanceController;
use App\Http\Controllers\EmployeeContactsController;
use App\Http\Controllers\EmployeeDetailsController;


// Route::get('/', function () {
//     return view('admin.index');
// });
// Route::get('/admin.index', function () {
//     return view('admin.index');
// });


Route::group(['middleware' => ['authCheck']],function(){
    Route::get('/admin/index', [EmployeeController::class,"dashboard"]);
    Route::view("/admin/profile","admin.profile");
    Route::get("/admin/emergency-contact",[EmployeeContactsController::class,"showContactInfo"]);
    Route::get("/admin/employee/details/{id}",[EmployeeDetailsController::class,"employeeDetails"]);
    
    Route::view("/admin/add-employee","admin.addEmployees"); 
    Route::post("/admin/add-employee",[EmployeeController::class,"store"]); 
    
    Route::get("/admin/attendance-list",[EmployeeAttendanceController::class,"showAttendanceList"]);
    Route::get("/admin/employee-list",[EmployeeController::class,"show"]); 
    Route::get("/admin/emp-list/active/{id}",[EmployeeController::class,"active"]); 
    Route::get("/admin/emp-list/remove/{id}",[EmployeeController::class,"delete"]); 
    Route::get("/admin/report",[EmployeeAttendanceController::class,"adminReport"]);
    Route::get('/admin/pdf', [EmployeeAttendanceController::class, 'createAdminPDF']);




    // Employee Section
    Route::get('/employee/index',[EmployeeAttendanceController::class,"show"]);
    Route::get("/employee/attendance-list",[EmployeeAttendanceController::class,"attendanceList"]);
    Route::get("/employee/profile",[EmployeeController::class,"employeeProfile"]);
    Route::post("/employee/update-profile",[EmployeeController::class,"update"]);

    Route::post("/employee/in/time",[EmployeeAttendanceController::class,"inTime"]);
    Route::post("/employee/leave/time",[EmployeeAttendanceController::class,"leaveTime"]);
    Route::get("/employee/report",[EmployeeAttendanceController::class,"report"]);
    Route::get('/employee/pdf', [EmployeeAttendanceController::class, 'createPDF']);
});


Route::view("/","login");
Route::view("login","login");
Route::post("login",[LoginController::class,"check"]);
Route::get("logout",[LoginController::class,"logout"]);

Route::view("register","register");
Route::post("register",[RegisterController::class,"store"]);

Route::get("/authorized-google",[RegisterWithGoogleController::class,"auth"]);
Route::get('/authorized/google/callback', [RegisterWithGoogleController::class, 'callbackFromGoogle']);
