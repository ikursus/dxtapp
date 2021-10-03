<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'membership_id'];

    public function membership()
    {
        return $this->belongsTo(Membership::class);

        // return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function totalSubscribed()
    {
        return self::count();
    }
}
