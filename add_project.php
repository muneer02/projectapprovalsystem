<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>
    <?php 
        include 'check_session.php';
        include 'navbar.html';

        $user = $_SESSION['user'];
        if($user['role'] != "STUDENT"){
            echo "<script>location.href = 'home.php';</script>";
            exit();
        }
        else if(!$user['group_id']){
            echo "<script>alert('Your must be assigned to a group before you upload a project.');</script>";
            echo "<script>location.href = 'home.php';</script>";    
            exit();
        }    
    ?>
    <div class="container">
        <h3 class="text-center">Add Project</h3><br /><br />
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="projectForm" enctype="multipart/form-data">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label col-md-2" for="title">Title</label>
                    <div class="col-md-3">
                        <input type="varchar" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>
                    <label class="control-label col-md-2" for="description">Description</label>
                    <div class="col-md-3">
                        <textarea class="form-control" rows="5" id="description" placeholder="Enter description" name="description"></textarea>

                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="guide">Guide</label>
                    <div class="col-md-3">
                        <select class="form-control" name="guide" id="guide">
                            <option value="">Select your Guide</option>
                            <?php
                            include 'connect.php';
                            $sql = "SELECT * FROM users WHERE role = 'TEACHER'";
                            $teachers = $conn->query($sql);

                            foreach ($teachers as $teacher) :
                                echo "<option value='" . $teacher["id"] . "'>" . $teacher["fullname"] . "</option>";
                            endforeach
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="department">Department</label>
                    <div class="col-md-3">
                        <select class="form-control" name="department" id="department">
                            <option value="">Select your department</option>
                            <option value="COMPUTER">Computer</option>
                            <option value="MECHANICAL">Mechanical</option>
                            <option value="ELECTRICAL">Electrical</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="guide">Session</label>
                    <div class="col-md-3">
                        <select class="form-control" name="session" id="session">
                            <option value="">Select Session</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="synopsis">Synopsis</label>
                    <div class="col-md-3">
                        <input type="file" accept="application/pdf" class="form-control" name="synopsis" id="synopsis">
                    </div>
                    <!-- <label class="control-label col-md-2" for="documentation">Documentation</label>
                    <div class="col-md-3">
                        <input type="file" accept="application/pdf" class="form-control" name="documentation" id="documentation">
                    </div> -->
                </div>
                <br>

                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary submit" name="submit" value="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- <div class="form-group">
            <div class="col-md-12 text-center strong">
                <span class='strong'>Already Registered?</span><button class="btn-link" onClick="logIn()">Go to Login</button>
            </div>
            <div class="col-md-12 text-center strong">
                <span class='strong'></span><button class="btn-link" onClick="back_home()">Back To Home Page</button>
            </div>
        </div> -->
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/formSubmit.js"></script>


    <!-- <script>
        function logIn() {
            window.location.assign("login.php")
        }
    </script>
    <script>
        function back_home() {
            window.location.assign("index.html");
        }
    </script> -->

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // session_start();

    include 'connect.php';

    $title = $description = $guide = $department = $session = $approved = $synopsisFile = "";
    //  $documentationFile  = "";

    if (isset($_POST["title"]) && test_input($_POST["title"]) != '') {
        $title = test_input($_POST["title"]);
    } else {
        die("Enter valid title");
    }

    if (isset($_POST["description"]) && test_input($_POST["description"]) != '') {
        $description = test_input($_POST["description"]);
    } else {
        die("Enter valid description");
    }

    if (isset($_POST["guide"]) && test_input($_POST["guide"]) != '') {
        $guide = test_input($_POST["guide"]);
    } else {
        die("Select guide");
    }

    if (isset($_POST["department"]) && test_input($_POST["department"]) != '') {
        $department = test_input($_POST["department"]);
    } else {
        die("Select department");
    }

    if (isset($_POST["session"]) && test_input($_POST["session"]) != '') {
        $session = test_input($_POST["session"]);
    } else {
        die("Select session");
    }

    $synopsisFile = upload_file("synopsis",$title);
    // $documentationFile = upload_file("documentation",$title);

    $group = $user['group_id'];

    $sql = "INSERT INTO projects (title, description, guide_id, group_id, department, session, synopsis, approved)
        VALUES ('$title', '$description', $guide, $group, '$department', '$session', '$synopsisFile', 0)";

    if ($conn->query($sql) === TRUE) {
        echo "Submission successful";
        // $_SESSION["title"] = $title;
        // $_SESSION["session"] = $session;
        // $_SESSION["description"] = $description;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        unlink($synopsisFile); //delete synopsis file from storage
        // unlink($documentationFile);  //delete documentation file from storage
    }

    $conn->close();
}

function upload_file($name, $title)
{

    if (($_FILES["$name"]["name"] != "")) {
        $target_dir = "files/".$name."/";
        $extension = strtolower(pathinfo(basename($_FILES["$name"]["name"]),PATHINFO_EXTENSION));

        $myFile = $target_dir.$title.' - '.uniqid().'.'.$extension;

        $file_type=$_FILES["$name"]['type'];

        if ($file_type!="application/pdf"){
            die("File type for ".$name." should be PDF");
        }    
        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($_FILES["$name"]["tmp_name"], $myFile)) {
                return $myFile;
            } else {
                die("Sorry, there was an error uploading your ".$name." file");
            }
        }
    }
    else{
        die("Select ".$name);
    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>