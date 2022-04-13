<?php
   include('header.php');
   $pages = $db->query("SELECT * FROM phtv_pages");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Banner</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active">Banner</li>
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
                                <h4 class="card-title">Banner List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateBanner" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="bannerList" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Page</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Link</th>
                                                <th>Link Type</th>
                                                <th>Banner Type</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Page</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Link</th>
                                                <th>Link Type</th>
                                                <th>Banner Type</th>
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
<div class="modal fade text-left" id="updateBanner" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="page_form_title">Add Banner</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateBannerForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Image: </label>
                            <div class="form-group">
                                <input type="file" name="banner_image" id="banner_image" placeholder="select file"
                                    class="form-control">
                                <input type="hidden" name="old_banner_image" id="old_banner_image">
                                <input type="hidden" name="banner_id" id="banner_id">
                            </div>
                        </div>
                    </div>
                    <div class="row  g-2 mb-1">
                        <div class="col mb-0">
                            <label for="selectCategory" class="form-label">Select Page:</label>
                            <select class="select2 form-control" name="selectPage" id="selectPage">
                                <option value="">Select Page</option>
                                <?php while ($fepages = $pages->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fepages['id'] ?>"><?= $fepages['page_name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="banner_title" id="banner_title"
                                    placeholder="Enter banner title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="banner_description" class="form-label">Banner Description:</label>
                            <textarea id="banner_description" name="banner_description" required>
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="banner_link" id="banner_link" placeholder="Enter banner link"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Link Type: </label>
                            <div class="form-group mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="link_type"
                                        id="link_type1" value="1">
                                    <label class="form-check-label" for="link_type1">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="link_type" id="link_type2"
                                        value="2">
                                    <label class="form-check-label" for="link_type2">Video</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="link_type" id="link_type3"
                                        value="3">
                                    <label class="form-check-label" for="link_type3">PDF</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="link_type" id="link_type4"
                                        value="4">
                                    <label class="form-check-label" for="link_type4">URL</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Banner Type: </label>
                            <div class="form-group mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="banner_type"
                                        id="banner_type1" value="1">
                                    <label class="form-check-label" for="banner_type1">Header</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="banner_type" id="banner_type2"
                                        value="2">
                                    <label class="form-check-label" for="banner_type2">Footer</label>
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
<?php
  include('footer.php');
?>