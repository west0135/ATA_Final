<?
ini_set('display_errors','On'); error_reporting(E_ALL);
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Reserve Court Unit Tester</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="CSS/style.css">
</head>
	<body>
		<div id="test_area">
			<caption>TEST AREA do not include in Admin Page</caption>
			<div class="block">
				<label>Test Quick Res</label>
				<button id="btnTest">Test</button><br>
				<label>End Date</label>
				<input type="date" id="end_date">
			</div>
			<div class="block">
				<label>Reservations per Hour   (no limit if -1) </label><input id="res_per_hour" type="number" value="2"><br>
				<label>Reservations per Member (no limit if -1) </label><input id="res_per_member" type="number" value="1">
				<button id="btnChange">Update Parameters</button><br><br>
			</div>
		</div>
		<button id="btnToday">Today</button>
		<button id="btnTomorrow">Tomorrow</button>
		<select id="user_list">
		</select>
		<button id="btnTestReservations">Test MtcCourtReservationHelper.reservations</button>

		<h1 id="dateString"></h1>
		<div id="lists_container"></div>

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
	<script type="text/javascript" src="js/Reservation-Tester.js?ver=1.000.005"></script>

	</body>
</html>