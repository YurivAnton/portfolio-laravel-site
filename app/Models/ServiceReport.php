<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
