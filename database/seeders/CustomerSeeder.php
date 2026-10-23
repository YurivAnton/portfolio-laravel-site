<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::firstOrCreate(
            ['name' => 'Firm 1 sro'], 
            [
                'address' => 'Firststreet 1', 
                'email' => 'firm1@example.com',
                'phone' => '421123456789'
            ]);
        Customer::firstOrCreate(
            ['name' => 'Firm 2 sro'], 
            [
                'address' => 'Secondstreet 2', 
                'email' => 'second2@example.com',
                'phone' => '421123456789'
            ]);
    }
}
