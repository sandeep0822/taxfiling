@extends('users.includes.header')
@section('style')
    <link rel="stylesheet" href="{{ asset('users/incomeinf.css') }}">
@endsection
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
                            <div class="card border">
                                <div class="card-header" style="background: #cc9012;">
                                    @if ($documents == null)
                                        <label style="font-size: 20px" class="text-white m-0 p-0">
                                            U.S Tax Information Word Document -
                                            <a class="btn btn-dark" href="#">Click Here</a>
                                        </label>
                                    @else
                                        <label style="font-size: 20px" class="text-white m-0 p-0">
                                            U.S Tax Information Word Document -
                                            <a class="btn btn-dark" href="/documents/{{ $documents->us_tax }}"
                                                target="_blank">Click Here</a>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <div class="card border">
                                <div class="card-header" style="background: #1dd639 ;">
                                    @if ($documents == null)
                                        <label style="font-size: 20px" class="text-white m-0 p-0">
                                            Indian Tax Information Word Document -
                                            <a class="btn btn-dark" href="#">Click Here</a>
                                        </label>
                                    @else
                                        <label style="font-size: 20px" class="text-white m-0 p-0">
                                            Indian Tax Information Word Document -
                                            <a class="btn btn-dark" href="/documents/{{ $documents->us_tax }}"
                                                target="_blank">Click
                                                Here</a>
                                        </label>
                                    @endif
                                </div>
                            </div>
                            <label class="text-muted">Please answer the listed questions, If any information to preparer
                                please update in the comment box. and upload required documents under “Upload Files”
                                tab.</label>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Income Information</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if (Auth::user()->income_doc)
                                    @include('users.includes.data_show.incomeinf')
                                @else
                                    <form action="{{ url('/upload_doc') }}" method="POST" enctype="multipart/form-data"
                                        id="income_doc">
                                        @csrf
                                        <div class="card-body">
                                            @if (Auth::user()->basic_info && Auth::user()->contact_details && Auth::user()->residency_details)
                                            @else
                                                <div class="d-flex justify-content-center">
                                                    <div class="alert alert-danger w-50 text-center">
                                                        Fill the Previous steps
                                                    </div>
                                                </div>
                                            @endif
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Did You Work for Single o[]r Multiple Employers, then upload all
                                                            W2’s
                                                        </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                                                        </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>*BUSINESS INCOME DETAILS*Received K-1 from S-Corp/LLP/LLC</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>ANY FARM INCOME OR LOSS</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Received any Rental Income on U.S. Property</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>Did you Receive Interest Income or Form 1099-INT</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">8</th>
                                                        <td>Did you Receive Dividend Income or Form 1099-DIV
                                                        </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">9</th>
                                                        <td>Did you Sell Shares/Securities or Received Form 1099-B</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">10</th>
                                                        <td>Did you Sell RSU/ESPP/E-Trade and Received Forms 1099-B &
                                                            3922/3921
                                                        </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">11</th>
                                                        <td>Received Unemployment Compensation From Governments (Form
                                                            1099-G)
                                                        </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">12</th>
                                                        <td>Any Retirement Distributions (Form 1099-R) </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">13</th>
                                                        <td>Money Withdrawn Form HSA Account (Form 1099-SA)</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">14</th>
                                                        <td>Received Form 1042-S Foreign Person’s U.S. Source Income Subject
                                                            to
                                                            Withholding </td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">15</th>
                                                        <td>Any Gambling Winnings/Losses (Form W2-G)</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">16</th>
                                                        <td>Received any Social Security Benefits (Form 1099-SA)</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">17</th>
                                                        <td>Sold Main Home and Received Form 1099-S) Mention Purchase Dates,
                                                            Price, no of days Stayed in the Property</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">18</th>
                                                        <td>Received any Third Party Income with Form 1099-K</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">19</th>
                                                        <td>Any Alimony Received</td>
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
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">20</th>
                                                        <td>*ANY INCOME FROM INIDA*</td>
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
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" class="btn  btn-primary">Save & Next</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- /.card-body -->
                                @endif
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
@section('script')
    @if (Auth::user()->basic_info && Auth::user()->contact_details && Auth::user()->residency_details)
    @else
        <script>
            var form = document.getElementById("income_doc");
            var elements = form.elements;
            console.log(elements)
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }
        </script>
    @endif
    <script src="{{ asset('js/incomeinf/script.js') }}"></script>
@endsection
