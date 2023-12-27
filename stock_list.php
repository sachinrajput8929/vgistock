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
                              <h2>Stock</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Product Stock <small>>List</small></h2>
                                    <div class=" input-group add-on" style="float:right;">
                                                <input class="form-control" placeholder="Search" name="srch-term" id="search" type="text">
                                                <button style="border-radius: 0px;" class="btn btn-info" type="submit">
                                                   <i class="fa fa-search"></i>
                                                </button>
                                             </div>
                                          </div>

                              <?php
                              $sqlt = "SELECT SUM(stock_quantity) AS total_quantity FROM vgi_stock WHERE status='1'";
                              $resultt = mysqli_query($conn, $sqlt);
                              if ($resultt) {
                                 $datat = mysqli_fetch_array($resultt);
                                 $totalq = $datat['total_quantity'];
                              }

                                $sqlg = "SELECT SUM(quantity) AS total_give FROM vgi_product_distribution WHERE status='1' AND return_request !='Damage'";
                              $resultg = mysqli_query($conn, $sqlg);
                              if ($resultg) {
                                 $datag = mysqli_fetch_array($resultg);
                                 $totalgive = $datag['total_give'];
                              }


                                  $sqld = "SELECT SUM(return_quantity) AS total_damage FROM vgi_product_distribution WHERE status='1' AND return_request ='Damage'";
                              $resultd = mysqli_query($conn, $sqld);
                              if ($resultd) {
                                 $datad = mysqli_fetch_array($resultd);
                                 $totald = $datad['total_damage'];
                              }
                              ?>
                                  
                                 <div class="button_block p-1"  style="float:right;"><a href="damage_product.php"><button type="button" class="btn" style="background:red;color: white;font-weight: 600;font-size: 15px;"><i class="fa fa-chain-broken" aria-hidden="true"></i>&nbsp;Damage Product =&nbsp;<span class="badge badge-light"><?php echo $totald;?></span></button></a></div>

                                 <div class="button_block p-1"  style="float:right;"><a href="give_product.php"><button type="button" class="btn" style="background:green;color: white;font-weight: 600;font-size: 15px;"><i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;Total Given Product = &nbsp;<span class="badge badge-light"><?php echo $totalgive;?></span></button></a></div>
 
                                  <div class="button_block p-1"  style="float:right;"><a href="add_stock.php"><button type="button" class="btn" style="background:#170fec;color: white;font-weight: 600;font-size: 15px;">Add Stock&nbsp;<i class="fa fa-plus-square" aria-hidden="true"></i></button></a></div>
                                  
                              </div>
 
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <div> 
                                       </div>
                                          <table class="table table-striped  table-bordered">
                                             <button type="button" class="btn" style="background: black;color: white; font-weight: 900;">Total Stock &nbsp;<span class="badge badge-light"><?php echo $totalq;?></span></button>
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 2%">Product Name</th>
                                                   <th style="width: 30%">Stock Quantity</th>
                                                    <th>Added Date</th>
                                                     <th>Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                             </thead>
                                             <tbody id="table" class="Product">
                                              <?php
                                            $sql1 = "SELECT * FROM vgi_stock WHERE status='1'";
                                          $result1 = mysqli_query($conn, $sql1);

                                          $i = 1;
                                          while ($data1 = mysqli_fetch_array($result1)) {
                                             $idd = $data1['id'];
                                              $pid = $data1['product_id'];
                                              $stock_quantity = $data1['stock_quantity'];


                                               $sql2 = "SELECT * FROM vgi_product WHERE id=$pid";
                                              $result2 = mysqli_query($conn, $sql2);
                                              $data2 = mysqli_fetch_array($result2);
                                              $product_name = $data2['product_name'];
                                              ?>
                                              <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $product_name; ?></td>
                                                  <!-- <td><?php echo $data1['stock_quantity']; ?></td> -->
                                                   <td>
                                                   <?php if ($stock_quantity == '0'): ?>
                                                       <p style="color:red; font-weight: 700;">Out of Stock Because Product is: <?php echo $data1['stock_quantity']; ?></p>
                                                   <?php elseif ($stock_quantity < 0): ?>
                                                       <p style="color:red; font-weight: 700;">Out of Stock Because Product is: <?php echo $data1['stock_quantity']; ?></p>
                                                   <?php else: ?>
                                                       <p><?php echo $data1['stock_quantity']; ?></p>
                                                   <?php endif; ?>

                                                 </td>

                                                  <td><?php echo $data1['add_date']; ?></td>
                                                  <td><?php echo $data1['remarks']; ?></td>
                                                  <td>
                                                    
                                                      <a href="edit_stock.php?idd=<?php echo $idd; ?>" class="btn cur-p btn-warning" title="Add">
                                                          <i class="fa fa-plus-square"></i>
                                                      </a>
                                                      <a href="all_bill.php?pid=<?php echo $pid; ?>&name=<?php echo $product_name; ?>" class="btn cur-p btn-danger" title="Bill">
                                                          <i class="fa fa-file-pdf-o" style="color:white;font-weight: 800;"></i>
                                                      </a>
                                                  </td>
                                              </tr>
                                              <?php $i++;
                                          } ?>


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