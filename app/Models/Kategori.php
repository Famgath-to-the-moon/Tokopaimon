<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function produk(){
        return $this->hasOne(Produk::class,'kategori_id','id');
    }
}
