 <?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
 $umobile=$_REQUEST['umobile'];
 $uname=$_REQUEST['uname'];

 $sqlu = "SELECT * FROM  tbl_admin WHERE mobile = '$umobile' AND status ='1'";
$resultu = mysqli_query($conn, $sqlu);
while($datau=mysqli_fetch_array($resultu)){
$username = $datau['username'];
$email = $datau['email'];
$designation = $datau['designation'];
$createdate = $datau['createdate'];
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <?php include_once('include/css.php'); ?>
      <style>
         .table thead th{
            font-weight: 700;
         }
            .tab_style2 .tabbar nav div.nav-tabs .nav-link.active{
             font-size: 18px;font-weight: 600;
            }
            .tabbar nav div.nav-tabs .nav-link{
               font-size: 18px;color: black;font-weight: 600;border: 1px solid;
            } 
            .duration{
               background: red;
    color: white;
    border-radius: 3px;
    text-align: center;
    font-weight: 800;
            }
            .duration1{
               background: green;
    color: white;
    border-radius: 3px;
    text-align: center;
    font-weight: 800;
            }
      </style>

   </head>
   <body class="inner_page profile_page">
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
                              <h2>Profile</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                         
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>User profile</h2>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <!-- user profile section --> 
                                    <!-- profile image -->
                                    <div class="col-lg-12">
                                       <div class="full dis_flex center_text">
                                          <div class="profile_img"><img width="100" class="rounded-circle" src="images/logo/pro.png" alt="#" /></div>
                                          <div class="profile_contant">
                                             <div class="contact_inner">
                                                <h3><?php echo $username;?></h3>
                                                <h4><strong>About: </strong><?php echo $designation;?></h4>
                                                <ul class="list-unstyled">
                                                   <li style="color: black;font-weight: 700;"><i class="fa fa-envelope-o"></i> : <?php echo $email;?></li>
                                                   <li style="color: black;font-weight: 700;"><i class="fa fa-phone"></i> : <?php echo $umobile;?></li>
                                                </ul>
                                             </div>
                                             <div class="user_progress_bar">
                                                <div class="progress_bar">
                                                    
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                       <!-- profile contant section -->
                                       <div class="full inner_elements margin_top_30">
                                          <div class="tab_style2">
                                             <div class="tabbar">
                                                <nav>
                                                   <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#recent_activity" role="tab" aria-selected="true">Recent Product</a>
                                                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#project_worked" role="tab" aria-selected="false">Return Product History</a>
                                                      
                                                   </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                   <div class="tab-pane fade show active" id="recent_activity" role="tabpanel" aria-labelledby="nav-home-tab">
                                                      <div class="msg_list_main table-responsive-sm">
                                                       <table class="table table-bordered projects table-bordered">
                                             <thead class="thead-dark">
                                                <tr>
                                                 <th>S.No.</th>
                                                 <th>Product Name</th>
                                                 <th>Quantity</th>
                                                 <th>Remark</th>
                                                 <th>Parchase Date</th>
                                                 </tr>
                                             </thead>
                                             <tbody class="Product">
                                                <?php
                                                  $sql = "SELECT * FROM vgi_product_distribution WHERE staff_name = '$umobile' AND return_request != 'Damage'";
                                                $result = mysqli_query($conn, $sql);
                                                $i=1;
                                                while($data=mysqli_fetch_array($result))
                                                { 
                                                   $id = $data['id'];
                                                     $product_name = $data['product_name'];
                                                    $remark = $data['remark'];
                                                    $quantity = $data['quantity'];
                                                    $given_date = $data['given_date'];
                                                    $status = $data['status'];

                                                    $sql2 = "SELECT * FROM vgi_product WHERE id=$product_name";
                                                       $result2 = mysqli_query($conn, $sql2);
                                                       $data2 = mysqli_fetch_array($result2);
                                                       $pname = $data2['product_name'];
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i ;?></td>
                                                    <td><?php echo $pname ;?></td>
                                                    <td><?php echo $quantity ;?></td>
                                                    <td><?php echo $remark ;?></td>
                                                    <td> <?php echo $given_date ;?></td>
                                                 </tr>
                                                 <?php $i++; }?>
                                             </tbody>
                                          </table>
                                                      </div>
                                                   </div>
                                                   <div class="tab-pane fade table-responsive-sm" id="project_worked" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                      <table class="table table-bordered projects table-bordered">
                                             <thead  style="background-color:#d30808 !important; color: white;">
                                                <tr>
                                                   <th>S.No.</th>
                                                 <th>Product Name</th>
                                                 <th>Reasion</th>
                                                 <th>Return Quantity</th>
                                                 <th>Return Date</th>
                                                 <th>Status</th>
                                                </tr>
                                             </thead>
                                             <tbody class="Product">
                                                 <?php
                                                  $sql1 = "SELECT * FROM  vgi_return_request WHERE user = '$umobile'";
                                                $result1 = mysqli_query($conn, $sql1);
                                                $i=1;
                                                while($data1=mysqli_fetch_array($result1))
                                                { 
                                                    $id = $data1['id'];
                                                    $user = $data1['user'];
                                                     $product_name = $data1['product_name'];
                                                    $request_date = $data1['request_date'];
                                                    $return_quantity1 = $data1['return_quantity'];
                                                    $reasion = $data1['reasion'];
                                                    $remarks = $data1['remarks'];
                                                    $status = $data1['status'];
                                                     $sqlp = "SELECT * FROM vgi_product WHERE id=$product_name";
                                                       $resultp = mysqli_query($conn, $sqlp);
                                                       $datap = mysqli_fetch_array($resultp);
                                                       $pn = $datap['product_name'];
                                                    ?>
                                                <tr>
                                                    <td><?php echo $i ;?></td>
                                                    <td><?php echo $pn ;?></td>
                                                    <td><?php echo $reasion ;?></td>
                                                    <td><?php echo $return_quantity1 ;?></td>
                                                     <td> <?php echo $request_date ;?></td>
                                                    <td>
                                                    <?php if($status=='Approve') {?>
                                                   <button type="button" class="btn btn-success btn-xs">Returned&nbsp;<i class="fa fa-check" aria-hidden="true"></i></button>
                                               <?php }elseif($status=='Damage') { ?>
                                                   <button type="button" class="btn btn-danger btn-xs">This product is Damage&nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>
                                               <?php }else { ?>
                                                   <button type="button" class="btn btn-primary btn-xs">Return Status Pending..</button>
                                               <?php } ?>
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
                                       <!-- end user profile section -->
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
      <!-- jQuery -->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <!-- calendar file css -->    
      <script src="js/semantic.min.js"></script>
   </body>
</html>