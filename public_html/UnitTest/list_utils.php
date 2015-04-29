<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>List Utilities</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="CSS/style.css">
<style type="text/css">
.show{
	display:block;
}
.hide{
	display:none;
}
body{
}
.saveItem{
	background-color:#1BD900;
}
.cancelItem{
	background-color:#B6B6B6;
}
#query_form_container{
	margin:20px;
	padding:20px;
	border:solid black 2px;
}

</style>
</head>
<body>

<div id="navbar">
	<a class="top-navbar-item admin" href="index.php">Admin Portal</a>
    <a class="top-navbar-item utils nav-active" href="list_utils.php">List Utils</a>
    <a class="top-navbar-item reserve" href="reserve.php">Reservation Manager</a>
    <a class="top-navbar-item log_in_out" id="cheapLogOut" data-status="logged_out">Log In</a>
</div>

<!--
<div id="test_area">
    <caption>TEST AREA do not include in Admin Page</caption>
    <div class="block">
    </div>
</div>
-->

<!--
<button id="loginBtn">Log In</button>
<button id="cheapLogOut">Cheap Logout</button><br>
-->

<div id="main_container">
    <label>Management Operations</label>
    <select id="canned_query_list"></select>
    <div id="query_form_container" class="hide">
        <button type="submit" id="listItems_submit" class="saveItem">Submit</button><br><br>
        <div id="query_form_input_container">
        </div>
    </div>
    <div id="lists_container" class="hide"></div>
</div>

<div id="login_dialog" title="Login To List Utilities" class="hide">
    <form id="login_form" name="login_form" method="post" action="#">		
    	<label>email</label>
    	<input id="my_email" type="text" autocomplete="on" >
    	<label>password</label>
    	<input id="pswd" type="password">
    </form>
</div>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="js/utils.js?ver=1.000.000"></script>
<script type="text/javascript" src="js/list_utils.js?ver=1.000.000"></script>

</body>
</html>