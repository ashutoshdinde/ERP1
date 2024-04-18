<?php

session_start();


$adminServer = "localhost";
$adminUsername = "root";
$adminPassword = "";
$adminDatabase = "admin"; 


$adminConnection = mysqli_connect($adminServer, $adminUsername, $adminPassword, $adminDatabase);


if (!$adminConnection) {
    die("Connection to the admin database failed due to" . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studID = $_POST['username'];
    $enteredPassword = $_POST['password'];


    $stmt = $adminConnection->prepare("SELECT password FROM `student_idpass` WHERE `stud_id` = ?");
    $stmt->bind_param("s", $studID);

    $stmt->execute();


    $stmt->bind_result($storedPassword);


    $stmt->fetch();


    if ($enteredPassword == $storedPassword) {
        
        $_SESSION['stud_id'] = $studID;

       
        header("Location: Student_home.html");
        exit(); 
    } else {
     
        echo "Invalid credentials. Please try again.";
    }


    $stmt->close();
}


mysqli_close($adminConnection);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .login-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 400px;
            text-align: left;
            padding: 20px;
        }

        .login-header {
            color: rgb(85, 84, 84);
            padding: 15px;
            text-align: center;
        }

        form {
            padding: 20px;
            box-sizing: border-box;
            text-align: left;
        }

        input {
            width: calc(100% - 11px);
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
        }

        button {
            background-color: navy;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
</head>
<body>
<div class="login-container">
    <div class="login-header">
        <h2>Student</h2>
        <h3>Sign Into Your Account</h3>
    </div>
    <form action="Student.php" method="post" class="container"  >
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="name" placeholder="Enter your name" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="pwd" placeholder="Enter your password" required><br><br>
        <button class="btn" type="submit">Submit</button> 
    </form>
</div>
</body>
</html>
