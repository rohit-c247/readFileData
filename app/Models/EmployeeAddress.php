<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;

    protected $table = 'employee_address';
    public $timestamps = false;

    protected $fillable = [
        'employeeId',
        'addressId',
        'addressTypeId',
        'active',
        'createDt',
        'lastModifiedDt',
        'lastModifiedBy',
    ];
}
