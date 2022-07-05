<?php
   include('header.php');
   $category = $db->query("SELECT * FROM phtv_nft_categories");
   $collections = $db->query("SELECT * FROM phtv_nft_collection");
   $price_type = $db->query("SELECT * FROM phtv_price_type");
?>
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Asset Listing</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Asset Listing
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
                                <h4 class="card-title">Asset Listing List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal"
                                        data-target="#updateNFTInfo" class="btn btn-success text-white">Add
                                        New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="nft_info_list" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th class="name_tables_width">Name</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Sale Id</th>
                                                <th>Assets Name</th>
                                                <th>Assets Id</th>
                                                <th>Mint No.</th>
                                                <th>Duration</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Type</th>
                                                <th>Sale Id</th>
                                                <th>Assets Name</th>
                                                <th>Assets Id</th>
                                                <th>Mint No.</th>
                                                <th>Duration</th>
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
<div class="modal fade text-left" id="updateNFTInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="nft_info_form_title">Add Asset Listing</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="updateNFTInfoForm" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-1">
                        <div class="col">
                            <label>Image: </label>
                            <div class="form-group">
                                <input type="file" name="nft_info_image" id="nft_info_image" placeholder="select file"
                                    class="form-control">
                                <input type="hidden" name="old_nft_info_image" id="old_nft_info_image">
                                <input type="hidden" name="old_nft_info_image_type" id="old_nft_info_image_type">
                                <input type="hidden" name="nft_info_id" id="nft_info_id">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Name: </label>
                            <div class="form-group mb-0">
                                <input type="text" name="nft_info_name" id="nft_info_name"
                                    placeholder="Enter Asset info name" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label>Price: </label>
                            <div class="form-group mb-0">
                                <input type="number" name="nft_info_price" id="nft_info_price"
                                    placeholder="Enter Asset info price" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="selectPriceType" class="form-label">Select Price Type:</label>
                            <select class="form-control" name="selectPriceType" id="selectPriceType">
                                <option value="">Select Price Type</option>
                                <?php while ($feprice_type = $price_type->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $feprice_type['price_type'] ?>"><?= $feprice_type['price_type'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_description" class="form-label">Description:</label>
                            <textarea id="nft_info_description" name="nft_info_description">
                            </textarea>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col mb-0">
                            <label for="selectCategory" class="form-label">Select Category:</label>
                            <select class="select2 form-control" name="selectCategory" id="selectCategory">
                                <option value="">Select Category</option>
                                <?php while ($fecategory = $category->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fecategory['id'] ?>"><?= $fecategory['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="selectCollections" class="form-label">Select Collections:</label>
                            <select class="select2 form-control" name="selectCollections" id="selectCollections">
                                <option value="">Select Collections</option>
                                <?php while ($fecollection = $collections->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $fecollection['id'] ?>"><?= $fecollection['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_sale_id" class="form-label">Sale Id:</label>
                            <input type="text" name="nft_info_sale_id" id="nft_info_sale_id"
                                placeholder="Enter Asset info sale id" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_assets_name" class="form-label">Assets Name:</label>
                            <input type="text" name="nft_info_assets_name" id="nft_info_assets_name"
                                placeholder="Enter Asset info assets name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_assets_id" class="form-label">Assets Id:</label>
                            <input type="text" name="nft_info_assets_id" id="nft_info_assets_id"
                                placeholder="Enter Asset info assets Id" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_meant_no" class="form-label">Mint No. :</label>
                            <input type="text" name="nft_info_meant_no" id="nft_info_meant_no"
                                placeholder="Enter Asset info meant no" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_duration" class="form-label">Duration:</label>
                            <input type="text" name="nft_info_duration" id="nft_info_duration"
                                placeholder="Enter Asset info duration" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_name" class="form-label">Attribute Name:</label>
                            <input type="text" name="nft_info_attribute_name" id="nft_info_attribute_name"
                                placeholder="Enter Asset info attribute name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_image" class="form-label">Attribute Image:</label>
                            <input type="text" name="nft_info_attribute_image" id="nft_info_attribute_image"
                                placeholder="Enter Asset info attribute image" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_bg_image" class="form-label">Attribute BG Image:</label>
                            <input type="text" name="nft_info_attribute_bg_image" id="nft_info_attribute_bg_image"
                                placeholder="Enter Asset info attribute bg image" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_object" class="form-label">Attribute Object:</label>
                            <input type="text" name="nft_info_attribute_object" id="nft_info_attribute_object"
                                placeholder="Enter Asset info attribute object" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_object_collection" class="form-label">Attribute Object
                                Collection:</label>
                            <input type="text" name="nft_info_attribute_object_collection"
                                id="nft_info_attribute_object_collection"
                                placeholder="Enter Asset info attribute object collection" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_object_no" class="form-label">Attribute Object
                                No:</label>
                            <input type="text" name="nft_info_attribute_object_no" id="nft_info_attribute_object_no"
                                placeholder="Enter Asset info attribute object no" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_border_color" class="form-label">Attribute Border
                                Color:</label>
                            <input type="text" name="nft_info_attribute_border_color"
                                id="nft_info_attribute_border_color"
                                placeholder="Enter Asset info attribute border color" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <label for="nft_info_attribute_border_type" class="form-label">Attribute Border
                                Type:</label>
                            <input type="text" name="nft_info_attribute_border_type" id="nft_info_attribute_border_type"
                                placeholder="Enter Asset info attribute border type" class="form-control">
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