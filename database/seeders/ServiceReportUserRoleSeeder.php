<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ServiceReport;

class ServiceReportUserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $technician = User::where('email', 'technician@example.com')->firstOrFail();

        $report1 = ServiceReport::where(
            'description',
            'description of the first service report'
        )->firstOrFail();

        $report2 = ServiceReport::where(
            'description',
            'description of the SECOND service report'
        )->firstOrFail();

        $report1->users()->syncWithoutDetaching([
            $technician->id => ['role' => 'Technician'],
        ]);

        $report2->users()->syncWithoutDetaching([
            $technician->id => ['role' => 'Technician'],
        ]);
    }
}
