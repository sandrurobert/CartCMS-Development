<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{BASE_URL}/css/main.css" type="text/css" rel="stylesheet">
    <link href="{BASE_URL}/css/reset.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />
    <title>Easy Panel - Change password</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js?ver=1.7" type="text/javascript"></script>
 </head>

 <body>
 <div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="back"><a href="{SITE_URL}/admin_panel" title=""><img src="{BASE_URL}/img/topnav/mainWebsite.png" alt="" /><span>Back</span></a></div>
            <div class="fix"></div>
        </div>
    </div>
 </div>

 <div class="loginWrapper">
	<div class="loginLogo"><img src="{BASE_URL}/img/loginLogo.png" alt="" /></div>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Change password</h5></div>
        <div class="registerForm">
        <form class="mainForm" method="post">
            <fieldset>                
                <div class="loginRow">
                    <label>New password:</label>
                    <div class="loginInput"><input type="password" name="newpass" id="newpass" /></div>
                    <label class="error" id="passError">This input is required</label>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label>Repeat password:</label>
                    <div class="loginInput"><input type="password" name="vpass" id="vpass" /></div>
                    <label class="error" id="vpassError">This input is required</label>
                    <label class="error" id="vpassmatchError">Passwords must match</label>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <input type="submit" value="Submit" class="basicBtn submitForm" id="submit" />
                    <div class="fix"></div>
                </div>
            </fieldset>
        </form>
        </div>
    </div>
 </div>
 <script language="javascript">
	$(function() {  
	 $("label.error").hide();
	 
 	 $("#submit").click(function() { 
	     $("label.error").hide();
		 
		 var newpass = $("input#newpass").val();
		 if(newpass == '') {
			 $("label#newpassError").fadeIn();
			 return false;
		 }
		 var vpass = $("input#vpass").val();
		 if(vpass == '') {
			 $("label#vpassError").fadeIn();
			 return false;
		 }
		 if(newpass != vpass) {
			 $("label#vpassmatchError").fadeIn();
			 return false;
		 }
		$.post("{SITE_URL}/user_settings/change_password_process/{id_loggedUser}", 
		       { newpass: $('input#newpass').val() , vpass: $('input#vpass').val()},
		 function(data){ 
				if (data == 'yes')
					$(".registerForm").html('<p style="text-align:center;">Changes made successfully.<br /><a href="{SITE_URL}/admin_panel">Go back to dashboard.</a></p>').fadeIn();
			});
	   return false;
 	 });  
	}); 
 </script>
 <div id="footer">
	<div class="wrapper">
    	<span>&copy; by yoX64</span>
    </div>
 </div>

 </body>
</html>