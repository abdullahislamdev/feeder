<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Feeder extends Model
{
    protected $fillable = [
        'id',
        'name',
        'incharge_mobile',
        'area',
        'office_id'
    ];


    public function office(){
        return $this->belongsTo(Office::class);
    }
}
