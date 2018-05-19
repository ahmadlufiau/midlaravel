<?php

use App\Category;
use App\Spending;
use Illuminate\Database\Seeder;

class CategorySpendingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        //Generate dummy category
		$jml_category = 20;
		for ($j = 1; $j <= $jml_category; $j++) {
			$category       = new Category();
            $category->nama = 'Nama Kategori ' . $j;
            $category->save();
        }
        
        // Generate dummy spending
        $jml_spending = 20;
        for ($i = 1; $i <= $jml_spending; $i++) {
            $spending               = new Spending();
            $spending->tanggal      = $faker->date($format = 'Y-m-d', $max = 'now');
            $spending->nama         = 'Nama Pengeluaran ' . $i;
            $spending->jumlah       = $faker->numberBetween($min = 1000, $max = 9000);
            $spending->category_id  = rand(1, 20);
            $spending->user_id      = 1;
            $spending->save();
        }
    }
}
