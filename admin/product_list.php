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
                    <h5 class="content-header-title float-left pr-1 mb-0">Product Size</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Product Size
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
                                <h4 class="card-title">Product Size List</h4>
                                <div class="card-title"><button type="button" data-toggle="modal" data-target="#updateProductSize" class="btn btn-success text-white">Add New</button></div>
                            </div>
                            <div class="card-body card-dashboard">
                                <div class="table-responsive">
                                    <table id="productSizelist" class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Name</th>
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
<div class="modal fade text-left bd-example-modal-lg" id="updateProductSize" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="product_list_title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="addProduct" method="post" enctype="multipart/form-data" >

                <div class="modal-body">
                    
                    <div class="row g-2 mb-1">
                        <div class="col mb-0">
                            <label for="selectCategory" class="form-label">Select Category:</label>
                            <select class="select2 form-control" id="selectCategory">
                                <option value="">Select Category</option>
                                <option value="men">Men</option>
                                <option value="women">Women</option>
                                <option value="kids">Kids</option>
                            </select>
                        </div>
                        <div class="col mb-0">
                            <label for="selectBrand" class="form-label">Select Brand:</label>
                            <select class="select2 form-control" id="selectBrand">
                                <option value="">Select Brand</option>
                                <option value="nike">Nike</option>
                                <option value="lee">Lee</option>
                                <option value="levis">Levis</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="selectColor" class="form-label">Select Color:</label>
                            <select class="select2 form-control" multiple="multiple">
                                <option value="red">Red</option>
                                <option value="purple">Purple</option>
                                <option value="orange">Orange</option>
                                <option value="green">Green</option>
                                <option value="blue">Blue</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="selectSize" class="form-label">Select Size:</label>
                            <select class="select2 form-control" multiple="multiple">
                                <option value="xl">XL</option>
                                <option value="l">L</option>
                                <option value="m">M</option>
                                <option value="s">S</option>
                                <option value="xs">XS</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productName" class="form-label">Product Name:</label>
                            <input type="text" id="productName" class="form-control" placeholder="Enter Product Name">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productPrice" class="form-label">Product Price:</label>
                            <input type="number" id="productPrice" class="form-control" placeholder="Enter Product Price">
                        </div>
                        <div class="col">
                            <label for="productCoinPrice" class="form-label">Product Coin Price:</label>
                            <input type="number" id="productCoinPrice" class="form-control" placeholder="Enter Product Coin Price">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productStocks" class="form-label">Product Stocks:</label>
                            <input type="number" id="productStocks" class="form-control" placeholder="Enter Product Stocks">
                        </div>
                        <div class="col">
                            <label for="productPreOrder" class="form-label">Pre-Order:</label>
                            <input type="checkbox" class="checkbox-input" id="productPreOrder">
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productDescription" class="form-label">Product Description:</label>
                            <textarea name="content" id="editor" required>
                            </textarea>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productAdditionalInfo" class="form-label">Product Additional Info:</label>
                            <textarea name="content" id="editor1" required>
                            </textarea>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col">
                            <label for="productImages" class="form-label">Product Images:</label>
                            <input type="file" id="files" name="files[]" multiple class="form-control mb-1" />
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
<script>
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#files").on("change", function(e) {
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\">" +
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<br/><span class=\"remove\">Remove image</span>" +
                    "</span>").insertAfter("#files");
                $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                });
                
                });
                fileReader.readAsDataURL(f);
            }
            console.log(files);
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
<script>
    let appEditor;

    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        // Store it in more "global" context.
        appEditor = editor;
    } )
    .catch( error => {
        console.error( error );
    } );
</script>
<script>
    let appEditor1;

    ClassicEditor
    .create( document.querySelector( '#editor1' ) )
    .then( editor1 => {
        // Store it in more "global" context.
        appEditor1 = editor1;
    } )
    .catch( error => {
        console.error( error );
    } );
    
</script>
