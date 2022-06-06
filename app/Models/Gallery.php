<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Gallery extends Model
{
    use HasFactory,HasImage,LogsActivity;
    public $modelName = 'Galleries';

    protected $fillable = ['type', 'ar_name','en_name', 'ar_description', 'en_description', 'image', 'video_link','is_active'];

    public function getNameAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_name'] : $this->attributes['en_name'];
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() == 'ar' ? $this->attributes['ar_description'] : $this->attributes['en_description'];
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
