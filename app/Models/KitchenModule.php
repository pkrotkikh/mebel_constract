<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenModule extends Model
{
    protected $table = 'kitchen_modules';
    protected $fillable = ['title','comment','price','module_type_id','kitchen_id','module_category_id','image'];

    public function heights(){
        return $this->hasMany('App\Models\KitchenModuleHeight','module_id');
    }

    public function widths(){
        return $this->hasMany('App\Models\KitchenModuleWidth','module_id');
    }

    public function type(){
        return $this->belongsTo('App\Models\KitchenModuleType' ,'module_type_id');
    }

    public function kitchen(){
        return $this->belongsTo('App\Models\Kitchen_model','kitchen_id');
    }

    public function getImageNameAttribute(){
        return '/img/module/'.$this->image;
    }

    public function getImageFullnameAttribute(){
        return url('/img/module/'.$this->image);
    }

    public function getImageFullpathAttribute(){
        return public_path('/img/module/').$this->image;
    }
}
