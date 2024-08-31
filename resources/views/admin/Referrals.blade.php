<?php
use App\Models\User;
?>
@extends('admin.includes.header')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Referrals</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
           <!-- /.row -->
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th>Refferred By</th>
                    <th>First Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($Referrals as $refer)
                    <tr>
                      <td>{{ User::find($refer->user_id)->username  }}</td>
                      <td>{{ $refer->first_name }}</td>
                      <td>{{ $refer->phone }}</td>
                      <td>{{ $refer->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
