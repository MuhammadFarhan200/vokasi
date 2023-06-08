<?php

namespace App\Models\FRK;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaching extends Model
{
    use HasFactory;
    protected $table = 'teachings';

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
