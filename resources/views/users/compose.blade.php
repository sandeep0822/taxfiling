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
                            <h5 class="card-title">Compose</h5>
                        </div>
                        <div class="card-body">
                            <div class="div">
                                <form action="{{ url('/Messages/compose') }}" method="POST">
                                    @csrf
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="width: 50%" >Subject<span class="required">*</span></th>
                                            <th >
                                                <div class="form-group">
                                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th  style="width: 50%">Message<span class="required">*</span></th>
                                            <th>
                                                <div class="form-group">
                                                    <textarea cols="30" name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <hr>
                                <div>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
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
