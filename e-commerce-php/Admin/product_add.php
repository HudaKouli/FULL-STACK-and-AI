<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location: admin_login_page.php');
    exit();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Electricks</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your projects -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<body class="index-page sidebar-collapse">

    <!-- End Navbar -->
    <div class="wrapper">

<br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                      <h2>Purchased Product Information</h2>
                      <hr color="#1e81b0">
                      <a href='admin_panel.php' class='btn btn-primary btn-round' style='background-color: #1e81b0; border-color: #1e81b0;'>Back to Index</a>
                <br>
                <div class="col-md-12">
               

<?php
// including the database connection file
include("../config/dbconn.php");
if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $description=$_POST['description'];
    $counter=$_POST['counter'];
    $price=$_POST['price'];

    move_uploaded_file($_FILES["photo"]["tmp_name"],"../Assets/images/" . $_FILES["photo"]["name"]);         
    $photo=$_FILES["photo"]["name"];

     // checking empty fields
    if(empty($name) || empty($description) || empty($counter) || empty($price) || empty($photo)){    
            
        if(empty($name)) {
            echo "<font color='red'>Product name field is empty!</font><br/>";
        }
        
        if(empty($description)) {
            echo "<font color='red'>Product description field is empty!</font><br/>";
        }

        if(empty($counter)) {
            echo "<font color='red'>Quantity field is empty!</font><br/>";
        }   

        if(empty($price)) {
            echo "<font color='red'>Product price field is empty!</font><br/>";
        }   

        if(empty($photo)) {
            echo "<font color='red'>Product picture field is empty!</font><br/>";
        }

    } else {    

        $query = "INSERT INTO products (name, description, counter, price, photo) 
        VALUES ('$name','$description','$counter','$price','$photo')";  

        $result = mysqli_query($dbconn,$query);
            
        if($result){
            
            $name = $_POST['name'];
            $counter = $_POST['counter'];
            
            date_default_timezone_set('Asia/Manila');

            $date = date("Y-m-d H:i:s");
            $id=$_SESSION['id'];
            
            $query=mysqli_query($dbconn,"SELECT name FROM products WHERE id='$name'")or die(mysqli_error());
          
                $row=mysqli_fetch_array($query);
                $product=$row['name'];
                $remarks="added a new product $counter of $name";  
            
                mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

        //redirecting to the display page.
        header("Location: admin_panel.php");
        }
        
    }
}
?>



<div class="panel panel-success panel-size-custom">
          <div class="panel-heading"><h3>Add Purchased Products</h3></div>

          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form group">
                    <label for="name">Product Name:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name"/>
                    <label for="description">Product Description:</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Product Description"/>
                    <label for="price">Product Price ($):</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Value e.g. 123.4"/>
                    <label for="counter">Quantity:</label>
                    <input type="text" class="form-control" id="counter" name="counter" placeholder="Value e.g. 123"/>

                    <div class="form-group">
                        
                        <label for="photo">Product Picture:</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="photo" name="photo">  
                        </div>

                    </div>

                </div>
                <br>

                <div class="form group">
                    <button type="submit" class="btn btn-primary btn-round" id="submit" name="submit" style="background-color: #1e81b0; border-color: #1e81b0;">
                    <i class="now-ui-icons ui-1_check"></i> Add Product
                    </button> 
                </div>
            </form>
          </div>
        </div> 
        <br> 
    </div>
</div>
</div>
<footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                Creative ABC
                            </a>
                        </li>
                        <li>
                            Elective02
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Serve(8) Web Solutions, Inc.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>

</html>