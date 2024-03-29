<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function list()
    {

        $data['admin'] = User::getAdmin();
        $data['header_title'] = 'Admin list';
        return view('admin.admin.list', $data);
    }
    public function add()
    {
        $data['header_title'] = 'add new admin';
        return view('admin.admin.add', $data);
    }
    public function addAdmin(Request $request)
    {
        $admin = new User;
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->password = Hash::make($request->password);
        $admin->user_type = 1;
        $admin->save();
        return redirect('admin/admin/list')->with('success', 'Admin successfully created.');
    }
    public function edit($id)
    {
        $data['admin'] = User::getIdSingle($id);
        $data['header_title'] = 'Edit admin';
        return view('admin.admin.edit', $data);
    }
    public function editAdmin(Request $request, $id)
    {
        $admin = User::getIdSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        if (!empty($request->password))
            $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect('admin/admin/list')->with('success', 'Admin successfully Updated.');
    }
}
