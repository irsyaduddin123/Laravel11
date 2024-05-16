<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    public $timestamps = false;

    use HasFactory;
    // pemanggilan table sama dengan table
    protected $table = 'jenis_produk';

    // pemanggilan kolom di dalam table
    protected $fillable = ['nama'];

    // penanda class produk berelasi one to many
    public function produk(){
        return $this->hasMany(Produk::class);
    }
}
