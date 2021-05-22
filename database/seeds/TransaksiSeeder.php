<?php

use Illuminate\Database\Seeder;


class TransaksiSeeder extends Seeder
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
            DB::table('transaksis')->insert([
                'tanggal_transaksi' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'nomor_nota' => $i,
                'nilai_transaksi' => $i*100,
                'profit' =>$i*100
            ]);
        }
        
    }
}
