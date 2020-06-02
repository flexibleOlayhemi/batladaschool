<?php 

class createDB{

	

	public $db_name;
	public $table_name;
	public $server;
	public $user;
	public $password;

	public  $con;

	public function __construct(
		$db_name = "batlada",
		$table_name = "News",
	$server = "heroku_6457e24b7049eb6",
	$user = "b33f87945914f6",
	$password = "18ed271a"

	){

			$this->db_name = $db_name;
			$this->server = $server;
			$this->table_name = $table_name;
			$this->user = $user;
			$this->password = $password;

			//create connection 
			$this->con = mysqli_connect($server,$user,$password);

			//check connection 

			if (!$this->con){
				die("Connection failed".mysqli_connect_error());
			}

			//create querry

			$sql = "CREATE DATABASE IF NOT EXISTS $db_name";

			//execute query 

			if(mysqli_query($this->con,$sql)){

				$this->con = mysqli_connect($server,$user,$password,$db_name);

				//sql to create table

				$sql =  "CREATE TABLE IF NOT EXISTS $table_name

					(id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
					body VARCHAR(255),
					tm DATETIME DEFAULT CURRENT_TIMESTAMP)
					";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					
					echo "Unable to create table ".$table_name.": ".mysqli_error($this->con);
				}

					//create adminlogin table
				$sql =  "CREATE TABLE IF NOT EXISTS adminlogin (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				email VARCHAR(100),
				password VARCHAR(100)


				)";


				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}

				//create Students table
				$sql =  "CREATE TABLE IF NOT EXISTS Students (
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				fname VARCHAR(100),
				mname VARCHAR(100),
				lname VARCHAR(100),
				DOB DATE,
				pnum VARCHAR(50),
				address VARCHAR(255),
				email VARCHAR(100),
				img VARCHAR(255),
				class_id INT(255),
				FOREIGN KEY (class_id) REFERENCES Classes(id)
				


				)";


				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}

					//create Teachers table
				$sql =  "CREATE TABLE IF NOT EXISTS Teachers(
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				fname VARCHAR(100),
				mname VARCHAR(100),
				lname VARCHAR(100),
				DOB DATE,
				num VARCHAR(50),
				address VARCHAR(255),
				email VARCHAR(100),
				img VARCHAR(255),
				join_date DATE DEFAULT CURRENT_TIMESTAMP

				)";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}

				//create classes table
				$sql =  "CREATE TABLE IF NOT EXISTS Classes(
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(100)
				
				)";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}

				//create Subjects table
				$sql =  "CREATE TABLE IF NOT EXISTS Subjects(
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				name VARCHAR(100),
				class_id INT(255),
				FOREIGN KEY (class_id) REFERENCES Classes(id)

				)";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}

				//create studentsubject table
				$sql =  "CREATE TABLE IF NOT EXISTS studentsubject(
				id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
				std_id INT(255),
				subject_id INT(255),
				FOREIGN KEY (std_id) REFERENCES Students(id),
				FOREIGN KEY (subject_id) REFERENCES Subjects(id)

				)";

				//execute query

				if (!mysqli_query($this->con, $sql)){

					echo "Unable to create table : ".mysqli_error($this->con);
				}


			}else 
			{
				return false;
			}




	}  //constructor ends here


	public function insertToDb($t_name,$body){


		//query
		$sql = "INSERT INTO $t_name(body) VALUES('$body')" ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			echo "Failed to upload post". mysqli_error($this->con);
		}else{
			return true;
		}

	}

	public function login($email,$password){

		$sql = "SELECT * FROM adminlogin WHERE email='$email' and password='$password' ";
		//execute query

		$result = mysqli_query($this->con, $sql);
			if (mysqli_num_rows($result)>0){
		        		return true;
		        	}else 
		        	{
		        		//echo "Failed to Retrieve data : ". mysqli_error($this->con);
		        		return false;
		        	}
		        
	}

	public function getData($t_name){

		//query 
		$sql = "SELECT * FROM $t_name ORDER BY tm DESC";
		//execute qery
		$result = mysqli_query($this->con,$sql);
		        	if (mysqli_num_rows($result)>0){
		        		return $result;
		        	}else 
		        	{
		        		//echo "Failed to Retrieve data : ". mysqli_error($this->con);
		        		return false;
		        	}

	}

	public function deletePost($table,$id){

		//query
		$sql = "DELETE FROM $table where id=$id";
		//execute
		if (! mysqli_query($this->con,$sql)){

			echo "Unable to delete : ". mysqli_error($this->con);
		}else{
			
			return true;
		}
	}


	public function addStudent($fname,$mname,$lname,$DOB,$pnum,$address,$email,$img,$class){

			
		//query
		$sql = "INSERT INTO students(fname,mname,lname,DOB,pnum,address,email,img,class_id) VALUES(
		'$fname','$mname','$lname','$DOB','$pnum','$address','$email','$img','$class'
		)" ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add student". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}

	}
	public function addStaff($fname,$mname,$lname,$DOB,$num,$address,$email,$img){


		//query
		$sql = "INSERT INTO teachers(fname,mname,lname,dob,num,address,email,img) VALUES(
		'$fname','$mname','$lname','$DOB','$num','$address','$email','$img'
		)" ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add teacher". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}

	}


	public function getStudent(){

		//query 
		$sql = "SELECT students.id,students.fname,students.mname,students.lname,students.DOB,students.pnum,students.address,students.email,students.img,students.class_id,classes.name
				FROM students
				INNER JOIN classes
				ON students.class_id=classes.id ";
		//execute query
		$result = mysqli_query($this->con,$sql);
		        	if (mysqli_num_rows($result)>0){
		        		return $result;
		        	}else 
		        	{
		        		//echo "Failed to Retrieve data : ". mysqli_error($this->con);
		        		return false;
		        	}


	}



	public function getStaffs(){

		//query 
		$sql = "SELECT * FROM teachers ";
		//execute qery
		$result = mysqli_query($this->con,$sql);
		        	if (mysqli_num_rows($result)>0){
		        		return $result;
		        	}else 
		        	{
		        		//echo "Failed to Retrieve data : ". mysqli_error($this->con);
		        		return false;
		        	}


	}

	public function updateStudent($fname,$mname,$lname,$DOB,$pnum,$address,$email,$class,$id){
		//query
		$sql = "UPDATE students SET fname = '$fname', mname = '$mname', lname = '$lname', DOB = '$DOB', pnum = '$pnum', address = '$address', email = '$email', class_id = '$class' WHERE students.id = '$id' " ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add student". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}
	}

	public function updateTeachers($fname,$mname,$lname,$DOB,$num,$address,$email,$id){
		//query
		$sql = "UPDATE teachers SET fname = '$fname', mname = '$mname', lname = '$lname', DOB = '$DOB', num = '$num', address = '$address', email = '$email' WHERE teachers.id = '$id' " ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add student". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}
	}

	public function uploadsimage($img,$id){

		//query
		$sql = "UPDATE students SET img = '$img' WHERE students.id = '$id' " ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add student". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}
	}

	public function uploadtimage($img,$id){

		//query
		$sql = "UPDATE teachers SET img = '$img' WHERE teachers.id = '$id' " ;

		//execute query

		if(!mysqli_query($this->con, $sql)){
			//echo "Failed to add student". mysqli_error($this->con);
			return false;
		}else{
			return true;
		}
	}








}

 ?>