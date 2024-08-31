<?php
use App\Models\bank_details;
use App\Models\basic_info;
use App\Models\contact_details;
use App\Models\income_details;
use App\Models\residency_details;
use App\Models\spouse_details;
?>
@extends('admin.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <h1>Add/Edit User</h1>
                    </div>
                    <div class="col-sm-2 text-center">
                        <a href="{{ url('admin/users') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-3 overflow-hidden ">
                        <form method="POST" action="{{ url('/admin/user/create') }}" class="form-horizontal">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('register_success'))
                                <div class="alert alert-success">
                                    {{ session('register_success') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-user"></i> Username</span>
                                <input name="username" class="form-control" type="text" placeholder="Username" required>
                                <span id="username_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i> Email</span>
                                <input name="email" class="form-control" type="email" placeholder="Email" required>
                                <span id="email_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i> Password</span>
                                <input name="password" class="form-control" type="password" placeholder="Password" required>
                                <span id="password_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-phone"></i> Phone Number</span>
                                <input name="phone" class="form-control" type="number" placeholder="Phone Number"
                                    required>
                                <span id="phone_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-tasks"></i> Role</span>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">--select--</option>
                                    <option value="2">Sub Admin</option>
                                    <option value="3">Client</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Register</button>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
@endsection
