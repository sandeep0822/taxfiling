@extends('users.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="tax_filing">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        @include('users.includes.taxfiling_menu')
                        <div class="body">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tax Summary</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8 d-flex align-items-center">
                                                <label>You can review your tax summary with in 48 hours after providing
                                                    personal information and source documents.</label>
                                            </div>
                                            <div class="col-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Direct Contact:</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="w-100">
                                                            <tr>
                                                                <td>Name:</td>
                                                                <td>Rafiq</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Desk Number:</td>
                                                                <td>+1 415-851-4219</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- /.card-body -->
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
