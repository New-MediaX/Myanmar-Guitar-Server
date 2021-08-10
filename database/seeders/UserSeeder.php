<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // pugna1102@gmail.com
    //  889Mma!]Q\Np*KjR
    public function run()
    {
        User::create(['name' => "Admin","email" => "pugna1102@gmail.com" , "email_verified_at" => \Carbon\Carbon::now() , "password" => '$2a$12$R3mmGZyH53cDJx6EHXbxkOsyKiV9Qgmg.NCpomO77s/19uxuB6URW']);
    }
}
