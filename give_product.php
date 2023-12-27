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


.space-between {
  justify-content: space-between;
}
.col {
  width: 100%;
}
.card {
  border: 1px solid #eee;
  border-radius: 15px;
  padding: 20px;
  background-color: #fff;
  display: flex;
  column-gap: 20px;
  box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.5);
  -webkit-box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.5);
  -moz-box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.5);
}
.card img {
  max-width: 250px;
  transform: translateY(-15%);
}
.img-placeholder {
  position: relative;
  max-height: 200px;
  overflow: hidden;
  border-radius: 15px;
  box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.75);
  -webkit-box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 1px 1px 16px -6px rgba(0, 0, 0, 0.75);
}
h3 {
  font-weight: 400;
}
p {
  font-weight: 300;
}
a {
  color: #888;
  text-decoration: none;
}
a:hover {
  color: inherit;
}
.table thead th {
   font-size: 14px;
    font-weight: 700;
}
.table tbody td {
   font-size: 14px;
    font-weight: 700;
}
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
                              <h2>Given Product Name</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                               
 
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <div> 
                                       </div>
                                          <table class="table table-striped  table-bordered">
                                          
                                             <thead style="background-color:green;color: white;">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 30%">Product Name</th>
                                                   <th style="width: 100%">All Staff Given This Product</th>
                                                    
                                                </tr>
                                             </thead>
                                             <tbody id="table" class="Product">
                                             <?php
                                             $sql = "SELECT DISTINCT product_name FROM vgi_product_distribution WHERE status='1' AND return_request != 'Damage'";
                                             $result = mysqli_query($conn, $sql);
                                             $i = 1;
                                             while ($data = mysqli_fetch_array($result)) {
                                                 $id = $data['id'];
                                                 $product_n = $data['product_name'];

                                                   $sql2 = "SELECT * FROM vgi_product WHERE id=$product_n";
                                                 $result2 = mysqli_query($conn, $sql2);
                                                 $data2 = mysqli_fetch_array($result2);
                                                 $pname = $data2['product_name'];
                                                 ?>
                                              <tr>
                                                  <td><?php echo $i;?></td>
                                                   <td>
                                                  <div class="flex-container space-between">
                                                  <div class="col card" style="box-shadow: inset 0 0 8px #ACA897;">

                                                    <div style="color: black;font-size: 22px;font-weight: 900; ">
                                                       <img src="images/logo/s.png" style="width: 44px">&nbsp;&nbsp;&nbsp;<?php echo $pname;?>
                                                    </div>
                                                  </div>
                                                   
                                                </div>
                                                </td>

                                                  <td>
                                                  <div class="flex-container space-between">
                                                  <div class="col card">
                                                    <div>
                                                     <table class="table table-borderless">
                                                     <thead>
                                                        <tr>
                                                         <th>S.No.</th>
                                                       <th>Staff Name</th>
                                                        
                                                       <?php
                                                   $sqlt = "SELECT product_name, SUM(quantity) AS total_quantity FROM vgi_product_distribution WHERE product_name = '$product_n' AND return_request != 'Damage' GROUP BY product_name";
                                                   $resultt = mysqli_query($conn, $sqlt);

                                                   if ($resultt) {
                                                       while ($datau = mysqli_fetch_array($resultt)) {
                                                           $total_quantity = $datau['total_quantity'];
                                                         echo '<th><button type="button" class="badge badge-dark" style="border:none">  Quantity: ' . $total_quantity . '</button></th>';
                                                      }
                                                   }
                                                   ?>  
                                                       </tr>
                                                     </thead>
                                                     <tbody>

                                                   <?php
                                                   $sqlu = "SELECT * FROM vgi_product_distribution WHERE product_name = '$product_n'AND return_request != 'Damage'";
                                                   $resultu = mysqli_query($conn, $sqlu);
                                                   $j = 1;
                                                   while ($datau = mysqli_fetch_array($resultu)) {
                                                      $id = $datau['id'];
                                                      $st = $datau['staff_name'];
                                                      $quant = $datau['quantity'];

                                                       $sqli = "SELECT * FROM  tbl_admin WHERE mobile = '$st'";
                                               $resulti = mysqli_query($conn, $sqli);
                                                  $datai=mysqli_fetch_array($resulti);
                                                 $staff_n = $datai['username'];
                                                      ?>
                                                       <tr>
                                                         <td><?php echo $j;?></td>
                                                         <td><?php echo $staff_n;?></td>
                                                          <td><?php echo $quant;?></td>
                                                       </tr>

                                                       <?php $j++; } ?>
                                                     </tbody>
                                                   </table>
                                                    </div>
                                                  </div>
                                                   
                                                </div>
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