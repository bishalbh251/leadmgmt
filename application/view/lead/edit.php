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
      Edit Lead
      <?php if( isset( $first_name ) && isset( $last_name ) ) {
        echo '<small>'. $first_name . ' ' . $last_name .'</small>';
      }
      ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo URL; ?>lead">Lead</a></li>
      <li class="active">Edit Lead</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <?php echo Helper::flash('success'); ?>
        <?php echo Helper::flash('error'); ?>

        <div class="box box-primary">
          <!-- form start -->
          <form id="add-counselor" role="form" method="POST" action="">
            <div class="row">
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
                    <input type="phone" class="form-control" id="phone_no" name="phone_no" placeholder="Enter Phone Number" value="<?php echo ( isset( $phone ) ) ? $phone : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" placeholder="Enter Address"><?php echo ( isset( $address ) ) ? $address : ''; ?></textarea>
                  </div>
                </div><!-- /.box-body -->
              </div>
              <div class="col-md-6">
                <div class="box-body">
                  <?php 
                  
                  if( count( $this->semester ) > 0 ){ ?>
                    <div class="form-group">
                      <label>Semester</label>
                      <select class="form-control" name="semester">
                        <?php foreach( $this->semester as $_semester ){
                          ?>
                          <option value="<?php echo $_semester->id; ?>" <?php if( isset( $semester_id ) && $semester_id==$_semester->id ) echo 'selected="selected"'; ?>><?php echo $_semester->year.' '.$_semester->name; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  <?php } 
                  ?>
                  <?php if( count( $this->status ) > 0 ){ ?>
                    <div class="form-group">
                      <label>Status</label>
                      <select class="form-control" name="status">
                        <?php foreach( $this->status as $_status ){
                          ?>
                          <option value="<?php echo $_status->id; ?>" <?php if( isset( $status_id ) && $status_id==$_status->id ) echo 'selected="selected"'; ?>><?php echo $_status->title; ?></option>
                          <?php
                        }
                        ?>
                      </select>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            

            <div class="box-footer">
              <input type="hidden" name="action" value="edit" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>