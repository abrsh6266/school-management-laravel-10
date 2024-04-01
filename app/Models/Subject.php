<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';

    static public function getSubject()
    {
        $return = self::select('subjects.*','users.name as created_by_name')
        ->join('users','users.id','subjects.created_by');
        if (!empty(Request::get('name'))) {
            $return = $return->where('subjects.name', 'like', '%' . Request::get('name') . '%');
        }
        if(!empty(Request::get('type'))){
            $return = $return->where('subjects.type','=',Request::get('type'));
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('subjects.created_at', 'like', '%' . Request::get('date') . '%');
        }
        $return = $return->orderBy('id', 'desc')
            ->paginate(10); 
        return $return;
    }
    static public function getIdSingle($id)
    {
        return self::where('id', '=', $id)->first();
    }
}
