$.ajax({
	url: "server.php",
	type: "post",
	data: {action: "request"},
	success: function(r){
		r = JSON.parse(r);
		r.forEach(function(item){
			$("#showReq").append(` 
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
			                <div class="tile">
			                    <div class="wrapper">
			                        <div class="header"> ${item["name"]+ " " + item["surname"]} </div>

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
			                            <button class="btn btn-info" id="yesRequest" value = "${item["id"]}" class = "Cbtn Cbtn-primary">Request</button>
			                            <button class="btn btn-info bg-danger" id="noRequest" value = "${item["id"]}" class = "Cbtn Cbtn-danger">Delete</button>
			                        </div>
			                    </div>
			                </div> 
			            </div>
			`)
		});
	}
});

$(document).on("click", "#noRequest", function(){
	var delReq = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {delReq, action: "delReq"},
		success: function(r){
			if(r == "deleteReq"){
				location.reload();
			}
		}
	})
})

$(document).on("click", "#yesRequest", function(){
	var getReq = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {getReq, action: "getRec"},
		success: function(r){
			if(r == "getfriends"){
				location.reload();
			}
		}
	})
})