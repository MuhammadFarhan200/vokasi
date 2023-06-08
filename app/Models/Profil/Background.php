<?php

namespace App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    protected $table = 'backgrounds';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
