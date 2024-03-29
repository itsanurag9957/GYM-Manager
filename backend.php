<?php
session_start();
include 'email.php';
// Replace these variables with your actual database credentials
$host = 'localhost';
$dbname = 'mydb';
$username = 'postgres';
$password_db = 'anurag';

// Establish a connection to the database using PDO
try {
  $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password_db);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Retrieve the values submitted by the registration form
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$age = $_POST['age'];

// Check if the email already exists in the database
$sql = "SELECT * FROM userdetail WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);

if($stmt->rowCount() > 0) {
  // The email already exists in the database, redirect to the login page
  header("Location: loginexist.html");
  exit();
} else {
  // The email is not present in the database, send a 6 digit otp to users email using sendemail() userdefined function
  $random_number = mt_rand(100000,999999);
  $otp = $random_number;
  $server = $random_number;
  sendemail($email,$server);

  $_SESSION['otp'] = $otp;
  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['password'] = $password;
  $_SESSION['age'] = $age;


  header("Location: otp.html");
}
?>

<!-- $sql = "INSERT INTO userdetail (name, email, password, age) VALUES (?, ?, ?, ?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $email, $password, $age]);