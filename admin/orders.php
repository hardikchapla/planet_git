<?php
include('header.php');
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Orders</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Orders
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Orders List</h4>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="orderslist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Invoice No</th>
                                                <th>Full name</th>
                                                <th>Email</th>
                                                <!-- <th>Mobile</th> -->
                                                <!-- <th>Address</th> -->
                                                <th>Payment Type</th>
                                                <th>Total Amount</th>
                                                <!-- <th>Total used coin</th> -->
                                                <th>Final amount</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Invoice No</th>
                                                <th>Full name</th>
                                                <th>Email</th>
                                                <!-- <th>Mobile</th> -->
                                                <!-- <th>Address</th> -->
                                                <th>Payment Type</th>
                                                <th>Total Amount</th>
                                                <!-- <th>Total used coin</th> -->
                                                <th>Final amount</th>
                                                <th>Status</th>
                                                <th>View</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
</div>
<!-- END: Content-->
<?php
include('footer.php');
?>