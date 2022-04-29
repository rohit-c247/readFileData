<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgSubDate extends Model
{
    use HasFactory;
    protected $table = 'org_sub_date';
    public $timestamps = false;

    protected $fillable = [
        'organizationId',
        'organizationSubscriptionId',
        'subscriptionPlanId',
        'subscriptionPriceId',
        'subscriptionDt',
        'subscriptionEndDt',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',

    ];
}
