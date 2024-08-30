<?php
  // MySQL Database connection
  $host = getenv('JAWSDB_URL'); // From Heroku environment
  $db_user = 'your_db_user';
  $db_password = 'your_db_password';
  $db_name = 'your_db_name';

  $conn = new mysqli($host, $db_user, $db_password, $db_name);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Fetch form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $course = $_POST['course'];

  // Insert data into the database
  $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
  
  if ($conn->query($sql) === TRUE) {
    // Redirect to thank you page
    header("Location: https://your-github-username.github.io/your-repository-name/thankyou.html");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close connection
  $conn->close();
?>
