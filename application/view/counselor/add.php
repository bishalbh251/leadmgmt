<?php
if( isset( $_data ) ){
  extract( $_data );
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Counselor
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo URL; ?>counselor">Counselor</a></li>
      <li class="active">Add Counselor</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php echo Helper::flash('success'); ?>
        <?php echo Helper::flash('error'); ?>

        <div class="box box-primary">
          <!-- form start -->
          <form id="add-counselor" role="form" method="POST" action="<?php echo URL; ?>counselor/add">
            <div class="row">
              <div class="col-md-6">
                <div class="box-body">
                  <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control required" id="user_name" name="user_name" placeholder="Enter Username" value="<?php echo ( isset( $user_name ) ) ? $user_name : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                  </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Re-enter Password">
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if( isset( $status ) && $status==1 ) echo 'selected="selected"'; ?>>Active</option>
                      <option value="2" <?php if( isset( $status ) && $status==2 ) echo 'selected="selected"'; ?>>Inactive</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box-body">
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="<?php echo ( isset( $first_name ) ) ? $first_name : ''; ?>">
                  </div>

                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="<?php echo ( isset( $last_name ) ) ? $last_name : ''; ?>">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="<?php echo ( isset( $email ) ) ? $email : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="phone" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" value="<?php echo ( isset( $phone_no ) ) ? $phone_no : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="<?php echo ( isset( $address ) ) ? $address : ''; ?>">
                  </div>
                </div><!-- /.box-body -->
              </div>
            </div>

            <div class="box-footer">
              <input type="hidden" name="action" value="add" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>