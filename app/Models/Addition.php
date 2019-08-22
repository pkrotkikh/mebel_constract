<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Addition extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'addition_complete';
    protected $fillable = ['title', 'addition_type_id','image'];

    const ADDITION_TYPE =[
        'tableTopColor'=>'Цвет столещницы',
        'baseColor'=>'Цвет цоколя МДФ',
        'eavesColor'=>'Цвет карниза кухни',
    ];

    /*
     public function kitchenModel()
    {
        return $this->belongsTo(Kitchen_model::class);
    }
    */

    public function additionType(){
        return $this->belongsTo(AdditionType::class, 'addition_type_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 600, 450);
        });
    }

    public function getImageNameAttribute(){
        return ($this->image) ? '/img/addition/'.$this->image : '';
    }

    public function getImageFullnameAttribute(){
        return url('/img/addition/'.$this->image);
    }

    public function getImageFullpathAttribute(){
        return public_path('/img/addition/').$this->image;
    }
}
