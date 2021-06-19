<!-- class="fixed-top " -->
<!-- ======= Header ======= -->
<header id="header">
  <div class="container d-flex align-items-center justify-content-between">

    <h1 class="logo"><a href="index.php">CRE-8 TEAM<span>.</span>
      <br><label style="font-size: 12px;">
      <?php //if(isset($_SESSION['personId'])){ 
        //  echo UserPersonName($_SESSION['personId']);
       //} ?>
     </label>

    </a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

    <nav class="nav-menu d-none d-lg-block">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li class="drop-down"><a href="about_us.php">About Us</a>
          <ul>
            <li><a href="our_team.php">Team</a></li>
            <li><a href="contact_us.php">Contact</a></li>
          </ul>
        </li>
        <li><a href="collection.php">Collections</a></li>
        <?php //if(isset($_SESSION['personId'])){ 
         // if($_SESSION['userTypeId'] == 1 || $_SESSION['userTypeId'] == 2){?>
          <!-- <li class="drop-down"><a href="#">Accounts</a>
            <ul>
              <?php //if($_SESSION['userTypeId'] == 1){ ?>
              <li class="drop-down"><a href="#">System Admin</a>
                <ul>
                  <li><a href="create_account.php?id=1">Create System Admin</a></li>
                  <li><a href="read_account.php?id=1">Read System Admin</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Business Admin</a>
                <ul>
                  <li><a href="create_account.php?id=2">Create Business Admin</a></li>
                  <li><a href="read_account.php?id=2">Read Business Admin</a></li>
                </ul>
              </li>
              <?php// } ?>
              <li class="drop-down"><a href="#">Staff</a>
                <ul>
                  <li><a href="create_account.php?id=3">Create Staff</a></li>
                  <li><a href="read_account.php?id=3">Read Staff</a></li>
                </ul>
              </li>
              <li class="drop-down"><a href="#">Client</a>
                <ul>
                  <li><a href="create_account.php?id=4">Create Client</a></li>
                  <li><a href="read_account.php?id=4">Read Client</a></li>
                </ul>
              </li>
            </ul>
          </li> -->
        <?php //}
        //} ?> 

        <?php //if(isset($_SESSION['personId'])){ 
         // if($_SESSION['userTypeId'] == 1){?>
          <!-- <li class="drop-down"><a href="#">Product</a>
            <ul>
              <li><a href="#">Category Management</a></li>
              <li><a href="#">Product Management</a></li>
            </ul>
          </li> -->
        <?php// }
     //   } ?> 

      </ul>
    </nav><!-- .nav-menu -->

    <?php //if(!isset($_SESSION['personId'])){ ?>
      <!-- <a href="sign_in.php" class="get-started-btn scrollto">Login</a> -->
    <?php //}else{ ?>
      <!-- <a href="sign_out.php" class="get-started-btn scrollto">Logout</a> -->
    <?php// } ?>
  </div>
</header><!-- End Header -->