<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
    public $timestamps = false;

    protected $fillable = [
        'organizationId',
        'userName',
        'email',
        'password',
        'firstName',
        'lastName',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
        'is_single_store',
        'businessPhoneCode',
        'businessPhone',
        'employeePin',
        'passwordStatus',
    ];
}
