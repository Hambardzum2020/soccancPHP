$(".kojak").on("click", function(){
	var btnVal = $(this).val();
	var textVal = $(".namak").val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {btnVal, textVal, action: "sentMess"},
		success: function(r){
			$(".namak").val("");
		}
	});
});

				// 			var height = 0;
				// $('li #s').each(function(i, value){
				//     height += parseInt($(this).height());
				// });

				// height += '';

				// $('div').animate({scrollTop: height});



var setM = setInterval(function(){
	var btnVal = $(".kojak").val(); 
	$.ajax({
		url: "server.php",
		type: "post",
		data: {btnVal, action: "getmessage"},
		success: function(r){
			$("#showMessage").empty()
			r = JSON.parse(r);
			console.log(r);
			r.forEach(function(item){
				if(item["my_id"] == btnVal){
					$("#showMessage").append(`
						<li class="sent">
							<img src="${item.profil}" alt="" />
							<p id="ggg">${item["message"]}</p>
							<p id="s">${item["time"]}</p>
						</li> 
					`)
				}
				else{
					$("#showMessage").append(`
						<li class="replies">
							<img src="${item.profil}" alt="" />
							<p id="ggg">${item["message"]}</p>
							<p id="s">${item["time"]}</p>
						</li> 
					`)				
				}
			});
		}
	})
}, 1000);
	$("ul").animate({scrollTop: 99999})



$("#clIn").on("click", function(){
	clearInterval(setM);
	location.href = "friends.php"
});