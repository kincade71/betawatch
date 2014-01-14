// JavaScript Document
/*jQuery.fn.searchsyllabus = function()
{
	$(this).keyup(function(){
			var searchsyllabus = $("input#search").val();
			var dataString = 'search='+ searchsyllabus;
			$('#beginhere').hide();
			//alert(dataString);
			$.ajax({
				type:		'POST',
				url:		'find/search',
				data:		dataString,
				success:	function(html){
				if(searchsyllabus.length > 0){
					$('#search_results').html(html);
				}else{
					$('#search_results').html(null);
					$('#beginhere').show();
				}
				}
			});
		});
}*/
jQuery.fn.overview = function()
{
			var whereami = $(this).attr('data').split('-')[1];
			//alert(whereami);
			switch (whereami)
			{
				case 'liveinternal':
					whereami = 'live-internal'
					break;
					
			}
			var dataString = 'whereami='+ whereami;
			//alert(dataString);
			$.ajax({
				type:		'POST',
				url:		'ajaxs/overview',
				data:		dataString,
				success:	function(html){
					$('#overview').html(html);
				}
			});
			
			
}

//enable desktop notifications
jQuery.fn.ask_permission = function()
{
	var where = $('#where').val();
	  // Ask for permission
    $('#ask_permission').click(function(e) {
      e.preventDefault();
      window.webkitNotifications.requestPermission();
      $('#ask_permission').fadeOut().remove();
      $('#button').html('<input type="button" class="btn btn-link pull-right hidden-phone" id="watch" value="Enable Desktop Notifications for '+where+'"></input><input id="where" type="hidden" value="'+where+'"></input>');
      $("#watch").watch();
    });
}

//add a sever to watchlist
jQuery.fn.watch = function()
{
    $('#watch').click(function(e) {
    	var where = $('#where').val();
    	
    	$.cookie('desktop_notifications_enabled_'+where, 'true', { expires: 1825, path: '/' });
    	$('#watch').remove();
    	$('#button').html('<input type="button" class="btn btn-link pull-right hidden-phone" id="stopwatch" value="Disable Desktop Notifications for '+where+'"></input><input id="where" type="hidden" value="'+where+'"></input>');
    	$("#stopwatch").stopwatch();
    	switch (where)
		{
			case 'liveinternal':
				where = 'live-internal'
				break;
				
		}
		var dataString = 'where='+ where;
		//alert(dataString);
		$.ajax({
			type:		'POST',
			url:		'ajaxs/watch',
			data:		dataString,
			success:	function(){
			}
		});
    });
}

//remove a sever to watchlist
jQuery.fn.stopwatch = function()
{
    $('#stopwatch').click(function(e) {
    	var where = $('#where').val();
    	
    	$.removeCookie('desktop_notifications_enabled_'+where);
    	$('#stopwatch').remove();
    	$('#button').html('<input type="button" class="btn btn-link pull-right hidden-phone" id="watch" value="Enable Desktop Notifications for '+where+'"></input><input id="where" type="hidden" value="'+where+'"></input>');
    	$("#watch").watch();
    	
    	switch (where)
		{
			case 'liveinternal':
				where = 'live-internal'
				break;
				
		}
		var dataString = 'where='+ where;
		//alert(dataString);
		$.ajax({
			type:		'POST',
			url:		'ajaxs/stopwatch',
			data:		dataString,
			success:	function(html){
				console.log(html);
			}
		});
    });
}

//interval to "look" for changes
jQuery.fn.watching = function()
{
    	var where = $('#where').val();
    	

    	
    	switch (where)
		{
			case 'liveinternal':
				where = 'live-internal'
				break;
				
		}
		var dataString = 'where='+ where;
		//alert(dataString);
		$.ajax({
			type:		'POST',
			url:		'ajaxs/watching',
			data:		dataString,
			success:	function(html){	
				//console.log(html);
				if(html != ''){
					jQuery.fn.send_notification(html);
				}
				
			}
		});
		
}

jQuery.fn.check_permission = function(where) {
    switch(window.webkitNotifications.checkPermission()) {
      case 0:
        // Continue
        $.cookie('desktop_notifications_enabled', 'true', { expires: 1825, path: '/' });
        break;
      case 2:
        // Fail
        $.removeCookie('desktop_notifications_enabled');
        break;
    }
  }


//refresh rate
jQuery.fn.refresh = function()
{
	setInterval(overview, 1000);
}

//add table sort to a html table
jQuery.fn.tablesearch = function()
{
	$('#overview').dataTable( {
	    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
	} );
	
	
	$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
	} );
}

//send notification
jQuery.fn.send_notification = function(message){
	var release = message.split('-')[0];
	var codebase = message.split('-')[1];
	var server = message.split('-')[2];
	var where = message.split('-')[3];
	switch(codebase)
	{
	case 'be':
		codebase = 'backend';
	  break;
	case 'fe':
		codebase = 'frontend';
	  break;
	default:
		codebase = codebase;
	}

  // Create a new notification
  notification = window.webkitNotifications.createNotification('http://intranet.forrent.com/betawatch/img/AIRApp_128.png', where+' updated', codebase +' to release '+ release +' on server '+ server);
  // Display the notification, calling close() on notification will dismiss it
  notification.show();
	var where = $('#where').val();
	

	
	switch (where)
	{
		case 'liveinternal':
			where = 'live-internal'
			break;
			
	}
  var dataString = 'where='+ where;
	//console.log(dataString);
	$.ajax({
		type:		'POST',
		url:		'ajaxs/watch',
		data:		dataString,
		success:	function(html){
			console.log(html);
		}
	});
}