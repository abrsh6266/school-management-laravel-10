@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input value="{{ old('name', $class->name) }}" type="text"
                                        class="form-control"name="name" placeholder="Name">
                                    <p style="color: red">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control"name="status">
                                        <option {{ $class->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $class->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
