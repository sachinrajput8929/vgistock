<?php 
 require_once('include/config.php');
session_start();
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];




                              
 $sqlt = "SELECT SUM(stock_quantity) AS total_quantity FROM vgi_stock WHERE status='1'";
$resultt = mysqli_query($conn, $sqlt);
 if ($resultt) {
   $datat = mysqli_fetch_array($resultt);
   $totalq = $datat['total_quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Stock dashboard</title>
      <?php include_once('include/css.php'); ?>
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
             <?php include_once('include/header.php'); ?>
             <?php include_once('include/sidebar.php'); ?>
            <div id="content">
              
               <!-- end topbar and sidebar-->

               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <div class="page_title">
                             <a href="dashboard.php"><img class="img-responsive" src="images/logo/home.png" width="30" alt="#" />&nbsp; &nbsp;&nbsp;<span style="font-size: 15px;color: black;font-weight: 600;">Welcome User !</span></a>

                           </div>
                        </div>
                     </div>

                     <div class="row column1">
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div style="text-align: center;"> 
                                   <img src="images/logo/d1.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-success" style="font-size: 11px;border-radius: 29px;">

                                       <?php $sqli = "SELECT * FROM tbl_admin WHERE status = '1'";
                                       $resulti = mysqli_query($conn, $sqli);
                                    echo $count1 = mysqli_num_rows($resulti);?>
                                 </span></p>
                                    <p class="head_couter">All Employee</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div style="text-align: center;"> 
                                   <img src="images/logo/d2.png" style="max-width: 85%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-info" style="font-size: 11px;border-radius: 29px;">
                                       <?php echo $totalq;?>
                                          </span>
                                       </p>
                                    <p class="head_couter">All Stocks</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                 <div style="text-align: center;"> 
                                   <img src="images/logo/d3.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>

                                    <p class="total_no">
                                       <span class="badge badge-secondary" style="font-size: 11px;border-radius: 29px;">
                                        <?php $sqlb = "SELECT * FROM vgi_stock_history";
                                       $resultb = mysqli_query($conn, $sqlb);
                                    echo $countb = mysqli_num_rows($resultb);?>
                                       </span>
                                    </p>
                                    <p class="head_couter">Stock History Bill</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                  <div style="text-align: center;"> 
                                   <img src="images/logo/d4.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-dark" style="font-size: 11px;border-radius: 29px;">
                                       <?php    
                                       $sqlg = "SELECT SUM(quantity) AS total_give FROM vgi_product_distribution WHERE status='1' AND return_request !='Damage'";
                              $resultg = mysqli_query($conn, $sqlg);
                              if ($resultg) {
                                 $datag = mysqli_fetch_array($resultg);
                                echo $totalgive = $datag['total_give'];
                              }?> 
                           </span>
                                    </p>
                                    <p class="head_couter">Distributed  </p>
                                 </div>
                              </div>
                           </div>
                        </div>

                          <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                  <div style="text-align: center;"> 
                                   <img src="images/logo/d5.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-primary" style="font-size: 11px;border-radius: 29px;">
                                     <?php $sqlpro = "SELECT * FROM vgi_product WHERE status = '1'";
                                       $resultpro = mysqli_query($conn, $sqlpro);
                                    echo $countpro = mysqli_num_rows($resultpro);?>
                                       </span>
                                    </p>
                                    <p class="head_couter">Product  </p>
                                 </div>
                              </div>
                           </div>
                        </div>


                         <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                  <div style="text-align: center;"> 
                                   <img src="images/logo/d6.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-warning" style="font-size: 11px;border-radius: 29px;">
                                    <?php 
                                          $sqld = "SELECT SUM(return_quantity) AS total_damage FROM vgi_product_distribution WHERE status='1' AND return_request ='Damage'";
                              $resultd = mysqli_query($conn, $sqld);
                              if ($resultd) {
                                 $datad = mysqli_fetch_array($resultd);
                                echo $totald = $datad['total_damage'];
                              }
                                    ?> </span>
                                    </p>
                                    <p class="head_couter">Damage Product  </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                  <div style="text-align: center;"> 
                                   <img src="images/logo/d7.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                    <span class="badge badge-success" style="font-size: 11px;border-radius: 29px;"> 
                                       <?php
                                        $sqli="select * from vgi_new_request WHERE status ='pending'";
                                  $resulti=mysqli_query($conn,$sqli);
                                  echo $count3 = mysqli_num_rows($resulti); 
                                       ?></span>
                                    </p>
                                    <p class="head_couter">New Requset  </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                         <div class="col-md-6 col-lg-3">
                           <div class="full counter_section margin_bottom_30">
                              <div class="couter_icon">
                                  <div style="text-align: center;"> 
                                   <img src="https://cdn-icons-png.flaticon.com/512/1482/1482538.png" style="max-width: 65%;">
                                 </div>
                              </div>
                              <div class="counter_no">
                                 <div>
                                    <p class="total_no">
                                       <span class="badge badge-danger" style="font-size: 11px;border-radius: 29px;">
                                    <?php 
                                    $sqlj="select * from vgi_return_request WHERE status ='pending'";
                                  $resultj=mysqli_query($conn,$sqlj);
                                  echo $count4 = mysqli_num_rows($resultj);
                                    ?> </span>
                                    </p>
                                    <p class="head_couter">Return Request  </p>
                                 </div>
                              </div>
                           </div>
                        </div>


                     </div>
                  </div>
                  <!-- footer -->
                <!--   <div class="container-fluid">
                     <div class="footer">
                        <p>Copyright © 2018 Designed by html.design. All rights reserved.<br><br>
                           Distributed By: <a href="https://themewagon.com/">ThemeWagon</a>
                        </p>
                     </div>
                  </div> -->
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
 <div style="margin-top:60px">
<?php include_once('include/bottom.php'); ?>
 </div>
 
   </body>
</html>