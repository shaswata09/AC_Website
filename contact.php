<?php
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message']))
	{
		session_start();
		$dbc=mysqli_connect("localhost","root","","amritangshu");//or die("Error:".mysqli_connect_error());
		if (!$dbc) {
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
		$nm=$_POST["name"];
		$mail=$_POST["email"];
		$ph=$_POST["phone"];
		$txt=$_POST["message"];
		
		$q="INSERT INTO contact_us (id, time, name, email, ph_no, msg) VALUES (NULL, CURRENT_TIMESTAMP, $nm, $mail, $ph, $txt);"
		$res=mysql_query($q);
		if(!$res){
			echo 'Error placing query!!!' . mysql_error() ."\n";
		}
		else{
			echo "New record created successfully";
		}
		session_destroy();
	}
?>