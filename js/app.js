$(document).ready(function(){
	function activate_match()
	{
		 $.ajax({
			 type: 'POST',
			 url: 'index.php/match/list_dropdown', //We are going to make the request to the method "list_dropdown" in the match controller
			 data: 'tnmnt='+tnmt_id, //POST parameter to be sent with the tournament id
			 success: function() { 
			 //When the request is successfully completed, this function will be executed
			 //Activate and fill in the matches list
			 //With the ".html()" method we include the html code returned by AJAX into the matches list
				 alert('boom');
			 }
		 });
	}
}