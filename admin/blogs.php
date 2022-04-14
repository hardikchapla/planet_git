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
                    <h5 class="content-header-title float-left pr-1 mb-0">Blogs</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Blogs
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
                                <h4 class="card-title">Blogs List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateBlog" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="bloglist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <!-- <th>Type</th> -->
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <!-- <th>Description</th> -->
                                                <th>Auther</th>
                                                <th>Category</th>
                                                <th>View</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <!-- <th>Type</th> -->
                                                <th>Title</th>
                                                <th>Subtitle</th>
                                                <!-- <th>Description</th> -->
                                                <th>Auther</th>
                                                <th>Category</th>
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
<div class="modal fade text-left" id="updateBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="blog_form_title">Add Blog</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateBlogForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Blog Image: </label>
                            <div class="form-group">
                                <input type="file" name="blog_image" id="blog_image" placeholder="select file"
                                    class="form-control">
                                <input type="hidden" name="old_blog_image" id="old_blog_image">
                                <input type="hidden" name="blog_id" id="blog_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Blog Video: </label>
                            <div class="form-group">
                                <input type="file" name="blog_video" id="blog_video" placeholder="select file"
                                    class="form-control">
                                <input type="hidden" name="old_blog_video" id="old_blog_video">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Blog Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="blog_title" id="blog_title" placeholder="Enter blog title"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Blog Subtitle: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="blog_sub_title" id="blog_sub_title"
                                    placeholder="Enter blog subtitle" class="form-control">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row mb-1">
                        <div class="col">
                            <label>Blog Type: </label>
                            <div class="form-group mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" checked name="blog_type"
                                        id="blog_type1" value="0">
                                    <label class="form-check-label" for="blog_type1">Image</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="blog_type" id="blog_type2"
                                        value="1">
                                    <label class="form-check-label" for="blog_type2">Video</label>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row mb-1">
                        <div class="col">
                            <label for="blog_description" class="form-label">Blog Description:</label>
                            <textarea id="blog_description" name="blog_description" required>
                            </textarea>
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
                            <label for="selectAuter" class="form-label">Select Auther:</label>
                            <select class="select2 form-control" name="selectAuter" id="selectAuter">
                                <option value="">Select Auther</option>
                                <?php while ($feauther = $auther->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $feauther['id'] ?>"><?= $feauther['name'] ?></option>
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
<div class="modal fade text-left" id="viewBlogDescriptionModel" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="blog_form_title">Blog Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col" id="viewBlogDescription">

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