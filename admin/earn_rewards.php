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
                    <h5 class="content-header-title float-left pr-1 mb-0">Pages</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active">Pages</li>
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
                                <h4 class="card-title">Earn Rewards List</h4>
                                <!-- <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updatePages" class="btn btn-success text-white">Add
                                        New</button></div> -->
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="earnRewardsList" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Update</th>
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
<div class="modal fade text-left" id="updateEarnRewards" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="earn_rewards_form_title">Edit Earn Rewards</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateEarnRewardsForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="earn_rewards_id" id="earn_rewards_id">
                <div class="modal-body">
                    <label>Slug: </label>
                    <div class="form-group mb-0">
                        <input type="text" name="earn_rewards_slug" id="earn_rewards_slug"
                            placeholder="Enter earn rewards slug" disabled class="form-control">
                    </div>
                    <label>Description: </label>
                    <div class="form-group mb-0">
                        <textarea type="text" name="earn_rewards_description" id="earn_rewards_description"
                            placeholder="Enter earn rewards description" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" name="action" id="action" value="Add" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
  include('footer.php');
?>