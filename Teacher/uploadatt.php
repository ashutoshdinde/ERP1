<?php

require 'C:\xampp\htdocs\ERP\phpspreadsheet\vendor\autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

function excelToDate($serial)
{
   
    $unixBase = 25569; 
    $unixDate = ($serial - $unixBase) * 86400; 

    return gmdate("Y-m-d", $unixDate);
}

function uploadAttendance($file)
{
    $spreadsheet = IOFactory::load($file['tmp_name']);
    $sheet = $spreadsheet->getActiveSheet();

   
    $host = 'localhost';
    $dbname = 'teacher';
    $username = 'root';
    $password = '';

   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    
    foreach ($sheet->getRowIterator(2) as $row) {
        $data = $row->getCellIterator();
        $record = [];
        foreach ($data as $cell) {
            $record[] = $cell->getValue();
        }


        $stud_id = $record[0];
        $division     =$record[1];
        $from_date = excelToDate($record[2]);
        $to_date = excelToDate($record[3]);
        $subject1 = $record[4];
        $subject2 = $record[5];
        $extra    = $record[6];
        $total = $record[7];

        $query = "INSERT INTO teacher.attendance (stud_id, division, from_date, to_date, subject1, subject2, extra, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$stud_id,$division, $from_date, $to_date, $subject1, $subject2,$extra, $total]);
    }

    echo "Attendance uploaded successfully.";
}


if (isset($_POST['submit1']) && isset($_FILES["file1"]) && $_FILES["file1"]["error"] == UPLOAD_ERR_OK) {

    $file = $_FILES["file1"];


    $file_info = pathinfo($file["name"]);
    if ($file_info["extension"] != "xlsx") {
        echo "Only .xlsx files are allowed.";
        exit;
    }


    uploadAttendance($file);
}

if (isset($_POST['submit2']) && isset($_FILES["file2"]) && $_FILES["file2"]["error"] == UPLOAD_ERR_OK) {

    $file = $_FILES["file2"];


    $file_info = pathinfo($file["name"]);
    if ($file_info["extension"] != "xlsx") {
        echo "Only .xlsx files are allowed.";
        exit;
    }


    uploadAttendance($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: navy;
            margin-top: 50px;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        button[type="submit"] {
            background-color: navy;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #001f3f;
        }
    </style>
</head>
<body>
    <h2>Upload Attendance</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <label for="file1">Select Attendance A xlxs:</label>
        <input type="file" name="file1" id="file1" accept=".xlsx">
        <button type="submit" name="submit1" value="Upload">Upload</button>
    </form> 

    <form action="#" method="post" enctype="multipart/form-data">
        <label for="file2">Select Attendance B xlxs:</label>
        <input type="file" name="file2" id="file2" accept=".xlsx">
        <button type="submit" name="submit2" value="Upload">Upload</button>
    </form>
</body>
</html>
