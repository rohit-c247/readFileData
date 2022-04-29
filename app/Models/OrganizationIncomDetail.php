<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationIncomDetail extends Model
{
    use HasFactory;
    protected $table = 'organization_incom_detail';
    public $timestamps = false;

    protected $fillable = [
        'organizationId',
        'employeeId',
        'retailerName',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifyBy',
        'lastModifyDt',

    ];
}
