@extends('admin.admin_master')

@section('title')
    skills
@endsection

@section('admin')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">About Section Add</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">About</li>
                            <li class="breadcrumb-item"><a href="{{ route('main') }}">About Main</a></li>
                            <li class="breadcrumb-item active">About Edit</li>

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
                    <div class="col-lg-8 col-md-8 mx-auto">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">About Edit </h3>

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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{ route('about.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input type="hidden" name="old_image" value="{{ $about->image }}">

                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $about->title }}">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="details" class="form-control" value="{{ $about->details }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label>Old Image</label>
                                                <div>
                                                    <img class="rounded" src="{{ (!empty($about->image)) ? asset($about->image) : url('uploads/no_image.jpg') }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-center">
                                                <label>New Image (Preview)</label>
                                                <div>
                                                    <img id="showImage" class="rounded" src="{{ url('uploads/no_image.jpg') }}" alt="" style="object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" id="photo" name="about_image" class="form-control">
                                    </div>


                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
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

