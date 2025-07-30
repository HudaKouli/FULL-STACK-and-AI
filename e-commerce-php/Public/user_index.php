<?php include '../Includes/session.php'; ?>
<?php include '../Includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../Includes/navbar_admin.php'; ?>

	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-12">  <!-- Changed from col-sm-9 to col-sm-12 since sidebar is removed -->
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
	        	</div>
	        </div>
	      </section>
		  <img class="image" src="../Assets/images/Modern_Workspace.jpeg" type="">

	     
	    </div>
	  </div>
	  <h1 class="about_col">About</h1>

	  <section id="about" style="position: relative; height: 30vh; overflow: hidden; margin-left:200px margin-right:190px ">
	  <div style="position: relative; z-index: 2; padding: 80px 20px; text-align: center; color: white; background-color: black;">
    <p style="max-width: 700px; margin: 0 auto;">
      Discover our mission to make online shopping simple, secure, and satisfying.</p>
	  <p style="max-width: 700px; margin: 0 auto;">

	SmartMart brings top-quality products directly to you.
    </p>
  </div>
</section>
  	<?php include '../Includes/footer.php'; ?>
</div>

<?php include '../Includes/scripts.php'; ?>


</body>
</html>