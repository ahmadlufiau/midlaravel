<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
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
        foreach (range(0,20) as $i) {
            DB::table('users')->insert([
                'name'  => $faker->name,
                'email'     => 'nama' . $i . '@gmail.com',
                'password'  => bcrypt('password'),
            ]);
        }
    }
}
