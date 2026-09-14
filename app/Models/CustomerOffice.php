<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['customer_id', 'name', 'address', 'email', 'phone'])]

class CustomerOffice extends Model
{
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function serviceReports()
    {
        return $this->hasMany(ServiceReport::class);
    }
}
