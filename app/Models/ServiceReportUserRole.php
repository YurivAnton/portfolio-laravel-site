<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['role'])]

class ServiceReportUserRole extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function serviceReport()
    {
        return $this->belongsTo(ServiceReport::class);
    }
}
