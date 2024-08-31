@extends('users.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="tax_filing">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card border card-primary shadow m-2">
                        <div class="card-header">
                            <h5 class="card-title">Sent Messages</h5>
                        </div>
                        <div class="card-body">
                            <div class="div">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->messages as $messages)
                                        <tr>
                                            <td>{{ $messages->subject }}</td>
                                            <td>{{ $messages->message }}</td>
                                            <td>{{ $messages->created_at }}</td>
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
