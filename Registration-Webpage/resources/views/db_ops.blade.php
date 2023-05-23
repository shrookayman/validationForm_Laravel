
<?php
session_start();

// Include the database connection configuration
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registrationform_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
include 'upload.php';
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $fullname =   $_POST['fullname'];
    $username = $_POST['username'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $imageName = $_POST['imageName'];
    $email = $_POST['email'];

    // Check if the username already exists in the database
    $stmt = $conn->prepare("SELECT * FROM userdata WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {   
        $_SESSION['error'] = "Username already exists. Please choose another username.";
    } 
    else {
        // Insert the new user data into the database
        $stmt = $conn->prepare("INSERT INTO userdata (fullname,username,birthdate,phone,address,password,imageName,email) VALUES (?, ?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $fullname, $username, $birthdate, $phone, $address, $password, $_FILES['imageName']['name'], $email);
        $stmt->execute();

        $_SESSION['success'] = "Registration successful!";
    }

    // Redirect to the HTML page
    header('Location: index.php');
    exit();
}
?>
<script src="../js/clientSideValidation.js"></script>