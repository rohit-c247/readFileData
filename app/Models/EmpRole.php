<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpRole extends Model
{
    use HasFactory;
    protected $table = 'emp_role';
    public $timestamps = false;

    protected $fillable = [
        'organizationId',
        'employeeId',
        'roleId',
        'active',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
    ];
}
