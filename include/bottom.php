<!DOCTYPE html>
<html lang="en">
    <head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style type="text/css">
            
.nav {
        box-shadow: inset 0 0 10px #3a3a3a;
   font-weight: 700;
    position: fixed;
    bottom: 0;
    width: 100%;
    height: 67px;
/*    box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);*/
    background-color: #ffffff;
    display: flex;
    overflow-x: auto;
}

.nav__link {
   

    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    flex-grow: 1;
/*    min-width: 50px;*/
    overflow: hidden;
    white-space: nowrap;
    font-family: sans-serif;
    font-size: 15px;
    color: #444444;
    text-decoration: none;
    -webkit-tap-highlight-color: transparent;
    transition: background-color 0.1s ease-in-out;
}

.nav__link:hover {
    background-color: #eeeeee;
        border-radius: 47px;
 }

.nav__link--active {
    color: black;
}

.nav__icon {
    font-size: 18px;
}
@media screen and (min-width: 1024px){
 .nav {
    display: none;
  }
}
        </style>
    </head>
   <body class="dashboard dashboard_1">
       
<nav class="nav">
  <a href="dashboard.php" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">home</i>
    <span class="nav__text">Home</span>
  </a>
  <a href="product_list.php" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">cases</i>
    <span class="nav__text">Product</span>
  </a>
  <a href="stock_list.php" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">devices</i>
    <span class="nav__text">Stock</span>
  </a>
   <a href="stock_history.php" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">payment</i>
    <span class="nav__text">Bill</span>
  </a>  
  <a href="logoff.php" class="nav__link nav__link--active">
    <i class="material-icons nav__icon">logout</i>
    <span class="nav__text">Logout</span>
  </a>
</nav>


<script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <!-- wow animation -->
      <script src="js/animate.js"></script>
      <!-- select country -->
      <script src="js/bootstrap-select.js"></script>
      <!-- owl carousel -->
      <script src="js/owl.carousel.js"></script> 
      <!-- chart js -->
      <script src="js/Chart.min.js"></script>
      <script src="js/Chart.bundle.min.js"></script>
      <script src="js/utils.js"></script>
      <script src="js/analyser.js"></script>
      <!-- nice scrollbar -->
      <script src="js/perfect-scrollbar.min.js"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
      <script src="js/chart_custom_style1.js"></script>
   </body>