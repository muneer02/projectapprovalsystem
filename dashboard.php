<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

    <div class="container">
        <h3 class="text-center">Dashboard</h3><br /><br />
        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="regForm" enctype="multipart/form-data">
            <div class="col-md-12">

                <div class="form-group">
                    <label class="control-label col-md-2" for="title">Title</label>
                    <div class="col-md-3">
                        <input type="varchar" class="form-control" id="title" placeholder="Enter title" name="title">
                    </div>
                    <label class="control-label col-md-2" for="discription">Discription</label>
                    <div class="col-md-3">
                    <textarea class="form-control" rows="5" id="discription" placeholder="Enter discription" name="discription"></textarea>
                        
                    </div>
                </div> 

                
                <div class="form-group">
                <label class="control-label col-md-2" for="guide">Guide</label>
                    <div class="col-md-3">
                        <select class="form-control" name="guide" id="guide">
                            <option value="">Select your Guide</option>
                            <option value="HOD">HOD</option>
                            <option value="TEACHER">Teacher</option>
                            <option value="STUDENT">Student</option>
                        </select>
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
                    <label class="control-label col-md-2" for="guide">Session</label>
                    <div class="col-md-3">
                        <select class="form-control" name="session" id="session">
                            <option value="">Select Session</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                        </select>
                    </div>
                   
                </div>

                <div class="form-group" >
                    <label class="control-label col-md-2" for="synopsis">synopsis</label>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="synopsis" id="synopsis">
                
                    </div>
                    <label class="control-label col-md-2" for="documentation">Documentation</label>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="documentation" id="documentation">
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
                <span class='strong'>Already Registered?</span><button class="btn-link" onClick="logIn()">Go to Login</button>
            </div>
            <div class="col-md-12 text-center strong">
        <span class='strong'></span><button class="btn-link" onClick="back_home()">Back To Home Page</button>
      </div>  
        </div>
    </div>

    
    <script src="assets/js/bootstrap.min.js"></script>

   

    <script>
        function logIn() {
            window.location.assign("login.php")
        }
    </script>
     <script>
    function back_home() {
      window.location.assign("index.html");
    }
  </script>

</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // session_start();

    include 'connect.php';

    $title = $discription = $guide = $department = $session = $approved = $synopsisfile = $documentationfile  = "";

    if (isset($_POST["title"]) && test_input($_POST["title"]) != '') {
        $title = test_input($_POST["title"]);
    } else {
        die("Enter valid title");
    }

    if (isset($_POST["discription"]) && test_input($_POST["discription"]) != '') {
        $discription = test_input($_POST["discription"]);
    } else {
        die("Enter valid discription");
    }

    if (isset($_POST["guide"]) && test_input($_POST["guide"]) != '') {
        $guide = test_input($_POST["guide"]);
    } else {
        die("select guide");
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

    if (($_FILES['synopsis']['name']!="")){
    $target_dir = "files/synopsis/";
    $synopsisfile = $target_dir . basename($_FILES["synopsis"]["name"]);
    
    
    // Check if file already exists
    if (file_exists($synopsisfile)) {
        echo "Sorry, file already exists.";
        }
    // if everything is ok, try to upload file
     else {
        if (move_uploaded_file($_FILES["synopsis"]["tmp_name"], $synopsisfile)) {
            echo "synopsis file has been uploaded.";
        } 
        else {
            echo "Sorry, there was an error uploading your synopsis file.";
        }
    }
    }


    if (($_FILES['documentation']['name']!="")){
        $target_dir = "files/documentation/";
        $documentationfile = $target_dir . basename($_FILES["documentation"]["name"]);
        
        
        // Check if file already exists
        if (file_exists($documentationfile)) {
            echo "Sorry, file already exists.";
            }
        // if everything is ok, try to upload file
         else {
            if (move_uploaded_file($_FILES["documentation"]["tmp_name"], $documentationfile)) {
                echo "Documentation file has been uploaded.";
            } 
            else {
                echo "Sorry, there was an error uploading your documentation file.";
            }
        }
        }  
       $sql = "INSERT INTO projects (title, discription, guide, department, session, synopsis, documentation)
        VALUES ('$title', '$discription', '$guide', '$department', '$session', '$synopsisfile', '$documentationfile')";

    if ($conn->query($sql) === TRUE) {


        $_SESSION["title"] = $title;
        $_SESSION["session"] = $session;
        $_SESSION["discription"] = $discription;
       
    
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