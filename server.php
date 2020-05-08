<?php
	class Regis{
		private $db;
		function __construct(){
			$this ->db = new mysqli("localhost","root","","soccanc");
				session_start();
				if(isset($_POST["action"])){
					if($_POST["action"] == "register"){
						$this->register();
					}  
					if($_POST["action"] == "login"){
						$this->login();
					}	
					if($_POST["action"] == "edit"){
						$this->edit();
					}
					if($_POST["action"] == "logout"){
						$this->logout();
					}
					if($_POST["action"] == "search"){
						$this->search();
					}	
					if($_POST["action"] == "photos"){
						$this->showPhoto();
					}
					if($_POST["action"] == "delete"){
						$this->delete();
					}
					if($_POST["action"] == "glav"){
						$this->changeGlavni();
					}		
					if($_POST["action"] == "addFriends"){
						$this->addFriends();
					}
					if($_POST["action"] == "request"){
						$this->request();
					}
					if($_POST["action"] == "delReq"){
						$this->deleteRequest();
					}
					if($_POST["action"] == "getRec"){
						$this->getFriends();
					}
					if($_POST["action"] == "friends"){
						$this->friends();
					}
					if($_POST["action"] == "delFrd"){
						$this->deleteFriends();
					}
					if($_POST["action"] == "massage"){
						$this->massage();
					}
					if($_POST["action"] == "sentMess"){
						$this->sentMessage();
					}
					if($_POST["action"] == "getmessage"){
						$this->getMessage();
					}
					// if($_POST["action"] == "status"){
					// 	$this->addPosts();
					// }
					if($_POST["action"] == "getPosts"){
						$this->getPosts();
					}	

					if($_POST["action"] == "addComents"){
						$this->addComents();
					}	
					if($_POST["action"] == "addComents1"){
						$this->addComents1();
					}
					if($_POST["action"] == "like"){
						$this->addLike();
					}	
					// if($_POST["action"] == "comment"){
					// 	$this->getComment();
					// }
					if($_POST["action"] == "usersPage"){
						$this->usersPage();
					}	
					if($_POST["action"] == "getPostsUser"){
						$this->getPostsUser();
					}	
					if($_POST["action"] == "friendsPage"){
						$this->friendsPage();
					}					
				}		
				if(isset($_POST["photobtn"])){
					//if($_POST["name"] == "photobtn"){
						$this->addphoto();
					//}
				}
				if(isset($_POST["postBtn"])){
					//if($_POST["name"] == "photobtn"){
						$this->addPosts();
					//}
				}

		}
		function register(){
			$name = $_POST["name"];
			$surname = $_POST["surname"];
			$email = $_POST["email"];
			$data =  $this->db -> query("SELECT * FROM users WHERE email = '$email'")->fetch_all(true);
			$age = $_POST["age"];
			$password = $_POST["password"];
			$confirm_password = $_POST["confirm_password"];
			$errors = [];
			if(empty($name)){
				$errors["name"] = "*Write your name.";
			}
			else if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
            	$errors["name"] = "*Only letters and white space allowed";
			}


			if(empty($surname)){
				$errors["surname"] = "*Write your surname.";
			}
			else if(!preg_match("/^[a-zA-Z ]*$/",$surname)) {
            	$errors["surname"] = "*Only letters and white space allowed";
			}


			if(empty($email)){
				$errors["email"] = "*Write your email adress.";
			}
			else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 				$errors["email"] = "*Invalid email format";
			}  
			else if(count($data) > 0){
				$errors["email"] = "*arden grancvac ka";
			}


			if(empty($age)){
				$errors["age"] = "*Write your age.";
			}
			else if(!preg_match("/^[0-9 ]*$/",$age)) {
            	$errors["age"] = "*Only numbers and white space allowed";
			}	


			if(empty($password)){
				$errors["password"] = "*Write password";
			}	
			else if(strlen($password) < '6'){
				$errors["password"] = "*6";
			}


			if(empty($confirm_password)){
				$errors["confirm_password"] = "*lracreq confirm_password";
			}
			else if($confirm_password != $password){
				$errors["confirm_password"] = "*lracreq nuyn dzev";
			}	


			if(count($errors) > 0){
				print json_encode($errors);
			}												
			else{
				$hash = password_hash($_POST["password"],PASSWORD_DEFAULT);
				//print $hash;
				//var_dump(password_verify($_POST["password"], $hash));
				$this->db->query("INSERT INTO users (name,surname,age,email,password) VALUES ('$name','$surname','$age','$email','$hash')");
			}
		}

		function login(){
			$errors1 = [];
			$email1 = $_POST["email1"];
			$password1 = $_POST["password1"];
			$profile = $this->db -> query("SELECT * FROM users WHERE email = '$email1'")->fetch_all(true);

			if(empty($email1)){
				$errors1["email1"] = "*Write your email adress.";
			}
			else if(!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
 				$errors1["email1"] = "*Invalid email format";
			}
			if(isset($profile[0]["password"])){
				if(!password_verify($password1, $profile[0]["password"])){
					$errors1["password1"] = "*Incorect Password";
				}
			}
			else{
				$errors1["password1"] = "*Incorect Password";
			}

			if(empty($password1)){
				$errors1["password1"] = "*Write your password";
			}	

			if(count($errors1) > 0){
				print json_encode($errors1);
			}
			else{
				$_SESSION["user"] = $profile[0];
				print 1;
			}
		}
		function edit(){
			$eName = $_POST["eName"];
			$eSurname = $_POST["eSurname"];
			$eEmail = $_POST["eEmail"];
			$eAge = $_POST["eAge"];
			$profile = $this->db -> query("SELECT * FROM users WHERE email = '$eEmail'")->fetch_all(true);
			$eId =  $profile[0]["id"];
			print $eId;
			$this->db->query("UPDATE users SET name = '$eName', surname = '$eSurname', email = '$eEmail', age = '$eAge' WHERE id = '$eId' ");
			$profile1 = $this->db -> query("SELECT * FROM users WHERE email = '$eEmail'")->fetch_all(true);
				$_SESSION["user"] = $profile1[0];
		}

		function logout(){
			session_destroy();
		}

		function search(){
			$user_id = $_SESSION['user']['id'];
			$search = $_POST["search"];
			$searchUser = $this->db -> query("SELECT * FROM users WHERE name LIKE '$search%' AND id != '$user_id' ")->fetch_all(true);
			$arr = [];
			foreach ($searchUser as $k) {
				$id = $k["id"];
				$fr = $this->db->query("SELECT * FROM friends WHERE (my_id = '$user_id' AND user_id = '$id') OR 
				(my_id = '$id' AND user_id = '$user_id') ")->fetch_all(true);
				$req = $this->db->query("SELECT * FROM request WHERE my_id = '$user_id' AND user_id = '$id' ")->fetch_all(true);
				$req1 = $this->db->query("SELECT * FROM request WHERE my_id = '$id' AND user_id = '$user_id' ")->fetch_all(true);
				if(!empty($fr)){
					$k["status"] = 1;
				}
				else if(!empty($req)){
					$k["status"] = 2;
				}
				else if(!empty($req1)){
					$k["status"] = 3;
				}
				else{
					$k["status"] = 0;
				}
				array_push($arr, $k);
			}
			// $searchFriends = $this->db->query("SELECT my_id FROM friends WHERE user_id = '$user_id' ")->fetch_all(true);

			print json_encode($arr);
		}

		function addphoto(){
			$user_id = $_SESSION['user']['id'];
			$photo = $_FILES["photo"];
			if(!file_exists("img")){
				mkdir("img");
			}
			$address="img/".time().$photo["name"];
			move_uploaded_file($photo["tmp_name"],$address);
			//$user=["name"=>$_POST["name"],"surname"=>$_POST["surname"],"email"=>$_POST["email"],"photo"=>$address];
			$this->db->query("INSERT INTO photos (user_id, photo) VALUES ('$user_id', '$address') ");
			header("location: profile.php");
			// print "hello";

		}


		function showPhoto(){
			$user_id = $_SESSION['user']['id'];
			$showPhoto = $this->db -> query("SELECT * FROM photos WHERE user_id = '$user_id' ")->fetch_all(true);
			//$_SESSION["photo"] = $showPhoto[0];
			print json_encode($showPhoto);
		}

		function delete(){
			$user_id = $_SESSION['user']['id'];
			$delValue = $_POST["delVal"];
			$this->db->query(" DELETE FROM photos WHERE id = '$delValue' AND user_id = '$user_id' ");
		}

		function changeGlavni(){
			$user_id = $_SESSION['user']['id'];
			$glav = $_POST["glav"];
			$profil = $this->db->query("SELECT photo FROM photos WHERE id = '$glav' ")->fetch_all(true);
			$pr = $profil[0]["photo"];
			$this->db->query("UPDATE users SET profil = '$pr' WHERE id = '$user_id' ");
			$_SESSION['user']['profil'] = $pr;
			print 2;
		}

		function addFriends(){
	       $user_id = $_SESSION['user']['id'];
	       $add_id = $_POST["frVal"] ;
	       $this ->db->query("INSERT INTO request (my_id, user_id) VALUES ('$user_id', '$add_id')"); 		
		}

		function request(){
			$user_id = $_SESSION['user']['id'];
			$request = $this->db->query(" SELECT users.* FROM users JOIN request ON users.id = request.my_id WHERE  request.user_id = '$user_id' ")->fetch_all(true);
			print json_encode($request);
		}

		function deleteRequest(){
			$user_id = $_SESSION['user']['id'];
			$delReq = $_POST["delReq"];
			$this->db->query(" DELETE FROM request WHERE (my_id = '$delReq' AND user_id = '$user_id') 
			OR (my_id = '$user_id' And user_id = '$delReq')");			
		}

		function getFriends(){
			$user_id = $_SESSION['user']['id'];
			$getReq = $_POST["getReq"];
			$this->db->query("INSERT INTO friends (my_id, user_id) VALUES ('$getReq', '$user_id')");		
			$this->db->query("DELETE FROM request WHERE my_id = '$getReq' AND user_id = '$user_id' ");
			print "getfriends";	
		}

		function friends(){
			$user_id = $_SESSION['user']['id'];
			$friend = $this->db->query("SELECT * FROM users WHERE id IN (SELECT user_id FROM friends 
				WHERE my_id = '$user_id' UNION SELECT my_id FROM friends WHERE user_id = '$user_id') ")->fetch_all(true);
			print json_encode($friend);			
		}

		function deleteFriends(){
			$user_id = $_SESSION['user']['id'];
			$delFrd = $_POST["delFrd"];
			$this->db->query("DELETE FROM friends WHERE (my_id = '$delFrd' AND user_id = '$user_id') OR (user_id = '$delFrd' AND my_id = '$user_id') ");
			print "deleteFriends";			
		}
		function massage(){
			//$user_id = $_SESSION['user']['id'];
			$massVal = $_POST["massVal"];
			$mass = $this->db -> query("SELECT * FROM users WHERE id = '$massVal' ")->fetch_all(true);
			$_SESSION["massage"] = $mass[0];
		}

		function sentMessage(){
			$user_id = $_SESSION['user']['id'];
			$btnVal = $_POST["btnVal"];
			$textVal = $_POST["textVal"];
			$this ->db->query("INSERT INTO message (my_id, rec_id, message) VALUES ('$user_id', '$btnVal', '$textVal')");
		}

		function getMessage(){
			$user_id = $_SESSION['user']['id'];
			$btnVal = $_POST["btnVal"]; 
			//setInterval(function(){
				getMessageInDataBasa($btnVal, $user_id);
				//}, 1000);
		}

		function addPosts(){
			if(!file_exists("images")){
				mkdir("images");
			}
			$user_id = $_SESSION['user']['id'];
			$status = mysqli_real_escape_string($this->db, $_POST["mind"]);
			if($status == "" && $_FILES["photos"]['name'] == ""){

			}
			else{
				if($_FILES["photos"]['name']!=""){
				$photo = $_FILES["photos"];
					$address="images/".time().$photo["name"];
					move_uploaded_file($photo["tmp_name"],$address);
			       	$this ->db->query("INSERT INTO posts (user_id, picture, post) VALUES 
			       		('$user_id', '$address', '$status')"); 	
				}
				else{
					$this ->db->query("INSERT INTO posts (user_id, post) VALUES 
			       		('$user_id', '$status')");
				}
				
		    }
		       	header("location: profile.php");
		}

		function getPosts(){
			$user_id = $_SESSION['user']['id'];
			$getPost = $this->db->query("SELECT posts.*, users.name, users.surname, users.profil FROM posts 
			JOIN users ON users.id = posts.user_id WHERE posts.user_id = '$user_id' 
			OR posts.user_id in (SELECT my_id FROM friends WHERE user_id = '$user_id'
			UNION SELECT user_id FROM friends WHERE my_id = '$user_id' ) ORDER BY posts.time DESC ")->fetch_all(true);
			$arr = [];
			foreach ($getPost as $k) {
				$id = $k["id"];
				$comments = $this->db->query(" SELECT * FROM comments JOIN users 
				ON users.id = comments.user_id  WHERE post_id = '$id' ORDER BY comments.time DESC ")->fetch_all(true);
				$likes = $this->db->query(" SELECT COUNT(post_likes.id) as likes from post_likes JOIN users ON users.id = post_likes.user_id WHERE post_id = '$id' ")->fetch_all(true);
				$k["likes"] = $likes;
				$k["comments"] = $comments;
				array_push($arr, $k);
			}
			// $getPost1 = $this->db -> query("SELECT name, surname, profil FROM users WHERE id = '$user_id' ")->fetch_all(true);
			// foreach ($getPost1 as $k) {
			// 	for ($i=0; $i < count($getPost); $i++) { 
			// 			array_push($getPost[$i], $k);
			// 	}	
			// }
			print json_encode($arr);

		}

		function addComents(){
			$user_id = $_SESSION['user']['id'];
			$comarea = $_POST["comarea"];
			$postsId = $_POST["postsId"];
			if($comarea != ""){
				$this ->db->query("INSERT INTO comments (post_id, user_id, comment) VALUES 
		       		('$postsId', '$user_id', '$comarea')");
				$h = $this->db->query("SELECT * FROM users WHERE id = '$user_id' ")->fetch_all(true);
		    }		
			print json_encode($h);
		  	
		}
		function addComents1(){
			$user_id = $_SESSION['user']['id'];
			$comarea1 = $_POST["comarea1"];
			$postsId1 = $_POST["postsId1"];
			if($comarea1 != ""){
				$this ->db->query("INSERT INTO comments (post_id, user_id, comment) VALUES 
		       		('$postsId1', '$user_id', '$comarea1')");
		       	$h = $this->db->query("SELECT * FROM users WHERE id = '$user_id' ")->fetch_all(true);
		    }	
		    print json_encode($h);			
		}

		function addLike(){
			$user_id = $_SESSION['user']['id'];
			$like = $_POST["like"];		
			$but = $this->db->query("SELECT COUNT(id) as count FROM post_likes WHERE post_id = '$like' AND user_id = '$user_id' ")->fetch_all(true);
			json_encode($but);
			if($but[0]["count"] == 0){
				$this->db->query("INSERT INTO post_likes (post_id, user_id) VALUES ('$like', '$user_id')");
			}
			else{
				$this->db->query("DELETE FROM post_likes WHERE post_id = '$like' AND user_id = '$user_id' ");
			}			
		}

		// function usersPage(){
		// 	$usId = $_POST["usId"];
		// 	$usPage = $this->db->query("SELECT * FROM users WHERE id = '$usId' ")->fetch_all(true);
		// 	$_SESSION["usersPage"] = $usPage[0];
		// 	print json_encode($_SESSION["usersPage"]);
		// }
		function getPostsUser(){
			$user_id = $_POST["friend"];
			$getPost = $this->db -> query("SELECT posts.*, users.name, users.surname, users.profil FROM posts 
			JOIN users ON users.id = posts.user_id WHERE posts.user_id = '$user_id' 
			-- OR posts.user_id in (SELECT my_id FROM friends WHERE user_id = '$user_id'
			-- UNION SELECT user_id FROM friends WHERE my_id = '$user_id' )
			ORDER BY posts.time DESC ")->fetch_all(true);
			$arr = [];
			foreach ($getPost as $k) {
				$id = $k["id"];
				$comments = $this->db->query(" SELECT * FROM comments JOIN users 
				ON users.id = comments.user_id  WHERE post_id = '$id' ORDER BY comments.time DESC ")->fetch_all(true);
				$likes = $this->db->query(" SELECT * from post_likes JOIN users ON users.id = post_likes.user_id WHERE post_id = '$id' ")->fetch_all(true);
				$k["likes"] = $likes;
				$k["comments"] = $comments;
				array_push($arr, $k);
			}
			// $getPost1 = $this->db -> query("SELECT name, surname, profil FROM users WHERE id = '$user_id' ")->fetch_all(true);
			// foreach ($getPost1 as $k) {
			// 	for ($i=0; $i < count($getPost); $i++) { 
			// 			array_push($getPost[$i], $k);
			// 	}	
			// }
			print json_encode($arr);

		}
		function friendsPage(){
			$frId = $_POST["friend"];
			$data = $this->db->query("SELECT * FROM users WHERE id='$frId'")->fetch_all(true);
			print json_encode($data);
		}

		// function getComment(){
		// 	$user_id = $_SESSION['user']['id'];
		// 	$comment = $_POST["comment"];	
		// 	$getCom = $this->db->query("SELECT comments.*, users.name, users.surname, users.profil
		// 	FROM comments JOIN user.id = comments.user_id WHERE ")->fetch_all(true); 			
		// 	// $getCom1 = $this->db->query("SELECT name, surname, profil FROM users WHERE id = '$user_id' ")->fetch_all(true); 
		// 	// foreach ($getCom1 as $k) {
		// 	// 	for ($i=0; $i < count($getCom); $i++) { 
		// 	// 			array_push($getCom[$i], $k);
		// 	// 	}	
		// 	// }
		// 	print json_encode($getCom);	
		// }

	}	
	$k = new Regis();

	function getMessageInDataBasa($data, $user_id){
		$db = new mysqli("localhost","root","","soccanc");
		$dataMessage = $db->query("SELECT message.*, users.profil FROM message JOIN users ON message.my_id = users.id
		 WHERE (my_id = '$user_id' AND rec_id = '$data') OR (my_id = '$data' AND rec_id = '$user_id' )")->fetch_all(true);
		print json_encode($dataMessage);

	}
?>

