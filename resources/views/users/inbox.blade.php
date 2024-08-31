<?php
use App\Models\message;
?>
@extends('users.includes.header')
@section('content')
    @include('users.includes.Referrals_menu')
    <!-- Content Wrapper. Contains page content -->
    <div class="tax_filing">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card border card-primary shadow m-2">
                        <div class="card-header">
                            <h5 class="card-title">Inbox Messages</h5>
                        </div>
                        <div class="card-body">
                            <div class="div">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">User</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($msgs as $msg)
                                            <tr>
                                                <td>Admin</td>
                                                <td><b>"{{ $msg->subject   }}"</b></td>
                                                <td>{{ $msg->message }}</td>
                                            </tr>
                                        @endforeach
                                        @foreach ($replymsgs as $msg)
                                            <tr>
                                                <td>Admin</td>
                                                <td>Replied to <b>"{{ message::find($msg->messages_id)->subject   }}"</b></td>
                                                <td>{{ $msg->message }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
