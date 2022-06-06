<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Contact extends Model
{
    use HasFactory,LogsActivity;
    public $modelName = 'Contacts';

    protected $fillable = ['name','email','phone','message'];
}
