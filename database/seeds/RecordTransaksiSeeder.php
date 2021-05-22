<?php

use Illuminate\Database\Seeder;


class RecordTransaksiSeeder extends Seeder
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
            DB::table('record_transaksis')->insert([
                'id_barang' => $i,
                'jumlah_barang' => $i*5,
                'total_harga'=>$i*1000,
                'nomor_nota' => $i,
                'tanggal_transaksi' =>$faker->date($format = 'Y-m-d', $max = 'now')
            ]);
        }
    }
}
