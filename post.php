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
	$sdob = $_POST['sdob'];
	$pnum = test_input($_POST['spnum']);
	$address = test_input($_POST['saddress']);
	$email = test_input($_POST['semail']);
	$class = test_input($_POST['sclass']);

	$db->addStudent($fname,$mname,$lname,$DOB,$pnum,$address,$email);
	if($db){
		header("location:admin.php ? studmsg= New student added successfully");
	}

}

if (isset($_POST['addstaff'])){
	$fname = test_input($_POST['tfname']);
	$mname = test_input($_POST['tmname']);
	$lname = test_input($_POST['tlname']);
	$tdob = $_POST['tdob'];
	$num = test_input($_POST['tnum']);
	$address = test_input($_POST['taddress']);
	$email = test_input($_POST['temail']);

	$db->addStaff($fname,$mname,$lname,$DOB,$num,$address,$email);
	if($db){
		header("location:admin.php ? staffmsg= New staff added successfully");
	}
	

}


//Admin user Login

if (isset($_POST['alogin'])){ 
	
	$email = test_input($_POST['email']);
	$password = md5(test_input($_POST['password']));
	$token = $_POST['_token'];

	if ($token == "UpUxMBC96cGBIBnudeMhy6yVCE8J4I6UcRNqr37H"){
	$result = $db->login($email,$password);
		if ($result){
			
				$_SESSION['user'] = "Admin";
				header("location: admin.php");
			}
		else{
				header("location:admin-login.php ?m=Invalid Username and password combination");
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


function post(){

return $GLOBALS['quotes'];
}

 $quotes = "Believing in yourself

1. Believe you can and you’re halfway there.

2. You have to expect things of yourself before you can do them.

3. It always seems impossible until it’s done.

4. Don’t let what you cannot do interfere with what you can do. – John Wooden
Cultivating a success mindset

5. Start where you are. Use what you have. Do what you can. – Arthur Ashe

6. Successful and unsuccessful people do not vary greatly in their abilities. They vary in their desires to reach their potential. – John Maxwell

7. The secret of success is to do the common things uncommonly well. – John D. Rockefeller

8. Good things come to people who wait, but better things come to those who go out and get them.

9. Strive for progress, not perfection.

10. I find that the harder I work, the more luck I seem to have. – Thomas Jefferson

11. Success is the sum of small efforts, repeated day in and day out. – Robert Collier

12. Don’t wish it were easier; wish you were better. – Jim Rohn

13. I don’t regret the things I’ve done. I regret the things I didn’t do when I had the chance.

14. There are two kinds of people in this world: those who want to get things done and those who don’t want to make mistakes. – John Maxwell
Overcoming procrastination

15. The secret to getting ahead is getting started.

16. You don’t have to be great to start, but you have to start to be great.

17. The expert in everything was once a beginner.
Hard work

18. There are no shortcuts to any place worth going. – Beverly Sills

19. Push yourself, because no one else is going to do it for you.

20. Some people dream of accomplishing great things. Others stay awake and make it happen.

21. There is no substitute for hard work. – Thomas Edison

22. The difference between ordinary and extraordinary is that little “extra.”

23. You don’t always get what you wish for; you get what you work for.

24. It’s not about how bad you want it. It’s about how hard you’re willing to work for it.

25. The only place where success comes before work is in the dictionary. – Vidal Sassoon

26. There are no traffic jams on the extra mile. – Zig Ziglar

27. If people only knew how hard I’ve worked to gain my mastery, it wouldn’t seem so wonderful at all. – Michelangelo
Not making excuses

28. If it’s important to you, you’ll find a way. If not, you’ll find an excuse.

29. Don’t say you don’t have enough time. You have exactly the same number of hours per day that were given to Helen Keller, Pasteur, Michelangelo, Mother Teresea, Leonardo da Vinci, Thomas Jefferson, and Albert Einstein. – H. Jackson Brown Jr.
Perseverance

30. Challenges are what make life interesting. Overcoming them is what makes life meaningful. – Joshua J. Marine

31. Life has two rules: 1) Never quit. 2) Always remember Rule #1.

32. I’ve failed over and over and over again in my life. And that is why I succeed. – Michael Jordan

33. I don’t measure a man’s success by how high he climbs, but how high he bounces when he hits the bottom. – George S. Patton

34. If you’re going through hell, keep going. – Winston Churchill

35. Don’t let your victories go to your head, or your failures go to your heart.

36. Failure is the opportunity to begin again more intelligently. – Henry Ford

37. You don’t drown by falling in the water; you drown by staying there. – Ed Cole

38. The difference between a stumbling block and a stepping-stone is how high you raise your foot.

39. The pain you feel today is the strength you will feel tomorrow. For every challenge encountered there is opportunity for growth.

40. It’s not going to be easy, but it’s going to be worth it.

Like the article? Please share it with your friends."

 ?>