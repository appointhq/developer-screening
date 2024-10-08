<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_active'
    ];
   
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean'
        ];
    }

    public function settings()
    {
        return $this->hasOne(AppSetting::class);
    }

    public function users()
    {
        return $this->hasManyThrough(User::class, AppUser::class, 'app_id', 'id', 'id', 'user_id');
    }
}
