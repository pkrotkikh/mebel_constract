<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Item extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $table = 'items_models';
    protected $fillable = ['title', 'description', 'price', 'parameters_models_id', 'id'];

    public function parametersModels()
    {
        return $this->belongsTo(Parameter::class);
    }

    public function itempPrameters()
    {
        return $this->hasMany(ParamItem::class ,'items_models_id');
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection('posters')->registerMediaConversions(function (Media $media) {
            $this->addMediaConversion('thumb')->fit(Manipulations::FIT_CROP, 100, 100);
            $this->addMediaConversion('preview')->fit(Manipulations::FIT_CROP, 600, 450);
        });
    }
}
