<?php

namespace App\Models\Civitas;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Account\UserCategory;
use App\Models\FRK\FinalProjectAdvisor;
use App\Models\FRK\FinalProjectTester;
use App\Models\FRK\Teaching;
use App\Models\Profil\Article;
use App\Models\Profil\Background;
use App\Models\Profil\Books;
use App\Models\Profil\Contact;
use App\Models\Profil\Education;
use App\Models\Profil\Experience;
use App\Models\Profil\Funding;
use App\Models\Profil\Publication;
use App\Models\Profil\StaffActivity;
use App\Models\Profil\Studies;
use App\Models\Setting\Role;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role_name()
    {
        return $this->belongsTo(Role::class, 'role');
    }

    public function user_category()
    {
        return $this->belongsTo(UserCategory::class, 'user_category_id');
    }

    public function article()
    {
        return $this->hasMany(Article::class, 'user_id');
    }

    public function book()
    {
        return $this->hasMany(Books::class, 'user_id');
    }

    public function publication()
    {
        return $this->hasMany(Publication::class, 'user_id');
    }

    public function studies()
    {
        return $this->hasMany(Studies::class, 'user_id');
    }

    public function background()
    {
        return $this->hasOne(Background::class, 'user_id');
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'user_id');
    }

    public function contact()
    {
        return $this->hasOne(Contact::class, 'user_id');
    }

    public function teaching()
    {
        return $this->hasMany(Teaching::class, 'user_id');
    }

    public function scientific_work()
    {
        return $this->hasMany(ScientificWorks::class, 'user_id');
    }

    public function research_result()
    {
        return $this->hasMany(ResearchResults::class, 'user_id');
    }

    public function result_development()
    {
        return $this->hasMany(ResultDevelopments::class, 'user_id');
    }

    public function fpa()
    {
        return $this->hasMany(FinalProjectAdvisor::class, 'user_id');
    }

    public function fpt()
    {
        return $this->hasMany(FinalProjectTester::class, 'user_id');
    }

    public function pendanaan() {
        return $this->hasMany(Funding::class, 'user_id');
    }

    public function staff_activity() {
        return $this->hasMany(StaffActivity::class, 'user_id');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class, 'user_id');
    }

    public function deleteDosen()
    {
        if ($this->avatar != null) {
            Storage::delete($this->avatar);
        }
        $this->article()->delete();
        $this->book()->delete();
        $this->publication()->delete();
        $this->studies()->delete();
        $this->background()->delete();
        $this->education()->delete();
        $this->contact()->delete();
        $this->teaching()->delete();
        $this->scientific_work()->delete();
        $this->research_result()->delete();
        $this->result_development()->delete();
        $this->fpa()->delete();
        $this->fpt()->delete();
        $this->pendanaan()->delete();
        $this->delete();
    }

    public function deleteStaff()
    {
        if ($this->avatar != null) {
            Storage::delete($this->avatar);
        }
        $this->staff_activity()->delete();
        $this->experience()->delete();
        $this->contact()->delete();
        $this->education()->delete();
        $this->background()->delete();
        $this->delete();
    }
}
