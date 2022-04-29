<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointepaySubscription extends Model
{
    use HasFactory;
    protected $table = 'pointepay_subscription';
    public $timestamps = false;

    protected $fillable = [
        'subscriptionPlanId',
        'firstName',
        'lastName',
        'email',
        'phone',
        'totalAmount',
        'subscriptionPriceId',
        'status',
        'active',
        'isDelete',
        'createBy',
        'createDt',
        'lastModifiedBy',
        'lastModifiedDt',
    ];
}
