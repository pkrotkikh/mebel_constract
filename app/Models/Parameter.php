<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Parameter extends  Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'parameters_models';
    protected $fillable = ['title', 'type', 'kitchen_model_id', 'type_modules_id', 'id'];

    public function kitchenModel()
    {
        return $this->belongsTo(Kitchen_model::class);
    }
    public function typeModules()
    {
        return $this->belongsTo(TypeModules::class);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 600, 450);
        });
    }
}
