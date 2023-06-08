<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studies extends Model
{
    use HasFactory;
    public $table = 'studies';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
