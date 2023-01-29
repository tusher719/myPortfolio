@extends('admin.admin_master')

@section('title')
Hero Part
@endsection

@section('admin')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hero Part Add</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Hero_Part</li>
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

                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Hero Part</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <span class="date">{{ Carbon\Carbon::parse($hero_part->updated_at)->format('l, d-M-Y')  }}</span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('update.heropart') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $hero_part->id }}">

                                    <div class="form-group">
                                        <label for="inputEstimatedBudget">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ $hero_part->name }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputSpentBudget">Experience 01</label>
                                        <input type="text" name="experience_one" class="form-control" placeholder="Enter your experience" value="{{ $hero_part->experience_one }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Experience 02</label>
                                        <input type="text"name="experience_two" class="form-control" placeholder="Enter your experience" value="{{ $hero_part->experience_two }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEstimatedDuration">Experience 03</label>
                                        <input type="text" name="experience_three" class="form-control" placeholder="Enter your experience" value="{{ $hero_part->experience_three }}">
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
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
@endsection
