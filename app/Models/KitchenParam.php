<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenParam extends Model
{
    protected $table = 'kitchen_params';
    protected $fillable = ['depth_top', 'depth_bottom', 'kitchen_model_id'];

    public function kitchenModel()
    {
        return $this->belongsTo(Kitchen_model::class);
    }
}
