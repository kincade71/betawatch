// JavaScript Document
$(document).ready(function(){
	if($(".overview")[0]){
		$(".overview").overview();
	}
	if($("#ask_permission")[0]){
		$("#ask_permission").ask_permission();
	}
	if($("#watch")[0]){
		$("#watch").watch();
	}
});