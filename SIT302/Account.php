<?php 
  require_once "include.php";

  if (!isset($_COOKIE['username'])){
    echo '<div class="cover"><h1>Unauthorized <small>Error 401</small></h1><p class="lead">The requested resource requires an authentication.</p><a href="index.php">Return to index</a></div>';
    exit;
  }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Global Obesity Program</title>
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  
  <script
  src="https://code.jquery.com/jquery-2.1.1.min.js"
  integrity="sha256-h0cGsrExGgcZtSZ/fRz4AwV+Nn6Urh/3v3jFRQ0w9dQ="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="asset.css">
  <style type="text/css">

.header{
  width:50%;
  height:500px;
  margin:0 auto;
  border-radius:10px;
  border-bottom:2px solid ;
  text-align:center;
  line-height:100px;
  overflow: hidden;
}
.nav{
  flex:0 0 10%;
}
.box{
  width: 90%;
  margin:0 auto;
 }
.main{
  width:100%;
  margin:20px auto;
  border:2px solid ;
  overflow:hidden;
  display: flex;
}
.text-muted {
    color: #D8DC6A;
}
#header ul li a:hover span {
  background: url(../images/bg-menu-selected-left.gif) no-repeat left top;
}
</style>
</head>
<body>

  <?php include("header.php");?>
      </div>  
     
                    <div class="box">
                        <h1 style="color:#7CDEDC">My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>
                        <p class="text-muted">* field is compulsory.</p>
                        <h3 style="color:#7CDEDC">Change password</h3>

                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password *</label>
                                        <input type="password" class="form-control" id="password_old" onblur="checkOldPassword(this.value)" required>
                                    <p id="oldAlert"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password *</label>
                                        <input type="password" class="form-control" id="password_1" required>
                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password *</label>
                                        <input type="password" class="form-control" id="password_2" required onblur="checkNewPassword(this.value)" >
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button  class="button btn btn-accent" id="changePassword" onclick="changePassword()"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        

                        <hr>
<!-- change user imformation -->
                        <h3 style="color:#7CDEDC">Personal details</h3>
                        <form action="doAction.php?act=update1" method="post">
                            

                           <?php
     if (isset($_COOKIE)){
     $username=$_COOKIE['username'];
    
     //$connect=new mysqli('localhost','root','','scrappertest');
     $conn = new mysqli(DB_HOST, DB_USER, DB_PWD, DB_TABLENAME);
     $sql="select * from users where username='{$username}'" ;
     $result=$conn->query($sql);
     while($row=$result->fetch_assoc()){
                $name=$row["name"];
                $organisation=$row["organisation"];
                $organisationAddress=$row["organisationAddress"];
                $position=$row["position"];
                $email=$row["email"];
                $contactNumber=$row["contactNumber"];
                
        };


 }
?>  
            
              <div class="content">
                <p class="from-group text-muted">* field is compulsory.</p> 
                
                                <div class="row">                 
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Name *</label>
                                            <input type="text" class="form-control" id="firstname" onkeyup ="checkinfo(this.value,1)" value='<?php echo $name; ?>' name="realname" required>
                                            <p id="firstnamesuggestion"></p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="address">Organisation *</label>
                                            <input type="text" class="form-control" id="address" name="organisation" value='<?php echo $organisation; ?>' onkeyup="checkinfo(this.value,3)" required> 
                                            <p id="addresssuggestion"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Organisation Address</label>
                                            <input type="text" class="form-control" id="company" value='<?php echo $organisationAddress;?>' name="organisationAddress"  >
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="city">Position</label>
                                            <input type="text" class="form-control" id="city" name="position" value='<?php echo $position; ?>' onkeyup ="checkinfo(this.value,4)" required>
                                            <p id="citysuggestion" class="post"></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="postcode">Email</label>
                                            <input type="text" class="form-control" id="postcode" name="email" value='<?php echo $email; ?>' onkeyup="checkinfo(this.value,5)" required>
                                            <p id="postcodesuggestion" class="post"></p>
                                        </div>
                                    </div>
                                    

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Contact Number *</label>
                                            <input type="text" class="form-control" id="phone" name="contactNumber" value='<?php echo $contactNumber; ?>'  onkeyup="checkinfo(this.value,6)" required>
                                            <p id="telephonesuggestion"></p>
                                        </div>
                                    </div>
                                    
                                <div class="pull-right">
                                    <button type="submit" id="checkoutfirst"  class="button btn btn-accent">Save changes<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>        
       <?php include ("footer.php");?>
  </div>


<script type="text/javascript">
   document.getElementById("changePassword").disabled=true;
function checkinfo(text,type){
  var  url="checkinfo.php";
  var  data={"text":text,"type":type};
  var  success=function(respond) {
    if (respond==10){document.getElementById("firstnamesuggestion").innerHTML="length should be limited 3 between 10";}
    if (respond==11){document.getElementById("firstnamesuggestion").innerHTML="";}
    if (respond==12){document.getElementById("firstnamesuggestion").innerHTML="letter only";}
    if (respond==20){document.getElementById("lastnamesuggestion").innerHTML="length should be limited 3 between 10";}
    if (respond==21){document.getElementById("lastnamesuggestion").innerHTML="";}
    if (respond==22){document.getElementById("lastnamesuggestion").innerHTML="letter only";}
    if (respond==30){document.getElementById("addresssuggestion").innerHTML="please enter valid address ";}
    if (respond==31){document.getElementById("addresssuggestion").innerHTML="";}
    if (respond==40){document.getElementById("citysuggestion").innerHTML="";}
    if (respond==41){document.getElementById("citysuggestion").innerHTML="letter and '.' only";}
    if (respond==50){document.getElementById("postcodesuggestion").innerHTML="";}
    if (respond==51){document.getElementById("postcodesuggestion").innerHTML="4 number only";}
    if (respond==60){document.getElementById("telephonesuggestion").innerHTML="";}
    if (respond==61){document.getElementById("telephonesuggestion").innerHTML="number only and please enter vaild telephone";}
    if (respond==70){document.getElementById("emailsuggestion").innerHTML="";}
    if (respond==71){document.getElementById("emailsuggestion").innerHTML="example@example.com";}
    if (respond==80){document.getElementById("q").innerHTML="length should be limited 3 between 10";}
    if (respond==81){document.getElementById("q").innerHTML="";}
    if (respond==82){document.getElementById("q").innerHTML="letter only";}
    if (respond==90){document.getElementById("w").innerHTML="";}
    if (respond==91){document.getElementById("w").innerHTML="4~14 number need";}
    if (respond==100){document.getElementById("e").innerHTML="";}
    if (respond==101){document.getElementById("e").innerHTML="2 number need ";}
    if (respond==110){document.getElementById("r").innerHTML="";}
    if (respond==111){document.getElementById("r").innerHTML="4 numbers need " ;}
    if (respond==120){document.getElementById("t").innerHTML="";}
    if (respond==121){document.getElementById("t").innerHTML="3 numbers need";}
  } 
  $.post(url,data,success,'json');  
}

 

/*function  setUserDetail(){
  var url = "userdetail1.php";
  var data={"firstname":,"lastname","city","country":,"email":,"address":,"company","postcode","state",}
  
  
  $.post(url,data,success,'json');
} 
 */ 
 function checkOldPassword(password){
    
   var url="checkOldPassword.php";
   var username='<?php echo $_COOKIE["username"]; ?>';
   
   var data={'username':username,'password':password};
   var success=function(respond){
     if(respond==0){
       
       alert("password is incorrect");
       document.getElementById("changePassword").disabled=true;
     }
     if(respond==1){
       
       document.getElementById("changePassword").disabled=false;
     }
     
   }
   
   $.post(url,data,success,'json');
 }
 
 function checkNewPassword(password){
   var a=$('#password_1').val();
    if(a==password){
    
    document.getElementById("changePassword").disabled=false;
  }  
  else{
    alert("New password is different from rerype new password!");
    document.getElementById("changePassword").disabled=true;
    
  } 
   
 }
 
 function changePassword(){
   var newPassword=$('#password_1').val();
   var username='<?php echo $_COOKIE["username"]; ?>';
   var url='changePassword.php';
   var data={'username':username,'password':newPassword};
   var success=function(respond){
     if(respond>0){
       
       alert("change successfully!");
     }
     
   }
   $.post(url,data,success,'json');
 }
 

</script>

</body>
</html>