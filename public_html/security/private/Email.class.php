<?php
/**
 * Email.class.php
 * 
 * This file runs all emails that are sent through To_BE
 * Types of emails:
 *
 * sendWelcomeEmail - When a new user signs up for the first time
 * sendWelcomeEmail($receiverFirstName, $receiverEmail, $confirmationCode)
 *
 *
 * sendNewPassword - Sends user his new password when they reset it
 * sendNewPassword($receiverFirstName, $receiverEmail, $newPassword)
 *
 *
 * 
 * @author Kirk Davies
 * 
 */

class email
{
	public $message = null;
	public $receiverEmail = null;
	public $messageContent = null;
	public $subject = null;
	public $headers = null;
	public $newWidth = null;
	public $newHeight = null;
	# set the logo URL
	public $logo = 'http://clients.edumedia.ca/to_be/MTC/img/mainLogo.png';
	public $messageStyle = 
	'<style>
        body{
           background-color:whitesmoke;
           font-family: sans-serif;
        }
        #container{
            background-color:white;
            font-family: sans-serif;
            -webkit-border-radius: .5em; 
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2);
            box-shadow: 0 1px 2px rgba(0,0,0,.2);   
            padding: 0px 0px; 
        }

        #logo{
            -webkit-border-top-right-radius: .5em;
            -webkit-border-top-left-radius: .5em;
            padding:1% 1%;
            -moz-border-top-right-radius: .5em;
            -moz-border-top-left-radius: .5em;
            border-top-right-radius: .5em;
            border-top-left-radius: .5em;
            width:98.2%;
        }
        #content{padding: 2% 20px;}
        #content > h1
        {
        	font-size: 2em;
        	font-weight: large;
        }
        #content > h3
        {
        	display: inline;
        }
        </style>';

	//To avoid an error if a script attempts to output email object as a string use this method
	public function __toString()
	{
		return "Error: Attempting to output object as a string.";
	}

	public 	function picResize() {
		# get the image dimensions and resize it
		list($width, $height) = getimagesize($this->logo);
		$side = 250;

		$ratio = $width / $height;
		
		if ($ratio < 1) {
			//height is the longer side
			$new_y = $side;
			$new_x = $new_y * ($width / $height);
		}
		elseif ($ratio > 1) {
			//width is the longer side
			$new_x = $side;
			$new_y = $new_x * ($height / $width);
		}
		else {
			//same size (square)
			$new_x = $side;
			$new_y = $side;
		}
			$this->newWidth = $new_x;
			$this->newHeight = $new_y;
	}
/**
 		sets header/footer of emails that go to end users
 */
	public function setupMessage()
	{
		$this->message =
		"<html>
		    <head>
		    	$this->messageStyle
		    </head>
		
		    <body>
		    	<div id='container'>
			    	<div id='header'>
			        	<div id='logo'>
				            <img height='$this->newHeight' width='$this->newWidth' alt='To_Be' src='$this->logo' />
						</div>
				    </div>"
				    . $this->messageContent .
				    "<div id='footer'>
					    <!-- Share Buttons -->
							<a href='#' target='_blank' >To_Be on Twitter</a>
							<br />
							<a href='#' >To_Be on Facebook</a>
						<!-- /share Buttons -->
					    <br />
						<span id='emailSignature'>
							<p>Thank you,<br />The To_Be Team</p>
						</span>
					</div>
				</div>
		    </body>
	    </html>";
	}

	public function sendWelcomeEmail($receiverFirstName, $receiverEmail, $confirmationCode)
	{
		$this->subject = "Welcome to To Be or Not To Be";
		$this->receiverEmail = $receiverEmail;
		$this->messageContent = 
			    "<div id='content'>
				    <h1>Hi $receiverFirstName, thanks for signing up to To Be or Not To Be</h1>
		        	<h3>To Be or Not To Be is the best development team around</h3>
			        <p>
			        	They will easily and proffessionally develop whatever you need
			       	</p>
		        	<p>
		        		Please verify your account by clicking: <a target='_blank' href='http://clients.edumedia.ca/to_be/MTC/verifyEmail.php?email=$receiverEmail&confirm_code=$confirmationCode'>Verify me</a>
		        	</p>
				</div>";

	    #Send the email
	    return $this->sendEmail();
	}

	public function sendNewPassword($receiverFirstName, $receiverEmail, $newPassword)
	{
		$this->subject = "Password Reset";
		$this->receiverEmail = $receiverEmail;
		$this->messageContent = 
			"<div id='content'>
				<h1>Hi $receiverFirstName, your password has been reset</h1>
		        <h3>You can now log in using: <strong>$newPassword</strong></h3>
		        <p>To change your password, log in and click the top right menu button and go to Settings -> Account -> Change Password</p>
			</div>";

		#Send the email
	    return $this->sendEmail();
	}

	private function sendEmail()
	{
		#Before we send any email, set the headers
		$this->headers .= "MIME-Version: 1.0\r\n";
    	$this->headers .= "Content-type: text/html; charset=utf8\r\n";
    	$this->headers .= "From: tobe@tobe.com\r\n";
    	$this->headers .= "Reply-To: tobe@tobe.com\r\n" . 'X-Mailer: PHP/' . phpversion();
    	$this->headers .= "Return-Path: tobe@tobe.com\r\n";
	    #setup logo size
	    $this->picResize();
    	#setup Message
	    $this->setupMessage();
    	#Send email
		$send = mail($this->receiverEmail, $this->subject, $this->message, $this->headers);
		
		
		
		
		return $send;
	}
}

$email = new email();
$email->sendWelcomeEmail('Tester', 'kirkdavies@rogers.com', '123');

?>
