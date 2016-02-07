<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Counselors
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Counselor</li>
    </ol>
  </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php echo Helper::flash('success'); ?>
              <?php echo Helper::flash('error'); ?>
              <div class="box">
                <div class="box-body">
                  <table id="all_counselors" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php if(!isset($counselor)) { ?>
                 


                      <?php
                      if( count( $counselors) > 0 ){ 
                        foreach( $counselors as $_counselor ){ 
                        ?>
                          <tr>
                            <td><?php echo $_counselor->user_name; ?></td>
                            <td><?php echo $_counselor->first_name.' '.$_counselor->last_name; ?></td>
                            <td><?php echo $_counselor->email; ?></td>
                            <td><?php echo $_counselor->phone_no; ?></td>
                            <td>
                              <?php
                              if( $_counselor->status == 1 ){
                                echo '<span class="label label-success">Active</span>';
                              }
                              elseif( $_counselor->status == 2 ){
                                echo '<span class="label label-danger">Inactive</span>';
                              }
                              ?>
                            </td>
                            <td>
                              <a href="<?php echo URL; ?>counselor/edit/<?php echo $_counselor->id; ?>" title="Edit"><i class="fa fa-fw fa-edit"></i></a> 
                              | 
                              <!-- 
                              <a href="<?php echo URL; ?>counselor/delete/<?php echo $_counselor->id; ?>" title="Delete" onClick="return confirm('Are you sure want to delete Counselor?');"><i class="fa fa-fw fa-remove"></i></a> -->
                            </td>
                          </tr>
                        <?php 
                        }
                      } ?>
                    </tbody>
                <?php } ?>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</div>