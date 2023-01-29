@extends('admin.admin_master')

@section('title')
    Contact Manage
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact Manage</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Contact</li>
                            <li class="breadcrumb-item active">Contact Manage</li>

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
                    <div class="col-lg-10 col-md-10 mx-auto">

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Contact Manage <span class="badge badge-danger">{{ count($message) }}</span></h3>

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
                                            <th>
                                                #
                                            </th>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email Address</th>
                                            <th>Message</th>
                                            <th>Created at</th>
                                            <th class="text-right">Action</td>
                                        </tr>

                                        @foreach($message as $item)
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="{{ $item->id }}">
                                                        <label for="{{ $item->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ Str::limit($item->message, 40) }}</td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>

                                                <td class="text-right">
                                                    <a href="{{ route('contact.view', $item->id) }}" class="btn btn-info btn-sm">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>  View
                                                    </a>
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
                </div>
                <!-- ./col -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>





@endsection
