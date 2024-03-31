<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Hash;
use Illuminate\Http\Request;
use Auth;
class ClassController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Class list';
        $data['classes'] = Classes::getClass();
        return view('admin.class.list', $data);
    }
    public function add()
    {
        $data['header_title'] = 'add new class';
        return view('admin.class.add', $data);
    }
    public function addClass(Request $request)
    {
        $request->validate([
            'name' => "required"
        ]);
        $class = new Classes;   
        $class->name = trim($request->name);
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', 'class successfully created.');
    }
}
