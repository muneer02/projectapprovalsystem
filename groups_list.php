<!DOCTYPE html>
<html lang="en">

<head>
    <title>Groups - Project Approval System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        th,
        td {
            text-align: center;
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
    include 'connect.php';
    include 'navbar.html';

    $sql = "SELECT * FROM groups";
    $groups = $conn->query($sql);

    $user = $_SESSION['user'];
    if($user['role']=="HOD"){
        $sql = "SELECT * FROM users WHERE role = 'STUDENT' AND department = '".$user['department']."'";
    }
    else{
        header('Location: home.php');
        exit();
    }

    $students = $conn->query($sql);

    ?>


    <div class="container media">

        <div class="col-md-5">
            <h4 class="text-center">List of Groups</h4>

            <button><a href="add_group.php">Add new group</a></button>

            <div class="table-responsive">

                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Students</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $counter = 0;
                        foreach ($groups as $group) :
                            ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo ($group["name"]); ?></td>
                                <td>
                                    <ol type="i">
                                        <?php
                                        $sql = "SELECT fullname FROM users WHERE group_id =" . $group["id"];
                                        $group_students = $conn->query($sql);
                                        foreach ($group_students as $student) :

                                            echo "<li>".($student['fullname']);"</li>";
                                            echo "";
                                        endforeach
                                        ?>
                                    </ol>
                                </td>
                            </tr>

                        <?php endforeach;
                    $conn->close(); ?>
                    </tbody>
                </table>
            </div>
        </div>
   
        <div class="col-md-2">
        </div>
        <div class="col-md-5">
            <h4 class="text-center">List of Students</cite></h4>
            <div class="table-responsive">
            <br>
            <br>
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 0;
                        foreach ($students as $student) : ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo ($student["fullname"]); ?></td>
                                <td><?php echo ($student["department"]); ?></td>
                                <td>
                                    <form action="assign_to_group.php?id=<?php echo $student['id']?>" method="post">
                                        <select name='group'>
                                            <option value="">Select group</option>
                                            <?php 
                                                foreach ($groups as $group) : 
                                                    echo "<option value='".$group["id"]."'>".$group["name"]."</option>";
                                                endforeach
                                            ?>  
                                        </select>
                                        <button type="submit">Link</button>
                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>
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