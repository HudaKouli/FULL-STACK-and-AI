<header class="main-header">
<style>
  .navbar-nav > li > a,
  .navbar-custom-menu .nav > li > a {
    color:#1e81b0 !important;
  }
  
  .navbar-nav {
    display: flex;
    flex-direction: row;
  }
  
  .navbar-nav > li {
    display: inline-block;
    margin-right: 15px;
  }
  
  .navbar-custom-menu {
    display: flex;
    align-items: center;
    margin-left: auto;
    justify-content: flex-end;
  }
  
  .navbar-custom-menu .nav {
    display: flex;
    flex-direction: row;
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  .navbar-custom-menu .nav > li {
    display: inline-block;
    margin-left: 15px;
  }
  
  .navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .navbar-collapse {
    flex: 1;
  }
</style>

  <nav class="navbar navbar-static-top ">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>SmartMart</b></a>

      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <li><a href="../Public/index.php">HOME</a></li>
          <li><a href="../Public/index.php#about">ABOUT US</a></li>

        </ul>

      </div>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                        <small>Member since '.date('M. Y', strtotime($user['created_on'])).'</small>
                      </p>
                    </li>
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='../Public/logout.php'>LOGOUT</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>