<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Rekrutmen extends Model
{
    use HasFactory;
    protected $table = 'rekrutmen';
    protected $fillable = ['nama', 'organisasi_id', 'deskripsi', 'status', 'poster', 'data_formulir'];

    public function organisasi()
    {
        return $this->belongsTo('App\Models\Organisasi');
    }

    public function pendaftar()
    {
        return $this->hasMany('App\Models\Pendaftar');
    }
}
