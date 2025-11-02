<?php
session_start();
if (!isset($_SESSION['emp_id'])) {
  header("Location: login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - HRMS</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Welcome, <?php echo $_SESSION['name']; ?> </h2>

  <div class="buttons">
    <a href="mark_attendance.php" class="btn">Mark Attendance</a>
    <a href="view_attendance.php" class="btn">View Attendance</a>
    <a href="logout.php" class="btn">Logout</a>
  </div>
</div>
</body>
</html>
