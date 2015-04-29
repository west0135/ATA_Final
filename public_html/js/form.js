$(document).ready(function(){

	$("td").on("click", "a", function(ev){
		ev.preventDefault();
		//show the contact form
		$("#contact-form").slideToggle();
		$("html, body").animate({ scrollTop: $(document).height() }, 1000);
		
		$("#contactSubject").val($(this).attr('value'));
		
	});
	
	$("#closeForm").on("click", function(ev){
		ev.preventDefault();
		$("#contact-form").slideToggle();
		
	});

});