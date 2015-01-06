$(document).ready(function() {
	
	//var hText = "This is just some text.";
	
	// Reads the text from the head1 element.
	// var hText = $("#head1").text();
	
	// Combines text read from head1 element with another string.
	//var hText = "The heading text is " + $("#head1").text();
	
	//var lineNum = 0;
	
	//var aNumber = 5;
	//lineNum = aNumber - 4;
	
	var imageName = ["floatingball.gif", "redball.gif", "eightball.gif"];
	var indexNum = 0;
	
	
	//$("h1").click(function() {
	
	$("#picture").click(function() {
	
	$("#picture").fadeOut(300, function() {
		$("#picture").attr("src", imageName[indexNum]);
		indexNum++;
		
		if(indexNum > 2) {
			indexNum = 0;
		}
		
		$("#picture").fadeIn(500);
	
	});
	
	/*
	$("#picture").attr("src", imageName[indexNum]);
	indexNum++;
	if(indexNum > 2) {
		indexNum = 0;
	}
	
	*/
	
	
	//	$("p").text(hText);
	
	//	$("p").eq(lineNum).css("background-color", "red");
	
	/*
	$("p").css("background-color", "yellow");
	$("p").eq(lineNum).css("background-color", "red");
	lineNum++;
	
	if(lineNum > 2) {
		lineNum = 0;
	}
	*/
	
	});

});