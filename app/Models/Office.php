<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
        protected $fillable = [
        'id',
        'code',
        'name',
        'address',
        'xen_mobile',
        'one_stop_mobile',
        'one_stop_phone'];

        public function feeder(){
            return $this->hasMany(Feeder::class);
        }
}
