		<div class="loginWrapper">

			<div class="loginLogo">
				<img src="{BASE_URL}/img/loginLogo.png" alt="Logo" />
			</div><!-- .loginLogo -->
			
			<div class="loginPanel">
			
				<div class="head">
					<h5 class="iUser">{lang_page_title}</h5>
				</div><!-- .head -->
				
				<div class="form">
					<form class="mainForm" id="loginForm" >
						<fieldset>
							<div class="loginRow">
							
								<label>{lang_user_field}</label>
								
								<div class="loginInput nobg">
									<input type="text" name="user" id="user" />
								</div><!-- .loginInput -->
								
								<div class="inputError" id = "username">
								
									<label class="error" id="required">{lang_required_input}</label>
								
								</div><!-- .inputError -->
								
								<div class="fix"></div>
								
							</div><!-- .loginRow -->

							<div class="loginRow">
							
								<label>{lang_pass_field}</label>
								
								<div class="loginInput nobg">
									<input type="password" name="pass" id="pass" />
								</div><!-- .loginInput -->
								
								<div class="inputError" id = "password">
								
									<label class="error" id="required">{lang_required_input}</label>
								
								</div><!-- .inputError -->
								
								<div class="fix"></div>
							
							</div><!-- .loginRow -->

							<div class="loginRow">
								
								<div id = "log_in_error">
								
									<p>{lang_incorrect_login}</p>
								
								</div><!-- #log_in_error -->
								
								<input type="submit" value="{lang_submit_login}" class="basicBtn submitForm" id="log_in" />
								<div class="fix"></div>
								
							</div><!-- .loginRow -->
							
						</fieldset>
					</form>
				</div><!-- .form -->
				
			</div><!-- .loginPanel -->
			
		</div><!-- .loginWrapper -->