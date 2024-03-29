@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add new Admin</h1>
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
                                    <input value="{{ old('name') }}" required type="text"
                                        class="form-control"name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" required name="email" class="form-control" placeholder="Email">
                                    <p style="color: red">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" required name="password" value="{{ old('password') }}"
                                        class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection
