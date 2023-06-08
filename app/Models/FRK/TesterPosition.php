<?php

namespace App\Models\FRK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesterPosition extends Model
{
    use HasFactory;
    protected $table = 'tester_positions';

    public function finalProjectTester()
    {
        return $this->hasMany(FinalProjectTester::class, 'tester_position_id');
    }

    public function finalProjectAdvisor()
    {
        return $this->hasMany(FinalProjectAdvisor::class, 'tester_position_id');
    }
}
