<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	include '../includes/session.php';

	if(isset($_POST['signup'])){
		$firstname = trim($_POST['firstname']);
		$lastname = trim($_POST['lastname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		// Store form data in session for repopulating form if needed
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;


		// Basic validation
		if(empty($firstname) || empty($lastname) || empty($username)|| empty($email) || empty($password) || empty($repassword)){
			$_SESSION['error'] = 'Please fill up all fields';
			header('location: signup.php');
			exit();
		}

		// Email validation
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$_SESSION['error'] = 'Invalid email format';
			header('location: signup.php');
			exit();
		}

		// Password validation
		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
			exit();
		}

		// Check if email already exists
		$conn = $pdo->open();
		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Email already taken';
			header('location: signup.php');
			exit();
		}

		// Check if username already exists
		$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE username=:username");
		$stmt->execute(['username'=>$username]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Username already taken';
			header('location: signup.php');
			exit();
		}

		try{
			// Hash password
			$password = password_hash($password, PASSWORD_DEFAULT);

			// Insert user
			$stmt = $conn->prepare("INSERT INTO users (email, password, firstname, lastname, username) VALUES (:email, :password, :firstname, :lastname, :username)");
			$stmt->execute([
				'email' => $email,
				'password' => $password,
				'firstname' => $firstname,
				'lastname' => $lastname,
				'username' => $username
			]);
			
			$userid = $conn->lastInsertId();

			// Clear session data
			unset($_SESSION['firstname']);
			unset($_SESSION['lastname']);
			unset($_SESSION['email']);
			unset($_SESSION['username']);

			$_SESSION['success'] = 'Account created successfully!';
			header('location: signup.php');
			exit();

		} catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
			header('location: signup.php');
			exit();
		}

		$pdo->close();
	} else {
		$_SESSION['error'] = 'Please fill up the signup form first';
		header('location: signup.php');
		exit();
	}
?> 