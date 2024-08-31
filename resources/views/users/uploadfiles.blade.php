@extends('users.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="tax_filing">
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                <div class="card border">
                    <div class="card-header" style="background: #ff0000;">
                        <label style="font-size: 20px" class="text-white m-0 p-0">U.S Tax
                                Information Word Document - <a class="btn btn-dark" href="/uploads/GTF.pdf">Click Here</a></label>
                    </div>
                </div>
                <div class="card border">
                    <div class="card-header" style="background: #1dd639 ;">
                        <label style="font-size: 20px" class="text-white m-0 p-0">Indian Tax
                                Information Word Document - <a class="btn btn-dark" href="/uploads/GTF.pdf">Click Here</a></label>
                    </div>
                </div>
                <div class="container-fluid d-flex" style="justify-content: space-between">
                    <div>

                        <div class="card border">
                            <div class="body">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Upload File</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ url('/upload_files') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @if (session('success'))
                                                <div class="alert alert-success text-center">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="year">Year</label>
                                                    </div>
                                                    <div class="col col">
                                                        <input type="text" name="year" id="year"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="file_name">File Name</label>
                                                    </div>
                                                    <div class="col col">
                                                        <input type="text" name="file_name" id="file_name"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="US_Tax_Doc">U.S issued Tax Documents</label>
                                                    </div>
                                                    <div class="col col">
                                                        <select name="US_Tax_Doc" id="US_Tax_Doc" class="form-control"
                                                            required>
                                                            <option value="W-2 - Tax payer">W-2 - Tax payer</option>
                                                            <option value="W-2 - Tax payer 2nd Emp">W-2 - Tax payer 2nd Emp
                                                            </option>
                                                            <option value="W-2 - Spouse">W-2 - Spouse</option>
                                                            <option value="W-2 - Spouse 2nd Emp">W-2 - Spouse 2nd Emp
                                                            </option>
                                                            <option value="Form 1099-INT-Interest  Income">Form
                                                                1099-INT-Interest Income</option>
                                                            <option value="Form 1099-DIV - Dividend Income">Form 1099-DIV -
                                                                Dividend Income</option>
                                                            <option
                                                                value="Form 1099-B-Proceeds From Broker and Barter Exchange Transactions">
                                                                Form 1099-B-Proceeds From Broker and Barter Exchange
                                                                Transactions</option>
                                                            <option
                                                                value="Form 3922/3921-Employee Stock PurchasePlan/Exercise of an Incentive Stock Option">
                                                                Form 3922/3921-Employee Stock PurchasePlan/Exercise of an
                                                                Incentive Stock Option</option>
                                                            <option value="Form 1099-G-Certain Government Payments">Form
                                                                1099-G-Certain Government Payments</option>
                                                            <option value="Form 1099-MISC-Miscellaneous Income">Form
                                                                1099-MISC-Miscellaneous Income</option>
                                                            <option value="Form 1099-R-Pension or Retirement Income">Form
                                                                1099-R-Pension or Retirement Income</option>
                                                            <option
                                                                value="Form 1099-SA-Distributions From an HSA, Archer MSA, or Medicare Advantage MSA">
                                                                Form 1099-SA-Distributions From an HSA, Archer MSA, or
                                                                Medicare
                                                                Advantage MSA</option>
                                                            <option
                                                                value="Schedule K1-Partner’s Share of Income, Deductions, Credits, etc">
                                                                Schedule K1-Partner’s Share of Income, Deductions, Credits,
                                                                etc
                                                            </option>
                                                            <option value="Rental Income and Expenses Statement">Rental
                                                                Income
                                                                and Expenses Statement</option>
                                                            <option
                                                                value="Form 1042-S-Foreign Person’s U.S. Source Income Subject to Withholding">
                                                                Form 1042-S-Foreign Person’s U.S. Source Income Subject to
                                                                Withholding</option>
                                                            <option value="Form W2G-Lottery or Gambling Winning and Losses">
                                                                Form
                                                                W2G-Lottery or Gambling Winning and Losses</option>
                                                            <option value="Form 1099 -SSA-Social Security Benefits">Form
                                                                1099
                                                                -SSA-Social Security Benefits</option>
                                                            <option
                                                                value="Form 1099-S-Proceeds From Real Estate Transactions">
                                                                Form 1099-S-Proceeds From Real Estate Transactions</option>
                                                            <option
                                                                value="Form 1099-K-Payment Card and Third Party Network Transactions">
                                                                Form 1099-K-Payment Card and Third Party Network
                                                                Transactions
                                                            </option>
                                                            <option value="Form 1098-HMI-Mortgage Interest Statement">Form
                                                                1098-HMI-Mortgage Interest Statement</option>
                                                            <option value="Real Estate and Personal Property Taxes Paid">
                                                                Real
                                                                Estate and Personal Property Taxes Paid</option>
                                                            <option value="Solar Energy System Disclosure Document">Solar
                                                                Energy
                                                                System Disclosure Document</option>
                                                            <option value="Motor Vehicle Order Agreement Document">Motor
                                                                Vehicle
                                                                Order Agreement Document</option>
                                                            <option value="Form 1098-E-Student Loan Interest Statement">Form
                                                                1098-E-Student Loan Interest Statement</option>
                                                            <option value="Form 1098-T-Tuition Statement">Form
                                                                1098-T-Tuition
                                                                Statement</option>
                                                            <option value="Other">Other</option><br>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="US_Other_Doc">Other Tax Documents</label>
                                                    </div>
                                                    <div class="col col">
                                                        <input type="file" name="US_Other_Doc" id="US_Other_Doc"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="IND_Tax_Doc">India issued Tax Documents</label>
                                                    </div>
                                                    <div class="col col">
                                                        <select id="IND_Tax_Doc" name="IND_Tax_Doc" class="form-control"
                                                            required>
                                                            <option value="Other">Other</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="IND_Other_Doc">Other Tax Documents</label>
                                                    </div>
                                                    <div class="col col">
                                                        <input type="file" name="IND_Other_Doc" id="IND_Other_Doc"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="comments">Comment</label>
                                                    </div>
                                                    <div class="col col">
                                                        <textarea cols="10" rows="3" name="comments" id="comments" class="form-control" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="Upload_file">Select File</label>
                                                    </div>
                                                    <div class="col col">
                                                        <input type="file" name="Upload_file" id="Upload_file"
                                                            class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn  btn-primary">Upload</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.card-body -->
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card border" style="width: 90%">
                        <div class="body">
                            <div class="card" style="width: 100%">
                                <div class="card-header" style="background-color: #007bff;">
                                    <h3 class="card-title" style="color: #fff;">Files</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table" width="100%">
                                        <tr>
                                            <th>SNo</th>
                                            <th>File Name</th>
                                            <th>U.S Other Doc</th>
                                            <th>INDIA Other Doc</th>
                                            <th>Tax File</th>
                                            <th>Action</th>
                                        </tr>
                                        <?php $count = 1; ?>
                                        @foreach (Auth::user()->UploadFiles as $upload)
                                            <tr>
                                                <td><?php print $count++; ?></td>
                                                <td>{{ $upload->file_name }}</td>
                                                <td><a href="{{ asset('uploads/' . $upload->us_other_doc) }}">View</a></td>
                                                <td><a href="{{ asset('uploads/' . $upload->ind_other_doc) }}">View</a></td>
                                                <td><a href="{{ asset('uploads/' . $upload->upload_file) }}">View</a></td>
                                                <td><a href="{{ url('/delete_upload_files/' . $upload->id) }}"
                                                        class="btn btn-danger m-0"><i class="fas fa-trash"></i></a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
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
