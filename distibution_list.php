<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Stock </title>
      <?php include_once('include/css.php'); ?>
      <style type="text/css">
         .Product tr td{
            color: black;font-weight: 500;
         }
      </style>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <?php include_once('include/header.php'); ?>
             <?php include_once('include/sidebar.php'); ?>
            <div id="content">
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                              <h2>Distribution</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Product Distribution <small>>List</small></h2>
                                    <div class=" input-group add-on" style="float:right;">
                                                <input class="form-control" placeholder="Search" name="srch-term" id="search" type="text">
                                                <button style="border-radius: 0px;background: #0c0cc2;" class="btn btn-info" type="submit">
                                                   <i class="fa fa-search"></i>
                                                </button>
                                             </div>
                                 </div>
                                  
                              </div>
 
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <div> 
                                       </div>
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 2%">Staff Name</th>
                                                   <th style="width: 30%">Email</th>
                                                    <th>Contact</th>
                                                     <th>Designation</th>
                                                    <th>Join Date</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody id="table" class="Product">
                                               <?php
                                          $sql1 = "SELECT DISTINCT staff_name FROM vgi_product_distribution WHERE status='1'";
                                          $result1 = mysqli_query($conn, $sql1);

                                          $i = 1;
                                          while ($data1 = mysqli_fetch_array($result1)) { 
                                              $staff_name = $data1['staff_name'];

                                              $sql2 = "SELECT * FROM tbl_admin WHERE status='1' AND mobile='$staff_name'";
                                              $result2 = mysqli_query($conn, $sql2);

                                              while ($data2 = mysqli_fetch_array($result2)) {
                                          ?>
                                                  <tr>
                                                      <td><?php echo $i; ?></td>
                                                      <td><?php echo $data2['username']; ?></td>
                                                      <td><?php echo $data2['email']; ?></td>
                                                      <td><?php echo $data2['mobile']; ?></td>
                                                      <td><?php echo $data2['designation']; ?></td>
                                                      <td><?php echo $data2['createdate']; ?></td>
                                                      <td>
                                                          <a href="staff_profile.php?umobile=<?php echo $staff_name; ?>&uname=<?php echo $data2['username']; ?>" class="btn cur-p btn-primary" title="View-Details">
                                                              <i class="fa fa-eye" style="color: black; font-size: 20px;"></i>
                                                          </a>
                                                      </td>
                                                  </tr>
                                          <?php
                                                  $i++;
                                              }
                                          }
                                          ?>

                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <!-- end row -->
                     </div>
                  </div>
                  <!-- end dashboard inner -->
               </div>
            </div>
         </div>
      </div>
 <div style="margin-top:60px">
<?php include_once('include/bottom.php'); ?>
 </div>


<script>$("#search").on("keyup", function() {
  var value = $(this).val().toLowerCase();
  $("#table tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});</script>
   </body>
</html>