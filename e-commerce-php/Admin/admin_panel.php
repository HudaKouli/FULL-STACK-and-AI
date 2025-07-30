

<?php include '../Includes/session.php'; ?>
<?php include '../Includes/header.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>SmartMart</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
        <!-- CSS Files -->
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../Assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
  

        <!--     inserted     -->
    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../Assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="../Assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="../Assets/style.css" rel="stylesheet"/>
    </head>

<style>
    /* Admin Dashboard Tab Hover Effects */
    .nav-pills-primary .nav-link {
        transition: all 0.3s ease;
    }
    
    .nav-pills-primary .nav-link:hover {
        background-color: #1e81b0 !important;
        color: white !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(30, 129, 176, 0.3);
    }
    
    .nav-pills-primary .nav-link.active {
        background-color: #1e81b0 !important;
        color: white !important;
    }
    
    .nav-pills-primary .nav-link.active:hover {
        background-color: #1565c0 !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(21, 101, 192, 0.4);
    }
    
    .nav-pills-primary .nav-item {
        margin: 0 5px;
    }
    
    /* Log Sections Centering */
    #userlog, #adminlog, #products,#user_accounts,#admin_accounts {
        text-align: center;
        margin-top:50px;
        margin-bottom:100px;
        padding-bottom: 50px;
    }
    
    #userlog h3, #adminlog h3, #products h3, #user_accounts h3,#admin_accounts h3 {
        text-align: center !important;
        margin-bottom: 30px;
        margin-right:250px;
        font-weight: bold;
        margin-left:100px;
        margin-bottom:100px;
    }
    
    #userlog .table-responsive, #adminlog .table-responsive , #products.table-responsive, #user_accounts.table-responsive,#admin_accounts.table-responsive  {
        max-width: 800px !important;
        margin: 0 auto !important;
        display: block;
        margin-top:100px;
        margin-right:0px;
        margin-bottom:100px;
    }
    
    #userlog table, #adminlog table, #products table{
        text-align: center !important;
        margin-right: 300px auto;
        margin-bottom:100px;
    }
    
    #userlog th, #userlog td, #adminlog th, #adminlog td {
        text-align: center !important;
        vertical-align: middle;
        margin-bottom:100px;
    }
    
    /* User Information Table Styling */
    #user_accounts table {
        margin-left: 100px;
        margin-right: auto;
        margin-bottom: 100px;
    }
    
    #user_accounts .table-responsive {
        margin-left: 100px;
        margin-right: auto;
    }
    
    /* Product Information Table Styling */
    #products table {
        margin-left: 100px;
        margin-right: 50px;
        margin-bottom: 100px;
    }
    
    #products .table-responsive {
        margin-left: 100px;
        margin-right: 50px;
    }
    
    /* Admin Information Table Styling */
    #admin_accounts table {
        margin-left: 100px;
        margin-right: auto;
        margin-bottom: 100px;
    }
    
    #admin_accounts .table-responsive {
        margin-left: 100px;
        margin-right: auto;
    }
    
    /* Add Admin Button Styling */
    #admin_accounts .btn {
        margin-left: 100px;
        margin-bottom: 50px;
        background-color: #1e81b0 !important;
        border-color: #1e81b0 !important;
        color: white !important;
    }
    
    #admin_accounts .btn:hover {
        background-color: #1565c0 !important;
        border-color: #1565c0 !important;
        color: white !important;
    }
    
    /* Add Product Button Styling */
    #products .btn-success {
        margin-left: 300px !important;
        background-color: #1e81b0 !important;
        border-color: #1e81b0 !important;
        color: white !important;
    }
    
    #products .btn-success:hover {
        background-color: #1565c0 !important;
        border-color: #1565c0 !important;
        color: white !important;
    }
    
    /* Add bottom margin to all tab content */
    .tab-content {
        margin-bottom: 50px;
        padding-bottom: 50px;
    }
    
    .tab-pane {
        margin-bottom: 50px;
        padding-bottom: 50px;
    }
    
    /* Footer spacing */
    .footer {
        margin-top: 50px;
        background-color: #f8f9fa;
        border: 2px solid #dee2e6;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
</style>

<body class="hold-transition skin-blue layout-top-nav">

<?php include '../Includes/navbar_admin_panel.php'; ?>


        <div class="wrapper">
            <div class="page-header page-header-small" >
            <div class="page-header-image" data-parallax="true" style="background-image: url('../Assets/images/Modern_Workspace.jpeg');"></div>
            <div class="container">
                    <div class="content-center">
                        <h2 class="title">
                            <?php
                            include('../config/dbconn.php');
                            if (isset($_SESSION['id'])) {
                                $query = mysqli_query($dbconn, "SELECT * FROM `admin` WHERE user_id='".$_SESSION['id']."'");
                                $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                                if ($row) {
                                    echo "Welcome, " . $row['firstname'] . " " . $row['lastname'];
                                } else {
                                    echo "Admin Dashboard";
                                }
                            } else {
                                echo "Admin Dashboard";
                            }
                            ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
               <div class="row">
                    <div class="col-md-6 ml-auto mr-auto">
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#userlog" role="tablist">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#adminlog" role="tablist">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#products" role="tablist">
                                        <i class="now-ui-icons shopping_tag-content"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#user_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Product Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM products ORDER BY name ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table id="example1" class="table table-condensed table-striped">
                                    <tr>
                                      <th>Product Name</th>
                                      <th>Description</th>
                                      <th>Price(Php)</th>
                                      <th>Category</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['name']."</td>";
                                                echo "<td>".$res['description']."</td>";
                                                echo "<td>".$res['price']."</td>";
                                                echo "<td>".$res['category_id']."</td>";
                                                echo "<td><a href=\"product_add_qty.php?id=$res[id]\">Add Qty</a> | <a href=\"product_update.php?id=$res[id]\">Edit</a> | <a href=\"product_delete.php?id=$res[id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a> | <a href=\"admin_product_details.php?id=$res[id]\">View</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>




                                <br><br>
                                <a class="btn btn-success btn-round" href="product_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Product</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="userlog" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections" style="text-align: center;">
                                        <br>
                                        <div class="row">
                                            <div align="center" style="width: 100%;">
                                                <h3 style="text-align: center !important; margin-bottom: 30px; font-weight: bold;">User Logs Information</h3>
                                            </div>
                                        </div>
                                      <?php
                                      include('../config/dbconn.php');
                                      ?>
                                      <div style="height: 60px;"></div>
                                        <div class="table-responsive" style="max-width: 800px; margin: 0 auto; display: block;">
                                            <table class="table table-bordered table-striped" style="text-align: center; margin: 0 auto;">
                                              <thead>
                                                <tr>
                                                  <th style="text-align: center !important;">--------------------Start of Log--------------------</th>
                                                </tr>
                                              </thead>
                                                <?php
                                                    $query=mysqli_query($dbconn,"SELECT * FROM logs NATURAL JOIN users ORDER BY date DESC")or die(mysqli_error());
                                                    while($row=mysqli_fetch_array($query)){ 
                                                ?>
                                              <tr>
                                                <td style="text-align: center !important;"><?php echo $row['firstname']." ".$row['lastname']." ".$row['action']." last ".$row['date'];?></td>
                                              </tr>               
                                                    <?php
                                                  }
                                                ?>           
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th style="text-align: center !important;">--------------------End of Log--------------------</th>
                                              </tr>           
                                            </tfoot>
                                          </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="adminlog" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections" style="text-align: center;">
                                        <br>
                                        <div class="row">
                                            <div align="center" style="width: 100%;">
                                                <h3 style="text-align: center !important; margin-bottom: 30px; font-weight: bold;">Admin Logs Information</h3>
                                            </div>
                                        </div>
                                      <?php
                                      include('../config/dbconn.php');
                                      ?>
                                      <div style="height: 60px;"></div>
                                        <div class="table-responsive" style="max-width: 800px; margin: 0 auto; display: block;">
                                            <table class="table table-bordered table-striped" style="text-align: center; margin: 0 auto;">
                                              <thead>
                                                <tr>
                                                  <th style="text-align: center !important;">--------------------Start of Log--------------------</th>
                                                </tr>
                                              </thead>
                                                <?php
                                                    $query=mysqli_query($dbconn,"SELECT * FROM logs NATURAL JOIN admin ORDER BY date DESC")or die(mysqli_error());
                                                    while($row=mysqli_fetch_array($query)){ 
                                                ?>
                                              <tr>
                                                <td style="text-align: center !important;"><?php echo $row['firstname']." ".$row['lastname']." ".$row['action']." last ".$row['date'];?></td>
                                              </tr>               
                                                    <?php
                                                  }
                                                ?>           
                                            </tbody>
                                            <tfoot>
                                              <tr>
                                                <th style="text-align: center !important;">--------------------End of Log--------------------</th>
                                              </tr>           
                                            </tfoot>
                                          </table>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="user_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>User Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM users ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['email']."</td>"; 
                                                echo "<td><a href=\"user_delete.php?user_id=$res[user_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Admin Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                      <?php
                                      include('../config/dbconn.php');

                                      $action = isset($_GET['action']) ? $_GET['action'] : "";
                                      if($action=='deleted'){
                                          echo "<div class='alert alert-success'>Record was deleted.</div>";
                                      }
                                      $query = "SELECT * FROM admin ORDER BY firstname ASC";
                                      $result = mysqli_query($dbconn,$query);
                                      ?>  
                                 
                                <br>
                                <br>
                                <table class="table table-condensed table-striped">
                                    <tr>
                                      <th>First Name</th>
                                      <th>Last Name</th>
                                      <th>Email</th>
                                      <th>Username</th>
                                      <th>Option</th>
                                    </tr>
                                        <?php
                                          if($result){
                                            while($res = mysqli_fetch_array($result)) {     
                                              echo "<tr>";
                                                echo "<td>".$res['firstname']."</td>";
                                                echo "<td>".$res['lastname']."</td>";
                                                echo "<td>".$res['email']."</td>";
                                                echo "<td>".$res['username']."</td>";  
                                                //echo "<td>".$res['password']."</td>"; 
                                                echo "<td><a href=\"admin_account_update.php?user_id=$res[user_id]\">Edit</a> | <a href=\"admin_account_delete.php?user_id=$res[user_id]
                                                \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                              echo "</tr>"; 
                                            }
                                          }?>
                                </table>
                                <br><br>
                                <a class="btn btn-success btn-round" href="admin_signup.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Admin Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include '../Includes/footer.php'; ?>

        </div>

    </div>


    <!--   Core JS Files   -->
    <script src="../Assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="../Assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="../Assets/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="../Assets/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../Assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="../Assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="../Assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
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


    <!---  inserted  -->
        <!-- SlimScroll -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../plugins/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../plugins/demo.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script>
        $(function () {
            $("#example1").DataTable({
            });
        });
        </script>
        <!--  inserted  -->
</html>