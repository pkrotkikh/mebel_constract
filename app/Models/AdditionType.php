<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Sodium\randombytes_uniform;

class AdditionType extends Model
{
    protected $table = 'addition_types';

    protected $fillable = ['kitchen_model_id','title','comment'];

    public function kitchen(){
        return $this->belongsTo('App\Models\Kitchen_model');
    }

    public function additions(){
        return $this->hasMany(Addition::class, 'addition_type_id');
    }
}
