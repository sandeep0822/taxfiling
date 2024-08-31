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
                        <h1>Messages</h1>
                    </div>
                    <div class="com-sm-6 w-100">
                        <div class="float-right">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">New
                                Message</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/compose') }}" method="POST">
                            @csrf
                                <select class="selectpicker border form-control" name="userid" data-live-search="true" title="Choose User">
                                    @foreach ($users as $user)
                                        <option data-tokens="{{ $user->username }}">{{ $user->username }}</option>
                                    @endforeach
                                </select>
                            <div class="form-group mt-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea cols="30" name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-3 overflow-hidden ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sent By</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($msgs as $msg)
                                    <tr>
                                        <td>{{ User::find($msg->user_id)->username }}</td>
                                        <td>{{ $msg->subject }}</td>
                                        <td>{{ $msg->message }}</td>
                                        <td><a href="/view/message/{{ $msg->id }}">View</a></td>
                                    </tr>
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
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": false
            });


        });
    </script>
@endsection

{{--
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
              <table class="table table-head-fixed text-nowrap" style="width: 100% !important">
                <thead>
                  <tr>
                    <th>Refferred By</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($msgs as $msg)
                        <tr>
                            <td>{{ User::find($msg->user_id)->username  }}</td>
                            <td style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: clip;">{{ $msg->subject  }}</td>
                            <td style="white-space: nowrap;
                            overflow: hidden;
                            text-overflow: clip;">{{ $msg->message  }}</td>
                            <td><a>View</a></td>
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
@endsection --}}
