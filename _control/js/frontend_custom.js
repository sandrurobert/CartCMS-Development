$(document).ready(function() {
	
	//===== Multiple select with dropdown =====//
	
	$(".chzn-select").chosen(); 
	
			
	//===== Form elements styling =====//
	
	$("select, input:checkbox, input:radio, input:file:not(.default)").uniform();
	

	//===== WYSIWYG editor =====//
	
	$('.wysiwyg').wysiwyg({
		iFrameClass: "wysiwyg-input",
		controls: {
			bold          : { visible : true },
			italic        : { visible : true },
			underline     : { visible : true },
			strikeThrough : { visible : false },
			
			justifyLeft   : { visible : true },
			justifyCenter : { visible : true },
			justifyRight  : { visible : true },
			justifyFull   : { visible : true },
			
			indent  : { visible : true },
			outdent : { visible : true },
			
			subscript   : { visible : false },
			superscript : { visible : false },
			
			undo : { visible : true },
			redo : { visible : true },
			
			insertOrderedList    : { visible : true },
			insertUnorderedList  : { visible : true },
			insertHorizontalRule : { visible : false },

			h1: {
			visible: true,
			className: 'h1',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h1>' : 'h1',
			tags: ['h1'],
			tooltip: 'Header 1'
			},
			h2: {
			visible: true,
			className: 'h2',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h2>' : 'h2',
			tags: ['h2'],
			tooltip: 'Header 2'
			},
			h3: {
			visible: true,
			className: 'h3',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h3>' : 'h3',
			tags: ['h3'],
			tooltip: 'Header 3'
			},
			h4: {
			visible: true,
			className: 'h4',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h4>' : 'h4',
			tags: ['h4'],
			tooltip: 'Header 4'
			},
			h5: {
			visible: true,
			className: 'h5',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h5>' : 'h5',
			tags: ['h5'],
			tooltip: 'Header 5'
			},
			h6: {
			visible: true,
			className: 'h6',
			command: ($.browser.msie || $.browser.safari) ? 'formatBlock' : 'heading',
			arguments: ($.browser.msie || $.browser.safari) ? '<h6>' : 'h6',
			tags: ['h6'],
			tooltip: 'Header 6'
			},
			
			cut   : { visible : true },
			copy  : { visible : true },
			paste : { visible : true },
			html  : { visible: true },
			increaseFontSize : { visible : false },
			decreaseFontSize : { visible : false },
			},
		events: {
			click: function(event) {
				if ($("#click-inform:checked").length > 0) {
					event.preventDefault();
					alert("You have clicked jWysiwyg content!");
				}
			}
		}
	});
	
	//$('.wysiwyg').wysiwyg("insertHtml", "Sample code");
	
	
	//===== Tooltip =====//
		
	$('.leftDir').tipsy({fade: true, gravity: 'e'});
	$('.rightDir').tipsy({fade: true, gravity: 'w'});
	$('.topDir').tipsy({fade: true, gravity: 's'});
	$('.botDir').tipsy({fade: true, gravity: 'n'});
	
	//===== PrettyPhoto lightbox plugin =====//
	
	$("a[rel^='prettyPhoto']").prettyPhoto();
	
	
	//===== Image gallery control buttons =====//

	$(".pics ul li").hover(
	
		function() { $(this).children(".actions").show("fade", 200); },
		function() { $(this).children(".actions").hide("fade", 200); }
		
	);

	
	//===== Dropdown Menu =====//
	
    $("ul.sub").hide();
	
	$(".exp").click(function() { 
	
		if( $(this).children('a.active').length > 0 ) {
		
			$(this).children('a').removeClass('active');
			
		} else {
		
			$(this).children('a').addClass('active');
		
		}
		
		$(this).find("ul.sub").slideToggle(300);
		
	});
	
	$("ul.sub li a").hover(
	
		function () {
		
			$(this).stop().animate({ 'color' : '#676767' }, 400);
		
		},
		function () {
		
			$(this).stop().animate({ 'color' : '#d5d5d5' }, 400);
		
		}
		
	);	
	
		
	//===== Alert windows =====//

	$(".deleteBtn").click( function() {
	
		jConfirm('Are you sure?', 'Hmmm...', function(r) {
		
			if ( r ) {
			
				jAlert('Roger that!', 'Confirmation');
			
			} else {
			
				jAlert('Okay! :(', 'Confirmation');
			
			}
			
		});
		
	});
	
	//===== Information boxes =====//
		
	$("#notifications").click(function() {
		$(this).fadeTo(200, 0.00, function(){ //fade
			$(this).slideUp(300, function() { //slide up
				$('.hideit').remove(); //then remove from the DOM
			});
		});
	});	
	

	
	
});