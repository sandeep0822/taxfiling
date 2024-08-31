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
                                <form action="{{ url('/addreferrals') }}" method="POST">
                                    @csrf
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">First Name<span class="required">*</span></th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Email ID</th>
                                                <th scope="col">Phone 1<span class="required">*</span></th>
                                                <th scope="col">Phone 2 (Optional)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name[]"
                                                            placeholder="Enter First Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="last_name[]"
                                                            placeholder="Enter Last Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Email[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone1[]"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone2[]"
                                                            placeholder="Enter Alternative Number">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name[]"
                                                            placeholder="Enter First Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="last_name[]"
                                                            placeholder="Enter Last Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Email[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone1[]"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone2[]"
                                                            placeholder="Enter Alternative Number">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name[]"
                                                            placeholder="Enter First Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="last_name[]"
                                                            placeholder="Enter Last Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Email[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone1[]"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone2[]"
                                                            placeholder="Enter Alternative Number">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">4</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name[]"
                                                            placeholder="Enter First Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="last_name[]"
                                                            placeholder="Enter Last Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Email[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone1[]"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone2[]"
                                                            placeholder="Enter Alternative Number">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">5</th>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="first_name[]"
                                                            placeholder="Enter First Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="last_name[]"
                                                            placeholder="Enter Last Name">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="Email[]"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone1[]"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="phone2[]"
                                                            placeholder="Enter Alternative Number">
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Add Refferals</button>
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
