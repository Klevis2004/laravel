<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = ['sasia', 'data_marrjes', 'data_dorezimit', 'book_id', 'user_id', 'bill'];
    use HasFactory;
}
