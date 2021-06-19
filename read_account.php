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
          <h2>Read Account</h2>
          <p><?php echo $desc; ?></p>
        </div>
        <div class="row">
          <div class="col-12 contactForm">
            <label>Search by: Generated Code, Name, Account Status <span class="validation-area"></span></label>
              <input type="text" class="form-control" name="keyword"
              id="keyword"  size="22" placeholder="Generated Code, Name, Account Status"
              onkeyup="Pagination()">

            <!-- MESSAGE -->
            <div id="systemMessage" class="alert alert-success" style="display: none;">
              <span id="message"></span>
            </div>
            <!-- END OF MESSAGE -->

            <span id="itemFrom" style="display: none;"></span>
            <span id="itemTo" style="display: none;"></span>

            <div id="divListOfUsers"></div>
            <div class="divPagination w3-center"></div>
          </div>        
        </div>

      </div>
    </section><!-- End About Section -->
</main>

<script type="text/javascript">
Pagination();
function Pagination(){
  GeneratePagination();
  DisplayPersonInformation();
}

function GeneratePagination(){
$(".divPagination").text("");
var data = $("#keyword").val();
var userTypeId = "<?php echo $_GET['id']; ?>";
var obj = {"filter":data,"userType":userTypeId};
var parameter = JSON.stringify(obj);
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
  var transactionCount = JSON.parse(this.responseText);
  
  $(".divPagination").text("");
  var totalItems=transactionCount;
  
  var perItem=25; 
  var paginator = totalItems/perItem;
  var textCounter=0;
  var start=1;
  var end=perItem;
  Next(start, end);
  for(var index=0; index<paginator; index++){
    textCounter++;
    $(".divPagination").append("<button class='btn btn-info btnPagination' onclick=\"Next("+start+","+end+")\">"+(index+1)+"</button> ");
    start+=perItem;
    end+=perItem;
  }
}//end of if
};
xmlhttp.open("GET", "accounts/count_account.php?data="+parameter, true);
xmlhttp.send();
}

function Next(start, end){
  $("#itemFrom").text(start);
  $("#itemTo").text(end);
  DisplayPersonInformation();
}

function DisplayPersonInformation(){
var start = $("#itemFrom").text();
var end = $("#itemTo").text();
  var data = $("#keyword").val()
  var userTypeId = "<?php echo $_GET['id']; ?>";
  var obj = {"filter":data, "userType":userTypeId,"start":start,"end":end};
  var parameter = JSON.stringify(obj);
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $("#divListOfUsers").text("");
      $("#divListOfUsers").append(this.responseText);
    }else{
   
    }
  };
  xmlhttp.open("GET", "accounts/read_account.php?data=" + parameter, true);
  xmlhttp.send();
}

function btnViewPersonInformation(id){
  ToggleDIV("divViewProfile", "block");
  DisplayPersonInformation_ToModal(id);
}

function btnUpdatePersonInformation(id){
  ToggleDIV("divUpdateProfile", "block");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      for(var index = 0; index < data.length; index++){
        if(data[index].person_id == id){
          $("#update_profile").val(id);
          $("#first_name").val(data[index].first_name);
          $("#middle_name").val(data[index].middle_name);
          $("#last_name").val(data[index].last_name);
          $("#affiliation_name").val(data[index].affiliation_name);
          $("#date_of_birth").val(data[index].date_of_birth);
          $("#sex").val(data[index].sex);
          $("#civil_status").val(data[index].civil_status);
          $("#house_number").val(data[index].house_no);
          $("#street").val(data[index].street);
          $("#barangay").val(data[index].barangay);
          $("#city").val(data[index].city);
          $("#province").val(data[index].province);
          $("#region").val(data[index].region);
          $("#email_address").val(data[index].email_address);
          $("#contact_number").val(data[index].contact_number);
          $("#telephone_number").val(data[index].telephone_number);
      break;
        }
      }
    }else{
    }
  };
  xmlhttp.open("GET", "accounts/json_account.php", true);
  xmlhttp.send();
}

var all_Fields = document.getElementsByClassName("form-control");
var validations = document.getElementsByClassName("validation-area");
function Form_Validation(){
  var counter = 0;
  for(var index=0; index<all_Fields.length-1; index++){
    if(index!=0 && index!=2 && index!=4 && index!=16){
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

function Clear_Registration(){
  for(var index=0; index<all_Fields.length-1; index++){
    if(index!=0 && index!=2 && index != 4 && index!=16){
      all_Fields[index].value = "";
      validations[index].innerHTML = "*";
    }
  }
}//END OF Clear_Registration()

function Check_Email_Exist(){
  var isExist = 0;
  var obj = {"email":all_Fields[14].value,"status":"editing", "id":$("#update_profile").val()};
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
          Update_Profile();
        }
      }
    }
  };
  xmlhttp.open("GET", "accounts/check_email_exist.php?data=" + parameter, true);
  xmlhttp.send();
}

function Update_Profile(){
  if(Form_Validation()){
    var  obj = {"person_id":$("#update_profile").val(),
      "first_name":all_Fields[1].value, "middle_name":all_Fields[2].value, 
      "last_name":all_Fields[3].value, "affiliation_name":all_Fields[4].value,
      "date_of_birth":all_Fields[5].value,"sex":all_Fields[6].value, 
      "civil_status":all_Fields[7].value, 
      "region_option":all_Fields[8].value, "province_option":all_Fields[9].value, 
      "city_option":all_Fields[10].value, "barangay_option":all_Fields[11].value, 
      "house_number":all_Fields[12].value, "street":all_Fields[13].value, 
      "email_address":all_Fields[14].value, 
      "contact_number":all_Fields[15].value, 
      "telephone_number":all_Fields[16].value};
    var parameter = JSON.stringify(obj); 
    ToggleDIV("divUpdateProfile", "none");
    $.ajax({url:'accounts/update_account_information.php?data='+parameter,
      method:'GET',
      success:function(data){
        if(data == true){
          ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").text("Success: Account profile successfully updated !.");
          DisplayPersonInformation();
        }
        else{
          ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").append("Warning: Updating account profile was failed, Please try again !."+data);
          DisplayPersonInformation();
        }
      },
      error:function(){
        ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").append("System Error: Updating account profile went something wrong, Please contact the <strong>System Administrator</strong> !.");
          DisplayPersonInformation();
      }
    });//end of ajax
  }//END OF Form_Validation()
}//END OF Update_Profile()

function btnChangeAccessStatus(id){
  ToggleDIV("divUpdateAccessStatus", "block");
  DisplayPersonInformation_ToModal(id);

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var data = JSON.parse(this.responseText);
    for(var index = 0; index < data.length; index++){
      if(data[index].person_id == id){
        status(data[index].account_status, id);
        break;
      }
    }
  }else{
  }
  };
  xmlhttp.open("GET", "accounts/json_account.php", true);
  xmlhttp.send();
}

function status(status, id){
  $("#divButtonStatus").text("");
  var changeStatus_PastTense = ["Activated", "Deactivated"];
  var changeStatus_PresentTense = ["Activate", "Deactivate"];
  var statusColor = ["btn btn-medium alert-success", "btn btn-medium alert-danger"];
  var statusicofont = ["icofont-save", "icofont-close"];

  for(var index = 0; index < changeStatus_PresentTense.length; index++){
    var w3disabled = disabled = "";
    if(status == changeStatus_PastTense[index]){
      w3disabled = "w3-disabled";
      disabled = "disabled";
    }
    $("#divButtonStatus").append("<button class='"+ w3disabled +" "+statusColor[index] + " btnIndex " + "' "+disabled+" onclick='UpdateAccessStatus("+id+",\""+changeStatus_PastTense[index]+"\")'>" +"<i class='"+statusicofont[index]+"'></i> " + changeStatus_PresentTense[index] +"</button>");
  }
}

function UpdateAccessStatus(id, status){
  var  obj = {"personId":id,"status":status};
  var parameter = JSON.stringify(obj);
  ToggleDIV("divUpdateAccessStatus", "none");
  $.ajax({url:'accounts/update_account_status.php?data='+parameter,
      method:'GET',
      success:function(data){
        if(data == true){
          ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").text("Success: Account status successfully updated !.");
          DisplayPersonInformation();
        }
        else{
          ToggleDIV("divSystemNotification", "block");
          $(".modalMessage").text("Warning: Updating account status was failed, Please try again !.");
          DisplayPersonInformation();
        }
      },
      error:function(){
        ToggleDIV("divSystemNotification", "block");
        $(".modalMessage").text("System Error: Updating account status went something wrong, Please contact the System Administrator !.");
        DisplayPersonInformation();
      }
    });//end of ajax
  
}

function btnResetPassword(id){
  ToggleDIV("divResetPassword", "block");
  $("#btnResetPassword").val(id);
  DisplayPersonInformation_ToModal(id);
}

function ResetPassword(){
  var personId=$("#btnResetPassword").val();
  var  obj = {"personId":personId};
  var parameter = JSON.stringify(obj);
  ToggleDIV("divResetPassword", "none");
  $.ajax({url:'accounts/reset_account_password.php?data='+parameter,
    method:'GET',
    success:function(data){
      if(data == true){
        ToggleDIV("divSystemNotification", "block");
        $(".modalMessage").text("Success: Account password successfully reset !.");
        DisplayPersonInformation();
      }
      else{
        ToggleDIV("divSystemNotification", "block");
        $(".modalMessage").text("Warning: Resetting account password was failed, Please try again !.");
        DisplayPersonInformation();
      }
    },
    error:function(){
      ToggleDIV("divSystemNotification", "block");
      $(".modalMessage").text("System Error: Resetting account password went something wrong, Please contact the System Administrator !.");
      DisplayPersonInformation();
    }
  });//end of ajax
}

function DisplayPersonInformation_ToModal(id){
if(id!=0){
  $(".personInformation").text("");
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    $(".personInformation").text("");
      var data = JSON.parse(this.responseText);
      for(var index = 0; index < data.length; index++){
        if(data[index].person_id == id){
$(".personInformation").append("<b>Name:</b> "+data[index].last_name + ", " + data[index].first_name + " " + data[index].middle_name + " " + data[index].affiliation_name);
$(".personInformation").append("<br><b>Date of Birth:</b> "+data[index].date_of_birth);
$(".personInformation").append("<br><b>Sex:</b> "+data[index].sex);
$(".personInformation").append(" <b>Civil Status:</b> "+data[index].civil_status);
$(".personInformation").append("<br><b>Address:</b> "+data[index].house_no + " " + data[index].street + ", Brgy: " + data[index].barangay + ", " + data[index].city + ", " + data[index].province+ ", " + data[index].region);

$(".personInformation").append("<br><b>Cellphone Number:</b> "+data[index].contact_number);
$(".personInformation").append("<br><b>Telephone Number:</b> "+data[index].telephone_number);
$(".personInformation").append("<br><b>Date & Time Encoded:</b> "+data[index].person_created_at);
$(".personInformation").append("<br><b>Account Status:</b> "+data[index].accountStatus);
break;
        }
      }
    }else{
    $(".personInformation").text("Loading...");
    }
  };
  xmlhttp.open("GET", "accounts/json_account.php", true);
  xmlhttp.send();
}
}

function ToggleDIV(id,status){
    document.getElementById(id).style.display=status;
}
</script>

<div id="divViewProfile" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:900px">
    <div class="modal-header">
      <span style="font-size:25px;">
        <i class="icofont-group"></i> User Profile
        <a type="button" class="close" data-dismiss="modal" onclick="ToggleDIV('divViewProfile','none')" style="color: red;" ><i class="icofont-close"></i></a>
      </span>
    </div>
    <div class="modal-body">
        <div class="w3-section">
          <h4>Profile</h4>
          <span class="personInformation"></span>
        </div>
    </div>
</div></div>

<div id="divUpdateProfile" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top" style="width:1250px">
    <div class="modal-header">
      <span style="font-size:25px;">
        <i class="icofont-edit"></i> Update Profile
        <a type="button" class="close" data-dismiss="modal" onclick="ToggleDIV('divUpdateProfile','none')" style="color: red;" ><i class="icofont-close"></i></a>
      </span>
    </div>

    <div class="w3-container">
      <div class="col-12 contactForm">
        <div class="row"><br>
          <?php include("includes/forms.php"); ?>    
          <div class="col-12 margintop10 form-group">
            <p class="text-left">
              <button class="btn btn-medium alert-danger" onclick="Clear_Registration()"><i class="icofont-trash"></i> Clear</button>
              <button class="btn btn-medium alert-success" id="update_profile" onclick="Check_Email_Exist()"><i class="icofont-save"></i> Update Profile</button>
            </p>
          </div>
        </div>
      </div>
    </div>
</div></div>

<div id="divUpdateAccessStatus" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:900px">
    <div class="modal-header">
      <span style="font-size:25px;">
        <i class="icofont-lock"></i> Change Access Status
        <a type="button" class="close" data-dismiss="modal" onclick="ToggleDIV('divUpdateAccessStatus','none')" style="color: red;" ><i class="icofont-close"></i></a>
      </span>
    </div>
    <div class="modal-body">
      <div class="w3-section">
        <div id="comments">
          <div class="col-2">
            <h4>Status</h4>
            <div class="block clear" id="divButtonStatus"></div>
          </div>
          <div class="col-6">
            <h4>Profile</h4>
            <p class="personInformation"></p>
          </div>
        </div>
      </div>
    </div>
</div></div>

<div id="divResetPassword" class="w3-modal">
  <div class="w3-modal-content w3-card-8 w3-animate-top" style="max-width:900px">
    <div class="modal-header">
      <span style="font-size:25px;">
        <i class="icofont-lock"></i> Reset Password
        <a type="button" class="close" data-dismiss="modal" onclick="ToggleDIV('divResetPassword','none')" style="color: red;" ><i class="icofont-close"></i></a>
      </span>
    </div>
    <div class="modal-body">
      <div class="w3-section">
        <div id="comments">
          <div class="col-4">
            <p style="font-size: 20px;">Are you sure you want to reset the password?</p>
            <button class="btn btn-medium alert-success" type="submit" name="submit"
            id="btnResetPassword" 
            onclick="ResetPassword()" 
            style="width: 100%;"><i class="icofont-check"> Yes</i></button>
          </div>
          <div class="col-5">
            <h4>Profile</h4>
            <p class="personInformation"></p>
          </div>
        </div>
      </div>
    </div>
</div></div>



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