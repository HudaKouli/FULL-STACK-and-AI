<?php
include '../includes/session.php';

if (isset($_POST['save'])) {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if ($password != $confirm) {
        $_SESSION['error'] = 'Passwords do not match.';
        header("location: reset_password.php?token=$token");
        exit();
    }

    $conn = $pdo->open();
    $stmt = $conn->prepare("SELECT * FROM users WHERE reset_token=:token AND token_expire > NOW()");
    $stmt->execute(['token'=>$token]);
    $user = $stmt->fetch();

    if ($user) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET password=:password, reset_token=NULL, token_expire=NULL WHERE id=:id");
        $stmt->execute(['password'=>$hashed, 'id'=>$user['id']]);
        $_SESSION['success'] = 'Password updated. You can now log in.';
    } else {
        $_SESSION['error'] = 'Invalid or expired token.';
    }

    $pdo->close();
    header('location: login.php');
}
?>
