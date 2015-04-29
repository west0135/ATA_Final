//globals
var g_const;
var g_json;

var g_userid;
var g_ukey;
var g_permissions;

$(document).ready(function ()
{
	$.support.cors = true;
	
	/*
	// Retrieve
	g_userid = localStorage.getItem("g_userid");
	g_ukey = localStorage.getItem("g_ukey");
	g_permissions = localStorage.getItem("g_permissions");
	
	$("#cheapLogOut").click(function(e)
	{
		localStorage.removeItem("g_userid");
		localStorage.removeItem("g_ukey");
		localStorage.removeItem("g_permissions");
		g_userid = null;
		g_ukey = null;
		g_permissions = null;
		alert("Kirk We need a Logout Function");
	});

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
		  click: function()
		  {
			$( this ).dialog( "close" );
			var myEmail = $("#my_email").val();
			var myPassword = $("#pswd").val(); 
			var data = {func: 'loginUser',email: myEmail,password: myPassword};
			loginServer(LOGIN_SERVER, data, function(json)
			{
				var msg = "SUCCESS" + JSON.stringify(json);
				alert(msg.substring(0, 2500)); //Limit the string size
				g_userid = json.userid;
				g_ukey = json.ukey;
				g_permissions = json.permissions;
				localStorage.setItem("g_userid", g_userid);
				localStorage.setItem("g_ukey", g_ukey);
				localStorage.setItem("g_permissions", g_permissions);
			}, login_error);
		  }
		  // Uncommenting the following line would hide the text,
		  // resulting in the label being used as a tooltip
		  //showText: false
		}
	  ]
	});
	
	$("#loginBtn").click(function(e)
	{
		if(!g_permissions)
		{
			$( "#login_dialog" ).dialog( "open" );
			return;
		}
		if(g_permissions < COURT_CAPTAIN)
		{
			alert("You must have at least COURT CAPTAIN permissions for these operations")
			return;
		}
	});

	*/
	
		// Retrieve
	g_userid = localStorage.getItem("g_userid");
	g_ukey = localStorage.getItem("g_ukey");
	g_permissions = localStorage.getItem("g_permissions");
	
	$("#login_dialog").dialog(
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
				var msg = "SUCCESS" + JSON.stringify(json);
				//alert(msg.substring(0, 2500)); //Limit the string size
				g_userid = json.userid;
				g_ukey = json.ukey;
				g_permissions = json.permissions;

				if(g_permissions < COURT_CAPTAIN)
				{
					alert("You must have at least COURT CAPTAIN permissions for these operations")
					return;
				}

				localStorage.setItem("g_userid", g_userid);
				localStorage.setItem("g_ukey", g_ukey);
				localStorage.setItem("g_permissions", g_permissions);
				
				$("#cheapLogOut").attr("data-status", "logged_in");
				$("#cheapLogOut").html("Log Out");
				
				show("#pageTypes");
				
			}, function(e)
			{
				alert("ERROR logging in");
			});
		  }
		}
	  ]
	});
	
	//////////////////////////////// initialize after $("#login_dialog") /////////////////
	if(!g_ukey)
	{
		hide("#main_container");
		$("#cheapLogOut").attr("data-status", "logged_out");
		$("#cheapLogOut").html("Log In");
		
		show("#login_dialog");
		$("#login_dialog").dialog( "open" );
	}
	else
	{
		show("#main_container");
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
			localStorage.removeItem("g_userid");
			localStorage.removeItem("g_ukey");
			localStorage.removeItem("g_permissions");
			g_userid = null;
			g_ukey = null;
			g_permissions = null;
			alert("Kirk We need a Logout Function");
			$("#cheapLogOut").attr("data-status", "logged_out");
			$("#cheapLogOut").html("Log In");
			
			//Close All Windows
			hide("#main_container");
			$("#pswd").val("");
		}
	});

	makeCannedQuerySelection()
	
	/////////////////////////////////////////////  events  //////////////////////////////////////
	
	$("#listItems_submit").click(function(e)
	{
		var strUrl = JSON_API_URL;
		var data = { method:"CannedQueryHelper.runCannedQuery"};
		data['userid'] = g_userid;
		data['ukey'] = g_ukey;
		$("#query_form_input_container input").each(function(index, element){
            var test;
			data[element.id] = element.value;
        });
		postData(strUrl, data, function(json)
		{
			alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size
		}, error);
	});

	$("#canned_query_list").change(function()
	{
  		var my_canned_query_id = $(this).children(":selected").attr("id");
		if(my_canned_query_id)
		{
			//Hide form before Ajax call
			hide("#query_form_container");
			var strUrl = JSON_API_URL;
			var my_date = $("#res_date").val();
			var data = { method:"CannedQuery.get", canned_query_id: my_canned_query_id};
			postData(strUrl, data, function(json)
			{
				g_json_labels = json;
				//alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size
				//Show form after data arrives
				show("#query_form_container");
				drawQueryForm(json);
			}, error);
		}
		else
		{
			hide("#query_form_container");
		}
	});

});

//////////////////////////////////  Draw the query Form  ///////////////////////////////////

        //<label>Delete Reservations older than: </label>
        //<input id="res_date" type="date">


function drawQueryForm(json)
{
	$("#query_form_input_container").html("");
	var html = '<input type="hidden" id="key" value="' + json.field.key + '">';
	//Delete reservation older than %$date$date%Test",
	var strForm = json.field.form;
	var arr = strForm.split("%");
	for(var i=0; i < arr.length; i++)
	{
		//alert(arr[i]);
		var test = arr[i].split("$");
		if(test.length > 1) //An input
		{
			html += '<input id="' + test[0] + '" type="' + test[1] + '">';
		}
		else
		{
			html += '<label>' + test[0] + '</label>';		
		}
	}
	$("#query_form_input_container").html(html);
}

////////////////////////////////// Get the list of Canned Queries ////////////////////////////
function makeCannedQuerySelection()
{
	alert("Start Making List");
	//canned_query_list
	var strUrl = JSON_API_URL;
	var my_date = $("#res_date").val();
	var data = { method:"CannedQuery.getList"};
	postData(strUrl, data, function(json)
	{
		//alert(JSON.stringify(json).substring(0, 2500)); //Limit the string size
		//canned_query_id
		$("#canned_query_list").html("");
		var html = "";
		//Make an empty option
		html += '<option>Choose Operation</option>';
		for(var i=0; i < json.fields.length; i++)
		{
			var field = json.fields[i];
			html += '<option id="' + field.canned_query_id + '">' + field.name + '</option>';
		}
		$("#canned_query_list").html(html);
	}, error);
}

///////////////////////////////////   Utiliy Functions   //////////////////////////////////////
function logOjectProperties(data)
{
	for(var name in data) {
   		console.log(name + ": " + data[name]);
	}
}

function postData(strUrl, data, success, error)
{
  	var my_str = "method:" + data.method;
	console.log("postData(" + strUrl + ")");
	console.log(my_str);
	console.log("data = {");
		logOjectProperties(data);
	console.log("}");

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
		console.log("RESPONSE");
		console.log(JSON.stringify(json));
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