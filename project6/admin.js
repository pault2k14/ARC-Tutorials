$(document).ready(function() {
	
	$("[id^=btn]").click(function() {
		var value =	$(this).prop("value");
		var row_num = "#row" + value;
		
		$.post("http://10.0.0.10/project6/delete.php", {id: value}, function(data){
			$(row_num).hide();
		});
	});
});