<?php
   include('header.php');
   $categories = $db->query("SELECT * FROM phtv_cinema_categories");
   $types = $db->query("SELECT * FROM phtv_cinema_types");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">P. H. Cinema</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active">P. H. Cinema</li>
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
                                <h4 class="card-title">P. H. Cinema List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateCinema" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="p_h_cinema" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Poster</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Types</th>
                                                <th>Year</th>
                                                <th>Age</th>
                                                <th>Seasons</th>
                                                <th>Description</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Poster</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Types</th>
                                                <th>Year</th>
                                                <th>Age</th>
                                                <th>Seasons</th>
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
<div class="modal fade text-left" id="updateCinema" tabindex=" -1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="cinema_form_title">Add Cinema</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateCinemaForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="cinema_id" id="cinema_id">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Cinema Poster: </label>
                            <div class="form-group mb-0">
                                <input type="file" name="cinema_poster_file" id="cinema_poster_file"
                                    placeholder="select file" class="form-control">
                                <input type="hidden" name="old_cinema_poster_file" id="old_cinema_poster_file">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Name: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="cinema_name" id="cinema_name" placeholder="Enter Cinema Name"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectCategory" class="form-label">Select Category:</label>
                            <select class="select2 form-control" name="selectCategory" id="selectCategory">
                                <option value="">Select Category</option>
                                <?php while ($fecategories = $categories->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fecategories['id'] ?>"><?= $fecategories['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectTypes" class="form-label">Select Types:</label>
                            <select class="select2 form-control" name="selectTypes[]" id="selectTypes" multiple>
                                <option value="">Select Types</option>
                                <?php while ($fetypes = $types->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fetypes['id'] ?>"><?= $fetypes['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Year: </label>
                            <div class="form-group mb-0">
                                <input type="number" name="cinema_year" id="cinema_year" placeholder="Enter Cinema Year"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Age: </label>
                            <div class="form-group mb-0">
                                <input type="number" name="cinema_age" id="cinema_age" placeholder="Enter Cinema Age"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Total Season: </label>
                            <div class="form-group mb-0">
                                <input type="number" name="cinema_total_season" id="cinema_total_season"
                                    placeholder="Enter Cinema Total Season" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Promo: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="cinema_trailer_link" id="cinema_trailer_link"
                                    placeholder="Enter Cinema Promo Link" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="cinema_description" class="form-label">Cinema Description:</label>
                            <textarea id="cinema_description" name="cinema_description" required>
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
<div class="modal fade text-left" id="viewCinemaDescriptionModel" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cinema Description</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col" id="viewCinemaDescription">

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