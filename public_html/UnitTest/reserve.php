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
<style type="text/css">

/*
.show{
	display:block;
}
.hide{
	display:none;
}
*/

.grey{
	background-color:#D3D3D3;
}
.ochre{
	background-color:#FED800
}
.white{
	background-color:#FFFFFF;
}
.dark_grey{
	padding-top:0.5em;
	padding-bottom:0.6em;
	color:#FFFFFF;
	background-color:#656565;
	text-align:center;
}
	
.cell{
	width:100%;
	border:solid black thin;
}
.container{
	display:inline-block;
	width:10%;
	border:solid black thin;
	margin-right:4px;
}
label{
	margin-right:20px;
}
.block input{
	margin:0px;
	padding:0px;
}

#res-container{
    padding:20px;
}

#test_area{
	margin:0px;
	padding:0px;
	border:solid black thin;
}
</style>
</head>
<body>
<div id="navbar"><a class="top-navbar-item admin" href="index.php">Admin Portal</a><a class="top-navbar-item utils" href="list_utils.php">List Utils</a><a class="top-navbar-item reserve nav-active" href="reserve.php">Reservation Manager</a><a class="top-navbar-item log_in_out" id="cheapLogOut">Log Out</a></div>

<br/>
    <div id="test_area">
        <caption>TEST AREA do not include in Admin Page</caption>
        <div class="block">
            <button id="btnTestReservations">Test MtcCourtReservationHelper.reservations</button>
            <label>Test Quick Res</label>
            <button id="btnTest">Test</button><br>
            <label>End Date</label>
            <input type="date" id="end_date">
        </div>
        <div class="block">
            <label>Reservations per Hour   (no limit if -1) </label><input id="res_per_hour" type="number" value="2"><br>
            <label>Reservations per Member (no limit if -1) </label><input id="res_per_member" type="number" value="1">
            <button id="btnChange">Update Parameters</button><br>
            <!--<button id="cheapLogOut">Cheap Logout</button><br>-->
        </div>
    </div>

    <div id="res-container">
        <button id="btnToday">Today</button>
        <button id="btnTomorrow">Tomorrow</button>

        <h1 id="dateString"></h1>
        <div id="lists_container"></div>
    </div>

    <div id="login_dialog" title="Login To Reservation Administrator">
        <form id="login_form" name="login_form" method="post" action="#">
        <label>email</label>
        <input id="my_email" type="text" autocomplete="on">
        <label>password</label>
        <input id="pswd" type="password">
        </form>
    </div>

<!--<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>-->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="js/utils.js?ver=1.000.000"></script>
<script type="text/javascript" src="js/Reservation-Tester.js?ver=1.000.001"></script>

</body>
</html>