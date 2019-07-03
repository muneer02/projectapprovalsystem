<?php
session_start();
if(isset($_SESSION['user'])){
    header('Location: home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Registration - Project Approval System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

    <div class="container">
        <h3 class="text-center">Registration Page</h3><br /><br />
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="regForm">
            <div class="col-md-12">

                <div class="form-group">
                    <label class="control-label col-md-2" for="fullname">Candidate Name</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="fullname" placeholder="Enter full name" name="fullname">
                    </div>
                    <label class="control-label col-md-2" for="dob">D.O.B</label>
                    <div class="col-md-3">
                        <input type="date" class="form-control" id="dob" name="dob">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="address">Address</label>
                    <div class="col-md-3">
                        <textarea class="form-control" rows="5" id="address" placeholder="Enter address" name="address"></textarea>
                    </div>
                    <label class="control-label col-md-2" for="male">Gender</label>
                    <div class="col-md-3">
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="male" value="M">Male
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="female" value="F">Female
                        </label><br>
                        <label class="radio-inline">
                            <input type="radio" name="gender" id="other" value="O">Other
                        </label><br>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="email">E-mail</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="email" placeholder="Enter e-mail" name="email" placeholder="Enter e-mail">
                    </div>
                    <label class="control-label col-md-2" for="department">Department</label>
                    <div class="col-md-3">
                        <select class="form-control" name="department" id="department">
                            <option value="">Select your department</option>
                            <option value="COMPUTER">Computer</option>
                            <option value="MECHANICAL">Mechanical</option>
                            <option value="ELECTRICAL">Electrical</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="semester">Semester <br>(for students only)</label>
                    <div class="col-md-3">
                        <select class="form-control" name="semester" id="semester">
                            <option value="">Select your semester</option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="5">5th</option>
                            <option value="6">6th</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="registration_no">Registration No. <br>(for students only)</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="registration_no" name="registration_no" placeholder="Enter registration number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="role">Role</label>
                    <div class="col-md-3">
                        <select class="form-control" name="role" id="role">
                            <option value="">Select your role</option>
                            <option value="HOD">HOD</option>
                            <option value="TEACHER">Teacher</option>
                            <option value="STUDENT">Student</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="mobile">Mobile No.</label>
                    <div class="col-md-3">
                        <input type="tel" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter 10 digit mobile no" pattern="[0-9]{10}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="password">Password</label>
                    <div class="col-md-3">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                    </div>
                    <label class="control-label col-md-2" for="confirm_password">Confirm Password</label>
                    <div class="col-md-3">
                        <input type="password" class="form-control" id="confirm_password" placeholder="Enter password" name="confirm_password">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary submit" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="form-group">
            <div class="col-md-12 text-center strong">
                <span class='strong'>Already Registered?</span><button class="btn-link"><a href="login.php">Go to Login</a></button>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/formSubmit.js"></script>

</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // session_start();

    include 'connect.php';

    $fullname = $dob = $address = $gender = $email = $department = $semester = $registration_no = $role = $mobile = $password = $confirm_password = $approved = "";

    if (isset($_POST["fullname"]) && test_input($_POST["fullname"]) != '') {
        $fullname = test_input($_POST["fullname"]);
    } else {
        die("Enter valid name");
    }

    if (isset($_POST["dob"]) && test_input($_POST["dob"]) != '') {
        $dob = test_input($_POST["dob"]);
        $date = date('d-M-Y');
    } else {
        die("Enter valid dob");
    }

    if (isset($_POST["address"]) && test_input($_POST["address"]) != '') {
        $address = test_input($_POST["address"]);
    } else {
        die("Enter valid address");
    }

    if (isset($_POST["gender"]) && test_input($_POST["gender"]) != '') {
        $gender = test_input($_POST["gender"]);
    } else {
        die("Select gender");
    }

    if (filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email = test_input($_POST["email"]);
    } else {
        die("Enter valid email");
    }

    if (isset($_POST["department"]) && test_input($_POST["department"]) != '') {
        $department = test_input($_POST["department"]);
    } else {
        die("Select department");
    }

    if (isset($_POST["role"]) && test_input($_POST["role"]) != '') {
        $role = test_input($_POST["role"]);
    } else {
        die("Select role");
    }

    if (isset($_POST["mobile"]) && test_input($_POST["mobile"]) != '' && preg_match('/^[0-9]{10}+$/', $_POST["mobile"])) {
        $mobile = test_input($_POST["mobile"]);
    } else {
        die("Enter valid 10-digit mobile number");
    }

    if ($role == "STUDENT") {
        if (isset($_POST["semester"]) && test_input($_POST["semester"]) != '') {
            $semester = test_input($_POST["semester"]);
        } else {
            die("Select semester");
        }

        if (isset($_POST["registration_no"]) && test_input($_POST["registration_no"]) != '') {
            $registration_no = test_input($_POST["registration_no"]);
        } else {
            die("Enter valid registration number");
        }
        $approved = 1;
    } else {
        $semester = $registration_no = null;
        $approved = 0;
    }


    if (isset($_POST["password"]) && test_input($_POST["password"]) != '') {
        $password = test_input($_POST["password"]);
        if (strlen($password) < 6) {
            die("Password should contain atleast 6 characters");
        }
    } else {
        die("Enter valid password");
    }
    if (isset($_POST["confirm_password"]) && test_input($_POST["confirm_password"]) != '') {
        $confirm_password = test_input($_POST["confirm_password"]);
        if ($password != $confirm_password) {
            die("Passwords don't match");
        }
        $password = md5($password);
    } else {
        die("Passwords don't match");
    }



    $sql = "INSERT INTO users (fullname, dob, address, gender, email, department, role, mobile, semester, registration_no, password, approved)
        VALUES ('$fullname', '$dob', '$address', '$gender', '$email', '$department', '$role', $mobile, '$semester', '$registration_no', '$password', $approved)";

    if ($conn->query($sql) === TRUE) {


        $_SESSION["fullname"] = $fullname;
        $_SESSION["email"] = $email;
        $_SESSION["mobile"] = $mobile;
        $_SESSION["dob"] = $dob;
        echo "You have been successfully registered.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>