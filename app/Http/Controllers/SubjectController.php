<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Subject list';
        $data['subjects'] = Subject::getSubject();
        return view('admin.subject.list', $data);
    }
    public function add()
    {
        $data['header_title'] = 'add new Subject';
        return view('admin.subject.add', $data);
    }
    public function addSubject(Request $request)
    {
        $request->validate([
            'name' => "required",
            'type' => "required"
        ]);
        $subject = new Subject;
        $subject->name = trim($request->name);
        $subject->status = $request->status;
        $subject->type = trim($request->type);
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject successfully created.');
    }
    public function edit($id)
    {

        $data['class'] = Subject::getIdSingle($id);
        $data['header_title'] = 'Edit Class';
        return view('admin.subject.edit', $data);
    }
    public function editSubject(Request $request, $id)
    {
        $request->validate([
            'name' => "required",
            'type' => "required"
        ]);
        $subject = Subject::getIdSingle($id);
        if (empty($subject)) {
            abort(404);
        }
        $subject->name = trim($request->name);
        $subject->status = $request->status;
        $subject->type = trim($request->type);
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject successfully Updated.');
    }
    public function delete($id)
    {
        $subject = Subject::getIdSingle($id);
        $subject->delete();
        return redirect()->back()->with('success', 'Subject successfully deleted.');
    }
}
