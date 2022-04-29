<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;
    protected $table = 'organization';
    public $timestamps = false;

    protected $fillable = [
        'organizationTypeId',
        'organizationName',
        'isShowIncomm',
        'isPointePay',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
        'parentOrganizationId',
        'merchantOrderId',
        'merchantId',
        'businessPhone',
        'businessPhoneCode',
        'freeTransxType',
        'dbaName',
        'terminalPrefix',
        'organizationLoginId',
    ];
}
