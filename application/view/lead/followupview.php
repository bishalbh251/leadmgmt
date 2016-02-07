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
        View Followup
              <?php if( isset( $first_name ) && isset( $last_name ) ) {
        echo '<small>'. $first_name . ' ' . $last_name .'</small>';
      }
      ?>
    </h1>
    </section>
    <section class="content">
    <div class="row" id="main_row">        
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body">
                    <br style="clear: both"> 
                    <hr>                   
                    <table id="datatable" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                            <strong>
                                 <th>Date</th>
                                <th>Feedback</th>
                            </strong>
                            </tr>
                    <?php if($feedback_rows != '') { ?>
                                                          <?php 
                                foreach($feedback_rows as $feedback_row):
                            ?> 
                             <tr>
                                <td><?=$feedback_row['folup_date']?></td>
                                <td><?=$feedback_row['feedback']?></td>
                            </tr>
                            <?php endforeach; ?>
                             <?php }?>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        </section><!-- /.content -->
</div>

<script type="text/javascript">
        $(function () {
            $(".datatable").DataTable();
        });
</script>
