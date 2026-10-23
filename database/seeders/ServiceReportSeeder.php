<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CustomerOffice;
use App\Models\ServiceReport;

class ServiceReportSeeder extends Seeder
{
    public function run(): void
    {
        $customer1Office1 = CustomerOffice::where('name', 'Firm 1 Office 1')->firstOrFail();
        $customer2Office2 = CustomerOffice::where('name', 'Firm 2 Office 2')->firstOrFail();

        ServiceReport::firstOrCreate(
            [
                'customer_office_id' => $customer1Office1->id,
                'description' => 'description of the first service report',
                'started_at' => '2020-01-01 09:00:00'
            ],
            [
                'finished_at' => '2020-01-01 10:00:00'
            ]
        );

        ServiceReport::firstOrCreate(
            [
                'customer_office_id' => $customer2Office2->id,
                'description' => 'description of the SECOND service report',
                'started_at' => '2020-02-02 09:00:00'
            ],
            [
                'finished_at' => '2020-02-02 10:00:00'
            ]
        );
    }
}
