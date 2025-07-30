<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include '../includes/session.php';
require '../vendor/autoload.php';

if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=:email");
    $stmt->execute(['email'=>$email]);
    $row = $stmt->fetch();

    if ($row) {
        $token = bin2hex(random_bytes(32));
        $expire = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Save token and expiry to database
        $stmt = $conn->prepare("UPDATE users SET reset_token=:token, token_expire=:expire WHERE user_id=:user_id");
        $stmt->execute(['token' => $token, 'expire' => $expire, 'user_id' => $row['user_id']]);

		$resetLink = "http://localhost/e-commerce-Assignment-last/Public/reset_password.php?token=$token";

        $message = "
            <h2>Password Reset</h2>
            <p>Click the link below to reset your password:</p>
            <a href='$resetLink'>$resetLink</a>
            <p>This link will expire in 1 hour.</p>
        ";

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'hudakouli97@gmail.com';
            $mail->Password = '123';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('hudakouli97@gmail.com');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Reset your password';
            $mail->Body    = $message;

            $mail->send();
            $_SESSION['success'] = 'Password reset link sent to your email.';
        } catch (Exception $e) {
            $_SESSION['error'] = 'Mailer Error: '.$mail->ErrorInfo;
        }
    } else {
        $_SESSION['error'] = 'Email not found.';
    }

    $pdo->close();
} else {
    $_SESSION['error'] = 'Please enter your email.';
}
header('location: password_forgot.php');
?>
