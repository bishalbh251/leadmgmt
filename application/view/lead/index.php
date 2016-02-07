<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Leads
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Leads</li>
    </ol>
  </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php echo Helper::flash('success'); ?>
              <?php echo Helper::flash('error'); ?>
              <div class="box">
                <div class="box-body">

                <?php if(!isset($leads)) { ?>
                  Welcome!!! <br/>
                  Hi This is home page of the  <?php echo $_SESSION['role']; ?><strong>: <?php echo $_SESSION['user_name']; ?></strong><br/><br/>
                  <?php if($_SESSION['role'] == 'counselor') {?>
                  Go to Leads Information Page: <a href="<?php echo URL; ?>lead/index" class="btn btn-success"> GO </a>
                  <?php } ?>

                  <?php if($_SESSION['role'] == 'admin') {?>
                  Add new Counselor: <a href="<?php echo URL; ?>counselor/add" class="btn btn-success"> Add </a> <br/><br/>
                  View Counselor: <a href="<?php echo URL; ?>counselor/index" class="btn btn-success"> View </a> <br/><br/>
                  View Report: <a href="<?php echo URL; ?>#" class="btn btn-success"> View </a>
                  <?php } ?>


                <?php } ?>

                <?php if(isset($leads)) { ?>
                  <table id="all_leads" class="data-table table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      if(isset($leads))
                      {

                      if( count( $leads) > 0 ){ 
                        foreach( $leads as $_lead ){ 
                        ?>
                          <tr>
                            <td><?php echo $_lead->first_name.' '.$_lead->last_name; ?></td>
                            <td><?php echo $_lead->email; ?></td>
                            <td><?php echo $_lead->phone; ?></td>
                            <td>
                              <?php
                              if( $_lead->status_id == '1' ){
                                echo '<span class="label label-success">Active</span>';
                              }
                              elseif( $_lead->status_id == '2' ){
                                echo '<span class="label label-danger">Expired</span>';
                              }
                              elseif( $_lead->status_id == '3' ){
                                echo '<span class="label label-warning">Dismissed</span>';
                              }
                              elseif( $_lead->status_id == '4' ){
                                echo '<span class="label label-info">Postponed</span>';
                              }
                              elseif( $_lead->status_id == '5' ){
                                echo '<span class="label label-nice">Student</span>';
                              }
                              ?>
                            </td>
                            <td>
                              <a href="<?php echo URL; ?>lead/edit/<?php echo $_lead->id; ?>" title="Edit"><i class="fa fa-fw fa-edit"></i></a> | 
                              <a href="<?php echo URL; ?>lead/followup/<?php echo $_lead->id; ?>" title="Followup" class="btn btn-primary">Followup</a>
                             <a href="<?php echo URL; ?>followup/followupview/<?php echo $_lead->id; ?>" title="view" class="btn btn-primary">View</a>

                            </td>
                          </tr>
                        <?php 
                        }
                      }} ?>

                    </tbody>
                    
                  </table>
                  <?php } ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</div>