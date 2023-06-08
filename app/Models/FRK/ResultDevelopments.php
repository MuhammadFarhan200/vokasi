<?php

namespace App\Models\FRK;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultDevelopments extends Model
{
    use HasFactory;
    protected $table = 'result_developments';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
