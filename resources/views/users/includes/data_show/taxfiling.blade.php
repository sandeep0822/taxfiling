<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Basic Information</h3>
    </div>
    <form action="{{ url('/basic_info') }}" method="POST">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="marital_status">Marital Status<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <select class="form-control" id="marital_status" name="marital_status" required>
                            <option @if (Auth::user()->basic_info->marital_status == 'Single') selected @endif value="Single">Single</option>
                            <option @if (Auth::user()->basic_info->marital_status == 'Marriage') selected @endif value="Marriage">Married</option>
                            <option @if (Auth::user()->basic_info->marital_status == 'Divorce') selected @endif value="Divorce">Divorced</option>
                            <option @if (Auth::user()->basic_info->marital_status == 'Head') selected @endif value="Head">Head of Household
                            </option>
                            <option @if (Auth::user()->basic_info->marital_status == 'Widow') selected @endif value="Widow">Widowed</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="name">Name(As per SSN)<span class="required">*</span></label>
                    </div>
                    <div class="col col-8">
                        <div class="d-flex">
                            <input type="text" class="form-control" id="name" name="name[]"
                                value="{{ explode(' ', Auth::user()->basic_info->full_name)[0] }}"
                                placeholder="First Name" required>
                            <input type="text" class="form-control"
                                id="name"name="name[]"value="{{ explode(' ', Auth::user()->basic_info->full_name)[1] }}"
                                placeholder="Middle Name" required>
                            <input type="text" class="form-control"
                                id="name"name="name[]"value="{{ explode(' ', Auth::user()->basic_info->full_name)[2] }}"
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
                            placeholder="SSN"value="{{ Auth::user()->basic_info->ssn }}" required>
                    </div>
                    <div class="col col-2" style="justify-content: right">
                        <label for="occupation">Occupation<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <input type="text" class="form-control" id="occupation" name="Occupation"
                            value="{{ Auth::user()->basic_info->occupation }}" placeholder="Occupation" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="DOB">Date Of Birth<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <input type="date" class="form-control" id="DOB" name="Date_of_Birth"
                            value="{{ Auth::user()->basic_info->dob }}" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="F_D_E_US">First Date of Entry in US<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <input type="date" class="form-control" value="{{ Auth::user()->basic_info->first_date }}" id="F_D_E_US" name="First_Date_of_Entry_in_US" required>
                    </div>
                    <div class="col col-2" style="justify-content: right">
                        <label for="citizenship">Citizenship<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <input type="text" class="form-control" id="citizenship" value="{{ Auth::user()->basic_info->citizenship }}" name="Citizenship"
                            placeholder="Citizenship" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="type_of_visa">Type of Visa<span class="required">*</span></label>
                    </div>
                    <div class="col col-2">
                        <select class="form-control" id="type_of_visa" name="type_of_visa" required>
                            <option @if (Auth::user()->basic_info->visa_type == 'F1') selected @endif value="F1">F1</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'H1B') selected @endif value="H1B">H1B</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'L1') selected @endif value="L1">L1</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'J1') selected @endif value="J1">J1</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'Greencard') selected @endif value="Greencard">Greencard</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'Citizen') selected @endif value="Citizen">Citizen</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'C1') selected @endif value="C1">C1</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'E1') selected @endif value="E1">E1</option>
                            <option @if (Auth::user()->basic_info->visa_type == 'TN Visa') selected @endif value="TN Visa">TN Visa</option>
                        </select>
                    </div>
                </div>
            </div>
            <h5><b> Contact Details</b></h5>
            <div class="form-group">
                <div class="row">
                    <div class="col col-2">
                        <label for="Address">Current Address<span class="required">*</span></label>
                    </div>
                    <div class="col col-8">
                        <div class="d-flex">
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[0] }}"
                                placeholder="Address" required>
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[1] }}"
                                placeholder="City" required>
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[2] }}"
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
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[3] }}"
                                placeholder="State" required>
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[4] }}"
                                placeholder="Zip" required>
                            <input type="text" class="form-control" id="Address" name="address[]" value="{{ explode(',',Auth::user()->contact_details->address)[5] }}"
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
                    <div class="col col-10">
                        <div class="d-flex">
                            <input type="text" class="form-control" id="Contact" name="Phone" value="{{ Auth::user()->contact_details->contact }}"
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
                            <option @if (Auth::user()->contact_details->timezone == 'America/New_York') selected @endif value="America/New_York">EST</option>
                            <option @if (Auth::user()->contact_details->timezone == 'America/Chicago') selected @endif value="America/Chicago">CST</option>
                            <option @if (Auth::user()->contact_details->timezone == 'America/Phoenix') selected @endif value="America/Phoenix">MST</option>
                            <option @if (Auth::user()->contact_details->timezone == 'America/Los_Angeles') selected @endif value="America/Los_Angeles">PST</option>
                            <option @if (Auth::user()->contact_details->timezone == 'Asia/Calcutta') selected @endif value="Asia/Calcutta">IST</option>
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
                            <input placeholder="State Resided" type="text" name="residence_states_2022[]" value="{{ Auth::user()->residency_details[0]->SR_2022 }}"
                                class="form-control" required>
                            <br>
                            <input placeholder="State Resided" type="text" name="residence_states_2022[]" value="{{ Auth::user()->residency_details[1]->SR_2022 }}"
                                class="form-control" required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2022[]"  value="{{ Auth::user()->residency_details[0]->POS_Start_2022 }}" required>-
                            <input type="date" class="form-control" name="enddate_2022[]" value="{{ Auth::user()->residency_details[0]->POS_End_2022 }}" required>
                        </div>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2022[]" value="{{ Auth::user()->residency_details[1]->POS_Start_2022 }}" required>-
                            <input type="date" class="form-control" name="enddate_2022[]" value="{{ Auth::user()->residency_details[1]->POS_End_2022 }}" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2021</td>
                    <td>
                        <div class="form-group w-75">
                            <input placeholder="State Resided" type="text" name="residence_states_2021[]" value="{{ Auth::user()->residency_details[0]->SR_2021 }}"
                                class="form-control" required>
                            <br>
                            <input placeholder="State Resided" type="text" name="residence_states_2021[]" value="{{ Auth::user()->residency_details[1]->SR_2021 }}"
                                class="form-control" required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2021[]" value="{{ Auth::user()->residency_details[0]->POS_Start_2021 }}" required>-
                            <input type="date" class="form-control" name="enddate_2021[]" value="{{ Auth::user()->residency_details[0]->POS_End_2021 }}" required>
                        </div>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2021[]" value="{{ Auth::user()->residency_details[1]->POS_Start_2021 }}" required>-
                            <input type="date" class="form-control" name="enddate_2021[]" value="{{ Auth::user()->residency_details[1]->POS_End_2021 }}" required>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2020</td>
                    <td>
                        <div class="form-group w-75">
                            <input placeholder="State Resided" type="text" name="residence_states_2020[]" value="{{ Auth::user()->residency_details[0]->SR_2020 }}"
                                class="form-control" required>
                            <br>
                            <input placeholder="State Resided" type="text" name="residence_states_2020[]" value="{{ Auth::user()->residency_details[0]->SR_2020 }}"
                                class="form-control" required>
                        </div>
                    </td>
                    <td>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2020[]"  value="{{ Auth::user()->residency_details[0]->POS_Start_2020 }}" required>-
                            <input type="date" class="form-control" name="enddate_2020[]" value="{{ Auth::user()->residency_details[0]->POS_End_2020 }}" required>
                        </div>
                        <div class="form-group w-75 d-flex">
                            <input type="date" class="form-control" name="startdate_2020[]"  value="{{ Auth::user()->residency_details[1]->POS_Start_2020 }}" required>-
                            <input type="date" class="form-control" name="enddate_2020[]" value="{{ Auth::user()->residency_details[1]->POS_End_2020 }}" required>
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
