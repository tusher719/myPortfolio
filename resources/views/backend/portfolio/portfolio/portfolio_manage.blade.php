@extends('admin.admin_master')

@section('title')
    Portfolio Manage
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio Manage</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item">Portfolio</li>
                            <li class="breadcrumb-item active">Portfolio Manage</li>

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

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Portfolio Manage <span class="badge badge-danger">{{ count($project) }}</span></h3>

                                <div class="card-tools">
                                    <a class="btn btn-success" href="{{ route('portfolio.add') }}">Project Add</a>
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
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Date</th>
                                            <th>Client</th>
                                            <th>Tools</th>
                                            <th>Website</th>
                                            <th>Status</th>
                                            <th>Created at</th>
                                            <th class="text-right">Action</td>
                                        </tr>

                                        @foreach($project as $item)

                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="{{ $item->id }}">
                                                        <label for="{{ $item->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td> {{ $item['category']['category_name'] }} </td>
                                                <td>{{ $item->title }}</td>
                                                <td>
                                                    @if($item->date == null)
                                                        <span class="badge badge-warning">Nullable</span>
                                                    @else
                                                        {{ Carbon\Carbon::parse($item->date)->format('d-M-Y')  }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->client == null)
                                                        <span class="badge badge-warning">Nullable</span>
                                                    @else
                                                        {{ $item->client }}
                                                    @endif</td>
                                                <td>
                                                    @if($item->tools == null)
                                                        <span class="badge badge-warning">Nullable</span>
                                                    @else
                                                        {{ $item->tools }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->website == null)
                                                        <span class="badge badge-warning">Nullable</span>
                                                    @else
                                                        {{ $item->website }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($item->status == 0)
                                                        <span class="badge badge-danger">UnActive</span>
                                                    @else
                                                        <span class="badge badge-success">Active</span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                                <td class="text-right">
                                                    <a href="{{ route('portfolio.view', $item->id) }}" title="View" class="btn btn-primary btn-sm">
                                                        <i class="fas fa-eye">
                                                        </i>
                                                    </a>
                                                    <a href="{{ route('portfolio.edit', $item->id) }}" title="Edit" class="btn btn-info btn-sm">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                    </a>
                                                    <a href="{{ route('portfolio.delete', $item->id) }}" id="projectDelete" title="Delete" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </a>
                                                    @if($item->status == 1)
                                                        <a href="{{ route('product.inactive',$item->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                    @else
                                                        <a href="{{ route('product.active',$item->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
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
                </div>
                <!-- ./col -->
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>





@endsection
