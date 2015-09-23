<?php
									//mvp: Tahaksin teha midagi Instagram'i laadset.
	//echo$_POST["email"];
	//echo$_POST["password"];
	
	$email_error = "";
	$password_error = "";
	$name_error = "";
	$age_error = "";
	
	//muutujad ab väärtuste jaoks
	
	$email = "";
	$name = "";
	$password = "";
	$age = "";
	
	
	//kontrollime, et keegi vajutas input nuppu.
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//echo "Keegi vajutas nuppu";
		
		
		//keegi vajutas login nuppu
		if(isset($_POST["login"])){
			
			echo "Vajutas login nuppu!";
			
			//kontrollin, et e-post ei ole tühi
			if(empty($_POST[$email]) ){
				$email_error = " See väli on kohustuslik.";
			}else{
				
				$email = test_input($_POST["email"]);
			
			}	
				
			//kontrollin, et parool ei ole tühi
			if(empty($_POST[$password]) ){
				$password_error = "See väli on kohustuslik.";
			}else{
				
				// kui oleme siia jõudnud, siis parool ei ole tühi
				// kontrollin, et oleks vähemalt 8 sümbolit pikk
				if(strlen($_POST[$password]) < 8) {
					
					$password_error = "Peab olema vähemalt 8 tähemärki pikk";
				}
			
			
			}
			
			//kontrollin et ei oleks ühtegi errorit
			if($email_error == ""&& $password_error ==""){
				
				echo "kontrollin sisselogimist".$email." ja parool ";
			}
			
			
		
		// keegi vajutas create  nuppu
		}elseif(isset($_POST["create"])){
			
			echo "Vajutas create nuppu!";
				
			//valideerimine create user vormile
			//kontrollin, et nimi ei ole tühi
			if( empty($_POST["name"]) ) {
				$name_error = "See väli on kohustuslik";
			}else{
				//kõik korras
				//test_input eemaldab pahatahtlikud osad
				$name = test_input($_POST["name"]);
					
			}
			if($name_error == ""){
				echo "salvestan ab'i".@name;
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
<?php/
	$page_title = "Sisselogimise leht";
	$page_file_name = "login.php";
?>                                                    
<html>
<head>
	<title><?php echo $page_title; ?></title>
	
</head>
<body>
	
		<form action="login.php" method="post">
			<input name="email" type="email" placeholder="E-post" value="<?php echo $email; ?>"> <?php echo $email_error; ?> <br><br>
			<input name="password" type="password" placeholder="Parool"> <?php echo $password_error; ?> <br><br>
			<input name="login" type="submit" value="Log in"> 
		</form>
		
	<h2>Kasutaja loomine</h2>
	
		<form action="login.php" method="post">
			<input name="name" type="text" placeholder="Perekonnanimi" value="<?php echo $name; ?>">* <?php echo$name_error; ?><br><br>
			<input name="name" type="text" placeholder="Eesnimi" value="<?php echo $name; ?>">* <?php echo$name_error; ?><br><br>
			<input name="name" type="text" placeholder="Vanus" value="<?php echo $name; ?>">* <?php echo$name_error; ?><br>
			<input name="create" type="submit" value="Create">
		</form>
		
		
		
<p><i>Lehe tegi Henrik, 2015a.</i></p>
</body>     
</html>