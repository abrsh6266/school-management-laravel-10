<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    static public function getAdmin()
    {
        $return = self::select('users.*')
            ->where('user_type', '=', 1);
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('status'))) {
            $return = $return->where('email', 'status', Request::get('status'));
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }
}
