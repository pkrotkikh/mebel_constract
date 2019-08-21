<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Kitchen_model extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'kitchen_model';

    protected $fillable = ['title', 'price', 'image'];

    public function colors()
    {
        return $this->hasMany(Color::class, 'kitchen_model_id');
    }

    /*public function additionComplete()
    {
        return $this->hasMany(Addition::class, 'kitchen_model_id');
    }*/

    public function additionTypes(){
        return $this->hasMany('App\Models\AdditionType','kitchen_model_id');
    }

    public function kitchenParams()
    {
        return $this->hasOne(KitchenParam::class, 'kitchen_model_id');
    }

    public function parametersModels()
    {
        return $this->hasMany(Parameter::class, 'kitchen_model_id');
    }

    public function modules(){
        return $this->hasMany('App\Models\KitchenModule','kitchen_id');
    }

    public function types(){
        return $this->hasMany('App\Models\KitchenModuleType','kitchen_model_id');
    }

    public function getImageFullnameAttribute(){
        return url('/img/kitchen/'.$this->image);
    }

    public function getImageFullpathAttribute(){
        return public_path('/img/kitchen/').$this->image;
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 600, 450);
        });
    }
}
