<?php
   include('header.php');
   $podcast = $db->query("SELECT * FROM phtv_podcast");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Audiocast Episode</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Audiocast Episode</li>
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
                                <h4 class="card-title">Audiocast Episode List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updatePodcastEpisode" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="podcastepisodelist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>MP3</th>
                                                <th>Podcast Title</th>
                                                <th>Title</th>
                                                <th>Length</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>MP3</th>
                                                <th>Podcast Title</th>
                                                <th>Title</th>
                                                <th>Length</th>
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
<div class="modal fade text-left" id="updatePodcastEpisode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="podcast_episode_form_title">Add Audiocast Episode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updatePodcastEpisoadForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>MP3 file: </label>
                            <div class="form-group">
                                <input type="file" name="podcast_episode_mp3_file" id="podcast_episode_mp3_file"
                                    placeholder="select file" class="form-control">
                                <input type="hidden" name="old_podcast_episode_mp3_file"
                                    id="old_podcast_episode_mp3_file">
                                <input type="hidden" name="podcast_episode_id" id="podcast_episode_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_episode_title" id="podcast_episode_title"
                                    placeholder="Enter podcast episode title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Description: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="podcast_episode_description" id="podcast_episode_description"
                                    placeholder="Enter podcast episode description" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectPodcast" class="form-label">Select Podcast:</label>
                            <select class="select2 form-control" name="selectPodcast" id="selectPodcast">
                                <option value="">Select Podcast</option>
                                <?php while ($fepodcast = $podcast->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fepodcast['id'] ?>"><?= $fepodcast['title'] ?></option>
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
<?php
  include('footer.php');
?>