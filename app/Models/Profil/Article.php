<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
