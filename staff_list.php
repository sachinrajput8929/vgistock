<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
 $user = $_SESSION['mobile'];

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Stock dashboard</title>
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
                              <h2>Staff</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Staff <small>>List</small></h2>
                                 </div>
                               <?php
                              $sqli="select * from vgi_new_request WHERE status ='pending'";
                                  $resulti=mysqli_query($conn,$sqli);
                                  $count1 = mysqli_num_rows($resulti);
                              ?>
                              <?php
                               $sqlj="select * from vgi_return_request WHERE status ='pending'";
                                  $resultj=mysqli_query($conn,$sqlj);
                                  $count2 = mysqli_num_rows($resultj);
                              ?>

                                  <div style="float:right;margin: 2px;" class="button_block">
                                    <a href="return_request.php"><button type="button" class="btn cur-p btn-danger">Staff Request for Return Product<sup style="color: #fff;background: #214162;font-weight: 800;margin: 6px; padding: 3px 6px 1px 4px;border-radius: 15px 13px 12px 0px;font-size: 12px;"> <?php echo $count2;?></sup></button></a>
                                 </div>
                                  <div class="button_block" style="float:right;margin: 2px;">
                                    <a href="new_request.php"><button type="button" class="btn cur-p btn-success"> Staff Request for New Product<sup style="color: #fff;background: #214162;font-weight: 800;margin: 6px; padding: 3px 6px 1px 4px;border-radius: 15px 13px 12px 0px;font-size: 12px;"> <?php echo $count1;?></sup></button></a>

                                 </div>
                                
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-bordered projects table-bordered">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">S.No.</th>
                                                   <th style="width: 30%">Name</th>
                                                   <th>Email</th>
                                                   <th>Contact</th>
                                                   <th>Designation</th>
                                                     <th>Join Date</th>
                                                   <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody class="Product">
                                                <?php
                                                $sql = "SELECT * FROM  tbl_admin WHERE status ='1'";
                                                $result = mysqli_query($conn, $sql);
                                                $i=1;
                                                while($data=mysqli_fetch_array($result))
                                                   { 
                                                      ?>
                                                <tr>
                                                 <td><?php echo $i;?></td>
                                                 <td><?php echo $data['username']?></td>
                                                 <td><?php echo $data['email']?></td>
                                                 <td><?php echo $data['mobile']?></td>
                                                 <td><?php echo $data['designation']?></td>
                                                 <td><?php echo $data['createdate']?></td>

                                                   <td>
                                                      <a href="staff_profile.php?umobile=<?php echo $data['mobile'];?>&uname=<?php echo $data['username'];?>" ><i class="fa fa-eye" style="color:black;font-size: 20px;"></i></a>
                                                      <a href="product_distribution.php?umobile=<?php echo $data['mobile'];?>&uname=<?php echo $data['username'];?>" title="Given Product"><i class="fa fa-hand-o-right" style="color:black;font-size: 20px"></i></a>
                                                    </td>
                                                </tr>
                                             <?php $i++; }?>
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


       
   </body>
</html>