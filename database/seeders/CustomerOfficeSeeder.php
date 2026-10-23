<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\CustomerOffice;

class CustomerOfficeSeeder extends Seeder
{
    public function run(): void
    {
        $customer1 = Customer::where('name', 'Firm 1 sro')->firstOrFail();
        $customer2 = Customer::where('name', 'Firm 2 sro')->firstOrFail();


        CustomerOffice::firstOrCreate(
            [
                'name' => 'Firm 1 Office 1',
                'customer_id' => $customer1->id,
            ],
            [
                'address' => 'First Firm Office 1',
                'email' => 'firm1Office1@example.com',
                'phone' => '+421222222222'
            ]
        );
        CustomerOffice::firstOrCreate(
            [
                'name' => 'Firm 1 Office 2',
                'customer_id' => $customer1->id,
            ],
            [
                'address' => 'First Firm Office 2',
                'email' => 'firm1Office2@example.com',
                'phone' => '+421222222222'
            ]
        );

        CustomerOffice::firstOrCreate(
            [
                'name' => 'Firm 2 Office 1',
                'customer_id' => $customer2->id,
            ],
            [
                
                'address' => 'Second Firm Office 1',
                'email' => 'firm2Office1@example.com',
                'phone' => '+421222222222'
            ]
        );
        CustomerOffice::firstOrCreate(
            [
                'name' => 'Firm 2 Office 2',
                'customer_id' => $customer2->id,
            ],
            [
                'address' => 'Second Firm Office 2',
                'email' => 'firm2Office2@example.com',
                'phone' => '+421222222222'
            ]
        );
    }
}
