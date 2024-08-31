@extends('admin.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tax Payer Info</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content pb-5">
            <div class="container-fluid">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Basic Information</h3>
                        </div>
                        <div class="card-body">
                            @if ($basic_info)
                                <form action="{{ url('/tax_payer_edit/' . $user->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col col-2">
                                                <label for="marital_status">Marital Status<span
                                                        class="required">*</span></label>
                                            </div>
                                            <div class="col col-2">
                                                <select class="form-control" id="marital_status" name="marital_status"
                                                    required>
                                                    <option @if ($basic_info->marital_status == 'Single') selected @endif
                                                        value="Single">
                                                        Single
                                                    </option>
                                                    <option @if ($basic_info->marital_status == 'Marriage') selected @endif
                                                        value="Marriage">
                                                        Married</option>
                                                    <option @if ($basic_info->marital_status == 'Divorce') selected @endif
                                                        value="Divorce">
                                                        Divorced</option>
                                                    <option @if ($basic_info->marital_status == 'Head') selected @endif
                                                        value="Head">
                                                        Head of
                                                        Household
                                                    </option>
                                                    <option @if ($basic_info->marital_status == 'Widow') selected @endif
                                                        value="Widow">
                                                        Widowed
                                                    </option>
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
                                                    <input type="text" class="form-control" id="name" name="name[]"
                                                        value="{{ explode(' ', $basic_info->full_name)[0] }}"
                                                        placeholder="First Name" required>
                                                    <input type="text" class="form-control"
                                                        id="name"name="name[]"value="{{ explode(' ', $basic_info->full_name)[1] }}"
                                                        placeholder="Middle Name" required>
                                                    <input type="text" class="form-control"
                                                        id="name"name="name[]"value="{{ explode(' ', $basic_info->full_name)[2] }}"
                                                        placeholder="Last Name" required>
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
                                                <input type="text" class="form-control" id="ssn" name="SSN"
                                                    placeholder="SSN"value="{{ $basic_info->ssn }}" required>
                                            </div>
                                            <div class="col col-2 d-flex" style="justify-content: right">
                                                <label for="occupation">Occupation<span class="required">*</span></label>
                                            </div>
                                            <div class="col col-2">
                                                <input type="text" class="form-control" id="occupation" name="Occupation"
                                                    value="{{ $basic_info->occupation }}" placeholder="Occupation" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col col-2">
                                                <label for="DOB">Date Of Birth<span class="required">*</span></label>
                                            </div>
                                            <div class="col col-2">
                                                <input type="date" class="form-control" id="DOB"
                                                    name="Date_of_Birth" value="{{ $basic_info->dob }}" required>
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
                                                <input type="date" class="form-control"
                                                    value="{{ $basic_info->first_date }}" id="F_D_E_US"
                                                    name="First_Date_of_Entry_in_US" required>
                                            </div>
                                            <div class="col col-2" style="justify-content: right">
                                                <label for="citizenship">Citizenship<span
                                                        class="required">*</span></label>
                                            </div>
                                            <div class="col col-2">
                                                <input type="text" class="form-control" id="citizenship"
                                                    value="{{ $basic_info->citizenship }}" name="Citizenship"
                                                    placeholder="Citizenship" required>
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
                                                <select class="form-control" id="type_of_visa" name="type_of_visa"
                                                    required>
                                                    <option @if ($basic_info->visa_type == 'F1') selected @endif
                                                        value="F1">F1
                                                    </option>
                                                    <option @if ($basic_info->visa_type == 'H1B') selected @endif
                                                        value="H1B">
                                                        H1B</option>
                                                    <option @if ($basic_info->visa_type == 'L1') selected @endif
                                                        value="L1">L1
                                                    </option>
                                                    <option @if ($basic_info->visa_type == 'J1') selected @endif
                                                        value="J1">J1
                                                    </option>
                                                    <option @if ($basic_info->visa_type == 'Greencard') selected @endif
                                                        value="Greencard">Greencard</option>
                                                    <option @if ($basic_info->visa_type == 'Citizen') selected @endif
                                                        value="Citizen">Citizen</option>
                                                    <option @if ($basic_info->visa_type == 'C1') selected @endif
                                                        value="C1">
                                                        C1</option>
                                                    <option @if ($basic_info->visa_type == 'E1') selected @endif
                                                        value="E1">
                                                        E1</option>
                                                    <option @if ($basic_info->visa_type == 'TN Visa') selected @endif
                                                        value="TN Visa">TN Visa</option>
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
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[0] }}"
                                                        placeholder="Address" required>
                                                    <input type="text" class="form-control" id="Address"
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[1] }}"
                                                        placeholder="City" required>
                                                    <input type="text" class="form-control" id="Address"
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[2] }}"
                                                        placeholder="Apt No" required>
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
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[3] }}"
                                                        placeholder="State" required>
                                                    <input type="text" class="form-control" id="Address"
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[4] }}"
                                                        placeholder="Zip" required>
                                                    <input type="text" class="form-control" id="Address"
                                                        name="address[]"
                                                        value="{{ explode(',', $contact_details->address)[5] }}"
                                                        placeholder="Country" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col col-2">
                                                <label for="Contact">Contact<span class="required">*</span></label>
                                            </div>
                                            <div class="col col-4">
                                                <div class="d-flex">
                                                    <input type="text" class="form-control" id="Contact"
                                                        name="Phone" value="{{ $contact_details->contact }}"
                                                        placeholder="Primary Number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col col-2">
                                                <label for="time_zone">Time Zone<span class="required">*</span></label>
                                            </div>
                                            <div class="col col-2">
                                                <select class="form-control" id="time_zone" name="time_zone" required>
                                                    <option @if ($contact_details->timezone == 'America/New_York') selected @endif
                                                        value="America/New_York">EST</option>
                                                    <option @if ($contact_details->timezone == 'America/Chicago') selected @endif
                                                        value="America/Chicago">CST</option>
                                                    <option @if ($contact_details->timezone == 'America/Phoenix') selected @endif
                                                        value="America/Phoenix">MST</option>
                                                    <option @if ($contact_details->timezone == 'America/Los_Angeles') selected @endif
                                                        value="America/Los_Angeles">PST</option>
                                                    <option @if ($contact_details->timezone == 'Asia/Calcutta') selected @endif
                                                        value="Asia/Calcutta">IST</option>
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
                                                        name="residence_states_2022[]"
                                                        value="{{ $residency_details[0]->SR_2022 }}"
                                                        class="form-control">
                                                    <br>
                                                    <input placeholder="State Resided" type="text"
                                                        name="residence_states_2022[]"
                                                        value="{{ $residency_details[1]->SR_2022 }}"
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2022[]"
                                                        value="{{ $residency_details[0]->POS_Start_2022 }}">-
                                                    <input type="date" class="form-control" name="enddate_2022[]"
                                                        value="{{ $residency_details[0]->POS_End_2022 }}">
                                                </div>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2022[]"
                                                        value="{{ $residency_details[1]->POS_Start_2022 }}">-
                                                    <input type="date" class="form-control" name="enddate_2022[]"
                                                        value="{{ $residency_details[1]->POS_End_2022 }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2021</td>
                                            <td>
                                                <div class="form-group w-75">
                                                    <input placeholder="State Resided" type="text"
                                                        name="residence_states_2021[]"
                                                        value="{{ $residency_details[0]->SR_2021 }}"
                                                        class="form-control">
                                                    <br>
                                                    <input placeholder="State Resided" type="text"
                                                        name="residence_states_2021[]"
                                                        value="{{ $residency_details[1]->SR_2021 }}"
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2021[]"
                                                        value="{{ $residency_details[0]->POS_Start_2021 }}">-
                                                    <input type="date" class="form-control" name="enddate_2021[]"
                                                        value="{{ $residency_details[0]->POS_End_2021 }}">
                                                </div>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2021[]"
                                                        value="{{ $residency_details[1]->POS_Start_2021 }}">-
                                                    <input type="date" class="form-control" name="enddate_2021[]"
                                                        value="{{ $residency_details[1]->POS_End_2021 }}">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2020</td>
                                            <td>
                                                <div class="form-group w-75">
                                                    <input placeholder="State Resided" type="text"
                                                        name="residence_states_2020[]"
                                                        value="{{ $residency_details[0]->SR_2020 }}"
                                                        class="form-control">
                                                    <br>
                                                    <input placeholder="State Resided" type="text"
                                                        name="residence_states_2020[]"
                                                        value="{{ $residency_details[0]->SR_2020 }}"
                                                        class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2020[]"
                                                        value="{{ $residency_details[0]->POS_Start_2020 }}">-
                                                    <input type="date" class="form-control" name="enddate_2020[]"
                                                        value="{{ $residency_details[0]->POS_End_2020 }}">
                                                </div>
                                                <div class="form-group w-75 d-flex">
                                                    <input type="date" class="form-control" name="startdate_2020[]"
                                                        value="{{ $residency_details[1]->POS_Start_2020 }}">-
                                                    <input type="date" class="form-control" name="enddate_2020[]"
                                                        value="{{ $residency_details[1]->POS_End_2020 }}">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-primary">Edit Details</button>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    <img src="{{ asset('images/icons/usernotfound.png') }}" width="200px">
                                    <h5>No Details Found</h5>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Income Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content pb-5">
            <div class="container-fluid">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Income Docs</h3>
                        </div>
                        <div class="card-body">
                            @if ($income_doc)
                                <form action="{{ url('/income_edit/' . $user->id) }}" method="POST"
                                    enctype="multipart/form-data" id="income_doc">
                                    @csrf
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                                                    </td>
                                                    @if ($income_doc->First)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->First) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->First) . '/First' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="first" id="first_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="first_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="first" id="first_no" checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="first_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="first_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                                                    </td>
                                                    @if ($income_doc->Second)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Second) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Second) . '/Second' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="second" id="second_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="second_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="second" id="second_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="second_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="second_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                                                    @if ($income_doc->Third)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Third) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Third) . '/Third' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="third" id="third_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="third_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="third" id="third_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="third_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="third_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">4</th>
                                                    <td>*BUSINESS INCOME DETAILS*Received K-1 from S-Corp/LLP/LLC</td>
                                                    @if ($income_doc->Fourth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Fourth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Fourth) . '/Fourth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="fourth" id="fourth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fourth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="fourth" id="fourth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fourth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="fourth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">5</th>
                                                    <td>ANY FARM INCOME OR LOSS</td>
                                                    @if ($income_doc->Fifth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Fifth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Fifth) . '/Fifth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="fifth" id="fifth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fifth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="fifth" id="fifth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fifth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="fifth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">6</th>
                                                    <td>Received any Rental Income on U.S. Property</td>
                                                    @if ($income_doc->Sixth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Sixth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Sixth) . '/Sixth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="sixth" id="sixth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="sixth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="sixth" id="sixth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="sixth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="sixth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">7</th>
                                                    <td>Did you Receive Interest Income or Form 1099-INT</td>
                                                    @if ($income_doc->Seventh)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Seventh) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Seventh) . '/Seventh' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="seventh" id="seventh_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="seventh_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="seventh" id="seventh_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="seventh_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="seventh_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">8</th>
                                                    <td>Did you Receive Dividend Income or Form 1099-DIV
                                                    </td>
                                                    @if ($income_doc->Eighth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Eighth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Eighth) . '/Eighth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="eighth" id="eighth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eighth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="eighth" id="eighth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eighth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="eighth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">9</th>
                                                    <td>Did you Sell Shares/Securities or Received Form 1099-B</td>
                                                    @if ($income_doc->Ninth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Ninth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Ninth) . '/Ninth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="ninth" id="ninth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="ninth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="ninth" id="ninth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="ninth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="ninth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">10</th>
                                                    <td>Did you Sell RSU/ESPP/E-Trade and Received Forms 1099-B & 3922/3921
                                                    </td>
                                                    @if ($income_doc->Tenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Tenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Tenth) . '/Tenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="tenth" id="tenth_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="tenth_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="tenth" id="tenth_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="tenth_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="tenth_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">11</th>
                                                    <td>Received Unemployment Compensation From Governments (Form 1099-G)
                                                    </td>
                                                    @if ($income_doc->Eleventh)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Eleventh) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Eleventh) . '/Eleventh' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="eleventh" id="eleventh_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eleventh_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="eleventh"
                                                                    id="eleventh_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eleventh_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="eleventh_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">12</th>
                                                    <td>Any Retirement Distributions (Form 1099-R) </td>
                                                    @if ($income_doc->Twelfth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Twelfth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Twelfth) . '/Twelfth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="twielve" id="twielve_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="twielve_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="twielve" id="twielve_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="twielve_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="twielve_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">13</th>
                                                    <td>Money Withdrawn Form HSA Account (Form 1099-SA)</td>
                                                    @if ($income_doc->Thirteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Thirteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Thirteenth) . '/Thirteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="thirteen" id="thirteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="thirteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="thirteen"
                                                                    id="thirteen_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="thirteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="thirteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">14</th>
                                                    <td>Received Form 1042-S Foreign Person’s U.S. Source Income Subject to
                                                        Withholding </td>
                                                    @if ($income_doc->Fourteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Fourteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Fourteenth) . '/Fourteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="fourteen" id="fourteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fourteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="fourteen"
                                                                    id="fourteen_no"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fourteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="fourteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">15</th>
                                                    <td>Any Gambling Winnings/Losses (Form W2-G)</td>
                                                    @if ($income_doc->Fifteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Fifteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Fifteenth) . '/Fifteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="fifteen" id="fifteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fifteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="fifteen" id="fifteen_no"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="fifteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="fifteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">16</th>
                                                    <td>Received any Social Security Benefits (Form 1099-SA)</td>
                                                    @if ($income_doc->Sixteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Sixteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Sixteenth) . '/Sixteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="sixteen" id="sixteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="sixteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="sixteen" id="sixteen_no"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="sixteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="sixteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">17</th>
                                                    <td>Sold Main Home and Received Form 1099-S) Mention Purchase Dates,
                                                        Price, no of days Stayed in the Property</td>
                                                    @if ($income_doc->Seventeenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Seventeenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Seventeenth) . '/Seventeenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="seventeen" id="seventeen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="seventeen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="seventeen"
                                                                    id="seventeen_no" onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="seventeen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="seventeen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">18</th>
                                                    <td>Received any Third Party Income with Form 1099-K</td>
                                                    @if ($income_doc->Eighteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Eighteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Eighteenth) . '/Eighteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="eighteen" id="eighteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eighteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="eighteen"
                                                                    id="eighteen_no" onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="eighteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="eighteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">19</th>
                                                    <td>Any Alimony Received</td>
                                                    @if ($income_doc->Nineteenth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Nineteenth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Nineteenth) . '/Nineteenth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="ninteen" id="ninteen_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="ninteen_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="ninteen" id="ninteen_no"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="ninteen_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="ninteen_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">20</th>
                                                    <td>*ANY INCOME FROM INIDA*</td>
                                                    @if ($income_doc->Twentieth)
                                                        <td colspan="2">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            @foreach (explode(',', $income_doc->Twentieth) as $key => $eachfile)
                                                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            @endforeach
                                                            <a href="{{ url('admin/delete_one_income_doc/' . $income_doc->Twentieth) . '/Twentieth' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="twenty" id="twenty_yes"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="twenty_yes">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no"checked name="twenty" id="twenty_no"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="twenty_no">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="twenty_upload[]" multiple disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-primary">Save & Next</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    <img src="{{ asset('images/icons/usernotfound.png') }}" width="200px">
                                    <h5>No Details Found</h5>
                                </div>
                            @endif
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Spouse Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content pb-5">
            <div class="container-fluid">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Spouse Details</h3>
                        </div>
                        <div class="card-body">
                            @if ($spouse_doc)
                                <form action="{{ url('/spouse_edit/' . $user->id) }}" method="POST"
                                    enctype="multipart/form-data" id="spouse_doc">
                                    @csrf
                                    <div class="card-body">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                                                    </td>
                                                    @if ($spouse_doc->First)
                                                        <td colspan="2" align="center">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('spouse_doc/' . $spouse_doc->First) }}"
                                                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ url('admin/delete_one_spouse_doc/' . $spouse_doc->First) . '/First' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="first" id="first_yes_spouse"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="first_yes_spouse">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="first" id="first_no_spouse" checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="first_no_spouse">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="first_upload" disabled>
                                                            </div>
                                                        </td>
                                                    @endif

                                                </tr>
                                                <tr>
                                                    <th scope="row">2</th>
                                                    <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                                                    </td>
                                                    @if ($spouse_doc->Second)
                                                        <td colspan="2" align="center">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('spouse_doc/' . $spouse_doc->Second) }}"
                                                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ url('admin/delete_one_spouse_doc/' . $spouse_doc->Second) . '/Second' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="second" id="second_yes_spouse"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="second_yes_spouse">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="second" id="second_no_spouse"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="second_no_spouse">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="second_upload" disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th scope="row">3</th>
                                                    <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                                                    @if ($spouse_doc->Third)
                                                        <td colspan="2" align="center">
                                                            <span class="badge badge-success">Uploaded</span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ asset('spouse_doc/' . $spouse_doc->Third) }}"
                                                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                                            <a href="{{ url('admin/delete_one_spouse_doc/' . $spouse_doc->Third) . '/Third' }}"
                                                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="yes" name="third" id="third_yes_spouse"
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="third_yes_spouse">
                                                                    yes
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    value="no" name="third"
                                                                    id="third_no_spouse"checked
                                                                    onclick="abc(this.value,this)">
                                                                <label class="form-check-label" for="third_no_spouse">
                                                                    no
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-group">
                                                                <input type="file" class="form-control"
                                                                    name="third_upload" disabled>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="form-group">
                                            <button type="submit" class="btn  btn-primary">Save & Next</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    <img src="{{ asset('images/icons/usernotfound.png') }}" width="200px">
                                    <h5>No Details Found</h5>
                                </div>
                            @endif
                            <!-- /.card-body -->

                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Bank Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content pb-5">
            <div class="container-fluid">
                <div class="container">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bank Details</h3>
                        </div>
                        <div class="card-body">
                            @if ($bank_details)
                                <form action="{{ url('/bank_edit/' . $user->id) }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col col-2">
                                                    <label for="bank_name">Bank Name<span
                                                            class="required">*</span></label>
                                                </div>
                                                <div class="col col-2">
                                                    <input type="text" name="bank_name"
                                                        value="{{ $bank_details->bank_name }}" class="form-control"
                                                        placeholder="Bank Name">
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
                                                    <input type="text" name="Routing_number"
                                                        value="{{ $bank_details->routing_number }}"
                                                        class="form-control" placeholder="Routing Number" required>
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
                                                    <input type="text" name="Bank_Account_Number"
                                                        value="{{ $bank_details->bank_acc_number }}"
                                                        class="form-control" placeholder="Bank Account Number" required>
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
                                                    <input type="text" name="Bank_Account_Type"
                                                        value="{{ $bank_details->bank_acc_type }}"
                                                        class="form-control" placeholder="Bank Account Type" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col col-2">
                                                    <label for="ip_pin">IP PIN:<span class="required">*</span></label>
                                                </div>
                                                <div class="col col-2">
                                                    <input type="text" name="ip_pin"
                                                        value="{{ $bank_details->ip_pin }}" class="form-control"
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
                            @else
                                <div class="text-center">
                                    <img src="{{ asset('images/icons/usernotfound.png') }}" width="200px">
                                    <h5>No Details Found</h5>
                                </div>
                            @endif
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <script src="{{ asset('js/incomeinf/script.js') }}"></script>
@endsection
