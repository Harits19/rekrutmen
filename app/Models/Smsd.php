<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smsd extends Model
{
    use HasFactory;
    protected $table = 'outbox';
    protected $fillable = ['DestinationNumber', 'TextDecoded', 'CreatorID'];
    protected $connection = 'smsd';
    public $timestamps = false;

}
