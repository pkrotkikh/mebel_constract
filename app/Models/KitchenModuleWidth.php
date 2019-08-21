<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenModuleWidth extends Model
{
    protected $table = 'kitchen_module_widths';
    protected $fillable = ['module_id','longitude'];


    public function module(){
        return $this->belongsTo('App\Models\KitchenModule');
    }
}
