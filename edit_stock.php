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
 
if (isset($_REQUEST['idd'])) {
    $ide = $_REQUEST['idd'];

     $sql1 = "SELECT * FROM vgi_stock WHERE id=$ide";
    $result1 = mysqli_query($conn, $sql1);
    if ($result1) {
      while ($data1 = mysqli_fetch_array($result1)) {
       $iddp = $data1['id'];
        $pid = $data1['product_id'];
         $stock_quantity2 = $data1['stock_quantity'];
          $add_date = $data1['add_date'];
           $remarks = $data1['remarks'];

          $sql2 = "SELECT * FROM vgi_product WHERE id=$pid";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
         $data2 = mysqli_fetch_array($result2);
           $product_name = $data2['product_name'];
      } else {
         echo "Error in the second query: " . mysqli_error($conn);
      }

   }} else {
         echo "Error in the first query: " . mysqli_error($conn);
      }
} else {
    echo "idd parameter not set in the request.";
}
 

 
if (isset($_POST['submit'])) {
    $ide = $_REQUEST['idd'];
    $stock_quantity = $_POST['stock_quantity'];
      $stock_quantity3 = $stock_quantity2 + $_POST['stock_quantity'];

    $remarks = $_POST['remarks'];
    $status = $_POST['status'];

    $filename = $_FILES['product_bill']['name'];
    $tempname = $_FILES['product_bill']['tmp_name'];
    move_uploaded_file($tempname,'uploads/'.$filename);

    $sql = "UPDATE vgi_stock SET stock_quantity='$stock_quantity3', update_date='$tdate', remarks='$remarks', status='$status' WHERE id='$ide'";
    $result = mysqli_query($conn, $sql);

    $sql_history = "INSERT INTO vgi_stock_history (product_id, stock_quantity, add_date, remarks,product_bill, status) VALUES ('$pid', '$stock_quantity', '$tdate', '$remarks','$filename', '$status')";
    $result_history = mysqli_query($conn, $sql_history);

    if ($result && $result_history) {
        echo "<script language='javascript'> alert ('Change Stocks successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
                              <h2> Update Stock</h2>
                           </div>
                        </div>
                     </div>
                     <!-- row -->
                     <div class="row column1">
                        <div class="col-md-12">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Change <small>>Stock</small></h2>
                                 </div>
                                 
                              </div>
                              <div class="full price_table padding_infor_info">
                                 <div class="row">
                                    <div class="col-lg-12">
                                       <div class="table-responsive-sm">
                                          <form method="post" enctype="multipart/form-data">

                             <div class="row">
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <label>Product Name<sup>*</sup></label>
                                      <input type="text" style="background: #c2c2c2;" name="product_id" value="<?php echo $product_name;?>" class="form-control" readonly>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                       <label id="name-label" for="name">Stock Quantity<sup>*</sup></label>
                                       <input type="number" name="stock_quantity"   id="name" placeholder="Quantity" class="form-control" required>
                                    </div>
                                    </div>
                                 </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                       <label id="email-label" for="email"> Date</label>
                                       <input type="text" name="update_date" value="<?php echo $tdate;?>"  style="background: #c2c2c2;"  class="form-control" readonly>
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
                                       <textarea  id="comments" class="form-control" name="remarks" placeholder="Remark..."> <?php echo $remarks;?></textarea>
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
                                    <button type="submit" id="submit" name="submit" class="btn btn-success btn-block">Submit</button>
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