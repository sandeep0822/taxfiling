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
                            <h5 class="card-title">Refer your Friends / Colleagues / Relatives</h5>
                        </div>
                        <div class="card-body">
                            <label class="text-muted">Refer your friends, colleagues and earn $10 for each paid
                                referral.</label>
                            <div class="div">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Email ID</th>
                                            <th scope="col">Phone 1</th>
                                            <th scope="col">Referred Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Auth::user()->referrals as $refer)
                                        <tr>
                                            <td>{{ $refer->first_name }}</td>
                                            <td>{{ $refer->email }}</td>
                                            <td>{{ $refer->phone }}</td>
                                            <td>{{ $refer->created_at }}</td>
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
