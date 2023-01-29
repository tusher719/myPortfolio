@extends('admin.admin_master')

@section('title')
    Portfolio Edit
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio Update</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Portfolio</li>
                            <li class="breadcrumb-item"><a href="{{ route('portfolio.manage') }}">Portfolio Manage</a></li>
                            <li class="breadcrumb-item active">Portfolio Update</li>

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

                <form action="{{ route('portfolio.update') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $project->id }}">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Portfolio Update</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label>Category Name</label>
                                                        <select name="category_id" class="form-control" required>
                                                            <option value="">Select Category</option>

                                                            @foreach($categories as $item)
                                                                <option value="{{ $item->id }}" {{ $item->id == $project->category_id ? 'selected': '' }} >{{ $item->category_name }}</option>
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
                                                        <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
                                                        @error('category_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12">
                                                    <div class="form-group">
                                                        <label>Project Brief:</label>
                                                        <textarea name="description" class="form-control" rows="8" placeholder="Enter your description">
                                                    {!! $project->description !!}
                                                </textarea>
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
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" name="date" class="form-control" value="{{ $project->date }}">
                                                @error('date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Client</label>
                                                <input type="text" name="client" class="form-control" value="{{ $project->client }}">
                                                @error('client')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Tools</label>
                                                <input type="text" name="tools" class="form-control" value="{{ $project->tools }}">
                                                @error('tools')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label>Website</label>
                                                <input type="text" name="website" class="form-control" value="{{ $project->website }}">
                                                @error('website')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn bg-gradient-success"><i class="fa fa-save"></i> Project Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Project Thumbnail</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('portfolio.thumbnail.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $project->id }}">
                                    <input type="hidden" name="old_img" value="{{ $project->project_thumbnail }}">
                                    <div class="row">
                                        <div class="col-md-7">
                                            <div class="card">
                                                <div class="card-body">
                                                    <img src="{{ asset($project->project_thumbnail) }}" class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-group">
                                                        <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                        <input type="file" name="project_thumbnail" class="form-control" onChange="mainThamUrl(this)"  >
                                                        <img src="{{ url('uploads/no_image.jpg') }}" id="mainThmb" style="margin-top: 10px; height: auto; width: auto; object-fit: cover;">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn bg-gradient-success"><i class="fa fa-save"></i> Thumbnail Update</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-12 col-md-12">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Project Multiple Images</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('portfolio.multi_img.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($multiImgs as $img)
                                                    <div class="col-md-3">multi_img

                                                        <div class="card">
                                                            <img src="{{ asset($img->photo_name) }}" class="card-img-top">
                                                            <div class="card-body">
                                                                <h5 class="card-title">
                                                                    <a href="{{ route('product.multiimg.delete',$img->id) }}" id="multiDelete" title="Delete Data" class="btn btn-sm bg-danger">
                                                                        <i class="fas fa-trash"></i> Delete
                                                                    </a>
                                                                    {{--                                                                            <a  class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>--}}
                                                                </h5>
                                                                <div class="form-group">
                                                                    <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                                                    <input class="form-control" type="file" name="multi_img[{{ $img->id }}]">
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div><!--  end col md 3		 -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn bg-gradient-success"><i class="fa fa-save"></i> Multi-Images Update</button>
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






    <!-- Show Multi Image JavaScript Code -->
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function(){--}}
{{--            $('#multiImg').on('change', function(){ //on file input change--}}
{{--                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser--}}
{{--                {--}}
{{--                    var data = $(this)[0].files; //this file data--}}

{{--                    $.each(data, function(index, file){ //loop though each file--}}
{{--                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type--}}
{{--                            var fRead = new FileReader(); //new filereader--}}
{{--                            fRead.onload = (function(file){ //trigger function on successful read--}}
{{--                                return function(e) {--}}
{{--                                    var img = $('<img style="padding: 2px; object-fit: cover"/>').addClass('thumb').attr('src', e.target.result) .width(120)--}}
{{--                                        .height(120); //create image element--}}
{{--                                    $('#preview_img').append(img); //append image to output element--}}
{{--                                };--}}
{{--                            })(file);--}}
{{--                            fRead.readAsDataURL(file); //URL representing the file's data.--}}
{{--                        }--}}
{{--                    });--}}

{{--                }else{--}}
{{--                    alert("Your browser doesn't support File API!"); //if File API is absent--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}



@endsection
