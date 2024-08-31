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
                            @if (Auth::user()->bank_details)
                                @include('users.includes.data_show.bankdetails')
                            @else
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Bank Details</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ url('/bank_details') }}" method="POST" id="bankdetails">
                                        @csrf
                                        <div class="card-body">
                                            @if (Auth::user()->income_doc)
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <div class="alert alert-danger w-50 text-center">
                                                        Fill the Previous steps
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="bank_name">Bank Name<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" name="bank_name" class="form-control"
                                                            placeholder="Bank Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="Routing_number">Routing Number<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" name="Routing_number" class="form-control"
                                                            placeholder="Routing Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="B_A_N">Bank Account Number:<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" name="Bank_Account_Number" class="form-control"
                                                            placeholder="Bank Account Number" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="B_A_T">Bank Account Type:<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" name="Bank_Account_Type" class="form-control"
                                                            placeholder="Bank Account Type" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="ip_pin">IP PIN:<span class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" name="ip_pin" class="form-control"
                                                            placeholder="IP Pin" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="w-50">
                                                <b>If you don't have IP PIN, To protect your identity please use the below
                                                    link
                                                    to generate an IP PIN
                                                    <a href="https://www.irs.gov/identity-theft-fraud-scams/get-an-identity-protection-pin"
                                                        target="_blank">
                                                        https://www.irs.gov/identity-theft-fraud-scams/get-an-identity-protection-pin</a></b>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn  btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.card-body -->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    @if (Auth::user()->income_doc)
    @else
    <script>
        var form = document.getElementById("bankdetails");
        var elements = form.elements;
        for (var i = 0, len = elements.length; i < len; ++i) {
            elements[i].readOnly = true;
        }
    </script>
    @endif
@endsection
