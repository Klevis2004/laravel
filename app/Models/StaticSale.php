<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticSale extends Model
{
    protected $fillable = ['sasia', 'book_id', 'user_id', 'bill'];
    use HasFactory;
}
