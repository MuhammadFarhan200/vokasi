<?php

namespace App\Models\Profil;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffActivity extends Model
{
    use HasFactory;
    protected $table = 'staff_activities';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
