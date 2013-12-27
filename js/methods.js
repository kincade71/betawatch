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
					$('#tab1').html(html).tablesearch();
				}
			});
			
			
}
jQuery.fn.refresh = function()
{
	setInterval(overview, 1000);
}

jQuery.fn.tablesearch = function()
{
	$('table').dataTable( {
	    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>"
	} );
	
	
	$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
	} );
}