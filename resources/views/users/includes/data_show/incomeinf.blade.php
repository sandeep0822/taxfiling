<form action="{{ url('/upload_doc') }}" method="POST" enctype="multipart/form-data" id="income_doc">
    @csrf
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                    </td>
                    @if (Auth::user()->income_doc->First)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->First) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary" alt="View"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->First) . '/First' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="first"
                                    id="first_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="first_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="first"
                                    id="first_no" checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="first_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="first_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                    </td>
                    @if (Auth::user()->income_doc->Second)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Second) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Second) . '/Second' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="second"
                                    id="second_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="second_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="second"
                                    id="second_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="second_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="second_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                    @if (Auth::user()->income_doc->Third)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Third) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Third) . '/Third' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="third"
                                    id="third_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="third_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="third"
                                    id="third_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="third_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="third_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>*BUSINESS INCOME DETAILS*Received K-1 from S-Corp/LLP/LLC</td>
                    @if (Auth::user()->income_doc->Fourth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Fourth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Fourth) . '/Fourth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="fourth"
                                    id="fourth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fourth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="fourth"
                                    id="fourth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fourth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="fourth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>ANY FARM INCOME OR LOSS</td>
                    @if (Auth::user()->income_doc->Fifth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Fifth) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Fifth) . '/Fifth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="fifth"
                                    id="fifth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fifth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="fifth"
                                    id="fifth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fifth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="fifth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Received any Rental Income on U.S. Property</td>
                    @if (Auth::user()->income_doc->Sixth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Sixth) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Sixth) . '/Sixth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="sixth"
                                    id="sixth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="sixth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="sixth"
                                    id="sixth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="sixth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="sixth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Did you Receive Interest Income or Form 1099-INT</td>
                    @if (Auth::user()->income_doc->Seventh)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Seventh) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Seventh) . '/Seventh' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="seventh"
                                    id="seventh_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="seventh_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="seventh"
                                    id="seventh_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="seventh_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="seventh_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Did you Receive Dividend Income or Form 1099-DIV
                    </td>
                    @if (Auth::user()->income_doc->Eighth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Eighth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Eighth) . '/Eighth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="eighth"
                                    id="eighth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eighth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="eighth"
                                    id="eighth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eighth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="eighth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Did you Sell Shares/Securities or Received Form 1099-B</td>
                    @if (Auth::user()->income_doc->Ninth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Ninth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Ninth) . '/Ninth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="ninth"
                                    id="ninth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="ninth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="ninth"
                                    id="ninth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="ninth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="ninth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Did you Sell RSU/ESPP/E-Trade and Received Forms 1099-B & 3922/3921
                    </td>
                    @if (Auth::user()->income_doc->Tenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Tenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Tenth) . '/Tenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="tenth"
                                    id="tenth_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="tenth_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="tenth"
                                    id="tenth_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="tenth_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="tenth_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Received Unemployment Compensation From Governments (Form 1099-G)
                    </td>
                    @if (Auth::user()->income_doc->Eleventh)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Eleventh) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Eleventh) . '/Eleventh' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="eleventh"
                                    id="eleventh_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eleventh_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="eleventh"
                                    id="eleventh_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eleventh_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="eleventh_upload[]" multiple
                                    disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">12</th>
                    <td>Any Retirement Distributions (Form 1099-R) </td>
                    @if (Auth::user()->income_doc->Twelfth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Twelfth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Twelfth) . '/Twelfth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="twielve"
                                    id="twielve_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="twielve_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="twielve"
                                    id="twielve_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="twielve_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="twielve_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">13</th>
                    <td>Money Withdrawn Form HSA Account (Form 1099-SA)</td>
                    @if (Auth::user()->income_doc->Thirteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Thirteenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Thirteenth) . '/Thirteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="thirteen"
                                    id="thirteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="thirteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="thirteen"
                                    id="thirteen_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="thirteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="thirteen_upload[]" multiple
                                    disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">14</th>
                    <td>Received Form 1042-S Foreign Person’s U.S. Source Income Subject to
                        Withholding </td>
                    @if (Auth::user()->income_doc->Fourteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Fourteenth) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Fourteenth) . '/Fourteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="fourteen"
                                    id="fourteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fourteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no" name="fourteen"
                                    id="fourteen_no"checked onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fourteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="fourteen_upload[]" multiple
                                    disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">15</th>
                    <td>Any Gambling Winnings/Losses (Form W2-G)</td>
                    @if (Auth::user()->income_doc->Fifteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Fifteenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Fifteenth) . '/Fifteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="fifteen"
                                    id="fifteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fifteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked name="fifteen"
                                    id="fifteen_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="fifteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="fifteen_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">16</th>
                    <td>Received any Social Security Benefits (Form 1099-SA)</td>
                    @if (Auth::user()->income_doc->Sixteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Sixteenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Sixteenth) . '/Sixteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="sixteen"
                                    id="sixteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="sixteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked name="sixteen"
                                    id="sixteen_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="sixteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="sixteen_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">17</th>
                    <td>Sold Main Home and Received Form 1099-S) Mention Purchase Dates,
                        Price, no of days Stayed in the Property</td>
                    @if (Auth::user()->income_doc->Seventeenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Seventeenth) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Seventeenth) . '/Seventeenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="seventeen"
                                    id="seventeen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="seventeen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked
                                    name="seventeen" id="seventeen_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="seventeen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="seventeen_upload[]" multiple
                                    disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">18</th>
                    <td>Received any Third Party Income with Form 1099-K</td>
                    @if (Auth::user()->income_doc->Eighteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Eighteenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Eighteenth) . '/Eighteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="eighteen"
                                    id="eighteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eighteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked name="eighteen"
                                    id="eighteen_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="eighteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="eighteen_upload[]" multiple
                                    disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">19</th>
                    <td>Any Alimony Received</td>
                    @if (Auth::user()->income_doc->Nineteenth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Nineteenth) as $key => $eachfile)
                                <a href="{{ asset('income_doc/' . $eachfile) }}"
                                    class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Nineteenth) . '/Nineteenth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="ninteen"
                                    id="ninteen_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="ninteen_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked name="ninteen"
                                    id="ninteen_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="ninteen_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="ninteen_upload[]" multiple disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">20</th>
                    <td>*ANY INCOME FROM INIDA*</td>
                    @if (Auth::user()->income_doc->Twentieth)
                        <td colspan="2">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            @foreach (explode(',', Auth::user()->income_doc->Twentieth) as $key => $eachfile)
                            <a href="{{ asset('income_doc/' . $eachfile) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        @endforeach
                            <a href="{{ url('/delete_one_income_doc/' . Auth::user()->income_doc->Twentieth) . '/Twentieth' }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>

                        </td>
                    @else
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="yes" name="twenty"
                                    id="twenty_yes" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="twenty_yes">
                                    yes
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" value="no"checked name="twenty"
                                    id="twenty_no" onclick="abc(this.value,this)">
                                <label class="form-check-label" for="twenty_no">
                                    no
                                </label>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <input type="file" class="form-control" name="twenty_upload[]" multiple disabled>
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
<!-- /.card-body -->
