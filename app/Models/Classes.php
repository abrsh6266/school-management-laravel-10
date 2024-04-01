<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    static public function getClass()
    {
        $return = self::select('classes.*', 'users.name as created_by_name')
            ->join('users', 'users.id', 'classes.created_by');
        if (!empty(Request::get('name'))) {
            $return = $return->where('classes.name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('classes.created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10);
        return $return;
    }
    static public function getIdSingle($id)
    {
        return self::where('id', '=', $id)->first();
    }
    static public function getClasses()
    {
        $return = self::select('classes.*')
            ->join('users', 'users.id', 'classes.created_by')
            ->where('classes.status', '=', 1)
            ->orderBy('classes.name', 'asc')
            ->get();
        return $return;
    }
}
