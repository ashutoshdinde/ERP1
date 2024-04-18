<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form {
            padding: 20px;
        }

        .inputfield {
            margin-bottom: 20px;
        }

        .inputfield label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .inputfield input[type="text"],
        .inputfield input[type="email"],
        .inputfield input[type="tel"],
        .inputfield input[type="file"],
        .inputfield select,
        .inputfield textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        .inputfield input[type="file"] {
            margin-top: 0;
        }

        .inputfield label[for="file"] {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .inputfield textarea {
            height: 100px;
            resize: vertical;
        }

        .inputfield label[for="radio"] {
            margin-right: 10px;
        }

        .terms {
            display: flex;
            align-items: center;
        }

        .terms p {
            margin-left: 5px;
            font-size: 14px;
            color: #666;
        }

        .btns {
            display: flex;
            justify-content: space-between;
        }

        .btns button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
        }

        .btns button[type="submit"] {
            background-color: #007bff;
        }

        .btns button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .btns button[type="reset"] {
            background-color: #ccc;
        }

        .btns button[type="reset"]:hover {
            background-color: #999;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <form action="student_registration_php.php" method="POST" enctype="multipart/form-data">
        <div class="title">My Profile</div>
        <div class="form">
            <div class="inputfield">
                <label>Upload Photo</label>
                <p id="file-size">*Max size 100kb.</p>
                <input type="file" name="photo" accept=".jpeg, .jpg, .png" id="myfile" placeholder="Upload your photo" rows="7" required />
            </div>
            <div class="inputfield">
          <label>First Name</label>
          <input type="text" class="input" id="name" name="student_first_name" placeholder="Enter first name" maxlength="30"
            title="Enter only alphabets" required>
        </div>
       

        <div class="inputfield">
            <label>Middle Name</label>
            <input type="text" class="input" id="name" name="middle_name" placeholder="Enter Middle name" maxlength="30"
               title="Enter only alphabets" required>
          </div>

        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" class="input" id="name" name="last_name" placeholder="Enter last name" maxlength="30"
            title="Enter only alphabets" required>
        </div>
     

        <div class="inputfield">
          <label>Division</label>
          <input type="text" class="input" id="division" name="division" placeholder="Enter your Division" maxlength="30"
            title="Enter only alphabets" required>
        </div>

        <div class="inputfield" id="gender">
          <label for="">Gender</label>
          <input type="radio" name="gender" id="radio" value="Male">Male
          <input type="radio" name="gender" id="radio" value="Female">Female
          <input type="radio" name="gender" id="radio" value="Female">Other
        </div>

        <div class="inputfield">
          <label for="">Roll no</label>
          <input type="text" class="input" name="roll_no" placeholder="Enter your roll no" maxlength="10000" 
            required placeholder="Enter your roll no" title="Enter numbers only">
        </div>

        <div class="inputfield">
            <label for="">Blood group</label>
            <input type="text" class="input" name="blood_group" placeholder="Enter your blood group" maxlength="15" 
              required placeholder="Enter your blood group" title="Enter String and characters">
          </div>

        <div class="inputfield">
          <label for="">Date of Birth</label>
          <input type="date" class="input" name="dob" required>
        </div>

        <div class="inputfield">
          <label>Email Address</label>
          <input type="email" class="input" name="email" placeholder="Enter your email"
             required>
        </div>

        <div class="inputfield">
            <label for="">Student ID</label>
            <input type="text" class="input" name="stud_id" placeholder="Enter your Student ID" maxlength="10000" 
              required placeholder="Enter your roll no" title="Enter numbers only">
          </div>

          <div class="inputfield">
            <label for="">Admission number</label>
            <input type="text" class="input" name="admission_no" placeholder="Enter Admission no. eg C00*" maxlength="10000" 
              required placeholder="Enter your Admission number" title="Enter numbers only">
          </div>
   
        <p id="message"></p>

        <div class="inputfield">
          <label for="">Phone Number</label>
          <div class="custom-select" name="phone_no" id="phone-codes">
            <select id="phone-code">
              <option value="+91">+91</option>
            </select>
          </div>

          <input type="tel" class="input" name="phone_no" maxlength="10" id="phone-number"
            placeholder="Enter your phone number"  title="Please enter valid phone number">
        </div>

        <div class="inputfield">
            <label for="">Immediate Contact Number</label>
            <div class="custom-select" id="phone-codes">
              <select id="phone-code">
                <option value="+91">+91</option>
              </select>
            </div>
  
            <input type="tel" class="input" name="immediate_contact" maxlength="10" id="phone-number"
              placeholder="Enter your immmediate number"  title="Please enter valid phone number">
          </div>

        <div class="inputfield">
            <label for="">Aadhar no. </label>
            <input type="text" class="input" name="adhar_no" placeholder="Enter your Aadhar no" maxlength="10000" 
              required placeholder="Enter Aadhar no" title="Enter numbers only">
          </div>

        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" name="address"  cols="30" rows="5" placeholder="Enter your address"
             maxlength="100" required></textarea>
        </div>

        <div class="inputfield">
          <label>Branch</label>
          <div class="custom_select">
            <select id="state" name="branch" required>
              <option value="">--Select your Branch--</option>
              <option value="Computer science">Computer science</option>
              <option value="Mechanical">Mechanical</option>
              <option value="Civil">Civil</option>
              <option value="AI and DS">AI and DS</option>
              <option value="E&TC">E&TC</option>
          
             
            </select>
          </div>
        </div>

       

        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox" name="check" value="Declared" required>
            <span class="checkmark"></span>
          </label>
          <p>I hereby declare that the above information provided is true and correct.</p>
        </div>

        <div class="inputfield" required>
          <div data-netlify-recaptcha="true"></div>
        </div>
            <!-- Other input fields go here -->
            <div class="inputfield btns" id="btn">
                <button type="submit" value="Register">Register</button>
                <button type="reset" value="Reset">Reset</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $photo = $_FILES['photo']['name'];
    $student_first_name = $_POST['student_first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $division = $_POST['division'];
    $gender = $_POST['gender'];
    $roll_no = $_POST['roll_no'];
    $blood_group = $_POST['blood_group'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $stud_id = $_POST['stud_id'];
    $admission_no = $_POST['admission_no'];
    $immediate_contact = $_POST['immediate_contact'];
    $adhar_no = $_POST['adhar_no'];
    $phone_no = $_POST['phone_no'];
    $branch = $_POST['branch'];
    $address = $_POST['address'];

    $conn = new mysqli('localhost', 'root', '', 'student');
    if ($conn->connect_error) {
        die('Connection Failed :' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO student_info (photo, student_first_name, middle_name, last_name,division, gender, roll_no, blood_group, dob, email, stud_id, admission_no, immediate_contact, adhar_no, phone_no, branch, address) VALUES (?, ?, ? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssisssssssss", $photo, $student_first_name, $middle_name, $last_name, $division,$gender, $roll_no, $blood_group, $dob, $email, $stud_id, $admission_no, $immediate_contact, $adhar_no, $phone_no, $branch, $address);

        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $conn->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>
