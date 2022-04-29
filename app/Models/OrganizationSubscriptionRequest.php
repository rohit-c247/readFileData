<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSubscriptionRequest extends Model
{
    use HasFactory;
    protected $table = 'organization_subscription_request';
    public $timestamps = false;

    protected $fillable = [
        'organizationSubscriptionId',
        'requestStatus',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
    ];
}
