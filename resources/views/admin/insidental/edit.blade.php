<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ trans('global.site_title') }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">

            </form>

            <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('dist/img/Logo1b.png')}}" alt="AdminLTE Logo" width="200" height="60" style="opacity: .8">
                <!-- <span class="brand-text font-weight-light">SIDAK CMS</span> -->
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{$userLogin}}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route("admin.index") }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>


                        @can('warga_access')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Warga
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route("admin.warga.index") }}" class="nav-link {{ request()->is('admin/warga') || request()->is('admin/warga/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List Warga</p>
                                    </a>
                                </li>
                                @can('import_warga_show')
                                <li class="nav-item">
                                    <a href="{{ route("admin.warga.index") . '?is_import=true'}}" class="nav-link {{ request()->is('admin/warga?is_import=true') || request()->is('admin/warga?is_import=true') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Import Excel</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                        @can('keuangan_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.keuangan.index") }}" class="nav-link {{ request()->is('admin/keuangan') || request()->is('admin/keuangan/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Keuangan
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('event_access')
                        <li class="nav-item active">
                            <a href="{{ route("admin.event.index") }}" class="nav-link {{ request()->is('admin/event') || request()->is('admin/event/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Event
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('insidental_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.insidental.index") }}" class="nav-link {{ request()->is('admin/insidental') || request()->is('admin/insidental/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Insidental
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>
                        @endcan
                        @can('history_warga_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.history_warga.index") }}" class="nav-link {{ request()->is('admin/history_warga') || request()->is('admin/history_warga  /*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>History Warga</p>
                            </a>
                        </li>
                        @endcan
                        @can('sdm_access')
                        <li class="nav-item">
                            <a href="{{ route("admin.sdm.index") }}" class="nav-link {{ request()->is('admin/sdm') || request()->is('admin/sdm  /*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>SDM</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Master Data
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('rt_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rt.index") }}" class="nav-link {{ request()->is('admin/rt') || request()->is('admin/rt/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>RT</p>
                                    </a>
                                </li>
                                @endcan
                                @can('rw_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rw.index") }}" class="nav-link {{ request()->is('admin/rw') || request()->is('admin/rw/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>RW</p>
                                    </a>
                                </li>
                                @endcan
                                @can('kelurahan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kelurahan.index") }}" class="nav-link {{ request()->is('admin/kelurahan') || request()->is('admin/kelurahan/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kelurahan</p>
                                    </a>
                                </li>
                                @endcan
                                @can('master_alamat_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.master_alamat.index") }}" class="nav-link {{ request()->is('admin/master_alamat') || request()->is('admin/master_alamat/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Address Code</p>
                                    </a>
                                </li>
                                @endcan
                                @can('master_agama_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.master_agama.index") }}" class="nav-link {{ request()->is('admin/master_agama') || request()->is('admin/master_agama/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Agama</p>
                                    </a>
                                </li>
                                @endcan
                                @can('master_pekerjaan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.master_pekerjaan.index") }}" class="nav-link {{ request()->is('admin/master_pekerjaan') || request()->is('admin/master_pekerjaan/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pekerjaan</p>
                                    </a>
                                </li>
                                @endcan
                                @can('master_gaji_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.master_gaji.index") }}" class="nav-link {{ request()->is('admin/master_gaji') || request()->is('admin/master_gaji/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gaji</p>
                                    </a>
                                </li>
                                @endcan
                                @can('pendidikan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pendidikan.index") }}" class="nav-link {{ request()->is('admin/pendidikan') || request()->is('admin/pendidikan/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pendidikan</p>
                                    </a>
                                </li>
                                @endcan
                                @can('sekolah_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sekolah.index") }}" class="nav-link {{ request()->is('admin/sekolah') || request()->is('admin/sekolah/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Sekolah</p>
                                    </a>
                                </li>
                                @endcan
                                @can('wilayah_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.wilayah.index") }}" class="nav-link {{ request()->is('admin/wilayah') || request()->is('admin/wilayah  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Wilayah</p>
                                    </a>
                                </li>
                                @endcan
                                @can('history_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.history_category.index") }}" class="nav-link {{ request()->is('admin/history_category') || request()->is('admin/history_category  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Histori</p>
                                    </a>
                                </li>
                                @endcan
                                @can('keuangan_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.keuangan_category.index") }}" class="nav-link {{ request()->is('admin/keuangan_category') || request()->is('admin/keuangan_category  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Keuangan</p>
                                    </a>
                                </li>
                                @endcan
                                @can('event_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.event_category.index") }}" class="nav-link {{ request()->is('admin/event_category') || request()->is('admin/event_category  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Event</p>
                                    </a>
                                </li>
                                @endcan
                                @can('insidental_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.insidental_category.index") }}" class="nav-link {{ request()->is('admin/insidental_category') || request()->is('admin/insidental_category  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori Insidental</p>
                                    </a>
                                </li>
                                @endcan
                                @can('sdm_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.sdm_category.index") }}" class="nav-link {{ request()->is('admin/sdm_category') || request()->is('admin/sdm_category  /*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kategori SDM</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Setting
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                                @endcan
                                @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                                @endcan
                                @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Users</p>
                                    </a>
                                </li>
                                @endcan
                                @can('change_password_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.edit_password.index") }}" class="nav-link {{ request()->is('admin/edit_password') || request()->is('admin/edit_password/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Change Password</p>
                                    </a>
                                </li>
                                @endcan
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_keuangan' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Keuangan</p>
                                    </a>
                                <li class="nav-item">
                                    <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_event' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Event</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route("admin.report_data_masyarakat_km.index") . '?report_pergerakan_warga' }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Report Pergerakan Warga</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("admin.logout.index") }}" class="nav-link {{ request()->is('admin/logout') || request()->is('admin/logout/*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Logout
                                    <!-- <span class="right badge badge-danger">New</span> -->
                                </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>List Insidental</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ route("admin.index") }}">Home</a></li>
                                <li class="breadcrumb-item active">List Insidental</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- /.card -->
                            @section('content')
                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form action="{{ route("admin.insidental.update", [$insidental->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group {{ $errors->has('ins_name') ? 'has-error' : '' }}">
                                            <label for="ins_name">{{ trans('global.insidental.fields.ins_name') }}*</label>
                                            <input type="text" id="ins_name" name="ins_name" class="form-control" value="{{ old('ins_name', isset($insidental) ? $insidental->ins_name : '') }}" required>
                                            @if($errors->has('ins_name'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('ins_name') }}
                                            </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('global.insidental.fields.ins_name_helper') }}
                                            </p>
                                        </div>
                                        <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                                            <label for="ins_category">{{ trans('global.insidental.fields.ins_category') }}*
                                                <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                                                <select name="ins_category" id="ins_category" class="form-control select2" required>
                                                    <option selected disabled>Select Category</option>
                                                    @foreach($ins_category as $id => $ins_category)
                                                    <option value="{{ $id }}" {{ (isset($insidental) && $insidental->ins_category == $id) ? 'selected' : '' }}>
                                                        {{ $ins_category }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('ins_category'))
                                                <em class="invalid-feedback">
                                                    {{ $errors->first('ins_category') }}
                                                </em>
                                                @endif
                                                <p class="helper-block">
                                                    {{ trans('global.insidental.fields.ins_category_helper') }}
                                                </p>
                                        </div>
                                        <!-- <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.insidental.fields.ins_category') }}*</label>
                <input type="text" id="ins_category" name="ins_category" class="form-control" value="{{ old('ins_category', isset($insidental) ? $insidental->ins_category : '') }}">
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_category_helper') }}
                </p>
            </div> -->
                                        <div class="form-group {{ $errors->has('ins_detail') ? 'has-error' : '' }}">
                                            <label for="ins_detail">{{ trans('global.insidental.fields.ins_detail') }}</label>
                                            <textarea id="ins_detail" name="ins_detail" class="form-control " required>{{ old('ins_detail', isset($insidental) ? $insidental->ins_detail : '') }}</textarea>
                                            @if($errors->has('ins_detail'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('ins_detail') }}
                                            </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('global.insidental.fields.ins_detail_helper') }}
                                            </p>
                                        </div>

                                        <div class="form-group {{ $errors->has('ins_date') ? 'has-error' : '' }}">
                                            <label for="ins_date">{{ trans('global.insidental.fields.ins_date') }}*</label>
                                            <input type="date" id="ins_date" name="ins_date" class="form-control" value="{{ old('ins_date', isset($insidental) ? date('Y-m-d', strtotime($insidental->ins_date)) : '') }}" required>
                                            @if($errors->has('ins_date'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('ins_date') }}
                                            </em>
                                            @endif
                                            <p class="helper-block">
                                                {{ trans('global.insidental.fields.ins_date_helper') }}
                                            </p>
                                        </div>
                                        <input type="text" id="id_rt" name="id_rt" class="form-control" value="{{$user}}" hidden>

                                        <div>
                                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.0.5
        </div>
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>