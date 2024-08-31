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
                            <label class="text-muted">Please answer the listed questions, If any information to preparer
                                please update in the comment box. and upload required documents under “Upload Files”
                                tab.</label>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Income Information</h3>
                                    @if (Auth::user()->spouse_doc)
                                        <a href="{{ url('/delete_spouse_doc/' . Auth::user()->spouse_doc->id) }}"
                                            class="btn btn-danger float-right">Reset</a>
                                    @endif
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                @if (Auth::user()->spouse_doc)
                                    @include('users.includes.data_show.spousedoc')
                                @else
                                    <form action="{{ url('/upload_spouse_doc') }}" method="POST"
                                        enctype="multipart/form-data" id="spouse_doc">
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
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Did your Spouse work for single or multiple Employers, then
                                                            upload her all W2’s
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
                                                                    name="first_upload" disabled>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Did Your Spouse Receive Form 1099-NEC
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
                                                                    name="second_upload" disabled>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Did your Spouse Receive Form 1099-MISC</td>
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
                                                                    name="third_upload" disabled>
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
    @if (Auth::user()->income_doc)
    @else
        <script>
            var form = document.getElementById("spouse_doc");
            var elements = form.elements;
            console.log(elements)
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].disabled = true;
            }
        </script>
    @endif
    <script src="{{ asset('js/incomeinf/script.js') }}"></script>
@endsection
