<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Bank Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ url('/bank_details') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="bank_name">Bank Name<span
                                class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <input type="text" name="bank_name" value="{{ Auth::user()->bank_details->bank_name }}" class="form-control"
                            placeholder="Bank Name" >
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
                        <input type="text" name="Routing_number" value="{{ Auth::user()->bank_details->routing_number }}" class="form-control"
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
                        <input type="text" name="Bank_Account_Number"  value="{{ Auth::user()->bank_details->bank_acc_number }}" class="form-control"
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
                        <input type="text" name="Bank_Account_Type" value="{{ Auth::user()->bank_details->bank_acc_type }}" class="form-control"
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
                        <input type="text" name="ip_pin" value="{{ Auth::user()->bank_details->ip_pin }}" class="form-control"
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
