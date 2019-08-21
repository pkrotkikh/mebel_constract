<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParamItem extends Model
{
    protected $table = 'item_parameters';
    protected $fillable = ['height', 'width', 'items_models_id'];

    public function itemsModels()
    {
        return $this->belongsTo(Item::class);
    }
}
