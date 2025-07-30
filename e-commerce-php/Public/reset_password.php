<?php
include '../includes/session.php';
$token = $_GET['token'] ?? '';

$conn = $pdo->open();
$stmt = $conn->prepare("SELECT * FROM users WHERE reset_token=:token AND token_expire > NOW()");
$stmt->execute(['token'=>$token]);
$user = $stmt->fetch();
$pdo->close();

if (!$user) {
    $_SESSION['error'] = 'Invalid or expired token.';
    header('location: login.php');
    exit();
}
?>

<form action="reset_save.php" method="POST">
  <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
  <input type="password" name="password" placeholder="New Password" required>
  <input type="password" name="confirm" placeholder="Confirm Password" required>
  <button type="submit" name="save">Reset Password</button>
</form>
