<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    // $fillable untuk kita isi data tu nanti
    protected $fillable = [
        'name',
        'qty',
        'price',
        'description',
    ];
}
