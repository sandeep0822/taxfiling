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
                        <h1>Documents</h1>
                    </div>
                    <div class="col-sm-2 text-center">
                        <a href="{{ url('admin/document') }}" class="btn btn-success">Add Documents</a>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-3 overflow-hidden ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>U.S Tax</th>
                                    <th>Indian Tax</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $item)
                                    <td>{{ $item->id }}</td>
                                    <td><a href="/documents/{{ $item->us_tax }}" target="_blank">View</a></td>
                                    <td><a href="/documents/{{ $item->indian_tax }}" target="_blank">View</a></td>
                                    <td>
                                        <a class="btn btn-danger" onclick="return confirm('Want to delete documents?')" href="{{ url('/admin/delete_documents', $item->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
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
