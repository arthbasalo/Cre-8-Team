<!-- 1st set -->
<div class="col-3">
  <label>First Name: <span class="validation-area">*</span></label>
  <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter first name">
  
</div>
<div class="col-3">
  <label>Middle Name: (optional)<span class="validation-area"></span></label>
  <input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Enter middle name (optional)">
</div>
<div class="col-3">
  <label>Last Name: <span class="validation-area">*</span></label>
  <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter last name">
</div>
<div class="col-3">
  <label>Affiliation Name: (optional)<span class="validation-area"></span></label>
  <input type="text" name="affiliation_name" class="form-control" id="affiliation_name" placeholder="Enter affiliation name (optional)">
</div>

<!-- 2nd set -->
<div class="span12"></div>
<div class="col-4">
  <label>Date of Birth: <span class="validation-area">*</span></label>
  <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" style="width: 90%;padding: 12px 12px 10px 12px">
</div>
<div class="col-4">
  <label>Sex: <span class="validation-area">*</span></label>
  <select name="sex_option" id="sex_option" class="form-control selectField">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
  </select>
</div>
<div class="col-4">
  <label>Civil Status: <span class="validation-area">*</span></label>
  <select name="civil_status_option" id="civil_status_option" class="form-control selectField">
    <option value="Single">Single</option>
    <option value="Married">Married</option>
    <option value="Widowed">Widowed</option>
    <option value="Separated">Separated</option>
    <option value="Divorced">Divorced</option>
  </select>
</div>

<!-- 3rd set -->
<div class="span12"></div>
<div class="col-3">
  <label>Region: <span class="validation-area">*</span></label>
  <select name="region_option" id="region_option" class="form-control selectField"
  onclick="Choose_Province()">
  </select>
</div>
<div class="col-3">
  <label>Province: <span class="validation-area">*</span></label>
  <select name="province_option" id="province_option" class="form-control selectField"
  onclick="Choose_Municipality()">
  </select>
</div>
<div class="col-3">
  <label>City: <span class="validation-area">*</span></label>
  <select name="city_option" id="city_option" class="form-control selectField"
  onclick="Choose_Barangay()">
  </select>
</div>
<div class="col-3">
  <label>Barangay: <span class="validation-area">*</span></label>
  <select name="barangay_option" id="barangay_option" class="form-control selectField">
  </select>
</div>

<!-- 4th set -->
<div class="span12"></div>
<div class="col-6">
  <label>House Number: <span class="validation-area">*</span></label>
  <input type="text" name="house_number" class="form-control" id="house_number" placeholder="Enter house number">
</div>
<div class="col-6">
  <label>Street: <span class="validation-area">*</span></label>
  <input type="text" name="street" class="form-control" id="street" placeholder="Enter street">
</div>

<!-- 5th set -->
<div class="span12"></div>
<div class="col-4">
  <label>Username: <span class="validation-area">*</span></label>
  <input type="text" name="email_address" class="form-control" id="email_address" placeholder="Enter username">
</div>
<div class="col-4">
  <label>Contact Number (Phone): <span class="validation-area">*</span></label>
  <input type="text" name="contact_number" class="form-control" id="contact_number" placeholder="Enter contact number">
</div>
<div class="col-4">
  <label>Telephone Number: (optional)<span class="validation-area"></span></label>
  <input type="text" name="telephone_number" class="form-control" id="telephone_number" placeholder="Enter telephone number (optional)">
</div>

<script type="text/javascript">
var jsonAddress="";
var region_number=[];
var region=[];
var province=[];
var provinces = {};
var city=[];
var cities = [];
var barangay=[];
var brgy = [];
var addresses = [];

loadRegion();
function loadRegion(){
  var xobj = new XMLHttpRequest();
      xobj.overrideMimeType("application/json");
      xobj.open("GET", "assets/json/address.json", true);

  xobj.onreadystatechange = function()      {
    if(xobj.readyState==4 && xobj.status=="200"){
      jsonAddress = JSON.parse(xobj.responseText);
      addresses = Object.values(jsonAddress);
      for(var x = 0; x < addresses.length;x++){
        region_number.push(addresses[x].region_name);
      }
        console.log(region_number);
      for(var index=0; index<region_number.length; index++){
        $("#region_option").append("<option value='"+region_number[index]+"'>"+region_number[index]+"</option>")
      //   region.push(jsonAddress[region_number[index]]["region_name"]);
      }
      console.log(Object.values(jsonAddress));
    }
  };
  xobj.send();
}

function Choose_Province() {
  $("#province_option").text("");
  var selected_region=$("#region_option").val();
  for(var index=0; index<region_number.length; index++){ 
    if(addresses[index].region_name == selected_region){
      province = Object.keys(addresses[index].province_list);
      provinces = Object.values(addresses[index].province_list);
      for(var x = 0; x < province.length;x++){
         $("#province_option").append("<option value='"+province[x]+"'>"+province[x]+"<//option>")
      }
      Choose_Municipality();
      Choose_Barangay();
    }
  }
}

function Choose_Municipality() {
  $("#city_option").text("");
  var selected_province=$("#province_option").val();
  for(var index=0; index<province.length; index++){
    if(province[index] == selected_province){    
      city = Object.keys(provinces[index].municipality_list);
      cities = Object.values(provinces[index].municipality_list);
      for(var x = 0; x < city.length;x++){
         $("#city_option").append("<option value='"+city[x]+"'>"+city[x]+"<//option>")
      }
      Choose_Barangay();
    }
  }
}

function Choose_Barangay() {
  $("#barangay_option").text("");
  var selected_city=$("#city_option").val();
  for(var index=0; index<city.length; index++){
    if(city[index] == selected_city){    
      barangay = cities[index].barangay_list;
      for(var x = 0; x < barangay.length;x++){
         $("#barangay_option").append("<option value='"+barangay[x]+"'>"+barangay[x]+"<//option>")
      }
    }
  }
}
</script>