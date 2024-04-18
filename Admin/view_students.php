<?php
$adminServer = "localhost";
$adminUsername = "root";
$adminPassword = "";
$adminDatabase = "student";

$adminConnection = mysqli_connect($adminServer, $adminUsername, $adminPassword, $adminDatabase);

if (!$adminConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

$stmt = $adminConnection->prepare("SELECT photo, student_first_name, middle_name, last_name, admission_no, roll_no, branch, dob, gender, blood_group, adhar_no, address, email, phone_no, immediate_contact FROM student_info");
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<div class='student-info-container'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='student-info'>";
        echo "<img src='" . $row['photo'] . "' class='student-photo' alt='Student Photo'>";
        echo "<p>Student First Name: " . $row['student_first_name'] . "</p>";
        echo "<p>Student Middle Name: " . $row['middle_name'] . "</p>";
        echo "<p>Student Last Name: " . $row['last_name'] . "</p>";
        echo "<p>Admission No: " . $row['admission_no'] . "</p>";
        echo "Roll No: " . $row['roll_no'] . "<br>";
        echo "Branch: " . $row['branch'] . "<br>";
        echo "Date of Birth: " . $row['dob'] . "<br>";
        echo "Gender: " . $row['gender'] . "<br>";
        echo "Blood Group: " . $row['blood_group'] . "<br>";
        echo "Adhar Number: " . $row['adhar_no'] . "<br>";
        echo "Address: " . $row['address'] . "<br>";
        echo "Email: " . $row['email'] . "<br>";
        echo "Phone no: " . $row['phone_no'] . "<br>";
        echo "Immediate Contact: " . $row['immediate_contact'] . "<br>";        
        echo "</div>";
    }
    echo "</div>";
} else {
    echo "No students found";
}

$stmt->close();
mysqli_close($adminConnection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Information</title>
  <style>
    .student-info-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }

    .student-info {
        border: 1px solid #ccc;
        margin: 10px;
        padding: 10px;
        width: 300px;
        text-align: left;
    }

    .student-photo {
        max-width: 100%;
        height: auto;
    }
  </style>
</head>
<body>
</body>
</html>
