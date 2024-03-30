<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function list()
    {

        $data['classes'] = Classes::getClass();
        $data['header_title'] = 'Class list';
        return view('admin.class.list', $data);
    }
}
