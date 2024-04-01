<?php

namespace App\Http\Controllers;

use App\Models\ClassSubject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = 'Subject assign list';
        $data['subjects'] = ClassSubject::getClassSubject();
        return view('admin.assign_subject.list', $data);
    }
}
