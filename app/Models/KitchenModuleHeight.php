<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenModuleHeight extends Model
{
    protected $table = 'kitchen_module_heights';
    protected $fillable = ['module_id','longitude'];


    public function module(){
        return $this->belongsTo('App\Models\KitchenModule');
    }
}
