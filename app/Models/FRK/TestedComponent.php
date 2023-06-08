<?php

namespace App\Models\FRK;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestedComponent extends Model
{
    use HasFactory;
    protected $table = 'tested_components';

    public function finalProjectTester()
    {
        return $this->hasMany(FinalProjectTester::class, 'tested_component_id');
    }

    public function finalProjectAdvisor()
    {
        return $this->hasMany(FinalProjectAdvisor::class, 'tested_component_id');
    }
}
