<?php

namespace App\Models\FRK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';

    public function teaching()
    {
        return $this->hasMany(Teaching::class, 'subject_id');
    }

    public function final_project_advisor()
    {
        return $this->hasMany(FinalProjectAdvisor::class, 'subject_id');
    }

    public function final_project_tester()
    {
        return $this->hasMany(FinalProjectTester::class, 'subject_id');
    }
}
