@extends('admin.admin_master')

@section('title')
    Daily Budget Category Page
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category View</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Daily Budget</li>
                            <li class="breadcrumb-item active">Category View</li>

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
                    <div class="col-lg-8 col-md-8">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Category Manage <span class="badge badge-danger">{{ count($category) }}</span></h3>

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
                            <div class="card-body p-0">
                                <form action="{{ route('mark.delete') }}" method="post">
                                    @csrf
                                    <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                        </button>
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
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
                                                <th>
                                                    #
                                                </th>
                                                <th>SL</th>
                                                <th>Category Name</th>
                                                <th>Created at</th>
                                                <th class="text-right">Action</td>
                                            </tr>

                                            @foreach($category as $item)

                                                <tr>
                                                    <td>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" name="mark[]" value="{{ $item->id }}">
                                                            <label for="{{ $item->id }}"></label>
                                                        </div>
                                                    </td>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item->category_name }}</td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td class="text-right">
                                                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-info btn-sm">
                                                            <i class="fas fa-pencil-alt">
                                                            </i> Edit
                                                        </a>
                                                        <a href="{{ route('category.delete', $item->id) }}" id="cat" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash">
                                                            </i> Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach


                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Category Add</h3>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('category.budget.store') }}" method="post">
                                    @csrf

                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control" placeholder="Enter category name">
                                        @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
