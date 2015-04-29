//globals
var g_const;
var g_json;
var g_courts_json;
var g_last_end_time = 0;

var g_userid;
var g_ukey;
var g_permissions;

//TODO set using configuration
var g_max_reservations_per_person = 4;
var g_max_rereservations_per_time_period = 2;

//var g_my_reservation_count = 0;

var const_cell_height = 80;
var const_line_height = 2;
var const_FREE = "FREE";
var const_MEMBER_RESERVATION = "MEMBER_RESERVATION";
var const_MY_RESERVATION = "MY_RESERVATION";

//TODO fake member id
//var g_fake_member_id = 1;

var g_date;
var g_day;

var const_START_TIME;
//var g_start_time_dec;
var const_END_TIME;
var g_current_time_dec;

//TODO set up administrator mode
var g_isAdmin = false;

$(document).ready(function ()
{
	$.support.cors = true;
	
	$( "#login_dialog" ).dialog(
	{
		autoOpen: false,
		buttons: [
		{
		  text: "Ok",
		  icons: {
			primary: "ui-icon-heart"
		  },
		  type: "submit",
          form: "login_form", // <-- Make the association
		  click: function(ev)
		  {
			ev.preventDefault();
			$( this ).dialog( "close" );
			var myEmail = $("#my_email").val();
			var myPassword = $("#pswd").val(); 
			var data = {func: 'loginUser',email: myEmail,password: myPassword};
			loginServer(LOGIN_SERVER, data, function(json)
			{
				g_userid = json.userid;
				g_ukey = json.ukey;
				g_permissions = json.permissions;
				
				drawTimeColums();
				
				localStorage.setItem("g_userid", g_userid);
				localStorage.setItem("g_ukey", g_ukey);
				localStorage.setItem("g_permissions", g_permissions);
				
				$("#cheapLogOut").attr("data-status", "logged_in");
				$("#cheapLogOut").html("Log Out");
	
			}, login_error);
		  }
		  // Uncommenting the following line would hide the text,
		  // resulting in the label being used as a tooltip
		  //showText: false
		}
	  ]
	});

	// Retrieve
	g_userid = localStorage.getItem("g_userid");
	g_ukey = localStorage.getItem("g_ukey");
	g_permissions = localStorage.getItem("g_permissions");

	g_date = getTodaysDatePlus(0);
	g_day = getTodaysDayPlus(0);
	
	//alert(g_date);
	function setGlobals(json)
	{
		//alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size
		var field = json.field[0];
		$("#dateString").html("Reservations for: " + g_date + " open: " +
			formatMinutes(field.start_time) + " closed: " + formatMinutes(field.end_time));

		const_START_TIME = minutesToDecimal(field.start_time);
		const_END_TIME = minutesToDecimal(field.end_time);
	}
	
	//Get the open hours
	var data = {method:"MtcOpenDatesHelper.getOpenHours", date:g_date, day: g_day};
	postData(JSON_API_URL, data, function(json)
	{
		setGlobals(json);
		//Get Current time in half hour increments 
		//Plus n hours
		g_current_time_dec = getTimeByHalfs(1);
		//Draw the containers representing courts
		var data = {method:"MtcCourt.getList"};
		postData(JSON_API_URL, data, function(json)
		{
			g_courts_json = json;
			$("#lists_container").html("");
			var html = "";
			for(var i=0; i < json.fields.length; i++)
			{
				var field = json.fields[i];
				html += '<div id="c-' + field.court_id + '" class="container"></div>';
			}
			$("#lists_container").html(html);
			//Draw the time columns
			drawTimeColums();	
		}, error);
	},error);

	//////////////////////////////// initialize after $("#login_dialog") /////////////////
	if(!g_ukey)
	{
		$("#cheapLogOut").attr("data-status", "logged_out");
		$("#cheapLogOut").html("Log In");
		show("#login_dialog");
		$("#login_dialog").dialog( "open" );
	}
	else
	{
		$("#cheapLogOut").attr("data-status", "logged_in");
		$("#cheapLogOut").html("Log Out");
	}
	
	//Log Out
	$("#cheapLogOut").click(function(e)
	{
		e.preventDefault();
		var status = e.target.dataset.status;
		if("logged_out" == status)
		{
			$("#login_dialog").dialog( "open" );
		}
		else
		{
			var data = {func: 'logoutUser',ukey: g_ukey, userid: g_userid};
			loginServer(LOGIN_SERVER, data, function(json)
			{
				if(json.status == 1)
				{
					localStorage.removeItem("g_userid");
					localStorage.removeItem("g_ukey");
					localStorage.removeItem("g_permissions");
					g_userid = null;
					g_ukey = null;
					g_permissions = null;
					//openMessageBox("Logged Out");
					$("#cheapLogOut").attr("data-status", "logged_out");
					$("#cheapLogOut").html("Log In");
					$("#pswd").val("");
				}
				else
				{
					openMessageBox("ERROR Logging Out");
				}
				
			}, function(e)
			{
				//alert("ERROR logging in");
				openMessageBox("ERROR Logging Out");
			});
		}
	});

	/////////////////////////////////////////////  events  //////////////////////////////////////
	
	//Change parameters
	$("#btnChange").click(function(e)
	{
		g_max_reservations_per_person = $("#res_per_member").val();
		g_max_rereservations_per_time_period = $("#res_per_hour").val();
	});
	//Get initial parameters
	$("#btnChange").click();
	
	//Draw Tommorrows graph
	$("#btnTomorrow").click(function(e)
	{
		//Get tommorows date and day
		g_date = getTodaysDatePlus(1);
		g_day = getTodaysDayPlus(1);
		var data = {method:"MtcOpenDatesHelper.getOpenHours", date:g_date, day: g_day};
		postData(JSON_API_URL, data, function(json)
		{
			setGlobals(json);
			//Get Current time in half hour increments 
			//Plus n hours - used to test if reservations time is over
			//Not for any reservation in the future this will always be less than const_START_TIME
			g_current_time_dec = getTimeByHalfs(1);
			drawTimeColums();
		},error);
	});

	$("#btnToday").click(function(e)
	{
		//Get todays date and day
		g_date = getTodaysDatePlus(0);
		g_day = getTodaysDayPlus(0);
		var data = {method:"MtcOpenDatesHelper.getOpenHours", date:g_date, day: g_day};
		postData(JSON_API_URL, data, function(json)
		{
			setGlobals(json);
			//Get Current time in half hour increments 
			//Plus n hours - used to test if reservations time is over
			g_current_time_dec = getTimeByHalfs(1);
			drawTimeColums();
		},error);
	});
	
	//Test Code
	$("#btnTest").click(function(e)
	{
		var my_end_date = $("#end_date").val();
		if(my_end_date == "")
		{
			my_end_date = -1;
		}
		//Get the list of reservations listed by court_id
		var data = { method:"MtcCourtReservationHelper.quick_res",
					date:g_date, status: "CONFIRMED",
					start_time:decimalToMinutes(const_START_TIME),
					end_time:decimalToMinutes(const_END_TIME),
					end_date: my_end_date, sort_order: "ASC"};
		postData(JSON_API_URL, data, function(json)
		{
			alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size	
		}, error);
	});

	$("#lists_container").click(function(e)
	{
		if(!g_ukey)
		{
			$( "#login_dialog" ).dialog( "open" );
			return;
		}
		if(g_permissions < COURT_CAPTAIN)
		{
			var todaysDate = getTodaysDatePlus(0);
			if(g_date < todaysDate)
			{
				alert("Reservations Over. Ask Court Captain for help.");
				return;
			}
		}
		var id = e.target.id;
		var status = e.target.dataset.status;
		var next_id = e.target.dataset.next_id;
		var court_reservation_id = e.target.dataset.court_reservation_id;
		switch(status)
		{
			case const_FREE:
				var selector = fixSelectorWithPeriod("#" + next_id);
				next_status = $(selector).data('status');
				if(next_status == const_FREE)
				{
					makeReservationAt(id);
				}
				else
				{
					alert("This time slot is not available, try a different time or location.");
				}
				break;
			case const_MEMBER_RESERVATION:
				alert("Checking reservation status for this time.");
				drawTimeColums();
				break;
			case const_MY_RESERVATION:
				if(confirm("Delete Reservation: " + court_reservation_id))
				{
					deleteReservation(court_reservation_id, id);
				}
				break;
		}
	});
	
	$("#btnTestReservations").click(function(e)
	{
		//Get the list of reservations listed by court_id
		var data = { method:"MtcCourtReservationHelper.reservations", date:g_date,
					start_time:decimalToMinutes(const_START_TIME),
					end_time:decimalToMinutes(const_END_TIME)};
		postData(JSON_API_URL, data, function(json)
		{
			alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size	
		}, error);
	});

});

function drawTimeColums()
{
	//Don't draw
	//obsolete
	
	//Get the list of reservations and confirmed time slots
	//var data = { method:"MtcCourtReservationHelper.reservations", date:g_date, start_time:"14:00:00", end_time:"18:30:00"};
	var data = { method:"MtcCourtReservationHelper.quick_res", date:g_date, 
		start_time:decimalToMinutes(const_START_TIME), end_time:decimalToMinutes(const_END_TIME)};
	postData(JSON_API_URL, data, function(json)
	{
		//g_my_reservation_count = 0;
		g_json = json;
		for(var i=0; i < g_courts_json.fields.length; i++)
		{
			var field = g_courts_json.fields[i];
			makeTimeRows(field.court_id, field.court_name);
		}
	}, error);
}

function deleteReservation(my_court_reservation_id, id)
{
	var obj = getTimesForId(id);
	var my_start_time = obj.start_time;

	var todaysDate = getTodaysDatePlus(0);
	var my_decimal_time = minutesToDecimal(my_start_time);
	var reservation_cutoff_time = getTimeByHalfs(1);
	var strTime = decimalToMinutes(reservation_cutoff_time);
	if(g_date == todaysDate && my_decimal_time < reservation_cutoff_time)
	{
		if(g_permissions >= COURT_CAPTAIN)
		{
			if(!confirm("This reservation is before cutoff time of " + strTime + ". Do you want to continue?"))
			{
				return;
			}
		}
		else
		{
			alert("Reservation can be deleted only for times after " + strTime + ".");
			return;
		}
	}

	
	
	var data = {method:"MtcCourtReservation.delete", court_reservation_id:my_court_reservation_id};
	data['userid'] = g_userid;
	data['ukey'] = g_ukey;

	postData(JSON_API_URL, data, function(json)
	{
		//g_my_reservation_count--;
		drawTimeColums();
	}, error);

}

//Returns {start_time:my_start_time, end_time:my_end_time}
function getTimesForId(id)
{
	var arr = id.split("_");
	var t = arr[1];
	var h = Math.floor(t);
	var m = (t-h)*60;
	
	eh = h+1;
	h = h<10 ? "0" + h : h;
	eh = eh<10 ? "0" + eh : eh;
	m = m<10 ? "0" + m : m;
	
	var my_start_time = h + ":" + m;
	var my_end_time = eh + ":" + m;

	return {start_time:my_start_time, end_time:my_end_time};
}

function makeReservationAt(id)
{
	var obj = getTimesForId(id);
	var my_start_time = obj.start_time;
	var my_end_time = obj.end_time;

	//Get the court number
	var arr = id.split("_");
	var arr2 = arr[0].split("-");
	var my_court_id = arr2[1];
	
	var todaysDate = getTodaysDatePlus(0);
	var my_decimal_time = minutesToDecimal(my_start_time);
	var reservation_cutoff_time = getTimeByHalfs(1);
	var strTime = decimalToMinutes(reservation_cutoff_time);
	if(g_date == todaysDate && my_decimal_time < reservation_cutoff_time)
	{
		if(g_permissions >= COURT_CAPTAIN)
		{
			if(!confirm("This reservation is before cutoff time of " + strTime + ". Do you want to continue?"))
			{
				return;
			}
		}
		else
		{
			alert("Reservation can be made only for times after " + strTime + ".");
			return;
		}
	}

	var data = {method:"MtcCourtReservationHelper.safeCreate",
			reservations_per_time_period:g_max_rereservations_per_time_period,
			reservations_per_person: g_max_reservations_per_person, 
			date:g_date, start_time:my_start_time,
			end_time:my_end_time, court_id:my_court_id, member1_id:g_userid, 
			status:"RESERVED", notes:"Reserved from Web site.", court_reservation_id:"NULL"};
	
	data['userid'] = g_userid;
	data['ukey'] = g_ukey;

	postData(JSON_API_URL, data, function(json)
	{
		if(json.RES_STATUS == "SUCCESS")
		{
			drawTimeColums();
		}
		else
		{
			alert(json.RES_STATUS);
			drawTimeColums();
		}
	}, error);
}

function makeTimeRows(court_id, court_name)
{
	court = "c-" + court_id;
	g_last_end_time = 0;
	$div = $("#" + court);
	//clear it out
	$div.html("");
	var odd = false;
	
	//Put empty row at the bottom fix
	var height = const_cell_height * 0.5;
	var $new = $('<div class="cell dark_grey">' + court_name + '</div>').appendTo($div);
	//$new.height(height);

	for(var i = const_START_TIME; i < const_END_TIME; )
	{
		var color = "white";
		var height;
		var msg = decimalToMinutes(i); //decimalToMinutes(i);
		var id = court + "_" + i;
		var res = setReservationAt(i, court_id);
		var court_reservation_id = "";
		var data = 'data-status="' + const_FREE + '"';
		if(res)
		{
			court_reservation_id = res.court_reservation_id;
			i += res.time_span;
			height = const_cell_height * res.time_span + const_line_height * res.time_span;
			g_last_end_time = i;
			if(res.member1_id == g_userid)
			{
				color = "ochre";
				data = 'data-status="' + const_MY_RESERVATION + '"';
				//g_my_reservation_count++;
			}
			else
			{
				color = "grey";
				data = 'data-status="' + const_MEMBER_RESERVATION + '"';
			}
		}
		else
		{
			i += 0.5
			height = const_cell_height * 0.5;
		}
		//record the next id now that we know what it will be
		var next_id = court + "_" + i;
		var $new = $('<div id="' + id + '" class="cell ' + color + '" ' + data + ' data-next_id="' + next_id + '" ' +
					'data-court_reservation_id="' + court_reservation_id + '">' + msg + '</div>').appendTo($div);
		$new.height(height);
 	}
	//Put empty row at the bottom fix
	height = const_cell_height * 0.5;
	var $new = $('<div class="cell dark_grey">&nbsp;</div>').appendTo($div);
	//$new.height(height);
	
}

function setReservationAt(dec_time, court_id)
{
	var count = 0;
	for(var i=0; i < g_json.reservations.length; i++)
	{
		var res = g_json.reservations[i];
		if(res.status != "MAPPED" && res.court_id == court_id && res.status != "PENDING")
		{
			var res_start = minutesToDecimal(res.start_time);
			var res_end = minutesToDecimal(res.end_time);
			
			//GIGO Garbage In Garbage Out - can't map bad values
			if(res_end <= res_start) return null;
			
			//find out if this res starts in this time slot
			var slot_end_time = dec_time + 0.5;
			if((res_start <= dec_time || res_start < slot_end_time) && res_start >= g_last_end_time)
			{
				console.log("time slot:" + dec_time + " slot_end_time:" + slot_end_time + " res_start:" + res_start + " res_end:" + res_end);
				res.status = "MAPPED";
				res.time_span = res_end - res_start;  
				return res;
			}
		}
	}
	return null;
}

function checkForReservationAt(id)
{
	for(var i=0; i < g_json.reservations.length; i++)
	{
		var res = g_json.reservations[i];
		var res_start = minutesToDecimal(res.start_time);
		var res_end = minutesToDecimal(res.end_time);
		if((res_start <= dec_time || res_start < slot_end_time) && res_start >= g_last_end_time)
		{
			console.log("time slot:" + dec_time + " slot_end_time:" + slot_end_time + " res_start:" + res_start + " res_end:" + res_end);
			res.status = "MAPPED";
			res.time_span = res_end - res_start;  
			return res;
		}
	}
	return null;
}


/////  if id value has a period in it we need to write the selector in a special way

function fixSelectorWithPeriod(id)
{
	var arr = id.split(".");
	if(arr.length > 1)
	{
		id = arr[0] + "\\." + arr[1];
	}
	return id;
}

///////////////////////////////////  Time Functions //////////////////////

//Special function for returning formated string time by half hour increments
function decimalToTimeString(n)
{
	var hours = Math.floor(n);
	var mints = hours == n ? 0 : 30;
	var suffix = hours >= 12 ? "PM" : "AM";
	hours = hours > 12 ? hours - 12 : hours;
	hours = hours < 10 ? "0" + hours : hours;
	mints = mints < 10 ? "0" + mints : mints;
	return hours + ":" + mints + " " + suffix;
}

//Special function for returning string time by half hour increments
function decimalToMinutes(n)
{
	var test = Math.floor(n);
	return test == n ? n + ":00" : test + ":30";
}

function minutesToDecimal(str)
{
	var arr = str.split(":");
	var hrs = parseFloat(arr[0]);
	var mints = parseFloat(arr[1]);
	mints = mints/60;
	return hrs + mints;
}

function formatMinutes(str)
{
	var arr = str.split(":");
	var hrs = parseFloat(arr[0]);
	var suffix = hrs >= 12 ? "PM" : "AM";
	if(suffix == "PM" && hrs != 12)
	{
		hrs = hrs - 12;
	}
	hrs = hrs < 10 ? "0" + hrs : "" + hrs;
	return hrs + ":" + arr[1] + " " + suffix;
}

function getTodaysDayPlus(n)
{
	var today = new Date();
	// add number of days
	today.setDate(today.getDate() + n);
	today.getDay();
	var weekday = new Array(7);
	weekday[0]=  "Sunday";
	weekday[1] = "Monday";
	weekday[2] = "Tuesday";
	weekday[3] = "Wednesday";
	weekday[4] = "Thursday";
	weekday[5] = "Friday";
	weekday[6] = "Saturday";
	return weekday[today.getDay()];
}

function getTodaysDatePlus(n)
{
	var today = new Date();
	// add number of days
	today.setDate(today.getDate() + n);
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var yyyy = today.getFullYear();
	if(dd<10) {
		dd='0'+dd
	} 
	if(mm<10) {
		mm='0'+mm
	} 
	//2015-03-13,
	today = yyyy + "-" + mm + "-" + dd;
	return today;
}

//Get Current time in half hour increments 
//Plus n hours
function getTimeByHalfs(n)
{
	var today = new Date();
	var current_hour = today.getHours();
	var current_minutes = today.getMinutes();
	var minutes = current_minutes > 30 ? 1 : 0.5;
	return current_hour + n + minutes;	
}

//Get Current time in half hour increments 
//Plus n hours
function cutoffTime(reservation_time)
{
	var today = new Date();
	var current_hour = today.getHours();
	var current_minutes = today.getMinutes();
}

///////////////////////////////////   Utiliy Functions   //////////////////////////////////////

function postData(strUrl, data, success, error)
{
  	var my_str = "method:" + data.method;
	console.log("postData(" + strUrl + ")");
	console.log(my_str);
	console.log("data = {");
	for(var name in data) {
   		console.log(name + ": " + data[name]);
		// propertyName is what you want
   		// you can get the value like this: myObject[propertyName]
	}
	
	var jqxhr = $.post(strUrl, data);
	// results
	jqxhr.done(function(json)
	{
		console.log("RESPONSE");
		console.log(JSON.stringify(json));

		var str = "Status: " + json.status; 
		if(json.status == "SUCCESS")
		{
			success(json);
		}
		else
		{
			error(json);
		}
	});
	
	jqxhr.always(function(json)
	{
		//Don't Log here due to latency
		//console.log("RESPONSE");
		//console.log(JSON.stringify(json));

  		//$("#jqxhr_always").val(JSON.stringify(json));
	});
	
	jqxhr.fail(function(e)
	{
		console.log("jqxhr.fail");
		console.log("Error status: " + e.status + " Error: " + e.statusText);

		$("#error_responseText").html(e.responseText);
	});

}

function success(json)
{
	alert(json.status);
}

function error(json)
{
	var errMsg = json.status + " " + json.errMsg + " " + json.xtndErrMsg;
	alert(errMsg.substring(0, 2500)); //Limit the string size
}

function show(id)
{
	$(id).removeClass("hide");
	$(id).addClass("show");
}

function hide(id)
{
	$(id).removeClass("show");
	$(id).addClass("hide");
}

////////////////////////////////////////////////////    Login Server  /////////////////////////////////////////////
function loginServer(strUrl, data, success, login_error)
{
  	var jqxhr = $.post(strUrl, data);
	// results
	jqxhr.done(function(json)
	{
		var str = "Status: " + json.status; 
		if(json.status == "1")
		{
			success(json);
		}
		else
		{
			login_error(json);
		}
	});
	
	jqxhr.always(function(json)
	{
		console.log("jqxhr.always");
		console.log(JSON.stringify(json));
	});
	
	jqxhr.fail(function(e)
	{
		console.log("jqxhr.fail");
		console.log("Error status: " + e.status + " Error: " + e.statusText);
		$("#error_responseText").html(e.responseText);
	});

}

function login_error(json)
{
	alert("Failed Login: " + JSON.stringify(json).substring(0, 2500)); //Limit the string size
}

/*
function getUserList()
{
	var data = {method:"MtcMemberSecure.getList"};
	postData(JSON_API_URL, data, function(json)
	{
		$("#user_list").html("");
		var html = "";
		for(var i=0; i < json.fields.length; i++)
		{
			var field = json.fields[i];
			html += '<option id="' + field.member_id + '">' + field.first_name + ' ' + field.last_name + '</option>';
			//if(i == 0) g_userid = field.member_id;
		}
		$("#user_list").html(html);
	}, error);
}
*/
