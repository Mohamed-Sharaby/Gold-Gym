<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasFactory,HasImage,InteractsWithMedia,LogsActivity;
    protected $fillable = [ 'ar_name','en_name', 'ar_description', 'en_description','ar_terms' , 'en_terms',
        'image','price','is_active','videos','is_offer','discount','start_date','end_date','price_after_discount'];

    public $modelName = 'Services';

    protected $dates = ['start_date','end_date'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_name'] : $this->attributes['en_name'];
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_description'] : $this->attributes['en_description'];
    }

    public function getTermsAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_terms'] : $this->attributes['en_terms'];
    }

    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
    }

    public function scopeExpired($q)
    {
        return $q->whereDate('end_date', '>=', now()->toDateString())->where('is_offer', 1);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function offerServices()
    {
        return $this->belongsToMany(Service::class,OfferService::class,'offer_id');
    }
    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->image) {
                $image = str_replace(url('/') . '/storage/', '', $model->image);
                deleteImage('uploads', $image);
            }

            if ($model->getMedia('photos')) {
                $model->clearMediaCollection('photos');
            }

            if ($model->appointments) {
                foreach ($model->appointments as $appointment) {
                    $appointment->delete();
                }
            }

        });
    }

    public function offerImages()
    {
        $photos=collect();
        foreach ($this->offerServices as $service){
            $photos=$photos->merge($service->getMedia('photos'));
        }
        return $photos;
    }

    public function scopeSearch(Builder $builder)
    {
        $builder->when(request('name'),function ($q){
            $q->where(function ($q){
                $q->where('ar_name','like','%'.request('name').'%')->orWhere('en_name','like','%'.request('name').'%');
            });
        });
    }

}
