<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PaymentMethod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            'tax' => 1.37,
            'name' => 'Boleto'
        ]);
        DB::table('payment_methods')->insert([
            'tax' => 7.73,
            'name' => 'Cartão de crédito'
        ]);
    } 
}
