<?php

namespace Database\Seeders;

use App\Models\Token;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::create(['token' => "KvRfIc87eapzhBtGY2v84yR1Tv26ILMB"]);
    }
}
