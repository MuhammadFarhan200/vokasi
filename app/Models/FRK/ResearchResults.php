<?php

namespace App\Models\FRK;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchResults extends Model
{
    use HasFactory;
    protected $table = 'research_results';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
