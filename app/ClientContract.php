<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientContract extends Model
{
    protected $table='client_contract';

    protected $fillable = [
        'client_id','contract_id'
    ];

    public function client(){
        return $this->belongsToMany('App\Client', 'id', 'client_id');
    }

    public function contract(){
        return $this->belongsToMany('App\Contract', 'id', 'contract_id');
    }
}
