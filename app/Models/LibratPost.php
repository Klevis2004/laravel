<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibratPost extends Model
{
    protected $fillable = ['name', 'author', 'photo', 'category_id', 'price', 'rent_price', 'sasia', 'summary'];
    use HasFactory;

}
