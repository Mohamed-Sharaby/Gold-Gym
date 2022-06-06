<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory,HasImage;
    protected $fillable = ['name','image'];

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
