<?php 

require_once("./DB/db.php");

$db = new createDB();

handlePost('Postquote','quote_body','quotes');
handlePost('Postnews','news_body','news');

function handlePost($botton_name,$post_name,$t_name){

		if (isset($_POST[$botton_name])){
		$body = test_input($_POST[$post_name]);

		$GLOBALS['db']->insertToDb($t_name,$body);
	}
}

 if (isset($_POST['qbtn'])){
	$id = $_POST['qbtn'];
	$db->deletePost('quotes',$id);
	header("location:admin.php ? qmsg= Quote deleted successfully");
}

 if (isset($_POST['nbtn'])){
	$id = $_POST['nbtn'];
	$db->deletePost('news',$id);
	header("location:admin.php ? nmsg= News deleted successfully");
}

if (isset($_POST['addstudent'])){
	$fname = test_input($_POST['sfname']);
	$mname = test_input($_POST['smname']);
	$lname = test_input($_POST['slname']);
	$sdob = date('Y-m-d',strtotime($_POST['sdob']));
	$pnum = test_input($_POST['spnum']);
	$address = test_input($_POST['saddress']);
	$email = test_input($_POST['semail']);
	$class = test_input($_POST['sclass']);

//simage
$name = "simage";
$target_file = imgUpload($name);


	$db->addStudent($fname,$mname,$lname,$sdob,$pnum,$address,$email,$target_file,$class);
	if($db){
		header("location:admin.php ? studmsg= New student added successfully");
	}else {
		header("location:admin.php ? studmsg= Error Adding student");
	}

}

if (isset($_POST['updatestudent'])){
	$fname = test_input($_POST['sfname']);
	$mname = test_input($_POST['smname']);
	$lname = test_input($_POST['slname']);
	$sdob = date('Y-m-d',strtotime($_POST['sdob']));
	$pnum = test_input($_POST['spnum']);
	$address = test_input($_POST['saddress']);
	$email = test_input($_POST['semail']);
	$class = test_input($_POST['sclass']);
	$id = $_POST['sid'];


	$db->updateStudent($fname,$mname,$lname,$sdob,$pnum,$address,$email,$class,$id);
	if($db){
		header("location:admin.php ? studmsg= student updated successfully");
	}else {
		header("location:admin.php ? studmsg= Unable to update student");
	}

}

if (isset($_POST['updateteachers'])){
	$fname = test_input($_POST['tfname']);
	$mname = test_input($_POST['tmname']);
	$lname = test_input($_POST['tlname']);
	$dob = date('Y-m-d',strtotime($_POST['tdob']));
	$num = test_input($_POST['num']);
	$address = test_input($_POST['taddress']);
	$email = test_input($_POST['temail']);
	
	$id = $_POST['tid'];


	$db->updateTeachers($fname,$mname,$lname,$dob,$num,$address,$email,$id);
	if($db){
		header("location:admin.php ? staffmsg= Staff updated");
	}else {
		header("location:admin.php ? staffmsg= Unable to update staff");
	}

}

if (isset($_POST['uploadsimage'])){

$id = $_POST['sid'];

//usimage
	$name = "usimage";
$target_file = imgUpload($name);

$db->uploadsimage($target_file,$id);
	if($db){
		header("location:admin.php ? studmsg= Image Updated");
	}else {
		header("location:admin.php ? studmsg= Error uploading Image");
	}
}




if (isset($_POST['uploadtimage'])){

$id = $_POST['tid'];

//utimage

$name = "utimage";
$target_file = imgUpload($name);

$db->uploadtimage($target_file,$id);
	if($db){
		header("location:admin.php ? staffmsg= Image Updated");
	}else {
		header("location:admin.php ? staffmsg= Error uploading Image");
	}
}





if (isset($_POST['addstaff'])){
	$fname = test_input($_POST['tfname']);
	$mname = test_input($_POST['tmname']);
	$lname = test_input($_POST['tlname']);
	$tdob =  date('Y-m-d',strtotime($_POST['tdob']));
	$num = test_input($_POST['tnum']);
	$address = test_input($_POST['taddress']);
	$email = test_input($_POST['temail']);

//timage

$name = "timage";
$target_file = imgUpload($name);

	$db->addStaff($fname,$mname,$lname,$tdob,$num,$address,$email, $target_file);
	if($db){
		header("location:admin.php ? staffmsg= New staff added successfully");
	}
	

}


//Admin user Login

if (isset($_POST['alogin'])){ 
	
	$email = test_input($_POST['email']);
	$password = test_input($_POST['password']);
	$token = $_POST['_token'];

	if ($token == "UpUxMBC96cGBIBnudeMhy6yVCE8J4I6UcRNqr37H"){
	$result = $db->login($email,$password);
		if ($result){
			
				$_SESSION['user'] = "Admin";
				//header("location: admin.php");
				echo "<script>window.location = \"admin.php\"</script>";
			}
		else{
				//header("location:admin-login.php ?m=Invalid Username and password combination");
				echo "<script>window.location = \"admin-login.php ?m=Invalid Username and password combination\"</script>";
			}
	}

	else {
		header("location:admin-login.php ? m=You must login first");
	}
	
}

//Logut User
if (isset($_POST['alogout'])){ 
	// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
	header("location:admin-login.php");
}





function imgUpload($name){
	//Handle image
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES[$name]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES[$name]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }



// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "JPG" && $imageFileType != "JPEG" && $imageFileType != "GIF" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    return "";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
    	return $target_file;
        //echo "The file ". basename( $_FILES[$name]["name"]). " has been uploaded.";
    } else {

        //echo "Sorry, there was an error uploading your file.";
        return "";
    }
}


}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = str_replace("'", "’", $data);
  return $data;
}

function postForm($body_name,$button_name){

$form = "
		 <form  action=\"admin.php\" method=\"post\">
		  <textarea rows=\"5\" class=\"form-control\" type=\"text\" name= $body_name placeholder=\"Content to post\" required></textarea>
		  <button class=\"btn btn-primary mb-4 mt-1\" name=$button_name>$button_name</button>
		</form>
		";

	echo $form;
}




 ?>