<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert([
            'coupon_option' => 'Manual',
            'coupon_code'   => 'test10',
            'categories'    => '3',
            'users'         => 'nandopookey@gmail.com',
            'coupon_type'   => 'Single',
            'amount_type'   => 'Percentage',
            'amount'        => '10',
            'expiry_date'   => '2023-12-31',
            'status'        => 1,
        ]);
    }
}
