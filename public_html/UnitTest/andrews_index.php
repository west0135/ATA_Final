<?
ini_set('display_errors','On'); error_reporting(E_ALL);
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>JSON-API Unit Tester</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" href="CSS/style.css">
	</head>
	<body>
		<!-- <h3 id="itemTypeLabel"></h3>
		<div id="test_area">
				<caption>TEST AREA do not include in Admin Page</caption>
				<div class="block">
						<caption><strong>IMPORTANT - Uncheck this to test without validation:</strong></caption>
						<input type="checkbox" id="validationStatus" checked>
			</div> -->
			<!--<button id="showGeneric">Show Test PHP page</button><button id="AtaProgramCollection">Test AtaProgramCollection</button>-->
			<!--<button id="AtaProgramCategory">ATA Program Category</button>-->
			<!-- <div class="block">
					<label>member_id</label>
					<input id="test_member_id" type="number">
					<label>permissions</label>
					<input id="test_permissions" type="number">
					<button id="setMemberPermission">Set Member Permission Test</button><br>
			</div>
		</div> -->
		<div id="pageTypes">
			<button class="mainButtons" id="AtaProgram">ATA Program</button>
			<button class="mainButtons" id="AtaLesson">ATA Lesson</button>
			<button class="mainButtons" id="Event">Event</button>
			<button class="mainButtons" id="MtcNotice">MTC Notice</button>
			<button class="mainButtons" id="MtcCourtReservation">MTC Court Reservation</button>
			<button class="mainButtons" id="MtcCourt">MTC Court</button>
			<button class="mainButtons" id="MtcMemberSecure">MTC Member</button>
			<button class="mainButtons" id="MtcPermissions">MTC Permissions</button>
			<button class="mainButtons" id="MtcUserSession">MTC Session</button>
		</div>
		<br><br>
		<div class="CreateNewItemDiv">
			<button id="createItem" class="hide">Create a New Item</button>
		</div>
		<div id="editArea" class="hide">
			<iframe id="remember" name="remember" class="hide" src="#"></iframe>
			<form name="profile" target="remember" method="post" action="#">
				<div id="actionButtons">
					<button type="submit" id="addItem" class="saveItem">Save</button>
					<button id="cancelButton" class="cancelItem">Cancel</button>
				</div>
				<div id="inputForm"></div>
			</form>
			<div id="tinyMice">
				<textarea id="txtContent" name="content" class="htmlEditTextArea tinymce-enabled"></textarea>
			</div>
		</div>
		<div id="fields_list"></div>
		<div id="error_responseText"></div>
		
		
		<div id="login_dialog" title="Login To Administrator">
			<iframe id="remember_me" name="remember_me" class="hide" src="#"></iframe>
			<form id="login_form" name="login_form" target="remember_me" method="post" action="#">
				<label>email</label>
				<input id="my_email" type="text" autocomplete="on">
				<label>password</label>
				<input id="pswd" type="password">
				<!--<button type="submit" id="btnLogin">Login</button>-->
			</form>
		</div>
		
		<!--<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>-->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="js/Unit-Tester.js?ver=1.000.012"></script>
	</body>
</html>