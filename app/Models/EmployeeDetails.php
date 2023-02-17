<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class EmployeeDetails extends SingletonModel
{
    use HasFactory;
    // protected $fillable = [
    //     'photo'
    // ];
    protected $guarded = [];  
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
