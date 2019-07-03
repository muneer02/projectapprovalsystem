<?php
$id = $_GET['id'];

if ($id) {
    // Create connection
    include 'connect.php';

    $sql = "Select * from projects WHERE id=" . $id;
    $result = $conn->query($sql);
    if ($result->num_rows != 0) {
        $project = $result->fetch_assoc();
    }    
    else{
        header('Location: my_projects.php');
        exit();    
    }
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {

}
else{
    header('Location: my_projects.php');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Project</title>
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
    if ($user['role'] != "STUDENT") {
        echo "<script>location.href = 'home.php';</script>";
        exit();
    } else if (!$user['group_id']) {
        echo "<script>alert('Your must be assigned to a group before you upload a project.');</script>";
        echo "<script>location.href = 'home.php';</script>";
        exit();
    }
    ?>
    <div class="container">
        <h3 class="text-center">Update Project</h3><br /><br />
        <form class="form-horizontal" action="update_project?id=<?php echo $id; ?>" method="post" id="updateProjectForm" enctype="multipart/form-data">

        <input type="text" name="id" value="<?php echo $id; ?>" hidden>
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label col-md-2" for="title">Title</label>
                    <div class="col-md-3">
                        <input type="varchar" class="form-control" id="title" placeholder="Enter title" name="title" value=<?php echo '"'.$project["title"].'"'; ?>>
                    </div>
                    <label class="control-label col-md-2" for="description">Description</label>
                    <div class="col-md-3">
                        <textarea class="form-control" rows="5" id="description" placeholder="Enter description" name="description"><?php echo $project["description"]; ?></textarea>

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
                                $selected = '';
                                if($project['guide_id']==$teacher['id']){
                                    $selected = 'selected';
                                }
                                echo "<option value='" . $teacher["id"] ."'".$selected."  >" . $teacher["fullname"] . "</option>";
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
                            <option value="COMPUTER" <?php if($project['department']=="COMPUTER") {echo "selected";}?>>Computer</option>
                            <option value="MECHANICAL" <?php if($project['department']=="MECHANICAL") {echo "selected";}?>>Mechanical</option>
                            <option value="ELECTRICAL" <?php if($project['department']=="ELECTRICAL") {echo "selected";}?>>Electrical</option>
                        </select>
                    </div>
                    <label class="control-label col-md-2" for="guide">Session</label>
                    <div class="col-md-3">
                        <select class="form-control" name="session" id="session">
                            <option value="">Select Session</option>
                            <option value="2012" <?php if($project['session']=="2012") {echo "selected";}?>>2012</option>
                            <option value="2013" <?php if($project['session']=="2013") {echo "selected";}?>>2013</option>
                            <option value="2014" <?php if($project['session']=="2014") {echo "selected";}?>>2014</option>
                            <option value="2015" <?php if($project['session']=="2015") {echo "selected";}?>>2015</option>
                            <option value="2016" <?php if($project['session']=="2016") {echo "selected";}?>>2016</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-2" for="synopsis">Synopsis</label>
                    <div class="col-md-3">
                        <input type="file" accept="application/pdf" class="form-control" name="synopsis" id="synopsis" value=<?php echo ($project["synopsis"]); ?>>
                    </div>
                    <?php
                        if($project['approved']){
                    ?>
                    <label class="control-label col-md-2" for="documentation">Documentation</label>
                        <div class="col-md-3">
                            <input type="file" accept="application/pdf" class="form-control" name="documentation" id="documentation" value=<?php echo ($project["documentation"]); ?>>
                        </div>
                        <?php }?>
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


    $title = $description = $guide = $department = $session = $approved = $synopsisFile = $documentationFile  = "";

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

    $synopsisFile = upload_file("synopsis", $title,$project);
    if($project['approved']){
        $documentationFile = upload_file("documentation",$title, $project);
    }
    $group = $user['group_id'];

    if(!$synopsisFile){
        $synopsisFile = $project['synopsis'];
    }
    if(!$documentationFile){
        $documentationFile = $project['documentation'];
    }

    $sql = "UPDATE projects SET title = '$title', description='$description', guide_id=$guide, group_id=$group,
     department='$department', session='$session', synopsis='$synopsisFile', documentation = '$documentationFile' 
     WHERE id =".$project['id'];

    if ($conn->query($sql) === TRUE) {
        echo "Submission successful";
        // $_SESSION["title"] = $title;
        // $_SESSION["session"] = $session;
        // $_SESSION["description"] = $description;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        unlink($synopsisFile); //delete synopsis file from storage
        unlink($documentationFile);  //delete documentation file from storage
    }

    $conn->close();
}

function upload_file($name, $title,$project)
{

    if (($_FILES["$name"]["name"] != "")) {
        $target_dir = "files/" . $name . "/";
        $extension = strtolower(pathinfo(basename($_FILES["$name"]["name"]), PATHINFO_EXTENSION));

        $myFile = $target_dir . $title . ' - ' . uniqid() . '.' . $extension;

        $file_type = $_FILES["$name"]['type'];

        if ($file_type != "application/pdf") {
            die("File type for " . $name . " should be PDF");
        }
        // if everything is ok, try to upload file
        else {
            if (move_uploaded_file($_FILES["$name"]["tmp_name"], $myFile)) {
                unlink($project["$name"]);
                return $myFile;
            } else {
                die("Sorry, there was an error uploading your " . $name . " file");
            }
        }
    } 
    
    // else if($name=='documentation'){
    //     //don't hold him up
    // }
    // else {
    //     die("Select " . $name);
    // }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>