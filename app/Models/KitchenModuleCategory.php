<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenModuleCategory extends Model
{
    protected $table = 'kitchen_module_categories';
    protected $fillable = ['title'];

    public function types(){
        return $this->hasMany('App\Models\KitchenModuleType');
    }
}
