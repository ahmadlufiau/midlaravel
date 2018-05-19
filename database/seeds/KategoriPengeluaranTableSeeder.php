<?php

use App\Kategori;
use App\Pengeluaran;
use Illuminate\Database\Seeder;

class KategoriPengeluaranTableSeeder extends Seeder
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
        //Generate dummy kategori
		$jml_kategori = 20;
		for ($j = 1; $j <= $jml_kategori; $j++) {
			$kategori       = new Kategori();
            $kategori->nama = 'Nama Kategori ' . $j;
            $kategori->save();
        }
        
        // Generate dummy pengeluaran
        $jml_pengeluaran = 200;
        for ($i = 1; $i <= $jml_pengeluaran; $i++) {
            $pengeluaran               = new Pengeluaran();
            $pengeluaran->tanggal      = $faker->date($format = 'Y-m-d', $max = 'now');
            $pengeluaran->nama         = 'Nama Pengeluaran ' . $i;
            $pengeluaran->jumlah       = $faker->numberBetween($min = 1000, $max = 9000);
            $pengeluaran->kategori_id  = rand(1, 20);
            $pengeluaran->user_id      = 1;
            $pengeluaran->save();
        }
    }
}
