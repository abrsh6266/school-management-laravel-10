<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    static public function getAdmin()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 1);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }
    static public function getEmailSingle($email)
    {
        return self::where('email', '=', $email)->first();
    }
    static public function getIdSingle($id)
    {
        return self::where('id', '=', $id)->first();
    }
    static public function getTokenSingle($remember_token)
    {
        return self::where('remember_token', '=', $remember_token)->first();
    }
}
