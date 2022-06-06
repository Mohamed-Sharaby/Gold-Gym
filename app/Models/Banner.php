<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use HasFactory, HasImage,LogsActivity;
    public $modelName = 'Banners';


    protected $fillable = ['ar_title', 'en_title', 'ar_body', 'en_body', 'image', 'is_active'];

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
        });
    }

}
