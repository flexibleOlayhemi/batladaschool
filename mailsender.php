<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	$to = "batladaschool@gmail.com";
	$subject = "BCISM Contact Message"."<br>";
	$message = $_POST['name'] .":"."<br>".$_POST['message']."<br>";
	$headers = "From: ".$_POST['email']."\r\n";
//echo ($subject);
//echo ($message);
//echo ($headers);
	$m = mail($to,$subject,$message,$headers);
	if($m)
	header("location:contact.php ? message= Mail sent successfully");
	else
	header("location:contact.php ? message= Error sending mail");
	
}
 ?>
