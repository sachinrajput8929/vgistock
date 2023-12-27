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
                              <h2>Product</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Product <small>>List</small></h2>
                                 </div>
                                  <div class="button_block" style="float:right;">
                                    <a href="add_productlist.php"><button  type="button" class="btn" style="background:green;color: white;font-weight: 600;font-size: 15px;"><i class="fa fa-plus-circle"></i>&nbsp;Add Product</button></a>
                                 </div>

                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <table class="table table-striped projects">
                                             <thead class="thead-dark">
                                                <tr>
                                                   <th style="width: 2%">No</th>
                                                   <th style="width: 30%">Product Name</th>
                                                   <th>Product Description</th>
                                                   <th>Product Remark</th>
                                                   <th>Product Date</th>
                                                   <th>Status</th>
                                                </tr>
                                             </thead>
                                             <tbody class="Product">
                                                <?php
                                                $sql = "SELECT * FROM  vgi_product";
                                                $result = mysqli_query($conn, $sql);
                                                $i=1;
                                                while($data=mysqli_fetch_array($result))
                                                   { 
                                                     
                                                      $id = $data['id'];
                                                      $product_name = $data['product_name'];
                                                      $product_description = $data['product_description'];
                                                      $product_remark = $data['product_remark'];
                                                      $status = $data['status'];
                                                      $add_date = $data['add_date'];
                                                      ?>
                                                <tr>
                                                   <td><?php echo $i; ?></td>
                                                   <td>
                                                     <?php echo $product_name; ?>  
                                                   </td>
                                                   <td>
                                                     <?php echo $product_description; ?> 
                                                   </td>
                                                   <td class="project_progress">
                                                      <?php echo $product_remark; ?> 
                                                   </td>
                                                   <td class="project_progress">
                                                      <?php echo $add_date; ?> 
                                                   </td>
                                                   <td>
                                                      <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash" aria-hidden="true"></i></button>
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