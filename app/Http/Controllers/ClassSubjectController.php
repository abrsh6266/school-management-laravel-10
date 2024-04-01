<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\ClassSubject;
use App\Models\Subject;
use Auth;
use Illuminate\Http\Request;

class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['header_title'] = 'Assign Subject list';
        $data['subjects'] = ClassSubject::getClassSubject();
        return view('admin.assign_subject.list', $data);
    }
    public function add(Request $request)
    {
        $data['header_title'] = 'Assign Subject';
        $data['classes'] = Classes::getClasses();
        $data['subjects'] = Subject::getSubjects();
        return view('admin.assign_subject.add', $data);
    }
    public function insert(Request $request)
    {
        $request->validate([
            'class_id' => 'required',
            'subject_id' => 'required'
        ]);
        foreach ($request->subject_id as $subject_id) {
            $data = new ClassSubject;
            $data->class_id = $request->class_id;
            $data->subject_id = $subject_id;
            $data->status = $request->status;
            $data->created_by = Auth::user()->id;
            $data->save();
        }
        return redirect(url('admin/assign_subject/list'))->with('success', 'Subject Successfully assign to class');
    }
}
