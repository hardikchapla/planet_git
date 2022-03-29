<?php
   include('header.php');
   $auther = $db->query("SELECT * FROM phtv_blog_auther");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Podcast</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Podcast
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
                                <h4 class="card-title">Podcast List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updatePodcast" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="podcastlist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Auther</th>
                                                <th>Discription</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Auther</th>
                                                <th>Discription</th>
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
<div class="modal fade text-left" id="updatePodcast" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="podcast_form_title">Add Podcast</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updatePodcastForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Image: </label>
                            <div class="form-group">
                                <input type="file" name="podcast_image" id="podcast_image" placeholder="select file"
                                    class="form-control">
                                <input type="hidden" name="old_podcast_image" id="old_podcast_image">
                                <input type="hidden" name="podcast_id" id="podcast_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_title" id="podcast_title"
                                    placeholder="Enter podcast title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="podcast_description" class="form-label">Description:</label>
                            <textarea id="podcast_description" name="podcast_description" required>
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
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
                    <div class="row mb-1">
                        <div class="col">
                            <label>Facebook Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_fb_link" id="podcast_fb_link"
                                    placeholder="Enter podcast facebook link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Twiter Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_twiter_link" id="podcast_twiter_link"
                                    placeholder="Enter podcast twiter link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Google Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_google_link" id="podcast_google_link"
                                    placeholder="Enter podcast google link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Instagram Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_insta_link" id="podcast_insta_link"
                                    placeholder="Enter podcast insta link" class="form-control">
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