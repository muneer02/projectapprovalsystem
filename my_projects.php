<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Projects - Project Approval System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        th {
            text-align: center;
        }

        table,
        th,
        tr,
        td {
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

    if (!$user['group_id']) {
        echo "<script>alert('Your must be assigned to a group before you access this section.');</script>";
        echo "<script>location.href = 'home.php';</script>";
        exit();
    }

    //get group details
    $sql = "SELECT * FROM groups where id = " . $user['group_id'];
    $result = $conn->query($sql);
    $group = $result->fetch_assoc();
    $sql = "SELECT fullname FROM users WHERE group_id =" . $group["id"];
    $group_students = $conn->query($sql);
    echo "Group Members";
    echo "<ol>";
    foreach ($group_students as $student) :
        echo "<li>" . ($student['fullname']);
        "</li>";
        echo "";
    endforeach;
    echo "</ol>";

    if ($user['role'] == "STUDENT") {
        $sql = "SELECT * FROM projects where session='2016' AND group_id = " . $user['group_id'];
    } else {
        // echo "<script>alert('Students are not allowed to access this section');</script>";
        // echo "<script>location.href = 'home.php';</script>";
        // header('Location: home.php');
        // exit();
    }
    ?>


    <div class="container media">

        <div class="col-md-12">

            <!-- <button><a href="add_group.php">Add new group</a></button> -->

            <div class="table-responsive">

                <!-- <input type="text" id="searchProjects" onkeyup="filterProjects()" placeholder="Search for project.."> -->
                <h4 class="text-center">Our Projects</h4>

                <table class="table table-hover table-bordered table-condensed" id="projectsTable">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Project Title</th>
                            <th>Project Description</th>
                            <th>Guide</th>
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
                                <td><?php echo ++$counter . '.'; ?></td>
                                <td class="projectTitle"><?php echo ($project["title"]); ?></td>
                                <td><?php echo ($project["description"]); ?></td>
                                <td><?php
                                    $sql = "SELECT fullname FROM users WHERE id =" . $project["guide_id"];
                                    $result = $conn->query($sql);
                                    $guide = $result->fetch_assoc();
                                    echo ($guide["fullname"]);
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo ($project["synopsis"]); ?>"><button>Download Synopsis</button></a><br/><br/>
                                    <?php
                                    if ($project['documentation']) {
                                        echo "<a href='" . $project['documentation'] . "'><button>Download Documentation</button></a>";
                                    }
                                ?>
                                </td>

                                <?php
                                    echo "<td><a href='update_project.php?id=".$project['id']."'><button>Update Project</button></a></td>";
                                    echo "<td><a href='delete_project.php?id=" . $project['id'] . "'><button>Discard Project</button></a></td>";
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