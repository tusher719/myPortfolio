@extends('admin.admin_master')

@section('title')
About main
@endsection

@section('admin')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">About Main</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">About</li>
                            <li class="breadcrumb-item active">About Main</li>

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
                        <div class="col-md-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">About Manage <span class="badge badge-danger">{{ count($about) }}</span></h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-xl">About Add</button>
                                        </div>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-reply"></i>
                                            </button>
                                            <button type="button" class="btn btn-default btn-sm">
                                                <i class="fas fa-share"></i>
                                            </button>
                                        </div>
                                        <!-- /.btn-group -->
                                        <button type="button" class="btn btn-default btn-sm" onClick="window.location.reload()">
                                            <i class="fas fa-sync-alt"></i>
                                        </button>



                                    </div>

                                    <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped table-border">
                                            <tbody>

                                            <tr>
                                                <th>#</th>
                                                <th>SL</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Created at</th>
                                                <th class="text-right">Action</td>
                                            </tr>
                                            @foreach ($about as $item )
                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" value="" id="{{ $item->id }}">
                                                            <label for="{{ $item->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td> {{ $loop->index+1 }} </td>
                                                    <td><img src="{{ asset($item->image) }}" alt="" style="width: 70px; height: 40px; object-fit: cover"> </td>
                                                    <td> {{ $item->title }} </td>
                                                    <td> {{ $item->details }} </td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td width="15%" class="text-right">
                                                        <a href="{{ route('about.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fas fa-pencil-alt">
                                                            </i> Edit
                                                        </a>
                                                        <a href="{{ route('about.delete', $item->id) }}" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash">
                                                            </i> Delete
                                                        </a>

                                                        @if($item->status == 1)
                                                            <a href="{{ route('about.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> Inactive</a>
                                                        @else
                                                            <a href="{{ route('about.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> Active</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach



                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>

                    <!-- ./col -->
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>








    <form action="{{ route('about.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">About Add</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-8 mx-auto">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Section</h3>
                                    </div>
                                    <div class="card-body">

                                        {{-- <input type="hidden" name="id" value=""> --}}

                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" placeholder="Enter your name">
                                            @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Details</label>
                                            <input type="text" name="details" class="form-control" placeholder="Enter your details">
                                            @error('details')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" name="about_image" class="form-control" id="photo">
                                                    @error('about_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group text-center">
                                                    <img id="showImage" class="rounded" src="{{ (!empty($editData->profile_photo_path)) ? asset($editData->profile_photo_path) : url('uploads/no_image.jpg') }}" alt="" style="width: 120px; height: 120px; object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </form>

@endsection
