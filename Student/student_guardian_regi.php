<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['stud_id'], $_POST['father_name'], $_POST['f_email'], $_POST['f_phone'], $_POST['f_address'], $_POST['f_occupation'], $_POST['mother_name'], $_POST['m_email'], $_POST['m_phone'], $_POST['m_address'], $_POST['m_occupation'])) {

        $stud_id = $_POST['stud_id'];
        $father_name = $_POST['father_name'];
        $father_email = $_POST['f_email'];
        $father_phone = $_POST['f_phone'];
        $father_address = $_POST['f_address'];
        $father_occupation = $_POST['f_occupation'];

        $mother_name = $_POST['mother_name'];
        $mother_email = $_POST['m_email'];
        $mother_phone = $_POST['m_phone'];
        $mother_address = $_POST['m_address'];
        $mother_occupation = $_POST['m_occupation'];

        $con = new mysqli('localhost', 'root', '', 'student');
        if ($con->connect_error) {
            die('Connection Failed :' . $con->connect_error);
        } else {
            $stmt = $con->prepare("INSERT INTO guardian_info(stud_id, father_name, f_email, f_phone, f_address, f_occupation, mother_name, m_email, m_phone, m_address, m_occupation)
                           VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            if (!$stmt) {
                die('Prepare Error: ' . $con->error);
            }

            $stmt->bind_param("sssssssssss", $stud_id, $father_name, $father_email, $father_phone, $father_address, $father_occupation, $mother_name, $mother_email, $mother_phone, $mother_address, $mother_occupation);

            if (!$stmt->execute()) {
                echo 'Wrong Student id';
            } else {
                echo "Registration successful";
            }

            $stmt->close();
            $con->close();
        }
    } else {
        echo "Please fill in all the required fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>

        body,
        h1,
        h2,
        h3,
        p,
        ul,
        li {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .wrapper {
            background-color: #3498db;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
        }

        .inputfield {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #000000;
        }

        .input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }


        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        form button {
            background-color: #b2d8f5;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        form button:hover {
            background-color: #2980b9;
        }

      
        .inputfield:not(:last-child) {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="title">Guardians details</div>
    </div>

    <form action="guardian_registration_php.php" method="post">

        <label>Student_id</label>
        <input type="text" class="input" id="stud_id" name="stud_id" placeholder="Enter your student_id" maxlength="50">

        <label>Father's Name</label>
        <input type="text" class="input" id="name" name="father_name" placeholder="Enter your Fathers name" maxlength="50">

        <label>Father's Email</label>
        <input type="text" class="input" id="name" name="f_email" placeholder="Enter your Fathers email" maxlength="50">

        <label>Father's phone-number</label>
        <input type="tel" class="input" name="f_phone" maxlength="10" id="phone-number" placeholder="Enter your immmediate number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number">

        <label>Address</label>
        <textarea class="textarea" name="f_address" id="" cols="30" rows="5" placeholder="Enter address" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100"></textarea>

        <label>Father's Occupation</label>
        <input type="text" class="input" id="name" name="f_occupation" placeholder="Enter your Fathers occupation" maxlength="50">



        <label>Mother's Name</label>
        <input type="text" class="input" id="name" name="mother_name" placeholder="Enter your mothers name" maxlength="50">

        <label>Mother's Email</label>
        <input type="text" class="input" id="name" name="m_email" placeholder="Enter your mothers email" maxlength="50">

        <label>Mother's phone-number</label>
        <input type="tel" class="input" name="m_phone" maxlength="10" id="phone-number" placeholder="Enter your mothers number" pattern="[7-9]{1}[0-9]{9}" title="Please enter valid phone number">

        <label>Address</label>
        <textarea class="textarea" name="m_address" id="" cols="30" rows="5" placeholder="Enter address" pattern="^[a-zA-Z][a-zA-Z0-9-_.]{5,12}$" maxlength="100"></textarea>

        <label>Mothers's Occupation</label>
        <input type="text" class="input" id="name" name="m_occupation" placeholder="Enter your mothers occupation" maxlength="50">

        <div class="inputfield terms">
            <label class="check">
                <input type="checkbox" name="check" value="Declared">
                <span class="checkmark"></span>
            </label>
            <p>I hereby declare that the above information provided is true and correct.</p>
        </div>

        <div class="inputfield" >
            <div data-netlify-recaptcha="true"></div>
        </div>

        <div class="inputfield btns" id="btn">
            <button type="submit" value="Register" class="btn" >Register</button>
            <button type="reset" value="Reset" class="btn">Reset</button>
        </div>


    </form>
</body>

</html>
