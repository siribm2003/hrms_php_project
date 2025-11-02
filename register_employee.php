<?php include 'connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register Employee</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Register Employee</h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="text" name="department" placeholder="Department" required><br>
    <select name="role">
      <option value="Employee">Employee</option>
      <option value="HR">HR</option>
    </select><br><br>
    <button type="submit" name="register">Register</button>
  </form>
</div>
</body>
</html>

<?php
if (isset($_POST['register'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $dept = $_POST['department'];
  $role = $_POST['role'];

  $sql = "INSERT INTO employees (name,email,password,department,role)
          VALUES ('$name','$email','$pass','$dept','$role')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Employee Registered Successfully'); window.location='login.php';</script>";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>
