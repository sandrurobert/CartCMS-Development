<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{BASE_URL}/css/main.css" type="text/css" rel="stylesheet">
    <link href="{BASE_URL}/css/reset.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />
    <title>Easy Panel - Register</title>
    
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
        <div class="head"><h5 class="iUser">Register</h5></div>
        <div class="registerForm">
        <form class="mainForm" method="post">
            <fieldset>
                <div class="loginRow">
                    <label>Username:</label>
                    <div class="loginInput"><input type="text" name="user" id="user" /></div>
                    <label class="error" id="userError">This input is required</label>
                    <!-- <label class="error" id="existuserError">Username already exists</label> not working -->
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label>Password:</label>
                    <div class="loginInput"><input type="password" name="pass" id="pass" /></div>
                    <label class="error" id="passError">This input is required</label>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label>Password:</label>
                    <div class="loginInput"><input type="password" name="vpass" id="vpass" /></div>
                    <label class="error" id="vpassError">This input is required</label>
                    <label class="error" id="vpassmatchError">Passwords must match</label>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <input type="submit" value="Register" class="basicBtn submitForm" id="submit" />
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
		 
   		 var user = $("input#user").val();
		 if(user == '') {
			 $("label#userError").fadeIn();
			 return false;
		 }
		 var pass = $("input#pass").val();
		 if(pass == '') {
			 $("label#passError").fadeIn();
			 return false;
		 }
		 var vpass = $("input#vpass").val();
		 if(pass == '') {
			 $("label#vpassError").fadeIn();
			 return false;
		 }
		 if(pass != vpass) {
			 $("label#vpassmatchError").fadeIn();
			 return false;
		 }
		$.post("{SITE_URL}/auth/register_process", 
		       { user: $('input#user').val() , pass: $('input#pass').val()},
		 function(data){ 
				if (data == 'yes')
					$(".registerForm").html('<p style="text-align:center;">User added successfully.<br /><a href="{SITE_URL}/auth/register">Add another one.</a></p>').fadeIn();
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