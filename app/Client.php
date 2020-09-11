<?php

namespace App;

use App\Contract;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function contracts()
    {
        return $this->belongsToMany(Contract::class)->withTimestamps();
    }
}
