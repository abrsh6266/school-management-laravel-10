@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin List (Total: {{ $admin->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right">
                        <a href={{ url('admin/admin/add') }} class="btn btn-primary">Add New Admin</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">admin</a></li>
                            <li class="breadcrumb-item active">list </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-primary">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Search Admin</h3>
                    </div>
                </div>
                <form method="GET" action="">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name</label>
                                <input value="{{ Request::get('name') }}" type="text" class="form-control"name="name"
                                    placeholder="Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <input value="{{ Request::get('email') }}" type="text" name="email"
                                    class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Date</label>
                                <input value="{{ Request::get('date') }}" type="date" name="date"
                                    class="form-control" placeholder="Date">
                            </div>
                            <div class="form-group col-md-3">
                                <button class="btn btn-primary" type="submit" style="margin-top: 30px;">Search</button>
                                <a href="{{ url('admin/admin/list') }}" class="btn btn-success" type="submit"
                                    style="margin-top: 30px;">clear</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin List</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admin as $a)
                                        <tr>
                                            <td>
                                                {{ $a->id }}
                                            </td>
                                            <td>
                                                {{ $a->name }}
                                            </td>
                                            <td>
                                                {{ $a->email }}
                                            </td>
                                            <td>
                                                {{ date('d-m-Y H:i A', strtotime($a->created_at)) }}
                                            </td>
                                            <td>
                                                <a href={{ url('admin/admin/edit/' . $a->id) }}
                                                    class="btn btn-primary">Edit</a>
                                                <a href={{ url('admin/admin/delete/' . $a->id) }}
                                                    class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding: 10px; float:right;">
                                {!! $admin->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- /.content -->
    </div>
@endsection
