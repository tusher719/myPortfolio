@extends('admin.admin_master')

@section('title')
    Portfolio Add
@endsection

@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio Add</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Portfolio</li>
                            <li class="breadcrumb-item active">Portfolio Add</li>

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
                                    <h3 class="card-title">Category Add</h3>
                                </div>
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <select name="category_id" class="form-control" required>
                                                    <option value="">Select Category</option>
                                                    @foreach($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <label>Portfolio Title</label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter portfolio title" required>
                                                @error('category_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <label>Project Brief:</label>
                                                <textarea name="description" class="form-control" rows="8" placeholder="Enter your description"></textarea>
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
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
                                        <input type="date" name="date" class="form-control">
                                        @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Client</label>
                                        <input type="text" name="client" class="form-control" placeholder="Enter client name">
                                        @error('client')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Tools</label>
                                        <input type="text" name="tools" class="form-control" placeholder="Enter tools name">
                                        @error('tools')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="Enter website name">
                                        @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Main Thumbnail <span class="text-danger">*</span></h4>
                                                <input type="file" name="project_thumbnail" class="form-control" onchange="mainThamUrl(this)" required>
                                                @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <img src="{{ url('uploads/no_image.jpg') }}" id="mainThmb" alt="" style="margin-top: 10px; height: 120px; width: 120px; object-fit: cover">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Multiple Image <span class="text-danger">*</span></h4>
                                                <div class="controls">
                                                    <input type="file" name="multi_img[]" class="form-control" multiple id="multiImg" required>
                                                    @error('multi_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <div class="row" id="preview_img" style="margin-top: 10px; margin-left: 20px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="submit" class="btn bg-gradient-primary" value="Add New">
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



    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#mainThmb').attr('src',e.target.result).width(120).height(120);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <!-- Show Multi Image JavaScript Code -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                                return function(e) {
                                    var img = $('<img style="padding: 2px; object-fit: cover"/>').addClass('thumb').attr('src', e.target.result) .width(120)
                                        .height(120); //create image element
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>



@endsection
