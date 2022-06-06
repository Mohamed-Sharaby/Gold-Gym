<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Offer extends Model
{
    use HasFactory,LogsActivity;
    public $modelName = 'Offers';

    protected $fillable = ['discount', 'start_date', 'end_date', 'service_id', 'is_active','services'];

    protected $dates = ['start_date', 'end_date'];
    protected $casts = ['services' => 'array'];


    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }

    public function getServicesListAttribute()
    {
        return Service::whereIn('id',$this->services)->get();
    }


}
