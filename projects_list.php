<!DOCTYPE html>
<html lang="en">

<head>
    <title>Projects - Project Approval System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        th{
            text-align: center;
        }
        #searchProjects {
            background-image: url('/assets/img/searchicon.png'); /* Add a search icon to input */
            background-position: 10px 12px; /* Position the search icon */
            background-repeat: no-repeat; /* Do not repeat the icon image */
            width: 100%; /* Full-width */
            font-size: 16px; /* Increase font-size */
            padding: 8px 20px 8px 35px; /* Add some padding */
            border: 1px solid #ddd; /* Add a grey border */
            margin-top: 12px; /* Add some space above the input */
            margin-top: 12px; /* Add some space below the input */
        }
        table,th,tr,td{
            border-color: #aaa !important;
        }
    </style>
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

    <?php
    include 'check_session.php';
    include 'navbar.html';
    include 'connect.php';

    
    $user = $_SESSION['user'];
    if($user['role']=="TEACHER"){
        $sql = "SELECT * FROM projects where session='2016' AND guide_id = ".$user['id'];
    }
    else if($user['role']=="HOD"){
        $sql = "SELECT * FROM projects where session='2016' AND department = '".$user['department']."'";
    }
    else{
        // echo "<script>alert('Students are not allowed to access this section');</script>";
        // echo "<script>location.href = 'home.php';</script>";
        header('Location: home.php');
        exit();
    }
    ?>


    <div class="container media">

        <div class="col-md-12">

            <!-- <button><a href="add_group.php">Add new group</a></button> -->

            <div class="table-responsive">

            <input type="text" id="searchProjects" onkeyup="filterProjects()" placeholder="Search for project..">
            <h4 class="text-center">List of Projects</h4>

                <table class="table table-hover table-bordered table-condensed" id="projectsTable">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Project Title</th>
                            <th>Project Description</th>
                            <th>Group</th>
                            <th colspan=3>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        // $sql = "SELECT * FROM projects where session='2016'";

                        $projects = $conn->query($sql);

                        // $project = $result->fetch_assoc();
                        $counter = 0;
                        foreach ($projects as $project) :

                            ?>
                            <tr>
                            <td><?php echo ++$counter.'.'; ?></td>
                            <td class="projectTitle"><?php echo ($project["title"]); ?></td>
                                <td><?php echo ($project["description"]); ?></td>
                                <td><?php
                                    $sql = "SELECT * FROM groups WHERE id =" . $project["group_id"];
                                    $result = $conn->query($sql);
                                    $group = $result->fetch_assoc();

                                    echo ($group["name"]);
                                    echo "<ol type='i'>";
                                    $sql = "SELECT fullname FROM users WHERE group_id =" . $group["id"];
                                    $group_students = $conn->query($sql);
                                    foreach ($group_students as $student) :
                                        echo "<li>" . ($student['fullname']);
                                        "</li>";
                                        echo "";
                                    endforeach;
                                    echo "</ol>";
                                    ?>
                                </td>
                                <td><a href="<?php echo ($project["synopsis"]); ?>"><button>Download Synopsis</button></a></td>
                                
                                    <?php
                                        if($project['approved']){
                                            if($project['documentation']){
                                                echo "<td><a href='".$project['documentation']."'><button>Download Documentation</button></a></td>";
                                            }
                                        }
                                        else{
                                            echo "<td><a href='approve_project.php?id=".$project['id']."'><button>Approve Project</button></a></td>";
                                            echo "<td><a href='delete_project.php?id=".$project['id']."'><button>Discard Project</button></a></td>";
                                        }
                                    ?>

                            </tr>

                        <?php
                    endforeach;
                    $conn->close(); ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    ​
    <script src="assets/js/filterProjects.js"></script>

</body>

</html>
​