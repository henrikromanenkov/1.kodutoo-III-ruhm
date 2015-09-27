<?php
									//mvp: Tahaksin teha midagi Instagram'i laadset.
	//echo$_POST["email"];
	//echo$_POST["password"];
	
	$log_email_error = "";
	$user_email_error = "";
	$log_password_error = "";
	$user_password_error = "";
	$lastname_error = "";
	$firstname_error = "";
	
	//muutujad ab väärtuste jaoks
	
	$log_email = "";
	$user_email = "";
	$lastname = "";
	$firstname = "";
	$log_password = "";
	$user_password = "";
	
	//kontrollime, et keegi vajutas input nuppu.
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//echo "Keegi vajutas nuppu";
		
		
		//keegi vajutas login nuppu
		if(isset($_POST["login"])){
			
			echo "Vajutas login nuppu!";
			
			//kontrollin, et e-post ei ole tühi
			if(empty($_POST["log_email"]) ){
				$log_email_error = " See väli on kohustuslik.";
			}else{
				
				$log_email = test_input($_POST["log_email"]);
			
			}	
				
			//kontrollin, et parool ei ole tühi
			if(empty($_POST["log_password"]) ){
				$log_password_error = "See väli on kohustuslik.";
			}else{
				
				// kui oleme siia jõudnud, siis parool ei ole tühi
				// kontrollin, et oleks vähemalt 8 sümbolit pikk
				if(strlen($_POST["log_password"])<8) {
					
				$log_password_error = "Peab olema vähemalt 8 tähemärki pikk";
				
				}
			
			
			}
			
			//kontrollin et ei oleks ühtegi errorit
			if($log_email_error == ""&& $log_password_error ==""){
				
				echo "kontrollin sisselogimist".$log_email." ja parool ";
			}
			
			
		
		// keegi vajutas create  nuppu
		}elseif(isset($_POST["create"])){
			
			echo "Vajutas create nuppu!";
			
			if(empty($_POST["user_email"]) ){
				$user_email_error = " See väli on kohustuslik.";
			}else{
				
				$user_email = test_input($_POST["user_email"]);
			}
			
			//kontrollin, et parool ei ole tühi
			if(empty($_POST["user_password"]) ){
				$user_password_error = "See väli on kohustuslik.";
			}else{
				
				// kui oleme siia jõudnud, siis parool ei ole tühi
				// kontrollin, et oleks vähemalt 8 sümbolit pikk
				if(strlen($_POST["user_password"])<8) {
					
				$user_password_error = "Peab olema vähemalt 8 tähemärki pikk";
				
				}
			}
				
			//valideerimine create user vormile
			//kontrollin, et perekonnanimi ei ole tühi
			if( empty($_POST["lastname"]) ) {
				$lastname_error = "See väli on kohustuslik";
			}else{
				//kõik korras
				//test_input eemaldab pahatahtlikud osad
				$lastname = test_input($_POST["lastname"]);
			
				
			}
			if($lastname_error == ""){
				echo "salvestan ab'i".$lastname;
			}
			
			//valideerimine create user vormile
			//kontrollin, et eesnimi ei ole tühi
			if( empty($_POST["firstname"]) ) {
				$firstname_error = "See väli on kohustuslik";
			}else{
				//kõik korras
				//test_input eemaldab pahatahtlikud osad
				$firstname = test_input($_POST["firstname"]);
			
				
			}
			if($firstname_error == ""){
				echo "salvestan ab'i".$firstname;
			}
		
		}
	}	
	function test_input($data) {
		//võtab ära tühikud, enterid ja tabid
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		
	}
?>  
<?php
	$page_title = "Sisselogimise leht";
	$page_file_name = "login.php";
?>                                                    
<html>
<head>
	<title><?php echo $page_title; ?></title>
	
</head>
<body>
	
	<h2>Log in</h2>
		<form action="login.php" method="post">
			<input name="log_email" type="email" placeholder="E-post" value="<?php echo $log_email; ?>">* <?php echo $log_email_error; ?> <br><br>
			<input name="log_password" type="password" placeholder="Parool" value="<?php echo $log_password; ?>">* <?php echo $log_password_error; ?> <br><br>
			<input name="login" type="submit" value="Log in"> 
		</form>
		
	<h2>Create user</h2>
	
		<form action="login.php" method="post">
			<input name="user_email" type="email" placeholder="E-post" value="<?php echo $user_email; ?>">* <?php echo $user_email_error; ?> <br><br>
			<input name="user_password" type="password" placeholder="Parool" value="<?php echo $user_password; ?>">* <?php echo $user_password_error; ?> <br><br>
			<input name="lastname" type="text" placeholder="Perekonnanimi" value="<?php echo $lastname; ?>">* <?php echo$lastname_error; ?><br><br>
			<input name="firstname" type="text" placeholder="Eesnimi" value="<?php echo $firstname; ?>">* <?php echo$firstname_error; ?><br><br>
			<input name="create" type="submit" value="Create">
		</form>
		
		
		
<p><i>Lehe tegi Henrik, 2015a.</i></p>
</body>     
</html>