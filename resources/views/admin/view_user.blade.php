@extends('admin.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container">
                    <div class="card p-3">
                        <div class="row">
                            <div class="col-1"><b>Name:</b></div>
                            <div class="col-6">{{ $user->name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1"><b>Username:</b></div>
                            <div class="col-6">{{ $user->username }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1"><b>Email:</b></div>
                            <div class="col-6">{{ $user->email }}</div>
                        </div>
                        <div class="row">
                            <div class="col-1"><b>Phone:</b></div>
                            <div class="col-6">{{ $user->phone }}</div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Documents Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="container text-center">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Income Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" style="text-align: left">
                                <tbody>
                                    @if ($income_details)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                                            </td>
                                            @if ($income_details->First)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->First) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                            class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                                            </td>
                                            @if ($income_details->Second)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Second) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                                            @if ($income_details->Third)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Third) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>*BUSINESS INCOME DETAILS*Received K-1 from S-Corp/LLP/LLC</td>
                                            @if ($income_details->Fourth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Fourth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>ANY FARM INCOME OR LOSS</td>
                                            @if ($income_details->Fifth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Fifth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach

                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>Received any Rental Income on U.S. Property</td>
                                            @if ($income_details->Sixth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Sixth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>Did you Receive Interest Income or Form 1099-INT</td>
                                            @if ($income_details->Seventh)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Seventh) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>Did you Receive Dividend Income or Form 1099-DIV
                                            </td>
                                            @if ($income_details->Eighth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Eighth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>Did you Sell Shares/Securities or Received Form 1099-B</td>
                                            @if ($income_details->Ninth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Ninth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">10</th>
                                            <td>Did you Sell RSU/ESPP/E-Trade and Received Forms 1099-B & 3922/3921
                                            </td>
                                            @if ($income_details->Tenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Tenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">11</th>
                                            <td>Received Unemployment Compensation From Governments (Form 1099-G)
                                            </td>
                                            @if ($income_details->Eleventh)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Eleventh) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">12</th>
                                            <td>Any Retirement Distributions (Form 1099-R) </td>
                                            @if ($income_details->Twelfth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Twelfth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">13</th>
                                            <td>Money Withdrawn Form HSA Account (Form 1099-SA)</td>
                                            @if ($income_details->Thirteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Thirteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">14</th>
                                            <td>Received Form 1042-S Foreign Person’s U.S. Source Income Subject to
                                                Withholding </td>
                                            @if ($income_details->Fourteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Fourteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">15</th>
                                            <td>Any Gambling Winnings/Losses (Form W2-G)</td>
                                            @if ($income_details->Fifteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Fifteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">16</th>
                                            <td>Received any Social Security Benefits (Form 1099-SA)</td>
                                            @if ($income_details->Sixteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>

                                                    @foreach (explode(',', $income_details->Sixteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">17</th>
                                            <td>Sold Main Home and Received Form 1099-S) Mention Purchase Dates,
                                                Price, no of days Stayed in the Property</td>
                                            @if ($income_details->Seventeenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Seventeenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">18</th>
                                            <td>Received any Third Party Income with Form 1099-K</td>
                                            @if ($income_details->Eighteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Eighteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">19</th>
                                            <td>Any Alimony Received</td>
                                            @if ($income_details->Nineteenth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Nineteenth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">20</th>
                                            <td>*ANY INCOME FROM INIDA*</td>
                                            @if ($income_details->Twentieth)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    @foreach (explode(',', $income_details->Twentieth) as $key => $eachfile)
                                                        <a href="{{ asset('income_doc/' . $eachfile) }}"
                                                        class="btn btn-primary" target="_blank">{{ $key + 1 }}. View</a>
                                                    @endforeach
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4">
                                                <h2>No Details Found</h2>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        </form>
                        <!-- /.card-body -->

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="container text-center">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Spouse Documents Information</h3>
                        </div>
                        <div class="card-body">
                            <table class="table" style="text-align: left">
                                <tbody>
                                    @if ($spouse_details)
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Did You Work for Single or Multiple Employers, then upload all W2’s
                                            </td>
                                            @if ($spouse_details->First)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('spouse_doc/' . $spouse_details->First) }}" class="btn btn-primary" target="_blank">View</a>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Did You Receive Form Non-Employee Compensation 1099-NEC
                                            </td>
                                            @if ($spouse_details->Second)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ asset('spouse_doc/' . $spouse_details->Second) }}" class="btn btn-primary" target="_blank">View</a>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Did you Receive Self Employment Income (Form 1099-MISC)</td>
                                            @if ($spouse_details->Third)
                                                <td>
                                                    <span class="badge badge-success">Uploaded</span>
                                                </td>
                                                <td>
                                                    <a href="{{ asset('spouse_doc/' . $spouse_details->Third) }}" class="btn btn-primary" target="_blank">View</a>
                                                </td>
                                            @else
                                                <td>
                                                    <span class="badge badge-danger">Not Found</span>
                                                </td>
                                            @endif
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4" align="center">
                                                <h2>No Details Found</h2>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->

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
                    @if ($bank_details)
                        <div class="card p-3">
                            <div class="row">
                                <div class="col-2"><b>Bank Name:</b></div>
                                <div class="col-6">{{ $bank_details->bank_name }}</div>
                            </div>
                            <div class="row">
                                <div class="col-2"><b>Routing Number:</b></div>
                                <div class="col-6">{{ $bank_details->routing_number }}</div>
                            </div>
                            <div class="row">
                                <div class="col-2"><b>Bank Acc Number:</b></div>
                                <div class="col-6">{{ $bank_details->bank_acc_number }}</div>
                            </div>
                            <div class="row">
                                <div class="col-2"><b>Bank Acc Type:</b></div>
                                <div class="col-6">{{ $bank_details->bank_acc_type }}</div>
                            </div>
                            <div class="row">
                                <div class="col-2"><b>IP Pin:</b></div>
                                <div class="col-6">{{ $bank_details->ip_pin }}</div>
                            </div>
                        </div>
                    @else
                        <div class="card p-3 text-center">
                            <h2>No Updated yet</h2>
                        </div>
                    @endif

                </div>
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
