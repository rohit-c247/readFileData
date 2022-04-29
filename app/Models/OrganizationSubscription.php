<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationSubscription extends Model
{
    use HasFactory;
    protected $table = 'organization_subscription';
    public $timestamps = false;

    protected $fillable = [
        'organizationId',
        'pointepaySubscriptionId',
        'subscriptionPriceId',
        'subscriptionDt',
        'subscriptionEndDt',
        'sit',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
    ];
}
