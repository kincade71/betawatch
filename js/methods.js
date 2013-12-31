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
jQuery.fn.send_notification = function(){
// Display the plain text notification
  //e.preventDefault();
  var title = $('#plain_title').val(),
      message = $('#plain_message').val(),
      notification;

  // Create a new notification
  notification = window.webkitNotifications.createNotification('http://intranet.forrent.com/betawatch/img/AIRApp_128.png', title, message);
  // Display the notification, calling close() on notification will dismiss it
  notification.show();
}