<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Appointment extends Model
{
    use HasFactory,LogsActivity;
    public $modelName = 'Appointments';

    protected $fillable = ['day', 'from', 'to', 'day_status', 'service_id'];

    protected $dates = ['day','from','to'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }

    protected static function booted()
    {
        static::addGlobalScope('expire', function (Builder $builder) {
            $builder->whereDate('day', '>=', Carbon::today());
        });
    }
}
