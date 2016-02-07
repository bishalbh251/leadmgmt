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
      Status
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo URL; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Status</li>
    </ol>
  </section>
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <?php echo Helper::flash('success'); ?>
              <?php echo Helper::flash('error'); ?>
            </div>
            <div class="col-xs-6">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo ($type=='edit') ? 'Edit' : 'Add'; ?> Status</h3>
                </div>
                <!-- form start -->
                <form id="add-status" role="form" method="POST" action="<?php echo URL; ?>status/<?php echo ($type=='edit') ? 'edit/'.$status_id : 'add'; ?> ">
                      <div class="box-body">
                        
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Enter Status Title" value="<?php echo ( isset( $title ) ) ? $title : ''; ?>">
                        </div>

                      </div>
                     
                  <div class="box-footer">
                    <input type="hidden" name="action" value="<?php echo ($type=='edit') ? 'edit' : 'add'; ?>" />
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div>
            <div class="col-xs-6">
              <div class="box">
                <div class="box-body">
                  <table id="all_status" class="data-table table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if( count( $status) > 0 ){ 
                        foreach( $status as $_status ){ 
                        ?>
                          <tr>
                            <td><?php echo $_status->title; ?></td>

                            <td>
                              <a href="<?php echo URL; ?>status/edit/<?php echo $_status->id; ?>" title="Edit"><i class="fa fa-fw fa-edit"></i></a> | 
                              <a href="<?php echo URL; ?>status/delete/<?php echo $_status->id; ?>" title="Delete" onClick="return confirm('Are you sure want to delete this Status?');"><i class="fa fa-fw fa-remove"></i></a>
                            </td>
                          </tr>
                        <?php 
                        }
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Title</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</div>