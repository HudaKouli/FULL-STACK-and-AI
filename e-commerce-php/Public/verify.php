<?php
	include '../includes/session.php';
	$conn = $pdo->open();

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $row = $stmt->fetch();

        if($stmt->rowCount() > 0){
            if(password_verify($password, $row['password'])){
                if($row['type']){
                    $_SESSION['admin'] = $row['id'];
                    header('location: ../admin/home.php');
                    exit();
                } else {
                    $_SESSION['user'] = $row['id'];
                    header('location: user_index.php');
                    exit();
                }
            } else {
                $_SESSION['error'] = 'Incorrect Password';
                header('location: login.php');
            }
        } else {
            $_SESSION['error'] = 'Email not found';
            header('location: login.php');
        }
    } catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
    }
} else {
    $_SESSION['error'] = 'Input login credentials first';
    header('location: login.php');
}

$pdo->close();
