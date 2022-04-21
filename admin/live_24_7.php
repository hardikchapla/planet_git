<?php
   include('header.php');
   $category = $db->query("SELECT * FROM phtv_blog_category");
   $auther = $db->query("SELECT * FROM phtv_blog_auther");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">PHTV 27/7</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">PHTV 24/7
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
                                <h4 class="card-title">PHTV 24/7 List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updatePHTV_24_7" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="phtv_24_7_list" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Youtube Link</th>
                                                <th>Is Recommended</th>
                                                <th>Length</th>
                                                <th>View</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Youtube Link</th>
                                                <th>Is Recommended</th>
                                                <th>Length</th>
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
<div class="modal fade text-left" id="updatePHTV_24_7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="phtv_24_7_form_title">Add PHTV 24/7</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updatePHTV_24_7Form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>PHTV 24/7 Thumbnail: </label>
                            <div class="form-group">
                                <input type="file" name="phtv_24_7_thumbnail" id="phtv_24_7_thumbnail"
                                    placeholder="select file" class="form-control">
                                <input type="hidden" name="old_phtv_24_7_thumbnail" id="old_phtv_24_7_thumbnail">
                                <input type="hidden" name="phtv_24_7_thumbnail_id" id="phtv_24_7_thumbnail_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>PHTV 24/7 Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="phtv_24_7_title" id="phtv_24_7_title"
                                    placeholder="Enter phtv 24/7 title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col phtv_24_7_description">
                            <label for="phtv_24_7_description" class="form-label">PHTV 24/7 Description:</label>
                            <textarea id="phtv_24_7_description" name="phtv_24_7_description" required>
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>PHTV 24/7 Youtube Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="phtv_24_7_youtube_link" id="phtv_24_7_youtube_link"
                                    placeholder="Enter phtv 24/7 youtube link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>PHTV 24/7 Video Length: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="phtv_24_7_length" id="phtv_24_7_length"
                                    placeholder="Enter phtv 24/7 length" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>PHTV 24/7 Is Recommended: </label>
                            <div class="form-group mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="is_recomended"
                                        id="is_recomended1" value="1">
                                    <label class="form-check-label" for="is_recomended1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="is_recomended"
                                        id="is_recomended2" value="0">
                                    <label class="form-check-label" for="is_recomended2">No</label>
                                </div>
                            </div>
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
<div class="modal fade text-left" id="viewPHTV_24_7_DescriptionModel" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="blog_form_title">PHTV 24/7 Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col" id="viewPHTV_24_7_Description">

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