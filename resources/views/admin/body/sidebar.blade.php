@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
@endphp
@php
    $about = \App\Models\About::latest()->get();
    $skill = \App\Models\Skill::latest()->get();
    $experience = \App\Models\Experience::latest()->get();
    $education = \App\Models\Education::latest()->get();
    $categories = \App\Models\Category::orderBy('category_name')->get();
    $projects = \App\Models\Project::latest()->get();
    $tag = \App\Models\Tag::latest()->get();
    $postCategory = \App\Models\BlogCategory::latest()->get();
    $postPost = \App\Models\BlogPost::latest()->get();
    $message = \App\Models\Contact::latest()->get();
    $users = \App\Models\User::find(Auth::id());
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ !empty($users->profile_photo) ? url('uploads/admin_images/'.$users->profile_photo) : url('uploads/no_image.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ ($route ==  'dashboard') ? 'active':'' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hero.part') }}" class="nav-link {{ ($route ==  'hero.part') ? 'active':'' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Hero Part
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ ($prefix ==  '/about') ? 'menu-is-opening menu-open':'' }} ">
                    <a href="#" class="nav-link {{ ($prefix ==  '/about') ? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            About
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">4</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('main') }}" class="nav-link {{ ($route ==  'main') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>About Main</p>
                                <span class="badge badge-warning right">{{ count($about) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('skill') }}" class="nav-link {{ ($route ==  'skill') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skills</p>
                                <span class="badge badge-warning right">{{ count($skill) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('experience') }}" class="nav-link {{ ($route ==  'experience') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Experince</p>
                                <span class="badge badge-warning right">{{ count($experience) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('education') }}" class="nav-link {{ ($route ==  'education') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Education</p>
                                <span class="badge badge-warning right">{{ count($education) }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ ($prefix ==  '/portfolio') ? 'menu-is-opening menu-open':'' }} ">
                    <a href="#" class="nav-link {{ ($prefix ==  '/portfolio') ? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Portfolio
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.view') }}" class="nav-link {{ ($route ==  'category.view') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category View</p>
                                <span class="badge badge-warning right">{{ count($categories) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('portfolio.add') }}" class="nav-link {{ ($route ==  'portfolio.add') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Portfolio Add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('portfolio.manage') }}" class="nav-link {{ ($route ==  'portfolio.manage') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Portfolio Manage</p>
                                <span class="badge badge-warning right">{{ count($projects) }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ ($prefix ==  '/tag') ? 'menu-is-opening menu-open':'' }} ">
                    <a href="#" class="nav-link {{ ($prefix ==  '/tag') ? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Tag
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">1</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tag.view') }}" class="nav-link {{ ($route ==  'tag.view') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tag View</p>
                                <span class="badge badge-warning right">{{ count($tag) }}</span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item {{ ($prefix ==  '/blog') ? 'menu-is-opening menu-open':'' }} ">
                    <a href="#" class="nav-link {{ ($prefix ==  '/blog') ? 'active':'' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">3</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('blog.view') }}" class="nav-link {{ ($route ==  'blog.view') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Category</p>
                                <span class="badge badge-warning right">{{ count($postCategory) }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.post') }}" class="nav-link {{ ($route ==  'add.post') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Blog Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('list.post') }}" class="nav-link {{ ($route ==  'list.post') ? 'active':'' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Post</p>
                                <span class="badge badge-warning right">{{ count($postPost) }}</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.manage') }}" class="nav-link {{ ($route ==  'contact.manage') ? 'active':'' }}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>Contact Manage</p>
                        <span class="badge badge-warning right">{{ count($message) }}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
