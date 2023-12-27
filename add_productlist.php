<?php 
session_start();
require_once('include/config.php');
require_once('authcation.php');
"hello ".$_SESSION['mobile'];
 "hello ".$_SESSION['username'];
 "hello ".$_SESSION['email'];
date_default_timezone_set("Asia/Calcutta");
    $tdate = date('Y-m-d');
 $created_date = date("d-m-Y", strtotime($tdate));

if (isset($_POST['submit'])){
 
$product_name=$_POST['product_name'];
$product_description=$_POST['product_description'];
$product_remark=$_POST['product_remark'];
$status= '1';
 
  $sql="INSERT INTO  vgi_product (product_name,product_description,product_remark,status,add_date)VALUES('$product_name', '$product_description', '$product_remark', '$status', '$tdate')";
   $result=mysqli_query($conn,$sql);
   if($result){
 echo "<script language='javascript'> alert ('Add Product successfully!');</script>";
    }
 }
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
                                    <h2>Product <small>>Add</small></h2>
                                 </div>
                                 <div class="button_block" style="float:right;">
                                   <a href="product_list.php"> <button  type="button" class="btn" style="background:#0b0cd2;;color: white;font-weight: 600;font-size: 15px;">Product-List</button></a>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
   <form  method="POST">
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label id="name-label" for="name">Product Name</label>
                  <input type="text" name="product_name" id="name" placeholder="Enter your name" class="form-control" required>
               </div>
            </div>
            <div class="col-md-6">
               <div class="form-group">
                  <label id="email-label" for="email">Product Date</label>
                  <input type="text" name="add_date" value="<?php echo $created_date;?>"  style="background: #c2c2c2;"  class="form-control" readonly>
               </div>
            </div>
         </div>
         
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label id="number-label" for="number">Product Description</label>
                  <textarea  id="comments" class="form-control" name="product_description" placeholder="Description..."></textarea>
               </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label>Product Remark</label>
                  <textarea  id="comments" class="form-control" name="product_remark" placeholder="Remark..."></textarea>
               </div>
            </div>
         </div>
         
         
         <div class="row">
            <div class="col-md-4 button_block">
                  <button type="submit" name="submit" class="btn" style="background:green;color: white;font-weight: 600;font-size: 15px;">Add Product</button>
            </div>
         </div>
      </form>
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