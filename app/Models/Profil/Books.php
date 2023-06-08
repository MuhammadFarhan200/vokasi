<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public $table = 'books';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
