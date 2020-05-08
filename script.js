const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
$("#save").on("click", function(){
	var name = $("#name").val();
	var surname = $("#surname").val();
	var email = $("#email").val();
	var age = $("#age").val();
	var password = $("#password").val();
	var confirm_password = $("#confirm_password").val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {name, surname, email, age, password, confirm_password, action: "register"},
		success: function(r){
			if(r){
					r = JSON.parse(r);
					$(".error").remove();
					//$("input").css({border: "1px solid silver"});
					for(i in r){
						//console.log(i);
						//$("#" + i).css({border: "0.1px solid red"});
						$("#" + i).after(`<p class="error" id=${"err"+ i}>${r[i]}</p>`);
					}

			}
			else{
				$(".error").remove();
				$("#save").after(`<div>success</div>`);
				setTimeout(function(){ location.reload()}, 2000);
			}
		}
	})
});

$(".login").on("click", function(){
	var email1 = $("#email1").val();
	var password1 = $("#password1").val();
	$.ajax({
		url: "server.php",
		type: "post",
		data: {email1, password1, action: "login"},
		success: function(r){
			if(r){
				r = JSON.parse(r);
				$(".error1").remove();
				//$("input").css({border: "1px solid silver"});
				for(i in r){
					// console.log(i);
					//$("#" + i).css({border: "0.1px solid red"});
					$("#" + i).after(`<p class="error1" id=${"err"+ i}>${r[i]}</p>`);
				}				
			}
			else{
				$(".error1").remove();
			}
			if(r == 1){
				location.href = "profile.php";
			}
		}
	})	
});

