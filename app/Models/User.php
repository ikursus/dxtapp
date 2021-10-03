<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Nama model = Singular
// Nama table = plural

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Maklumkan kepada model ini nama table yang harus digunakan
    // protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'status',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public static function statusActive()
    {
        return self::where('status', '=', 'active')->count();
    }

    public static function statusInActive()
    {
        return self::where('status', '!=', 'active')->count();
    }

    public function isAdmin()
    {
        if (auth()->user()->role == 'admin')
        {
            return true;
        }

        return false;
    }

    // Set accessor
    public function getNameAttribute($value)
    {
        // PHP function strtoupper (besarkan semua huruf)
        return strtoupper($value);
    }

    // public function setUsernameAttribute($value)
    // {
    //     $this->attributes['username'] = strtoupper($value);
    // }
}
