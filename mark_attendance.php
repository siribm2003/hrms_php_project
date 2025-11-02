<?php
include('connect.php');
session_start();

if (!isset($_SESSION['emp_id'])) {
  header("Location: login.php");
  exit();
}

if (isset($_POST['mark'])) {
  $emp_id = $_SESSION['emp_id'];
  $date = date('Y-m-d');
  $status = $_POST['status']; // Present or Absent

  // Check if already marked
  $check = mysqli_query($conn, "SELECT * FROM attendance WHERE emp_id='$emp_id' AND date='$date'");
  if (mysqli_num_rows($check) > 0) {
    echo "<script>alert('Attendance already marked for today!');</script>";
  } else {
    $sql = "INSERT INTO attendance(emp_id, date, status) VALUES('$emp_id', '$date', '$status')";
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Attendance marked successfully!');</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Mark Attendance</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Mark Attendance</h2>
    <form method="post">
      <label>Status:</label><br>
      <select name="status" required>
        <option value="">-- Select --</option>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
      </select><br><br>
      <button type="submit" name="mark">Submit</button>
    </form>
  </div>
</body>
</html>

