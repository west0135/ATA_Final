<?php 
session_start();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) ){
	
	echo("some");
}else{
	print_r("Please Enter All Fields");
}

?>

<!DOCTYPE HTML>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    </head>
    
    <body>
        <form  name="contact-form" method="post" action="about.php">
 
			
			<label for="exampleInputEmail1">Name</label>
			<input type="name" class="form-control" id="name" name="name" placeholder="John Smith">
			
			<label for="exampleInputEmail1">Phone Number (Optional)</label>
			<input type="number" class="form-control" id="inputPhonenumber" placeholder="Phone Number">
			
			<label for="exampleInputPassword1">Email Address</label>
			<input type="email" class="form-control" id="email" placeholder="JohnSmith@example.ca">
			
			
			<label for="exampleInputEmail1">Subject</label>
			<input type="textarea" class="form-control" id="subject" placeholder="Subject">
			
			<label for="exampleInputEmail1">Message:</label>
			<textarea class="form-control" id="message" rows="4"></textarea>
			
		    <button type="submit" ><a class="center white">Email Form</a></button>
						
			
		</form>
        </body>
</html>