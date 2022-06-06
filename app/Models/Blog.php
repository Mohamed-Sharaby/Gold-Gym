<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use HasFactory,HasImage,InteractsWithMedia,LogsActivity;
    public $modelName = 'Blogs';

    protected $fillable = ['ar_title', 'en_title', 'ar_body', 'en_body', 'image', 'is_active','type'];

//    protected $casts = ['photos'=>'array'];

    public function getTitleAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_title'] : $this->attributes['en_title'];
    }

    public function getBodyAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_body'] : $this->attributes['en_body'];
    }

    public function scopeActive($query)
    {
        return $query->whereIsActive(1);
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
        });
    }
}
