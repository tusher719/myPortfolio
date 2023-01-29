@extends('admin.admin_master')

@section('title')
    Blog Post Edit
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blog Post Edit</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item"><a href="{{ route('list.post') }}">Blog Post</a></li>
                            <li class="breadcrumb-item active">Blog Post Edit</li>

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
                    <div class="col-lg-12 col-md-12">
                        <div class="card card-success card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Blog Post Edit</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('blog.post.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $blogpost->id }}">
                                    <input type="hidden" name="old_image" value="{{ $blogpost->post_image }}">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <h5>Blog Post Title <span class="text-danger">*</span></h5>
                                                <input type="text" name="post_title" class="form-control" value="{{ $blogpost->post_title }}">
                                                @error('blog_category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <select name="category_id" class="form-control">
                                                    <option value="">Select Category</option>
                                                    @foreach($blogcategory as $category)
                                                        <option value="{{ $category->id }}" {{ $category->id == $blogpost->category_id ? 'selected': '' }} >{{ $category->blog_category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <h5>Blog Image <span class="text-danger">*</span></h5>
                                                <input type="file" id="photo" name="post_image" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <h5>New Image <span class="text-danger">*</span></h5>
                                                        <img id="showImage" class="rounded" src="{{ url('uploads/no_image.jpg') }}" alt="" style="width: 200px;">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <h5>Preview Image <span class="text-danger">*</span></h5>
                                                        <img class="rounded" src="{{ (!empty($blogpost->post_image)) ? asset($blogpost->post_image) : url('uploads/no_image.jpg') }}" alt="" style="width: 200px;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <h5>Post Details <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea id="editor1" name="post_details">
                                                            {{ $blogpost->post_details }}
                                                        </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="submit" class="btn bg-gradient-primary" value="Update">
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
