@extends('admin.admin_master')

@section('title')
    Blog Category View
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blog Category View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Blog</li>
                            <li class="breadcrumb-item active">Blog Category</li>

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
                                <h3 class="card-title">Blog Category Add</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <h5>Blog Post Title <span class="text-danger">*</span></h5>
                                                <input type="text" name="post_title" class="form-control" placeholder="Enter blog category name">
                                                @error('blog_category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($blogcategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->blog_category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <h5>Blog Image <span class="text-danger">*</span></h5>
                                                <input type="file" id="photo" name="post_image" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
{{--                                                <img id="showImage" class="rounded" src="{{ (!empty($editData->profile_photo_path)) ? asset($editData->profile_photo_path) : url('uploads/no_image.jpg') }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">--}}
                                                <img id="showImage" class="rounded" src="{{ url('uploads/no_image.jpg') }}" alt="" style="width: 150px;">
                                            </div>
                                        </div>
{{--                                        <div class="col-lg-6 col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="tagsbt">Tag</label>--}}
{{--                                                <select multiple class="form-control" id="tagsbt" name="tag[]">--}}
{{--                                                    @foreach($tag as $item)--}}
{{--                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <h5>Post Details <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                        <textarea id="editor1" name="post_details" rows="10" cols="80">
                                                            Post Details
                                                        </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <input type="submit" class="btn bg-gradient-primary" value="Add New">
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
