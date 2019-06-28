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
    </style>
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

    <?php
    include 'connect.php';


    ?>


    <div class="container media">

        <div class="col-md-12">
            <h4 class="text-center">List of Projects</h4>

            <!-- <button><a href="add_group.php">Add new group</a></button> -->

            <div class="table-responsive">

                <table class="table table-hover table-bordered table-condensed">
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

                        // $user = $_SESSION['user'];

                        // if($user['role']="TEACHER"){
                        //     $sql = "SELECT * FROM projects where session='2016'AND guide_id = ".$user['id'];

                        // }
                        // else if($user['role']="HOD"){
                        //     $sql = "SELECT * FROM projects where session='2016' AND department = ".$user['department'];
                        // }
                        // else{
                        //     echo "<script>alert('Students aren't allowed to access this section);</script>";
                        //     echo "<script>location.href = 'home.php';</script>";
                    
                        // }

                        $sql = "SELECT * FROM projects where session='2016'";

                        $projects = $conn->query($sql);

                        // $project = $result->fetch_assoc();
                        $counter = 0;
                        foreach ($projects as $project) :

                            ?>
                            <tr>
                            <td><?php echo ++$counter.'.'; ?></td>
                            <td><?php echo ($project["title"]); ?></td>
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
                                <td><button><a href="<?php echo ($project["synopsis"]); ?>">Download Synopsis</a></button></td>
                                
                                    <?php
                                        if($project['approved']){
                                            if($project['documentation']){
                                                echo "<td><button><a href='".$project['documentation']."'>Download Documentation</a></button></td>";
                                            }
                                        }
                                        else{
                                            echo "<td><button><a href='approve_project.php?id=".$project['id']."'>Approve Project</a></button></td>";
                                            echo "<td><button><a href='delete_project.php?id=".$project['id']."'>Discard Project</a></button></td>";
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

</body>

</html>
​