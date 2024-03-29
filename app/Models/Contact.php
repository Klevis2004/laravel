<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['text', 'email', 'user_id'];
    use HasFactory;

   // Contact model
 
public function contacts() {
    return $this->hasMany(Contact::class);
}
}

