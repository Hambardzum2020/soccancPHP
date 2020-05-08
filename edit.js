$("#saveChanges").on("click", function(){
	var eName = $("#editName").val();
	var eSurname = $("#editSurname").val();
	var eAge = $("#editAge").val();
	var eEmail = $("#editEmail").val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {eName, eSurname, eEmail, eAge, action: "edit"},
		success: function(r){
			//console.log(r);
		}
	})
});