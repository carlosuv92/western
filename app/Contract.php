<?php

namespace App;

use App\Client;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class)->withTimestamps();
    }

}
