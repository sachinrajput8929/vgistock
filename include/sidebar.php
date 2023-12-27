<?php 
session_start();
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
 $user=$_SESSION['mobile'];
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Stock dashboard</title>
      <?php include_once('include/css.php'); ?>
   </head>
   <body class="dashboard dashboard_1">
<nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/fev2.png" alt="#" /></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img">
                           <?php if($user=='9911673333') {?>
                           <img class="img-responsive" src="images/logo/mithun.jpg" alt="#" />
                    <?php }elseif($user=='7004529367') { ?>
                           <img class="img-responsive" src="images/logo/kk.jpg" alt="#" />
                    <?php }else { ?>
                           <img class="img-responsive" src="images/logo/fev2.png" alt="#" />
                    <?php } ?>
                        </div>
                        <div class="user_info">
                           <h6><?php echo $_SESSION['name'];?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4><a href="dashboard.php"><i class="fa fa-dashboard yellow_color"></i> &nbsp; &nbsp;<span style="color:white;font-weight: 700;">Home</span></a></h4>
                  <ul class="list-unstyled components">
                
                     <!-- <li><a href="widgets.html"><i class="fa fa-clock-o orange_color"></i> <span>Widgets</span></a></li> -->
                     <li>
                        <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-desktop purple_color"></i> <span>Product</span></a>
                        <ul class="collapse list-unstyled" id="element">
                           <li><a href="product_list.php">> <span>Product List</span></a></li>
                           <li><a href="add_productlist.php">> <span>Add Product</span></a></li>
                          </ul>
                     </li>
                     <!-- <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li> -->
                     <li>
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Stock</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="stock_list.php">> <span>Stock List</span></a></li>
                           <li><a href="add_stock.php">> <span>Add Stock</span></a></li>
                           <li><a href="stock_history.php">> <span>Stock History</span></a></li>
                        </ul>
                     </li>

                       <?php
                       require_once('config.php');

                              $sqli="select * from vgi_new_request WHERE status ='pending'";
                                  $resulti=mysqli_query($conn,$sqli);
                                  $count1 = mysqli_num_rows($resulti);
                              
                               $sqlj="select * from vgi_return_request WHERE status ='pending'";
                                  $resultj=mysqli_query($conn,$sqlj);
                                  $count2 = mysqli_num_rows($resultj);
                              ?>
 

                       <li class="active">
                        <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Product Distribution</span></a>
                        <ul class="collapse list-unstyled" id="additional_page">
                             <li>
                              <a href="product_distribution.php">> <span>Distribution</span></a>
                           </li>
                             <li>
                              <a href="distibution_list.php">> <span>Distribution List</span></a>
                           </li>
                            <li>
                              <a href="new_request.php">> <span>New Product Request&nbsp;<span class="badge badge-success" style="font-size: 11px;border-radius: 29px;"><?php echo $count1 ;?></span></span></a>
                           </li>
                            <li>
                              <a href="return_request.php">> <span>Return Request&nbsp;<span class="badge badge-danger" style="font-size: 11px;border-radius: 29px;"><?php echo $count2 ;?></span></span></a>
                           </li>
                           <li>
                              <a href="staff_list.php">> <span>All Staff List</span></a>
                           </li>
                        </ul>
                     </li>
                    

                     <li class="active">
                        <a href="#additional_page1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cog yellow_color"></i>  <span>Settings</span></a>
                        <ul class="collapse list-unstyled" id="additional_page1">
                           <li>
                              <a href="logoff.php"> <span>Logout  <i class="fa fa-sign-out" aria-hidden="true"></i></span></a>
                           </li>
                         </ul>
                     </li>
                     
                  </ul>
               </div>
            </nav>



         </body>

