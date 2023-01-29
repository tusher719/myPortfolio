@extends('admin.admin_master')

@section('title')
    Education
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Education Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">About</li>
                            <li class="breadcrumb-item">Education Manage</li>
                            <li class="breadcrumb-item active">Education Edit</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-6 col-md-6 mx-auto">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Education Edit</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Search Item">
                                        <div class="input-group-append">
                                            <div class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">

                                <form action="{{ route('education.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $education->id }}">

                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="start_date" class="form-control" value="{{ $education->start_date }}">
                                    </div>

                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" name="end_date" class="form-control" value="{{ $education->end_date }}">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="status" class="form-check-input" id="Check" value="1" {{ $education->status == 1 ? 'checked': '' }}>
                                            <label class="form-check-label" for="Check">Present</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Degree Name</label>
                                        <input type="text" name="degree_name" class="form-control" placeholder="Enter experience name" value="{{ $education->degree_name }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" class="form-control" placeholder="Enter description" value="{{ $education->description }}">
                                    </div>

                                    <div class="form-group text-center">
                                        <button  type="submit" class="btn bg-gradient-success"><i class="fa fa-save"></i> Update</button>
                                    </div>
                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>





@endsection
