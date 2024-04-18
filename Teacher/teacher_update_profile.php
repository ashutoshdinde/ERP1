<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Update Form</title>
</head>
<body>

<form method="post" action="teacher_update_profile.php">
    <label for="phone_no">Mobile:</label>
    <input type="text" id="phone_no" name="phone_no" >

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" >

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" >
    
    <input type="submit" value="Update">
</form>

</body>
</html>
<?php
session_start();

$adminServer = "localhost";
$adminUsername = "root";
$adminPassword = "";
$adminDatabase = "student";

$adminConnection = mysqli_connect($adminServer, $adminUsername, $adminPassword, $adminDatabase);

if (!$adminConnection) {
    die("Connection to the admin database failed due to" . mysqli_connect_error());
}

if (isset($_SESSION['stud_id'])) {

    $studID = $_SESSION['stud_id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $email = $_POST['email'];
        $phone_no = $_POST['phone_no'];
        $address = $_POST['address'];

        $updateQuery = "UPDATE student_info SET email = ?, phone_no = ?, address = ? WHERE stud_id = ?";
        $stmt = $adminConnection->prepare($updateQuery);
        $stmt->bind_param("ssss", $email, $phone_no, $address, $studID);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    }
}

mysqli_close($adminConnection);
?>
