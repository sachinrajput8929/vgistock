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

if (isset($_POST['add'])){
$product_id=$_POST['product_id'];
$stock_quantity=$_POST['stock_quantity'];
$remarks=$_POST['remarks'];
$status=$_POST['status'];

$filename = $_FILES['product_bill']['name'];
    $tempname = $_FILES['product_bill']['tmp_name'];
    move_uploaded_file($tempname,'uploads/'.$filename);
 

   $sql_check="SELECT * FROM vgi_stock where product_id='".$product_id."'";
  $result = mysqli_query($conn, $sql_check);
  $count = mysqli_num_rows($result);
   $datai = mysqli_fetch_array($result);
   $idi = $datai['id'];
   if($count == 1){
    echo "<script>
            alert('This Product is already Add in Stock! So Only Add Quantity');
            window.location.href = 'edit_stock1.php?idd=' + $idi;
          </script>";
} else{
 $sql = "INSERT INTO vgi_stock (product_id, stock_quantity, add_date, remarks,product_bill, status) VALUES ('$product_id', '$stock_quantity', '$tdate', '$remarks', '$filename', '$status')";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $sql_history = "INSERT INTO vgi_stock_history (product_id, stock_quantity, add_date, remarks,product_bill, status) VALUES ('$product_id', '$stock_quantity', '$tdate', '$remarks', '$filename', '$status')";
    $result_history = mysqli_query($conn, $sql_history);

    if (!$result_history) {
        echo "Error: " . $sql_history . "<br>" . mysqli_error($conn);
    }

     if ($result && $result_history) {
        echo "<script language='javascript'> alert ('Add Stocks successfully!');</script>";
    }

   } 
 }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>VGI Product Stock</title>
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
                              <h2>  Stock</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Add <small>>Stock</small></h2>
                                 </div>
                                  <div class="button_block" style="float:right;">
                                    <a href="stock_list.php"><button type="button" class="btn" style="background:#202baf;color: white;font-weight: 600;font-size: 15px;">Stock List</button></a>
                                 </div>
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <form method="post"  enctype="multipart/form-data">

                             <div class="row">
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Product Name<sup>*</sup></label>
                                       <select id="dropdown" name="product_id" class="form-control" required>
                                          <option disabled selected value>Select</option>
                                          <?php
                                     $sql = "SELECT * FROM vgi_product";
                                     $result = mysqli_query($conn,$sql);
                                     $i=1;
                                     while($data = mysqli_fetch_array($result))
                                     {?>
                                     <option value="<?php echo $data['id']?>"><?php echo $data['product_name']?></option>
                                     <?php $i++; }?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                       <label id="name-label" for="name">Stock Quantity<sup>*</sup></label>
                                       <input type="number" name="stock_quantity" id="name" placeholder="Quantity" class="form-control" required>
                                    </div>
                                    </div>
                                 </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label id="email-label" for="email"> Date</label>
                                       <input type="text" name="add_date" value="<?php echo $created_date;?>"  style="background: #c2c2c2;"  class="form-control" readonly>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                   <div class="col-md-4">
                                     <div class="form-group">
                                       <label id="email-label" for="email">Product Bill<sup>*</sup></label>
                                       <input type="file"  class="form-control" name="product_bill" placeholder="Bill..." style="padding: 9px;" required> 
                                    </div>
                                 </div>

                                   <div class="col-md-4">
                                     <div class="form-group">
                                       <label id="email-label" for="email">Remarks<sup>*</sup></label>
                                       <textarea  id="comments" class="form-control" name="remarks" placeholder="Remark..."></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                       <label id="name-label" for="name">Status<sup>*</sup></label>
                                       <select id="dropdown" name="status" class="form-control">
                                           <option value="1">Active</option>
                                           <option value="0">In-Active</option>

                                       </select>
                                        </div>
                                    </div>
                                 </div>
                                  
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <button type="submit" id="submit" name="add" class="btn" style="background:green;color: white;font-weight: 600;font-size: 15px;">Submit</button>
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