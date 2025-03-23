<?php
$con = new mysqli("localhost", "root", "", "project", 3307);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    // Admin Login
    if (isset($_POST['admeen'])) {
        $admin_email = "ayushibajajngr@gmail.com";
        $admin_password = "bajaj";

        if ($email == $admin_email && $password == $admin_password) {
            header("Location: ../admin.html");
            exit();
        } else {
            echo "Invalid Admin Credentials!";
        }
    }

    // New Customer Signup
    elseif (isset($_POST['newCust'])) {
        $sql = "INSERT INTO login (username, password) VALUES ('$email', '$password')";

        if ($con->query($sql) === TRUE) {
            echo "Signup successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }

    // Customer Login
    elseif (isset($_POST['custo'])) {
        $sql = "SELECT * FROM login WHERE email='$email' AND password='$password'";
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            header("Location: ../customer.html");
            exit();
        } else {
            echo "Invalid Customer Credentials!";
        }
    }
}

$con->close();
?>
