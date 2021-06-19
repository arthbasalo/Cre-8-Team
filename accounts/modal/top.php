<!-- hidden top area toggle link -->
        <div id="header-hidden-link">
          <a href="#" class="toggle-link" title="Click me you'll get a surprise" data-target=".hidden-top"><i></i>Open</a>
        </div>
        <!-- end toggle link -->

        <div class="row nomargin">
          <div class="span12">
            <div class="headnav">
            <?php if(!isset($_SESSION['personId'])){ ?>
              <ul>
                <li><a href="sign_up.php"><i class="icon-user"></i> Sign up</a></li>
                <li><a href="sign_in.php">Sign in</a></li>
              </ul>
            <?php } ?>
            </div>
            <!-- Signup Modal -->
              <?php include("accounts/modal/signup_modal.php"); ?>
            <!-- end signup modal -->

            <!-- Sign in Modal -->
              <?php include("accounts/modal/signin_modal.php"); ?>
            <!-- end signin modal -->

            <!-- Reset Modal -->
              <?php include("accounts/modal/resetpassword_modal.php"); ?>
            <!-- end reset modal -->
          </div>
        </div>