<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['customer_office_id', 'description', 'started_at', 'finished_at'])]

class ServiceReport extends Model
{
    public function userRoles()
    {
        return $this->hasMany(ServiceReportUserRole::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'service_report_user_roles')->withPivot('role');
    }

    public function customerOffice()
    {
        return $this->belongsTo(CustomerOffice::class);
    }
}
