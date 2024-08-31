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
                            @if (Auth::user()->basic_info && Auth::user()->contact_details && Auth::user()->residency_details)
                                @include('users.includes.data_show.taxfiling')
                            @else
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Information</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ url('/basic_info') }}" method="POST">
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="marital_status">Marital Status<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <select class="form-control" id="marital_status"
                                                            name="marital_status" required>
                                                            <option selected value="Single">Single</option>
                                                            <option value="Marriage">Married</option>
                                                            <option value="Divorce">Divorced</option>
                                                            <option value="Head">Head of Household</option>
                                                            <option value="Widow">Widowed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="name">Name(As per SSN)<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-8">
                                                        <div class="d-flex">
                                                            <input type="text" class="form-control" id="name"
                                                                name="name[]" placeholder="First Name" required>
                                                            <input type="text" class="form-control"
                                                                id="name"name="name[]" placeholder="Middle Name"
                                                                required>
                                                            <input type="text" class="form-control"
                                                                id="name"name="name[]" placeholder="Last Name"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="ssn">SSN<span class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" class="form-control" id="ssn"
                                                            name="SSN" placeholder="SSN" required>
                                                    </div>
                                                    <div class="col col-2" style="justify-content: right">
                                                        <label for="occupation">Occupation<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" class="form-control" id="occupation"
                                                            name="Occupation" placeholder="Occupation" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="DOB">Date Of Birth<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="date" class="form-control" id="DOB"
                                                            name="Date_of_Birth" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="F_D_E_US">First Date of Entry in US<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="date" class="form-control" id="F_D_E_US"
                                                            name="First_Date_of_Entry_in_US" required>
                                                    </div>
                                                    <div class="col col-2" style="justify-content: right">
                                                        <label for="citizenship">Citizenship<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <input type="text" class="form-control" id="citizenship"
                                                            name="Citizenship" placeholder="Citizenship" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="type_of_visa">Type of Visa<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <select class="form-control" id="type_of_visa"
                                                            name="type_of_visa" required>
                                                            <option selected value="F1">F1</option>
                                                            <option value="H1B">H1B</option>
                                                            <option value="L1">L1</option>
                                                            <option value="J1">J1</option>
                                                            <option value="Greencard">Greencard</option>
                                                            <option value="Citizen">Citizen</option>
                                                            <option value="C1">C1</option>
                                                            <option value="E1">E1</option>
                                                            <option value="TN Visa">TN Visa</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5><b> Contact Details</b></h5>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="Address">Current Address<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-8">
                                                        <div class="d-flex">
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="Address" required>
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="City" required>
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="Apt No" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                    </div>
                                                    <div class="col col-8">
                                                        <div class="d-flex">
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="State" required>
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="Zip" required>
                                                            <input type="text" class="form-control" id="Address"
                                                                name="address[]" placeholder="Country" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="Contact">Contact<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-10">
                                                        <div class="d-flex">
                                                            <input type="text" class="form-control" id="Contact"
                                                                name="Phone" placeholder="Primary Number" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col col-2">
                                                        <label for="time_zone">Time Zone<span
                                                                class="required">*</span></label>
                                                    </div>
                                                    <div class="col col-2">
                                                        <select class="form-control" id="time_zone" name="time_zone"
                                                            required>
                                                            <option selected value="America/New_York">EST</option>
                                                            <option value="America/Chicago">CST</option>
                                                            <option value="America/Phoenix">MST</option>
                                                            <option value="America/Los_Angeles">PST</option>
                                                            <option value="Asia/Calcutta">IST</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h5><b> Residency Details for States</b></h5>
                                            <table width="70%">
                                                <tr>
                                                    <th>Tax Year</th>
                                                    <th>States Resided</th>
                                                    <th>Period of stay (Start and End Date)</th>
                                                </tr>
                                                <tr>
                                                    <td>2022</td>
                                                    <td>
                                                        <div class="form-group w-75">
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2022[]" class="form-control"
                                                            >
                                                            <br>
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2022[]" class="form-control"
                                                            >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2022[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2022[]">
                                                        </div>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2022[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2022[]">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2021</td>
                                                    <td>
                                                        <div class="form-group w-75">
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2021[]" class="form-control"
                                                            >
                                                            <br>
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2021[]" class="form-control"
                                                            >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2021[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2021[]">
                                                        </div>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2021[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2021[]">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2020</td>
                                                    <td>
                                                        <div class="form-group w-75">
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2020[]" class="form-control"
                                                            >
                                                            <br>
                                                            <input placeholder="State Resided" type="text"
                                                                name="residence_states_2020[]" class="form-control"
                                                            >
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2020[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2020[]">
                                                        </div>
                                                        <div class="form-group w-75 d-flex">
                                                            <input type="date" class="form-control"
                                                                name="startdate_2020[]">-
                                                            <input type="date" class="form-control"
                                                                name="enddate_2020[]">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn  btn-primary">Save & Next</button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </form>
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
