<?php
   include('header.php');
   $category = $db->query("SELECT * FROM phtv_voltage_category");
   $titles = $db->query("SELECT * FROM phtv_voltage_title");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Hight Voltage Episode</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Hight Voltage Episode
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
                                <h4 class="card-title">Hight Voltage Episode List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateHighVoltageEpisode" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="highVoltageEpisodelist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Video Type</th>
                                                <th>Title</th>
                                                <th>Title Name</th>
                                                <th>Category Name</th>
                                                <th>View</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Video Type</th>
                                                <th>Title</th>
                                                <th>Title Name</th>
                                                <th>Category Name</th>
                                                <th>View</th>
                                                <th>Update</th>
                                                <th>Delete</th>
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
<div class="modal fade text-left" id="updateHighVoltageEpisode" tabindex=" -1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="high_voltage_episode_form_title">Add Hight Voltage Episode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateHighVoltageEpisodeForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="high_voltage_category_id" id="high_voltage_category_id">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Episode Image: </label>
                            <div class="form-group">
                                <input type="file" name="high_voltage_episode_image" id="high_voltage_episode_image"
                                    placeholder="select file" class="form-control">
                                <input type="hidden" name="old_high_voltage_episode_image"
                                    id="old_high_voltage_episode_image">
                                <input type="hidden" name="high_voltage_episode_id" id="high_voltage_episode_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Episode Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="high_voltage_episode_title" id="high_voltage_episode_title"
                                    placeholder="Enter episode title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="high_voltage_episode_description" class="form-label">Episode
                                Description:</label>
                            <textarea id="high_voltage_episode_description" name="high_voltage_episode_description"
                                required>
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Episode Video Type: </label>
                            <div class="form-group mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked
                                        name="high_voltage_episode_video_type" id="high_voltage_episode_video_type1"
                                        value="0">
                                    <label class="form-check-label" for="high_voltage_episode_video_type1">Link</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="high_voltage_episode_video_type"
                                        id="high_voltage_episode_video_type2" value="1">
                                    <label class="form-check-label" for="high_voltage_episode_video_type2">Video</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Episode Video: </label>
                            <div class="form-group">
                                <input type="text" name="high_voltage_episode_video" id="high_voltage_episode_video"
                                    placeholder="Enter video link" class="form-control">
                                <input type="hidden" name="old_high_voltage_episode_video"
                                    id="old_high_voltage_episode_video">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectCategory" class="form-label">Select Category:</label>
                            <select class="select2 form-control" name="selectCategory" id="selectCategory">
                                <option value="">Select Category</option>
                                <?php while ($fecategory = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fecategory['id'] ?>"><?= $fecategory['category_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="selectAuter" class="form-label">Select Title:</label>
                            <select class="select2 form-control" name="selectTitle" id="selectTitle">
                                <option value="">Select Title</option>
                                <?php while ($fetitles = $titles->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fetitles['id'] ?>"><?= $fetitles['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
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
<div class="modal fade text-left" id="viewHighVoltageEpisodeDescriptionModel" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="blog_form_title">High Voltage Episode Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col" id="viewHighVoltageEpisodeDescription">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php
  include('footer.php');
?>