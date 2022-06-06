<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Coupon extends Model
{
    use HasFactory,LogsActivity;
    public $modelName = 'Coupons';

    protected $fillable = ['name', 'code','value', 'expire_at', 'is_active'];

    protected $dates = ['expire_at' ];


    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }

    public function scopeValid($query)
    {
        return $query->whereDate('expire_at','>',Carbon::today());
    }

}
