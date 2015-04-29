$( "#contact-form" ).submit(function( event ) {

    $(this).each(function(){
        var count = $(this).find(':input[data-invalid]').length;
        if (count === 0) {
            
            var url = "./php/form.php";
            var data = $(this).serialize();
            var success = $(this).prepend( "<p class='white'>Thank You! Your message has been sent.</p>" );

            $.ajax({
              type: "POST",
              url: url,
              data: data,
              success: success
            });

        }
    });

    event.preventDefault();

});