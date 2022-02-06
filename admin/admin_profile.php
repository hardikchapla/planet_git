<?php
   include('header.php');

?>
<!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-wrapper">
      <div class="content-body">
        <!-- Zero configuration table -->
        <section id="basic-datatable">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Admin Profile</h4>
                        </div>
                        <div class="card-body card-dashboard">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="modal-title" id="myModalLabel33">Update Profile </h4>
                                    <form id="updateadmindata" method="post" enctype="multipart">
                                        <div>
                                            <img style="border-radius: 50%;" src="../images/<?= $feadmin['admin_avatar'] ?>" height="100" id="imageurl">
                                        </div>
                                        <div class="form-group">
                                            <label>Admin name: </label>
                                            <input type="text" id="admin_name" name="admin_name" value="<?= $feadmin['admin_name'] ?>" placeholder="Admin name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Admin Email: </label>
                                            <input type="email" id="admin_email" name="admin_email" value="<?= $feadmin['admin_email'] ?>" placeholder="Admin Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Admin Phone Number: </label>
                                            <input type="number" id="admin_phone_number" name="admin_phone_number" placeholder="Admin phone number" value="<?= $feadmin['admin_phone_number'] ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Image: </label>
                                            <input type="file" name="admin_avatar" id="admin_avatar" class="form-control">
                                            <input type="hidden" name="old_admin_avatar" value="<?= $feadmin['admin_avatar'] ?>" id="old_admin_avatar" class="form-control">
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="modal-title" id="myModalLabel33">Change Password </h4>
                                    <form id="changepassword" method="post" enctype="multipart">
                                        <div class="form-group">
                                            <label>Old Password: </label>
                                            <input type="Password" id="old_password" name="old_password" placeholder="Old Password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password: </label>
                                            <input type="Password" id="new_password" name="new_password" placeholder="New Password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password: </label>
                                            <input type="Password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
                                        </div>
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary ml-1">
                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Update</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
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

<?php
  include('footer.php');
?>