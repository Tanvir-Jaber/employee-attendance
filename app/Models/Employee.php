<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EmployeeDetails;
use App\Models\EmployeeContacts;
use App\Models\EmployeeAttendance;

class Employee extends SingletonModel
{
    use HasFactory;
    protected $fillable = ['fullname', 'email'];   
    
    public function empDetails()
    {
        return $this->hasOne(EmployeeDetails::class,"employee_id","id");
    }

    public function empContacts()
    {
        return $this->hasOne(EmployeeContacts::class,"employee_id","id");
    }

    public function empAttendance()
    {
        return $this->hasMany(EmployeeAttendance::class);
    }
}
