<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory,LogsActivity;
    public $modelName = 'Orders';

    protected $fillable = ['user_id', 'service_id', 'no_of_persons', 'price', 'status', 'payment_method', 'finished_at','coupon_id','appointment_id','discount','tax'];

    protected $casts = ['finished_at'=>'date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }


}
