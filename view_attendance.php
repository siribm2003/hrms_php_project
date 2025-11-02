<?php
include 'connect.php';
session_start();
if (!isset($_SESSION['emp_id'])) {
  header("Location: login.php");
  exit();
}

$emp_id = $_SESSION['emp_id'];
$sql = "SELECT * FROM attendance WHERE emp_id='$emp_id' ORDER BY date DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Attendance</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      color: black;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="container">
  <h2>Your Attendance Record</h2>
  <table>
    <tr><th>Date</th><th>Status</th></tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?php echo $row['date']; ?></td>
        <td><?php echo $row['status']; ?></td>
      </tr>
    <?php } ?>
  </table>
  <br>
  <a href="employee_dashboard.php" class="btn">Back to Dashboard</a>
</div>
</body>
</html>
