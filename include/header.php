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
        <?php include_once('include/css.php'); ?>
    </head>
   <body class="dashboard dashboard_1">
      <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="dashboard.php">
                              <img class="img-responsive" src="images/logo/ved.png" alt="#" />
                              <span style="font-size: 18px;font-weight: 900;color: #ffffff;margin: 11px 24px 0px 20px;">VGI Stocks</span></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                             
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <?php if($user=='9911673333') {?>
                           <img class="img-responsive" src="images/logo/mithun.jpg" style="border-radius: 14px;" alt="#" />
                    <?php }elseif($user=='7004529367') { ?>
                           <img class="img-responsive" src="images/logo/kk.jpg" style="border-radius: 14px;" alt="#" />
                    <?php }else { ?>
                           <img class="img-responsive" src="images/logo/fev2.png" alt="#" />
                    <?php } ?>
                                       <span class="name_user"><?php echo $_SESSION['name'];?></span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="profile.html"> <?php echo $_SESSION['email'];?></a>
                                        <a class="dropdown-item" href="logoff.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
 

            </body>