<?php include 'connect.php'; session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login - HRMS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Employee Login</h2>
  <form method="POST">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login</button>
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $sql = "SELECT * FROM employees WHERE email='$email' AND password='$pass'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['emp_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['name'] = $row['name'];

    header("Location: employee_dashboard.php");
    exit();
  } else {
    echo "<script>alert('Invalid credentials!');</script>";
  }
}
?>
