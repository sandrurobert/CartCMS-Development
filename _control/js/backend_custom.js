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
	
	//===== Pages - Simple page =====//
	
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
	
	//===== Pages - verification & submit =====//
	
	$('.allRequired').hide();
	
	$('#submitPages').click( function() {
	
		$('.allRequired').hide();
		$('#notifications div').remove();
		
		var title = $("input#title").val();
		
		if ( title == '' ) {
		
			$('.allRequired').fadeIn();
			return false;
			
		}
		
		$.post( site_url + "/pages/add_process", { 
													title: $('input#title').val(), 
													content: $("#wysiwyg").val(), 
													page_type: $('select#page_type .result-selected').val(), 
													modules: $('select#modules .result-selected').val(),
													meta_key: $('input#meta_key').val(), 
													meta_descr: $('input#meta_descr').val() 
												},
			function( data ) { 
			
				if ( data == 'success' ) {
				
					$('input#title').val('');
					$('input#meta_key').val('');
					$('input#meta_descr').val('');
					
					$("<div class='nNote nSuccess hideit'> <p><strong>SUCCESS: </strong>Page added successfully!</p> </div>").appendTo('#notifications');
					$('#notifications').hide();
					$('#notifications').fadeIn();
					
					setInterval( function() {
					
						$('#notifications div').fadeOut();
						$('#notifications div').remove();
					
					}, 2000);
				
				} else {
				
					$("<div class='nNote nFailure hideit'> <p><strong>FAILURE: </strong>Hmmm... Please try again!</p> </div>").appendTo('#notifications');
					$('#notifications').hide();
					$('#notifications').fadeIn();
					
				}
		});
			
		return false;
	
	});
	
	//edit pages
	$('#editPages').click( function() {
	
		$('.allRequired').hide();
		$('#notifications div').remove();
		
		var title = $("input#title").val();
		
		if ( title == '' ) {
		
			$('.allRequired').fadeIn();
			return false;
			
		}
		
		page_type_selected = $( '#page_type_chzn' ).find( '.result-selected' );
		page_type_id = page_type_selected.attr( 'id' );
		page_type_value = page_type_id.slice( 17 );
		
		modules_selected = $( '#modules_chzn' ).find( '.result-selected' );
		modules_id = modules_selected.attr( 'id' );
		modules_value = modules_id.slice( 15 );
		
		$.post( site_url + "/pages/edit_process/" + id_page, { 
													title: $('input#title').val(), 
													content: $("#wysiwyg").val(), 
													page_type: page_type_value, 
													modules: $('#modules > option' ).val(),
													meta_key: $('input#meta_key').val(), 
													meta_descr: $('input#meta_descr').val() 
												},
			function( data ) { 
			
				if ( data == 'success' ) {
				
					$("<div class='nNote nSuccess hideit'> <p><strong>SUCCESS: </strong>Page edited successfully!</p> </div>").appendTo('#notifications');
					$('#notifications').hide();
					$('#notifications').fadeIn();
					
					setInterval( function() {
					
						$('#notifications div').fadeOut();
						$('#notifications div').remove();
					
					}, 2000);
				
				} else {
				
					$("<div class='nNote nFailure hideit'> <p><strong>FAILURE: </strong>Hmmm... Please try again!</p> </div>").appendTo('#notifications');
					$('#notifications').hide();
					$('#notifications').fadeIn();
					
				}
		});
			
		return false;
	
	});
	
	
});