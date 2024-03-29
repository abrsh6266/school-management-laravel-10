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
                                    <input value="{{ old('name',$admin->name)}}" required type="text" class="form-control"name="name"
                                        placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value="{{ old('email',$admin->email)}}" type="email" required name="email"
                                        class="form-control" placeholder="Email">
                                    <p style="color: red">{{ $errors->first('email') }}</p>

                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <p>Do you want to change password, please add new password.</p>
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
