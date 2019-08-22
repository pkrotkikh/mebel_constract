<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenModuleType extends Model
{
    protected $table = 'kitchen_module_types';
    protected $fillable = ['title','module_category_id','kitchen_model_id','favicon','image'];

    public function modules(){
        return $this->hasMany('App\Models\KitchenModule', 'module_type_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\KitchenModuleCategory');
    }

    public function getImageNameAttribute(){
        return '/img/module_type/'.$this->image;
    }

    public function getImageFullnameAttribute(){
        return url('/img/module_type/'.$this->image);
    }

    public function getImageFullpathAttribute(){
        return public_path('/img/module_type/').$this->image;
    }
}
