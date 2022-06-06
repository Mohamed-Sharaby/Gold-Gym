<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Setting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory,LogsActivity;
    protected $fillable = ['name','type','ar_value','en_value','page','slug','ar_title','en_title'];
    public $modelName = 'Settings';
    /**
     * @return mixed
     */
    public function getValueAttribute(){
        if(app()->getLocale() == 'ar')
            return $this->ar_value;
        return $this->en_value;
    }

    /**
     * @return mixed
     */
    public function getTitleAttribute(){
        if(app()->getLocale() == 'ar')
            return $this->ar_title;
        return $this->en_title;
    }
}
