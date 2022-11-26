<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i ++)
        {
        DB::table('produks')->insert([
                    'name' => Str::random(10),
                    'deskripsi' => Str::random(10),
                    'harga'=>1000,
                    'jumlah' => 10,
                    'image_id' => 1,
                    'kategori_id' => 1,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }
    }
}
