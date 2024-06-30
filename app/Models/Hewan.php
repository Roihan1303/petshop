<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;
    protected $table = 'hewan';
    protected $fillable = [
        'jenis_hewan',
        'harga',
        'gambar',
        'status'
    ];
}