<form action="{{ url('/upload_spouse_doc') }}" method="POST"
enctype="multipart/form-data" id="spouse_doc">
@csrf
    <div class="card-body">
        <table class="table">
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                    </td>
                    @if (Auth::user()->spouse_doc->First)
                        <td colspan="2" align="center">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            <a href="{{ asset('spouse_doc/' . Auth::user()->spouse_doc->First) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/delete_one_spouse_doc/' . Auth::user()->spouse_doc->First) . '/First' }}"
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
                                <input type="file" class="form-control" name="first_upload" disabled>
                            </div>
                        </td>
                    @endif

                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                    </td>
                    @if (Auth::user()->spouse_doc->Second)
                        <td colspan="2" align="center">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            <a href="{{ asset('spouse_doc/' . Auth::user()->spouse_doc->Second) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/delete_one_spouse_doc/' . Auth::user()->spouse_doc->Second) . '/Second' }}"
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
                                <input type="file" class="form-control" name="second_upload" disabled>
                            </div>
                        </td>
                    @endif
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                    @if (Auth::user()->spouse_doc->Third)
                        <td colspan="2" align="center">
                            <span class="badge badge-success">Uploaded</span>
                        </td>
                        <td>
                            <a href="{{ asset('spouse_doc/' . Auth::user()->spouse_doc->Third) }}"
                                class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ url('/delete_one_spouse_doc/' . Auth::user()->spouse_doc->Third) . '/Third' }}"
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
                                <input type="file" class="form-control" name="third_upload" disabled>
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
