<?php include("includes/header.php"); ?>
<?php include("includes/menu.php"); ?>
<?php 
  $desc = "";
  $id = "";
  if(isset($_SESSION['personId'])){
    if($_SESSION['userTypeId'] == 1){
      if(!isset($_GET['id'])){
        header('Location:index.php');
      }else{
        $id = $_GET['id'];
        if($id==1) $desc = "System Administrator";
        if($id==2) $desc = "Business Administrator";
        if($id==3) $desc = "Staff";
        if($id==4) $desc = "Client";
      }
    }else if($_SESSION['userTypeId'] == 2){
        if(!isset($_GET['id'])){
          header('Location:index.php');
        }else{
          if($_GET['id']!=3 || $_GET['id']!=4){
            header('Location:index.php');
          }else{
            $id = $_GET['id'];
            if($id==3) $desc = "Staff";
            if($id==3) $desc = "Client";
          }
        }
    }
  }
?>
 <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
      	<div class="section-title">
          <h2>Create Account</h2>
          <p><?php echo $desc; ?></p>
        </div>
        <div class="row">   
            <?php include("includes/forms.php"); ?>

            <div class="col-12 margintop10 form-group">
              <p class="text-left">
                <button class="btn alert-danger btn-medium" onclick="Clear_Registration()"><i class="icofont-trash"></i> Clear</button>
                <button class="btn alert-success btn-medium" onclick="Check_Email_Exist()"><i class="icofont-save"></i> Submit Registration</button>
              </p>
            </div>
        </div>

      </div>
    </section><!-- End About Section -->
</main>

<script type="text/javascript">
  var all_Fields = document.getElementsByClassName("form-control");
  var validations = document.getElementsByClassName("validation-area");
  
  function Form_Validation(){
    var counter = 0;
    for(var index=0; index<all_Fields.length; index++){
      if(index!=1 && index != 3 && index!=15){
        if(all_Fields[index].value == ""){
          validations[index].innerHTML = "* Field is required";
          counter++;
        }else{
          validations[index].innerHTML = "*";
        }
      }
    }

    if(counter == 0)
        return true;
    else
      return false;
  }//END OF FORM_VALIDATION()


  function Submit_Registration(){
    if(Form_Validation()){
      isExist = 0;
        var userTypeId = "<?php echo $_GET['id']; ?>";
        var personAddedBy = "<?php echo $_SESSION['personId']; ?>";
        var obj={"first_name":all_Fields[0].value, "middle_name":all_Fields[1].value, 
          "last_name":all_Fields[2].value, "affiliation_name":all_Fields[3].value,
          "date_of_birth":all_Fields[4].value,"sex":all_Fields[5].value, 
          "civil_status":all_Fields[6].value, 
          "region_option":all_Fields[7].value, "province_option":all_Fields[8].value, 
          "city_option":all_Fields[9].value, "barangay_option":all_Fields[10].value, 
          "house_number":all_Fields[11].value, "street":all_Fields[12].value, 
          "email_address":all_Fields[13].value, 
          "contact_number":all_Fields[14].value, 
          "telephone_number":all_Fields[15].value, 
          "user_type_id":userTypeId, 
          "status":"Saved",
          "access_status":"Deactivated",
          "password":"secret123",
          "personAddedBy":personAddedBy};
        var parameter = JSON.stringify(obj); 
        $.ajax({url:'accounts/create_account.php?data='+parameter,
        method:'GET',
        success:function(data){
          if(data == true){
            ToggleDIV("divSystemNotification", "block");
            $(".modalMessage").text("Success: Registration successfully saved !.");
          }
          else{
            ToggleDIV("divSystemNotification", "block");
            $(".modalMessage").text("Warning: Registration failed, Please try again !."+data);
          }
        },
        error:function(){
          ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").text("System Error: Registration went something wrong, Please contact the <strong>System Administrator</strong> !.");
        }
      });//end of ajax  
      Clear_Registration();
    }//END OF IF Form_Validation()
  }//END OF Submit_Registration

  function Clear_Registration(){
    for(var index=0; index<all_Fields.length; index++){
      all_Fields[index].value = "";
      if(index!=1 && index != 3 && index!=15)
        validations[index].innerHTML = "*";
    }
  }//END OF Clear_Registration()

  function ToggleDIV(id,status){
      document.getElementById(id).style.display=status;
  }

function Check_Email_Exist(){
  var isExist = 0;
  var obj = {"email":all_Fields[13].value,"status":"adding", "id":"0"};
  var parameter = JSON.stringify(obj);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      isExist = this.responseText;
      
      if(Form_Validation()){
        if(isExist == 1){
          validations[13].innerHTML = "* Email is already exist";
        }else{
          validations[13].innerHTML = "*";
          Submit_Registration();
        }
      }

    }
  };
  xmlhttp.open("GET", "accounts/check_email_exist.php?data=" + parameter, true);
  xmlhttp.send();
}
</script>

<div id="divSystemNotification" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:400px">
    <div class="modal-header">
      <span style="font-size:25px;">
        <i class="icofont-cogs"></i> System Notification
        <a type="button" class="close" data-dismiss="modal" onclick="ToggleDIV('divSystemNotification','none')" style="color: red;" ><i class="icofont-close"></i></a>
      </span>
    </div>
    <div class="modal-body">
      <p class="modalMessage"></p>
    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>