<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 1; $i <= 10; $i++){
            DB::table('barangs')->insert([
                'nama_barang' => $faker->firstNameFemale(),
                'kode_barang' => $i,
                'harga_modal' => $i*100,
                'harga_jual' =>$i*120,
                'stok_barang' => $i*10,

            ]);
        }
    }
}
