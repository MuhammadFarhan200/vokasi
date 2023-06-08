<?php

namespace App\Models\Profil;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class Experience extends Model
{
    use HasFactory;
    protected $table = 'experiences';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
