<?php
  // Database connection
  $host = getenv('JAWSDB_URL'); // From Heroku environment
  $db_user = 'your_db_user';
  $db_password = 'your_db_password';
  $db_name = 'your_db_name';

  $conn = new mysqli($host, $db_user, $db_password, $db_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch student records
  $result = $conn->query("SELECT * FROM students");

  echo "<h1>Student Registrations</h1>";
  echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th></tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["course"] . "</td></tr>";
  }

  echo "</table>";

  // Close connection
  $conn->close();
?>
