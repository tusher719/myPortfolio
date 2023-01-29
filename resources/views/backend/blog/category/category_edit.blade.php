@extends('admin.admin_master')

@section('title')
    Blog Category Edit
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blog Category Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item"><a href="{{ route('blog.view') }}">Blog Category</a></li>
                            <li class="breadcrumb-item active">Blog Category Edit</li>

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
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Blog Category Edit</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('blog.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $category->id }}">

                                    <div class="form-group">
                                        <label>Skill Name</label>
                                        <input type="text" name="blog_category_name" class="form-control" placeholder="Enter skill name" value="{{ $category->blog_category_name }}">
                                    </div>

                                    <div class="form-group text-center">
                                        <button type="submit" class="btn bg-gradient-green"><i class="fa fa-save"></i> Update</button>
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
