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
         .table tr td{
                font-size: 16px;
    font-weight: 600;
}
         .table tr th{
                font-size: 14px;
    font-weight: 700;
}
 .dataTables_wrapper div.dataTables_filter label {
font-weight: 800 !important;
}
.dataTables_filter input{
       font-size: 12px;
    border-color: black;
}
 .dataTables_wrapper div.dataTables_length label {
display: none;
}
 

         
      </style>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
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
                           <div class=" table-responsive white_shd full margin_bottom_30" style="padding: 23px;">
                              <h2 style="font-family:sans-serif;color: #ce0707;font-weight: 700;">Full Stock History&nbsp;<i class="fa fa-history" aria-hidden="true"></i>
</h2>
                                <div class=" float-left py-2" style="width:252px">
                                          <select  class="form-control status-dropdown">
                                             <option value="">All</option>
                                              <?php
                                           $sql8 = "SELECT * FROM vgi_stock_history";
                                           $result8 = mysqli_query($conn, $sql8);

                                           while ($data8 = mysqli_fetch_array($result8)) {
                                               $idd = $data8['id'];
                                               $pid = $data8['product_id'];


                                               $sql9 = "SELECT * FROM vgi_product WHERE id=$pid";
                                               $result9 = mysqli_query($conn, $sql9);

                                               while ($data9 = mysqli_fetch_array($result9)) {
                                                   $product_name = $data9['product_name'];
                                           ?>
                                                   <option value="<?php echo $product_name ?>"><?php echo $product_name ?></option>
                                           <?php
                                               }
                                           }
                                           ?>
                                          
                                          </select>
                                       </div>

                                     <table id="example" class="table" cellspacing="0" width="100%">
                                       <thead class="thead-dark">
                                         <tr>
                                       <th>S.No.</th>
                                       <th>Product Name</th>
                                       <th>Product Quantity</th>
                                       <th>Product Date</th>
                                       <th>Product Remarks</th>
                                       <th>Status</th>
                                    </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                            $sql1 = "SELECT * FROM vgi_stock_history WHERE status='1'";
                                          $result1 = mysqli_query($conn, $sql1);

                                          $i = 1;
                                          while ($data1 = mysqli_fetch_array($result1)) {
                                             $idd = $data1['id'];
                                              $pid = $data1['product_id'];
                                              $stock_quantity = $data1['stock_quantity'];
                                                $bill = $data1['product_bill'];


                                               $sql2 = "SELECT * FROM vgi_product WHERE id=$pid";
                                              $result2 = mysqli_query($conn, $sql2);
                                              $data2 = mysqli_fetch_array($result2);
                                              $product_name = $data2['product_name'];
                                              ?>
                                              <tr>
                                                  <td><?php echo $i; ?></td>
                                                  <td><?php echo $product_name; ?></td>
                                                  <!-- <td><?php echo $data1['stock_quantity']; ?></td> -->
                                                   <td><p style="font-size: 20px;color: black;font-weight: 700;"><?php echo $data1['stock_quantity']; ?></p>
                                                   </td>

                                                  <td><?php echo $data1['add_date']; ?></td>
                                                  <td><?php echo $data1['remarks']; ?></td>
                                                  <td>
                                          <a href="uploads/<?php echo $bill; ?>" target="_blank"><img src="images/logo/printer.png" style="width: 24px;"> </a>

                                       </td>
                                    </tr>
                                    <?php $i++; } ?>
                                       </tbody>
                                    </table>
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
<script>$(document).ready(function() {
   //Only needed for the filename of export files.
   //Normally set in the title tag of your page.
   document.title='Simple DataTable';
   // DataTable initialisation
   $('#example').DataTable(
      {
         "dom": '<"dt-buttons"Bf><"clear">lirtp',
         "paging": true,
         "autoWidth": true,
         "buttons": [
            'colvis',
            'copyHtml5',
        'csvHtml5',
            'excelHtml5',
        'pdfHtml5',
            'print'
         ]
      }
   );
});</script>

<script src="https://code.jquery.com/jquery-3.7.0.js

"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js

"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js

"></script>
   </body>
</html>