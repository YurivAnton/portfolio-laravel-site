<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function offices()
    {
        return $this->hasMany(CustomerOffice::class);
    }
}
