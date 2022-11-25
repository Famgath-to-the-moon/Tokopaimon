<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    
    public function kategori(){

        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }
    public function image(){

        return $this->belongsTo(Image::class,'image_id','id');
    }

}
