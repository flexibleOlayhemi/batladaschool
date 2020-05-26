<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	$to = "lyhemi@gmail.com";
	$subject = "BCISM Contact Message"."<br>";
	$message = $_POST['name'] .":"."<br>".$_POST['message']."<br>";
	$headers = "From: ".$_POST['email']."\r\n";
echo ($subject);
echo ($message);
echo ($headers);
	mail($to,$subject,$message,$headers);
	header("location:contact.php ? message= Mail sent successfully");
	
}
 ?>
