<?php
	include('conn.php');
	if(isset($_POST['susername'])){
		$firstname=$_POST['sfirstname'];
		$lastname=$_POST['slastname'];
		$username=$_POST['susername'];
		$password=$_POST['spassword'];
		$phoneno=$_POST['sphoneno'];
		$email=$_POST['semail'];
 
		$query=$conn->query("select * from user where username='$username'");
 
		if ($query->num_rows>0){
			?>
  				<span>Username already exist.</span>
  			<?php 
		}
 
		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$username)){
			?>
  				<span style="font-size:11px;">Invalid username. Space & Special Characters not allowed.</span>
  			<?php 
		}
		elseif (!preg_match("/^[a-zA-Z0-9_]*$/",$password)){
			?>
  				<span style="font-size:11px;">Invalid password. Space & Special Characters not allowed.</span>
  			<?php 
		}
		else{
			$mpassword=md5($password);
			$conn->query("insert into user (firstname,lastname,username, password,phoneno,email_id) values ('$firstname','$lastname','$username', '$mpassword','$phoneno','$email')");
			?>
  				<span>Sign up Successful.</span>
  			<?php 
		}
	}
?>