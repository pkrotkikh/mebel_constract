<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Color extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'color_kitchen';
    protected $fillable = ['title', 'type', 'kitchen_model_id','image'];

    const COLOR_TYPE = ['body_color' => 'Цвет корпуса','kitchen_facade' => 'Цвет фасада'];

    public function kitchenModel()
    {
        return $this->belongsTo(Kitchen_model::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 600, 450);
        });
    }

    public function getImageFullnameAttribute(){
        return url('/img/color/'.$this->image);
    }

    public function getImageFullpathAttribute(){
        return public_path('/img/color/').$this->image;
    }
}
