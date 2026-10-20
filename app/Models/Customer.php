<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'address', 'email', 'phone'])]

class Customer extends Model
{
    public function offices()
    {
        return $this->hasMany(CustomerOffice::class);
    }
}
