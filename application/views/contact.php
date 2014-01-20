<!-- - - - - - - - - - - - - - Page Header - - - - - - - - - - - - - - - -->		

<section class="page-header">
	
	<div class="container">
		
		<h1>{TITLE}</h1>
		
	</div><!--/ .container-->
	
</section><!--/ .page-header-->

<!-- - - - - - - - - - - - - end Page Header - - - - - - - - - - - - - - -->	

<!-- - - - - - - - - - - - - - Main - - - - - - - - - - - - - - - - -->		
	
<section class="main container sbr clearfix">	
	
	<div id="map" class="map"></div><!--/ #map-->
	
	<div class="nine columns">
		
		<h3>Trimite-ne un mesaj</h3>
		
		<section id="contact">

			<form method="post" action="" class="comments-form" id="contactform" />

				<p class="input-block">
					<label for="name">Nume:</label>
					<input type="text" name="name" id="name" />
				</p>

				<p class="input-block">
					<label for="email">E-mail:</label>
					<input type="text" name="email" id="email" />
				</p>

				<p class="input-block">
					<label for="message">Mesaj:</label>
					<textarea name="message" id="message" cols="30" rows="10"></textarea>	
				</p>
				
				<p class="input-block">
					<button class="button default" type="submit" id="submit">Submit</button>
				</p>

			</form><!--/ .comments-form-->	

		</section><!--/ #contact-->				
		
	</div><!--/ .nine .columns-->
	
	<div class="seven columns">
		
		<h3>Adresa</h3>
		
		<span>
			Address:   &nbsp;&nbsp;&nbsp;&nbsp; 12 Street, Los Angeles, CA, 94101 <br />
			Phone:    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   +1 800 123 4567 <br />
			FAX:       &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;   +1 800 891 2345 <br />
			Email:      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; testmail@sitename.com 
		</span>
		
	</div><!--/ .seven .columns-->

		
</section><!--/ .main -->

<!-- - - - - - - - - - - - - end Main - - - - - - - - - - - - - - - - -->			

<script language="javascript">
	$(function() {  
	 $("label.errorL").hide();
	 
 	 $("#submit").click(function() { 
	     $("label.errorL").hide();
		 
   		 var name = $("input#name").val();
		 if(name == '') {
			 $("#nameError").fadeIn();
			 return false;
		 }
		 var email = $("input#email").val();
		 if(email == '') {
			 $("#emailError").fadeIn();
			 return false;
		 }
		
		$.post("{SITE_URL}/website/contact", 
		       { name: $('input#name').val() , email: $('input#email').val(), message: $('textarea#message').val()},
		 function(data){ 
				if (data == 'yes'){
					$("#contact").html("<p style='text-align:center;'>Message sent successfully!</p>");					
				}else{
					$("#contact").html("<p style='text-align:center;'>Error sending message!<br /><a href='{SITE_URL}/website/pages/43'>Try again.</a></p>");  
				}
			});
	 return false;
 	 });  
	}); 
 </script>