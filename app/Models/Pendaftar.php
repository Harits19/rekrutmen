<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;
    protected $table = 'pendaftar';
    protected $fillable = ['data_formulir', 'nama', 'email', 'no_hp', 'rekrutmen_id'];

    public function rekrutmen()
    {
        return $this->belongsTo('App\Models\Rekrutmen');
    }

}
