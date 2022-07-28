<?php
   include('header.php');
   $cinema = $db->query("SELECT * FROM phtv_cinema");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">P. H. Cinema Episode</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active">P. H. Cinema Episode</li>
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
                                <h4 class="card-title">P. H. Cinema Episode List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateCinemaEpisode" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="p_h_cinema_episode" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Poster</th>
                                                <th>Cinema</th>
                                                <th>Title</th>
                                                <th>Season</th>
                                                <th>Time</th>
                                                <th>Description</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Poster</th>
                                                <th>Cinema</th>
                                                <th>Title</th>
                                                <th>Season</th>
                                                <th>Time</th>
                                                <th>Description</th>
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
<div class="modal fade text-left" id="updateCinemaEpisode" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="cinema_episode_form_title">Add Cinema Episode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateCinemaEpisodeForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cinema_episode_id" id="cinema_episode_id">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Cinema Episode Poster: </label>
                            <div class="form-group mb-0">
                                <input type="file" name="cinema_episode_poster_file" id="cinema_episode_poster_file"
                                    placeholder="select file" class="form-control">
                                <input type="hidden" name="old_cinema_episode_poster_file"
                                    id="old_cinema_episode_poster_file">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Title: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="cinema_episode_title" id="cinema_episode_title"
                                    placeholder="Enter Cinema Episode Title" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectCinema" class="form-label">Select Cinema:</label>
                            <select class="select2 form-control" name="selectCinema" id="selectCinema">
                                <option value="">Select Cinema</option>
                                <?php while ($fecinema = $cinema->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fecinema['id'] ?>"><?= $fecinema['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Season: </label>
                            <div class="form-group mb-0">
                                <input type="number" name="cinema_episode_season" id="cinema_episode_season"
                                    placeholder="Enter Cinema Episode Season" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Time: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="cinema_episode_time" id="cinema_episode_time"
                                    placeholder="Enter Cinema Episode Time" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Video Link: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="cinema_episode_video_link" id="cinema_episode_video_link"
                                    placeholder="Enter Cinema Episode Video Link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="cinema_episode_descriptions" class="form-label">Cinema Description:</label>
                            <textarea id="cinema_episode_descriptions" name="cinema_episode_descriptions" required>
                            </textarea>
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
<div class="modal fade text-left" id="viewCinemaEpisodeDescriptionModel" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cinema Episode Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col" id="viewCinemaEpisodeDescription">

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