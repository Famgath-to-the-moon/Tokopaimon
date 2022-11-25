<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = [
            [
                'id' => 1,
                'name' =>'elektronik',
            ],
            [
                'id' => 2,
               'name'=> 'peralatan_rumah',
            ],
            [
                'id' => 3,
               'name'=> 'fashion',
            ],
        ];
    
        foreach ($kategoris as $key => $kategori) {
            Kategori::create($kategori);
        }
    }
}
