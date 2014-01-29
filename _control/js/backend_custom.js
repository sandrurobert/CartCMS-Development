$(document).ready(function() {
	
	//===== Login =====//

	$(".inputError").hide();
	$("label.error").hide();
	$('#log_in_error').hide();
	 
	$("#log_in").click(function() { 
	
		$(".inputError").hide();
		$('#log_in_error').hide();

		var user = $("input#user").val();
		
		if ( user == '' ) {
		
			$("#username").fadeIn();
			$("#username").children('label#required').fadeIn();
			return false;
			
		}
		
		var pass = $("input#pass").val();
		
		if ( pass == '' ) {
		
			$("#password").fadeIn();
			$("#password").children('label#required').fadeIn();
			return false;
		
		}

		$.post( site_url + "/login/log_in", { 
												user: $('input#user').val(), 
												pass: $('input#pass').val()
											},
			function( data ){ 
			
				if ( data == 1 ){
				
					document.location = site_url + '/dashboard';	
				
				} else {
				
					$('#log_in_error').fadeIn();  
					
				}
			
		});
		
		return false;
		
	});
	
	
	//===== User settings =====//
	
	$("#user_submit").click(function() { 
	
		$(".inputError").hide();

		var user = $("input#user").val();
		
		if ( user == '' ) {
		
			$("#username").fadeIn();
			$("#username").children('label#required').fadeIn();
			return false;
			
		}
		
	});
	
	/* ===== Pages - Simple page =====
	
	$("#normal_content").hide();
	var select_value = $("select#modules option:selected").val();
	
	if(select_value == 'simple_page')
		$("#normal_content").show();
		
	$("select#modules").change(function() {
		
		var current_value = $("select#modules option:selected").val();
		
		if(current_value == 'simple_page')
			$("#normal_content").show();
		else
			$("#normal_content").hide();
		
	});

	*/
	
	//===== Pages - form verification =====//
	
	$('.allRequired').hide();
	
	$('#submitPages').click( function() {
	
		$('.allRequired').hide();
		
		var title = $("input#title").val();
		
		if ( title == '' ) {
		
			$('.allRequired').fadeIn();
			return false;
			
		}
		
		return true;
	
	});

	//===== Alert windows =====//

	$(".bConfirm").click( function() {

		jConfirm('Are you sure you want to delete this page?', 'Delete page', function(r) {

			jAlert('Confirmed: ' + r, 'Confirmation Results');

		});

		return false;

	});
		
});