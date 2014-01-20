<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{BASE_URL}/css/main.css" type="text/css" rel="stylesheet">
    <link href="{BASE_URL}/css/reset.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css' />
    <title>Easy Panel - Login</title>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js?ver=1.7" type="text/javascript"></script>
 </head>

 <body>
 <div id="topNav">
    <div class="fixed">
        <div class="wrapper">
            <div class="back"><a href="../index.php" title=""><img src="{BASE_URL}/img/topnav/mainWebsite.png" alt="" /><span>Main website</span></a></div>
        </div>
    </div>
 </div>

 <div class="loginWrapper">
	<div class="loginLogo"><img src="{BASE_URL}/img/loginLogo.png" alt="" /></div>
    <div class="loginPanel">
        <div class="head"><h5 class="iUser">Login</h5></div>
        <div class="form">
        <form class="mainForm" id="loginForm" method="post">
            <fieldset>
                <div class="loginRow">
                    <label>Username:</label>
                    <div class="loginInput"><input type="text" name="user" id="user" autofocus /></div>
                    <div class="userError">
                    <label class="error" id="required">This input is required</label>
                    <label class="error" id="incorrect">Incorrect username</label>
                    </div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <label>Password:</label>
                    <div class="loginInput"><input type="password" name="pass" id="pass" /></div>
                    <div class="passError">
                    <label class="error" id="required">This input is required</label>
                    <label class="error" id="incorrect">Incorrect password</label>
                    </div>
                    <div class="fix"></div>
                </div>
                
                <div class="loginRow">
                    <input type="submit" value="Log me in" class="basicBtn submitForm" id="submit" />
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
			 $(".userError label#required").fadeIn();
			 return false;
		 }
		 var pass = $("input#pass").val();
		 if(pass == '') {
			 $(".passError label#required").fadeIn();
			 return false;
		 }
		
		$.post("{BASE_URL}/index.php/auth/login_process", 
		       { user: $('input#user').val() , pass: $('input#pass').val()},
		 function(data){ 
				if (data == 'yes'){
					document.location = '{BASE_URL}/index.php/admin_panel';					
				}else{
					$(".userError label#incorrect").html('Incorrect username').fadeIn();
					$(".passError label#incorrect").html('Incorrect password').fadeIn();  
				}
			});
	 return false;
 	 });  
	}); 
 </script>
 
 <div id="footer">
	<div class="wrapper">
    	<span>&copy; by <a href="http://www.yox64.com" target="_blank">yoX64</a></span>
    </div>
 </div>

 </body>
</html>