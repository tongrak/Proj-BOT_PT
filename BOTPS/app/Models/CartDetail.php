<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    // use HasFactory;
    protected $table = 'cartdetails';
    protected $primaryKey = 'cartNumber';

    protected $fillable = [
        'cartNumber',
        'productCode',
        'quantity'
    ];

    public $timestamps = false;
}
