<?php

namespace App\Models\FRK;

use App\Models\Civitas\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalProjectTester extends Model
{
    use HasFactory;
    protected $table = 'final_project_testers';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function testedComponent()
    {
        return $this->belongsTo(TestedComponent::class, 'tested_component_id');
    }

    public function testerPosition()
    {
        return $this->belongsTo(TesterPosition::class, 'tester_position_id');
    }
}
