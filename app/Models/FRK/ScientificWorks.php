<?php

namespace App\Models\FRK;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScientificWorks extends Model
{
    use HasFactory;
    protected $table = 'scientific_works';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
