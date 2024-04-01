@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add new Subject</h1>
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
                                    <label>select Class</label>
                                    <select class="form-control"name="class_id">
                                        <option value="">Select class</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                        @endforeach
                                    </select>
                                    <p style="color: red">{{ $errors->first('class_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Select Subjects</label>
                                    @foreach ($subjects as $subject)
                                        <div>
                                            <label style="font-weight: normal;">
                                                <input type="checkbox" value="{{$subject->id}}" name="subject_id[]">{{ $subject->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <p style="color: red">{{ $errors->first('subject_id') }}</p>

                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control"name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
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
