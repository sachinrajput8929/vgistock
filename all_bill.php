<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];

 $pid = $_REQUEST['pid'];
 $pname = $_REQUEST['name'];
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

  

#card {
/*  width: 650px;
  height: 200px;*/
  margin: 0;
  padding: 15px;
  display: flex;
  flex-direction: row;
  align-items: center;
  background: #FFFFFF;
  border-radius: 8px;
box-shadow: inset rgba(0, 0, 0, 0.1) -4px -4px 20px 12px;}

#avatar {
/*  width: 200px;
  height: 200px;*/
  object-fit: cover;
  border-radius: 8px;
}

#info {
  width: 100%;
  height: 100%;
  margin: 0 15px;
  display: flex;
  flex-direction: column;
}

#name {
  font-size: 16px;
  font-weight: 800;
  margin: 0;
  padding: 0;
}

#activity {
  color: #999999;
   font-weight: 600;
  letter-spacing: -.5px;
  margin: 0;
  padding: 0;
}

#stats {
  margin: auto 0 15px 0;
  padding: 0;
   flex-direction: row;
  justify-content: space-between;
}

.stats-text {
  color: #5B5B5B;
  font-size: 18px;
  font-weight: 600;
  letter-spacing: -1px;
  margin: 0;
  padding: 0;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.stats-text svg {
  fill: #5B5B5B;
  width: 20px;
  height: 20px;
}

.stats-text span {
  color: #000000;
  font-weight: 800;
  margin: 0 5px;
}

#btn {
  color: #FFFFFF;
  font-size: 20px;
  font-weight: 600;
  text-align: center;
  width: calc(100% - 20px);
  margin: 0;
  padding: 10px;
  background: #0501f6;
  border-radius: 8px;
  cursor: pointer;
}

#btn:hover {
  background: #2A26FF;
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
                              <h2>Product Bill</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2><span style="font-size:22px;color:red;font-weight: 700"><?php echo $pname;?>></span>&nbsp;&nbsp;Bill<small>>List</small></h2>
                                   
                                          </div>
 
                                  
                              </div>
 
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                       <?php
                                            $sql1 = "SELECT * FROM vgi_stock_history WHERE product_id=$pid";
                                          $result1 = mysqli_query($conn, $sql1);

                                          $i = 1;
                                          while ($data1 = mysqli_fetch_array($result1)) {
                                             $idd = $data1['id'];
                                              $product_i = $data1['product_id'];
                                              $stock_quantity = $data1['stock_quantity'];
                                              $bill_date = $data1['add_date'];
                                               $bill = $data1['product_bill'];


                                               $sql2 = "SELECT * FROM vgi_product WHERE id=$product_i";
                                              $result2 = mysqli_query($conn, $sql2);
                                              $data2 = mysqli_fetch_array($result2);
                                              $product_name = $data2['product_name'];
                                              ?>
                                          <div class="col-lg-3">
                                          <div id="card">
                                            <div id="info">
                                             <div id="stats">
                                              <p id="name">Stock Quantity:<?php echo $stock_quantity ;?></p>
                                              <p id="activity">Bill-Date:<?php echo $bill_date ;?></p>
                                              </div>
                                              <a href="uploads/<?php echo $bill; ?>" target="_blank"><img src="images/logo/printer.png"><span style="font-size: 11px;font-weight: 800;color: white;margin-left: 11px;background: black;border-radius: 4px;padding: 3px;">PRINT &nbsp;<i class="fa fa-download" aria-hidden="true"></i></span> </a>
                                            </div>
                                          </div>
                                       </div>
                                   <?php } ?>
                                 
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