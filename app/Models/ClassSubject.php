<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class ClassSubject extends Model
{
    use HasFactory;
    protected $table = 'class_subject';
    static public function getClassSubject(){
        $return = self::select('class_subject.*');
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
}
