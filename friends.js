$.ajax({
	url: "server.php",
	type: "post",
	data: {action: "friends"},
	success: function(r){
		r = JSON.parse(r);
		r.forEach(function(item){
			$("#showFriends").append(` 
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			                <div class="tile">
			                    <div class="wrapper">
			                        <h4 class="header"> <a href="usersPage.php?id=${item.id}">${item["name"] + " " + item["surname"]}</a> </h4>    
			                        <div class="banner-img">
			                            <img src="${item["profil"]}" alt="Image 1">
			                        </div>

			                        <div class="dates">
			                            <div class="start">
			                                <strong>STARTS</strong> 12:30 JAN 2015
			                                <span></span>
			                            </div>
			                            <div class="ends">
			                                <strong>ENDS</strong> 14:30 JAN 2015
			                            </div>
			                        </div>

			                        </div>

			                       

			                        <div class="stats">

			                            <div>
			                                <strong>INVITED</strong> 3098
			                            </div>

			                            <div>
			                                <strong>JOINED</strong> 562
			                            </div>

			                            <div>
			                                <strong>DECLINED</strong> 182
			                            </div>

			                        </div>

			                        <div class="footer">
			                            <button class="btn btn-info bg-danger" id="deleteFriends" value = "${item["id"]}" class = "Cbtn Cbtn-danger">Delete</button>
			                            <button class="btn btn-info" id="massage" value = "${item["id"]}" class = "Cbtn Cbtn-danger">Massage</button>
			                        </div>
			                    </div>
			                </div> 
			            </div>
			`)
		});
	}
});

$(document).on("click", "#aha", function(){
	var usId = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {usId, action: "usersPage"},
		success: function(r){
			//location.href = "http://facebook.com";
			console.log(r)
		}
	});
});

$(document).on("click", "#deleteFriends", function(){
	var delFrd = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {delFrd, action: "delFrd"},
		success: function(r){
			if(r == "deleteFriends"){
				location.reload();
			}
		}
	})
})


$(document).on("click", "#massage", function(){
	var massVal = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {massVal, action: "massage"},
		success: function(r){
			location.href = "message.php";
		}		
	})
})