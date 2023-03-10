<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class EmployeeAttendance extends SingletonModel
{
    use HasFactory;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
