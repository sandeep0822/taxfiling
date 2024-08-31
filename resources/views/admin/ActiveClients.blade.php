<?php
use App\Models\bank_details;
use App\Models\basic_info;
use App\Models\contact_details;
use App\Models\income_details;
use App\Models\residency_details;
use App\Models\spouse_details;
?>
@extends('admin.includes.header')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Active Clients</h1>
                        <div id="aa" class="m-4">
                            <select id="AllStatuses" name="year" class="p-2">
                                <option value="Tax Payer Pending">Tax Payer Pending</option>
                                <option value="Documents Pending">Documents Pending</option>
                                <option value="Bank Details Pending">Bank Details Pending</option>
                                <option value="Payment Pending">Payment Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                            <button class="reset btn btn-danger" style="margin-left: 20px">Reset</button>
                        </div>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body table-responsive p-3 overflow-hidden ">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Login Status</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users) == 0)
                                    <tr>
                                        <td colspan="7">
                                            <div class="text-center"><img src="{{ asset('images/icons/usernotfound.png') }}"
                                                    width="200px">
                                                <p>No Users Found</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script>
        setTimeout(function() {
            $("#toastsContainerTopRight").hide()
        }, 4000);
        $(function() {
            $("#example1").DataTable({
                responsive: true,
                "lengthChange": false,
                "autoWidth": false,
                "searching": true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('datatables.activeclients') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'postion',
                        name: 'postion'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            var table = $('#example1').DataTable();
            //Take the category filter drop down and append it to the datatables_filter div.
            //You can use this same idea to move the filter anywhere withing the datatable that you want.
            $("#example1_wrapper .col-md-6:eq(0)").append($("#aa"));

            //Get the column index for the Category column to be used in the method below ($.fn.dataTable.ext.search.push)
            //This tells datatables what column to filter on when a user selects a value from the dropdown.
            //It's important that the text used here (Category) is the same for used in the header of the column to filter
            var categoryIndex = 0;
            $("#example1 th").each(function(i) {
                if ($($(this)).html() == "Position") {
                    categoryIndex = i;
                    return false;
                }
            });

            //Use the built in datatables API to filter the existing rows by the Category column
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var selectedItem = $('#AllStatuses').val()
                    var category = data[categoryIndex];
                    if (selectedItem === "" || category.includes(selectedItem)) {
                        return true;
                    }
                    return false;
                }
            );

            //Set the change event for the Category Filter dropdown to redraw the datatable each time
            //a user selects a new filter.
            $("#AllStatuses").change(function(e) {
                table.draw();
            });
        });
    </script>
@endsection
