@extends('admin.admin_master')

@section('title')
    Portfolio View
@endsection

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Portfolio</li>
                            <li class="breadcrumb-item"><a href="{{ route('portfolio.manage') }}">Portfolio Manage</a></li>
                            <li class="breadcrumb-item active">Portfolio View</li>

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
                <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-8 col-md-12">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Project View</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control form-control-border" value="{{ $projects['category']['category_name'] }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Title</label>
                                                <input type="text" class="form-control form-control-border" value="{{ $projects->title }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Project Brief:</label>
                                                <textarea class="form-control form-control-border" rows="8" readonly>
                                                {!! $projects->description !!}
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Project Info</h3>
                                </div>
                                <div class="card-body">

                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control form-control-border" value="{{ $projects->date }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Client</label>
                                        <input type="text" class="form-control form-control-border" value="{{ $projects->client }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Tools</label>
                                        <input type="text" class="form-control form-control-border" value="{{ $projects->tools }}" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" class="form-control form-control-border" value="{{ $projects->website }}" readonly>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Project Images</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4>Main Thumbnail <span class="text-danger">*</span></h4>
                                                <img class="img-rounded" src="{{ asset($projects->project_thumbnail) }}" alt="" style="margin-top: 10px; height: 200px; width: 350px; object-fit: cover">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <h4>Multiple Image <span class="text-danger">*</span></h4>
                                                @foreach($multiImgs as $img)
                                                    <img class="img-rounded" src="{{ asset($img->photo_name) }}"  style="height: 200px; width: 250px; margin: 2px; object-fit: cover;">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    </div>
                </form>
                <!-- ./col -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
