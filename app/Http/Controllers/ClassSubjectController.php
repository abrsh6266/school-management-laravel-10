<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = 'Assign Subject list';
        $data['subjects'] = ClassSubject::getClassSubject();
        return view('admin.assign_subject.list', $data);
    }
    public function add(Request $request){
        $data['header_title'] = 'Assign Subject';
        $data['classes'] = Classes::getClasses();
        $data['subjects'] = Subject::getSubjects();
        return view('admin.assign_subject.add', $data);
    }
}
