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
                        <h1>Generate New Password</h1>
                    </div>
                    <div class="col-sm-2 text-center">
                        <a href="{{ url('admin/ActiveClients') }}" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-3 overflow-hidden ">
                        <form method="POST" action="{{ url('/admin/user/update_password') }}" class="form-horizontal">
                            @csrf
                            @method('put')
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
                                <input name="id" class="form-control" type="text" value="{{ $user->id }}" hidden>
                                <input name="username" class="form-control" type="text" value="{{ $user->username }}" placeholder="Username" readonly>
                                <span id="username_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-envelope"></i> Email</span>
                                <input name="email" class="form-control" type="email" value="{{ $user->email }}" placeholder="Email" readonly>
                                <span id="email_error"></span>
                            </div>
                            <div class="form-group">
                                <span class="input-icon"><i class="fa fa-lock"></i> New Password</span>
                                <input name="password" class="form-control" type="password" placeholder="Please enter the password" required>
                                <span id="password_error"></span>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
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
