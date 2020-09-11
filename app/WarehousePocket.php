<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarehousePocket extends Model
{
    public function user_to()
    {
        return $this->hasOne('App\User', 'id', 'assigned_to');
    }

    public function guia()
    {
        return $this->hasOne('App\Warehouse', 'id', 'guide');
    }

    public function tipo()
    {
        return $this->hasOne('App\TypePosFail', 'id', 'type');
    }

    public function marca()
    {
        return $this->hasOne('App\Brand', 'id', 'brand');
    }
}
