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

/*
Route::view("charts-apexcharts","admin.charts-apexcharts");
Route::view("charts-chartjs","admin.charts-chartjs");
Route::view("charts-echarts","admin.charts-echarts");
Route::view("components-accordion","admin.components-accordion");
Route::view("components-alerts","admin.components-alerts");
Route::view("components-badges","admin.components-badges");
Route::view("components-breadcrumbs","admin.components-breadcrumbs");
Route::view("components-buttons","admin.components-buttons");
Route::view("components-cards","admin.components-cards");
Route::view("components-carousel","admin.components-carousel");

Route::view("components-modal","admin.components-modal");
Route::view("components-pagination","admin.components-pagination");
Route::view("components-progress","admin.components-progress");
Route::view("components-spinners","admin.components-spinners");
Route::view("components-tabs","admin.components-tabs");
Route::view("components-tooltips","admin.components-tooltips");
Route::view("forms-editors","admin.forms-editors");
Route::view("forms-elements","admin.forms-elements");
Route::view("forms-layouts","admin.forms-layouts");

Route::view("icons-bootstrap","admin.icons-bootstrap");
Route::view("icons-boxicons","admin.icons-boxicons");
Route::view("icons-remix","admin.icons-remix");
Route::view("index","admin.index");
Route::view("pages-blank","admin.pages-blank");
Route::view("pages-contact","admin.pages-contact");
Route::view("pages-error-404","admin.pages-error-404");
Route::view("pages-faq","admin.pages-faq");



Route::view("users-profile","admin.users-profile");
*/

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