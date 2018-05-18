<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('id_ID');
        $increment_category_id = 1;
        foreach (range(0,20) as $i) {
            DB::table('spendings')->insert([
                'tanggal'   => $faker->date($format = 'Y-m-d', $max = 'now'),
                'nama'     => 'namapengeluaran' . $i,
                'jumlah'     => 'jumlahpengeluaran' . $i,
                'category_id'   => $increment_category_id++,
            ]);
        }
    }
}
