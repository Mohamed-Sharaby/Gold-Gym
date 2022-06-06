<?php

namespace App\Models;

use App\Http\Traits\HasImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferService extends Model
{
    use HasFactory,HasImage;
    protected $fillable = ['offer_id', 'service_id'];


//    public function service()
//    {
//        return $this->belongsToMany(Service::class);
//    }
//
//
//    public function offer()
//    {
//        return $this->belongsToMany(Service::class)->where('is_offer','=','1');
//    }
}
