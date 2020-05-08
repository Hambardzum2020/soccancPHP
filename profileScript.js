jQuery(document).ready(function($) {
	

// $("#edit").on("click", function(){
// 	location.href = "edit.php";
// });

$("#logout").on("click", function(){
	$.ajax({
		url: "server.php",
		type: "post",
		data: {action: "logout"},
		success: function(r){
			location.href = "index.php";
		}
	});
});

$("#search").on("input", function(){
	var search = $("#search").val();
	$("#result").empty();
	if(search != ""){
		$.ajax({
			url: "server.php",
			type: "post",
			data: {search, action: "search"},
			success: function(r){
				r = JSON.parse(r);
				r.forEach(function(item){
					$("#result").append(`
						<a href="usersPage.php?id=${item.id}">
							<h1>${item.name}</h1>
							<h2>${item.surname}</h2>
						</a>
					`)
					//alert($("#aha").val());
					if(item.status == 1){
						$("#result").append(`
							<button id="delFriend" value="${item.id}">Delete friend</button> 
						`)
					}
					else if(item.status == 2){
						$("#result").append(`
							<button id="delRequest" value="${item.id}">Delete Request</button> 
						`)
					}
					else if(item.status == 3){
						$("#result").append(`
							<button id="delRequest" value="${item.id}">Delete Request</button> 
							<button id="accRequest" value="${item.id}">Accsept Request</button> 
						`)
					}	
					else{
						$("#result").append(`
							<button id="addFriends" value="${item.id}">Add friend</button> 
						`)
					}				
				});
			}
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
			//console.log(r)
		}
	});
});

$("#seephoto").on("click", function(){
	location.href = "photo.php";
});


$(document).on("click", "#addFriends", function(){
	var frVal = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {frVal, action: "addFriends"},
		success: function(r){
			alert("succ");
			location.reload();
		}
	});
});

$(document).on("click", "#delFriend", function(){
	var delFrd = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {delFrd, action: "delFrd"},
		success: function(r){
			alert("frend deleted");
			location.reload();
		}
	})
})


$(document).on("click", "#delRequest", function(){
	var delReq = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {delReq, action: "delReq"},
		success: function(r){
			alert("recuest deleted");
			location.reload();
		}
	})
})

$(document).on("click", "#accRequest", function(){
	var getReq = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {getReq, action: "getRec"},
		success: function(r){
			alert("request Accepted");
			location.reload();
		}
	})
})

// $("#status-photo").change(function() {
   
// });

// $("#addStatus").on("click", function(){
// 	var status_photo = $("#status-photo").val();
// 	var status_text = $("#status-mind").val();
// 	$.ajax({
// 		url: "server.php",
// 		type: "post",
// 		data: {status_photo, status_text, action: "status"},
// 		success: function(r){
// 			console.log(r)
// 		}
// 	});
// });

$.ajax({
	url: "server.php",
	type: "post",
	data: {action: "getPosts"},
	success: function(r){
		r = JSON.parse(r);
		console.log(r)
		r.forEach(function(item){
			var p = "";
			item.comments.forEach(function(data){
			//console.log(data.name)
				p += (`


					<div class="comment-box">
						<div class="heading">
							<img src="${data.profil}">	
						</div>	
							<div class="content">
								<div class="h-in">
						    	<div class="cont">
						    		<strong><h5 class="pull-left">${data.name + " " + data.surname}</h5></strong>
						    	<small class="pull-right">${data.time}</small>
						    	<br>
						        </div>
								<p>${data.comment}</p>
								</div>
							</div>
					</div>

				`)
			})
			if(item.picture != null){
				$("#posts").append(`
					<div class="card-body">     
				        <div class="pl-lg-4">
				        	<div class="row">
				        		<div class="col-lg-6">
				            		<div class="form-group focused">
				                  		<div class="post1p" id="showCom">
				                  			<div class="p1">
				                  				<div class="p2">
				                  					<img src="${item.profil}" height="40"/>
                     								<p3>${item.name + " " + item.surname}</p3>
                     								<p>${item.time}</p><br>
                     							</div>
                     						</div>	
                     						<div>
				                     			<div class="p1">	
				                     				<p>${item.post}</p>
				                     			</div>
												<div>
				                      				<img src="${item.picture}" height="400" width="400"/><br><br>	
												</div>
				                      		</div>
											<div class="p3">
				                      			<button class="btn btn-info" id="like" value="${item.id}">
				                      			<img height="40" width="40" src="https://i.pinimg.com/originals/39/44/6c/39446caa52f53369b92bc97253d2b2f1.png" alt="" />
				                      			Like  <span>${item.likes[0].likes}</span></button>
				                      			<button class="btn btn-info" id="comment" value="${item.id}">
				                      			<img height="40" width="40" src="https://www.freeiconspng.com/uploads/comment-png-2.png" alt="" />
				                      			Comment</button>
				                      			<button class="btn btn-info">
				                      			<img height="40" width="40" src="https://pngimg.com/uploads/share/share_PNG31.png" alt="" />
				                      			Share</button>
				                      		</div>	<br>
				                      		<div>
												<input id="comarea" type="text" placeholder="comment"/>
												<button id="addcom" value="${item.id}" class="btn btn-info">+</button>
											</div>	

											${p}
				                  		</div>
				                  	</div>
				                </div>
				            </div>
				        </div>
				    </div>
				    <br><br><br>              		 
				`)
			}
			if(item.picture == null){
				$("#posts").append(`
					<div class="card-body">     
				        <div class="pl-lg-4">
				        	<div class="row">
				        		<div class="col-lg-6">
				            		<div class="form-group focused">
				                  		<div class="post1p" id="showCom">
				                  			<div class="p1">
				                  				<div class="p2">
				                  					<img src="${item.profil}" height="40"/>
                     								<p3>${item.name + " " + item.surname}</p3>
                     								<p>${item.time}</p><br>
                     							</div>
                     						</div>	
                     						<div>
				                     			<div class="p1">	
				                     				<p>${item.post}</p>
				                     			</div>
												
				                      		</div>
											<div class="p3">
				                      			<button class="btn btn-info" id="like" value="${item.id}">
				                      			<img height="40" width="40" src="https://i.pinimg.com/originals/39/44/6c/39446caa52f53369b92bc97253d2b2f1.png" alt="" />
				                      			Like <span>${item.likes[0].likes}</button>
				                      			<button class="btn btn-info" id="comment" value="${item.id}">
				                      			<img height="40" width="40" src="https://www.freeiconspng.com/uploads/comment-png-2.png" alt="" />
				                      			Comment</button>
				                      			<button class="btn btn-info">
				                      			<img height="40" width="40" src="https://pngimg.com/uploads/share/share_PNG31.png" alt="" />
				                      			Share</button>
				                      		</div>	<br>
				                      		<div>
												<input id="comarea1" type="text" placeholder="comment"/>
												<button id="addcom1" value="${item.id}" class="btn btn-info">+</button>
											</div>	

											${p}
				                  		</div>
				                  	</div>
				                </div>
				            </div>
				        </div>
				    </div>
				    <br><br><br>              		 
				`)
			}
		});
	}	
});

$(document).on("click", "#addcom", function(){
	var comarea = $(this).prev().val();
	var postsId = $(this).val();
	var _this = $(this);
	$.ajax({
		url: "server.php",
		type: "post",
		data: {postsId, comarea, action: "addComents"},
		success: function(r){
			r = JSON.parse(r);
			console.log(r)
			_this.after(`
						<div class="comment-box">
							<div class="heading">
								<img src="${r[0].profil}">	
							</div>	
								<div class="content">
									<div class="h-in">
	    							<div class="cont">
	    								<strong><h5 class="pull-left">${r[0].name + " " + r[0].surname}</h5></strong>
	    							<small class="pull-right"></small>
	    							<br>
	        						</div>
									<p>${comarea}</p> 									
									</div>
							</div>
						</div> 
				`)
			
		$("#comarea").val("")
		}
	});
})


$(document).on("click", "#addcom1", function(){
	var comarea1 = $(this).prev().val();
	var postsId1 = $(this).val();
	var _this = $(this);
	$.ajax({
		url: "server.php",
		type: "post",
		data: {postsId1, comarea1, action: "addComents1"},
		success: function(r){
			//location.reload();
			r = JSON.parse(r);
			console.log(r)
			_this.after(`
						<div class="comment-box">
							<div class="heading">
								<img src="${r[0].profil}">	
							</div>	
								<div class="content">
									<div class="h-in">
	    							<div class="cont">
	    								<strong><h5 class="pull-left">${r[0].name + " " + r[0].surname}</h5></strong>
	    							<small class="pull-right"></small>
	    							<br>
	        						</div>
									<p>${comarea1}</p> 									
									</div>
							</div>
						</div> 
				`)
			
		
		}
	});
})

$(document).on("click", "#like", function(){
	var like = $(this).val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {like, action: "like"},
		success: function(r){
			location.reload();
		}
	})
});

});

// $(document).on("click", "#comment", function(){
// 	var	comment = $(this).val();
// 	var _this = $(this);
// 	 $.ajax({
// 	 	url: "server.php",
// 	 	type: "post",
// 	 	data: {comment, action: "comment"},
// 	 	success: function(r){
// 			r = JSON.parse(r);
// 			_this.after(`
// 				<div>
// 					<input id="comarea" type="textarea" placeholder="comment"/>
// 					<button id="addcom" value="${r.post_id}" class="btn btn-info">+</button>
// 				</div>	
// 			`)
// 			if(r.length != 0){
// 				r.forEach(function(item){
// 					_this.after(`
// 						<div class="comment-box">
// 							<div class="heading">
// 								<img src="${item[0].profil}">	
// 							</div>	
// 								<div class="content">
// 									<div class="h-in">
// 	    							<div class="cont">
// 	    								<strong><h5 class="pull-left">${item[0].name + " " + item[0].surname}</h5></strong>
// 	    							<small class="pull-right">${item.time}</small>
// 	    							<br>
// 	        						</div>
// 									<p>${item.comment}</p>
// 									</div>
// 								</div>
// 						</div> 
// 					`)
// 				});
// 			}
// 	 	}
// 	 })	 
// });





 // <div>
	// 	<input id="comarea" type="textarea" placeholder="comment"/>
	// 	<button id="addcom" value="${item.id}" class="btn btn-info">+</button>
	// </div>	
// <div class="comment-box">
// 	<div class="heading">
// 		<img src="${item[0].profil}">	
// 	</div>	
// 		<div class="content">
// 			<div class="h-in">
// 	    	<div class="cont">
// 	    		<strong><h5 class="pull-left">${item[0].name + " " + item[0].surname}</h5></strong>
// 	    	<small class="pull-right">${item.time}</small>
// 	    	<br>
// 	        </div>
// 			<p></p>
// 			</div>
// 		</div>
// </div>