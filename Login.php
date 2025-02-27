<?php
session_start();
$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'fristdb';

// Create a connection 
$conn = mysqli_connect($server, $user, $password, $dbname);
if (!$conn) die("Connection failed: " . mysqli_connect_error());

// Check if form data is received
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    die("Missing email or password!");
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = $_POST['password'];

// Check if table exists
$table_check = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
if (mysqli_num_rows($table_check) == 0) {
    die("Error: Table 'users' does not exist!");
}

// Get hashed password from DB
$sql = "SELECT Password FROM users WHERE Email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);

if ($row && password_verify($pass, $row['Password'])) {
    $_SESSION['user'] = $email;
    echo "Login successful!";
} else {
    echo "Invalid username or password!";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
