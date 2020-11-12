<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    use HasFactory;
    protected $table = 'konfirmasi';
    protected $fillable = ['pendaftar_id', 'kode'];

    public function pendaftar()
    {
        return $this->belongsTo('App\Models\Pendaftar');
    }
}
