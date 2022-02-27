<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasi';
    protected $fillable = ['kategori_id', 'wilayah_id', 'nama', 'konten', 'photo'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }

    public function wilayah()
    {
        return $this->belongsTo(wilayah::class, 'wilayah_id', 'id');
    }
}
