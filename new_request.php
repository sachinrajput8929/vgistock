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
         .table.projects thead.thead-dark th{
                background: #206d02;
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
                              <h2>Product Request</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2 style="color:green; font-weight:600">New Product Request <small>>List</small></h2>
                                 </div>
                                
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">S.No.</th>
                                                   <th style="width: 30%">Staff Name</th>
                                                  <th>Product Name</th>
                                                  <th> Quantity</th>
                                                 <th>Reasion</th>
                                                 <th>Remark</th>
                                                 <th>Request Date</th>
                                                 <th>Status</th>
                                                 <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody class="Product">
                                          <?php
                                           $sql = "SELECT * FROM  vgi_new_request WHERE status ='pending'";
                                           $result = mysqli_query($conn, $sql);
                                           $i=1;
                                           while($data=mysqli_fetch_array($result))
                                           { 
                                             $id = $data['id'];
                                             $user = $data['user'];
                                              $product_name = $data['product_name'];
                                              $quantity = $data['quantity'];
                                              $request_date = $data['request_date'];
                                              $reasion = $data['reasion'];
                                              $remarks = $data['remarks'];
                                              $status = $data['status'];

                                               $sqlu = "SELECT * FROM  tbl_admin WHERE mobile = '$user'";
                                               $resultu = mysqli_query($conn, $sqlu);
                                                  $datau=mysqli_fetch_array($resultu);
                                                   $staff = $datau['username'];

                                                   $sql2 = "SELECT * FROM vgi_product WHERE id=$product_name";
                                                   $result2 = mysqli_query($conn, $sql2);
                                                   $data2 = mysqli_fetch_array($result2);
                                                   $pn = $data2['product_name'];
                                              ?>
                                                <tr>
                                                <td><?php echo $i ;?></td>
                                                <td><?php echo $staff ;?></td>
                                                 <td><?php echo $pn ;?></td>
                                                 <td><?php echo $quantity ;?></td>
                                                 <td><?php echo $reasion ;?></td>
                                                 <td><?php echo $remarks ;?></td>
                                                 <td> <?php echo $request_date ;?></td>
                                                 <td > <?php echo $status ;?></td>
                                                   <td>
                                                      
                                                      <a href="product_distribution1.php?umobile=<?php echo $user;?>&uname=<?php echo $staff;?>&newidd=<?php echo $id;?>"><i class="fa fa-hand-o-right" style="color:black;font-size: 20px"></i></a>
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