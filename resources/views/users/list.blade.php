@extends('users.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="list_users">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <!-- Default box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">5 Easy steps to process your tax return</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"
                                            title="Remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <ol>
                                        <li>Select your filing year. </li>
                                        <li>Update Personal Info.</li>
                                        <li>Upload tax documents (W2, 1099-INT etc)</li>
                                        <li>View tax summary and make payment</li>
                                        <li>Review your tax return, Confirm it and File your tax return.</li>
                                    </ol>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
