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
      Followup Lead
      <?php if( isset( $first_name ) && isset( $last_name ) ) {
        echo '<small>'. $first_name . ' ' . $last_name .'</small>';
      }
      ?>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="<?php echo URL; ?>lead">Lead</a></li>
      <li class="active">Followup Lead</li>
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
                    <input type="text" class="form-control" disabled="" id="first_name" name="first_name" placeholder="Enter First Name" value="<?php echo ( isset( $first_name ) ) ? $first_name : ''; ?>">
                  </div>

                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" disabled id="last_name" name="last_name" placeholder="Enter Last Name" value="<?php echo ( isset( $last_name ) ) ? $last_name : ''; ?>">
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" disabled id="email" name="email" placeholder="Enter Email Address" value="<?php echo ( isset( $email ) ) ? $email : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="phone" class="form-control" disabled id="phone_no" name="phone_no" placeholder="Enter Phone Number" value="<?php echo ( isset( $phone ) ) ? $phone : ''; ?>">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" disabled id="address" name="address" placeholder="Enter Address" value=" <?php echo ( isset( $address ) ) ? $address : ''; ?> ">
                  </div>
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
                    <div class="form-group">
                    <label for="date">Next Follow-Up Date</label>
                    <input type="date" class="form-control" id="date" name="date" value="<?php echo ( isset( $date ) ) ? $date : ''; ?>">
                  </div>
                    <?php } ?>
                </div><!-- /.box-body -->
              </div>
              <div class="col-md-6">
                <div class="box-body">
                  <fieldset>
                    <label> Feedback </label> <textarea class="form-control" style="height:200px;" name="feedback"></textarea>
                  </fieldset>
                </div>
              </div>
            </div>
            

            <div class="box-footer">
              <input type="hidden" name="action" value="followup" />
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div><!-- /.box -->
      </div>
    </div>
  </section>
</div>