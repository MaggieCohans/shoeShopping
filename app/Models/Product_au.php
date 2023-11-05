<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_au extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'quantity','discount_price','image','category']; 
}
