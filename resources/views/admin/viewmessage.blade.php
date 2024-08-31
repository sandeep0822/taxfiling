<?php
use App\Models\User;
?>
@extends('admin.includes.header')
@section('content')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('/reply/'.$msg->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Message<span class="required">*</span></label>
                <textarea class="form-control" name="message" placeholder="Message"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col">
                        <h1>View Message</h1>
                        <div class="float-right">
                            <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">Reply</button>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-1"><b>User:</b></div>
                            <div class="col-6">{{ User::find($msg->user_id)->username }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1"><b>Subject:</b></div>
                            <div class="col-6">{{ $msg->subject }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1"><b>Message:</b></div>
                            <div class="col-6">{{ $msg->message }}</div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
            <div class="container-fluid">
                <div class="container">
                    <div class="card p-3">
                        <h4 class="mb-3">
                           <u> Replies</u>
                        </h4>
                        @foreach ($replymsgs as $reply)
                        <div class="row">
                            <div class="col-6">{{ User::find($reply->user_id)->username }} Replied: <b>"{{ $reply->message }}"</b></div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div><!-- /.container-fluid -->

        </section>



    </div>
    <!-- /.content-wrapper -->
@endsection
