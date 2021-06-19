<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<?php 
date_default_timezone_set("Asia/Manila");
$dateEncoded = date("Y-m-d");
$timeEncoded = date("h:i:s A");
$errorMessage = "";
if(isset($_POST['btnLogin'])){
    $accountNumber = $_POST['txtEnterUserName'];
    $accountPassword = $_POST['txtEnterPassword'];
   
    if(!VerifyUserAccount($accountNumber, $accountPassword)){
        $errorMessage = "<p class=\"alert alert-danger\"><b>Invalid Account!.</b></p>";
    }else{
      global $connection;
      $isValid = false; 
      $query = "SELECT * FROM tbl_Account
      INNER JOIN  tbl_Person ON tbl_Account.person_id=tbl_Person.person_id";
      $Users = mysqli_query($connection, $query);
      while ($User = mysqli_fetch_array($Users)) {
        if($User['username'] == $accountNumber
            && password_verify($accountPassword,$User['password'])
            && $User['account_status'] == "Activated"){
        
            $_SESSION['personId'] = $User['person_id'];
            $_SESSION['referenceNumber'] = $User['person_code'];
            $_SESSION['userTypeId'] = $User['user_type_id'];
  
        // LOGS
        // $category,$id(primary_key),$code,$status,$description,$added_by(person_id)
        Create_Logs("ACCOUNT LOGIN",$User['person_id'], $User['person_code'], "LOGIN","Date and Time of Login: $dateEncoded @ $timeEncoded",$User['person_id']);
        // END OF LOGS
        
        header('Location:index.php');
                        
        }else if($User['username'] == $accountNumber
            && password_verify($accountPassword,$User['password'])
            && $User['account_status'] == "Registration"){
            $_SESSION['personId'] = $User['person_id'];
            $_SESSION['referenceNumber'] = $User['person_code'];
            $_SESSION['userTypeId'] = $User['user_type_id'];

        // LOGS
        // $id(primary_key),$code,$status,$description,$added_by(person_id)
        Create_Logs("ACCOUNT LOGIN",$User['person_id'], $User['person_code'], "LOGIN","Date and Time of Login: $dateEncoded @ $timeEncoded",$User['person_id']);
        // END OF LOGS

            if($User['user_type_id'] == 7)
              header('Location:index.php');

        }else if($User['username'] == $accountNumber
            && password_verify($accountPassword,$User['password'])
            && $User['account_status'] == "Blocked"){
          $errorMessage = "<p class=\"alert alert-danger\"><b>Your account has been blocked!.</b></p>";
        }else if($User['username'] == $accountNumber
            && password_verify($accountPassword,$User['password'])
            && $User['account_status'] == "Deactivated"){
          $errorMessage = "<p class=\"alert alert-warning\"><b>Your account has been Deactivated!.</b></p>";
        }
      }
    }//end of ELSE
}// end of IF
?>

<main id="main">

<!-- ======= About Section ======= -->
<section id="services" class="services">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
        <p>Sign in</p>
    </div>
    <form method="post">
        <?php if($errorMessage != "") echo $errorMessage; ?>
    <div class="row">
        <div class="container">
            <div class="form-group">
                <label for="txtEnterUserName">Username:</label>
                <input type="text" class="form-control" id="txtEnterUserName" placeholder="Enter username" name="txtEnterUserName" value="<?php if(isset($_POST['txtEnterUserName'])) { echo $_POST['txtEnterUserName']; }?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="txtEnterPassword">Password:</label>
                <input type="password" class="form-control" id="txtEnterPassword" placeholder="Enter password" name="txtEnterPassword" value="<?php if(isset($_POST['txtEnterPassword'])) { echo $_POST['txtEnterPassword']; }?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary" id="btnLogin" name="btnLogin">Submit</button>
        </div>
    </div>
    </form>

    </div>
</section><!-- End About Section -->
</main>
<?php include("includes/footer.php"); ?>