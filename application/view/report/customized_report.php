<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

<section class="content-header">
    <h1>
        Customized Report
    </h1>
</section>
<section class="content">
    <div class="row" id="main_row">
        <div class="col-md-12">
            <div class="box box-primary">                
                <div class="box-body">
                    <form class="form-inline" method="POST">                                              
                        <div class="form-group">
                                <input type="date" class="form-control" id="from" name="from" placeholder="From" value="<?php if(isset($_POST['from'])) echo $_POST['from']; ?>" required>
                        </div>
                        <div class="form-group">
                                <input type="date" class="form-control" id="to" name="to" placeholder="To" value="<?php if(isset($_POST['to'])) echo $_POST['to']; ?>" required>
                        </div>                        
                        <div class="form-group">
                            <select class="form-control" name="counselor_id" required>
                                <option value="">Select Counselor</option>
                                <?php foreach($counselor_rows as $counselor_row): ?>
                                    <option <?php if(isset($_POST['counselor_id']) && $counselor_row['id'] == $_POST['counselor_id']) echo 'selected';?> value="<?=$counselor_row['id']?>"><?=$counselor_row['user_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <script>
                            $(function() {
                              $( "#from" ).datepicker({
                                    changeMonth: true,
                                    dateFormat: "yy-mm-dd",
                                    maxDate:0,
                                    onClose: function( selectedDate ) {
                                      $( "#to" ).datepicker( "option", "minDate", selectedDate );
                                    }
                              });
                              $( "#to" ).datepicker({
                                    defaultDate: "+1w",
                                    changeMonth: true,
                                    maxDate:0,
                                    dateFormat: "yy-mm-dd",
                                    onClose: function( selectedDate ) {
                                      $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                                    }
                              });
                            });
                        </script>
                        <button type="submit" class="btn btn-success">Filter</button>
                    </form>
                    <br style="clear: both">
                    <hr>
                    <table id="datatable" class="table table-bordered table-striped datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone No.</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Next Follow-up Date</th>
                                 <!-- <th>Number of Followups</th> -->
                                 <!-- <th>View Followups</th> -->
                            </tr>
                        <?php if($leads_rows != '') { ?>
                              <?php foreach ($leads_rows as $lr) { ?>
                             <tr>
                                <td><?=$lr['id']?></td>
                                <td><?=$lr['first_name']?></td>
                                <td><?=$lr['last_name']?></td>
                                <td><?=$lr['email']?></td>
                                <td><?=$lr['phone']?></td>
                                <td><?=$lr['address']?></td>
                                <td><?php $var=$lr['status_id']; ?>
                                         <?php if($var == 1) {
                                           echo 'Active'; 
                                          }
                                          else if($var == 2) {
                                            echo 'Expired';
                                          }
                                          else if($var == 3) {
                                            echo 'Dismissed';
                                          }
                                          else if($var == 4) {
                                            echo 'Postponed';
                                          }
                                          else if($var == 5) {
                                            echo 'Student';
                                          }
                                          ?>
                                          
                                </td>
                                <td><?=$lr['created_at']?></td>
                            </tr>
                             <?php }?>
                             <?php }?>
                    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
        $(function () {
            $(".datatable").DataTable();
        });
</script>




</div>


