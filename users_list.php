<!DOCTYPE html>
<html lang="en">

<head>
    <title>List of Users</title>
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
    $user=$_SESSION['user'];
    if($user['role'] != 'ADMIN'){
        header('Location: home.php');
        exit();
    }
    include 'navbar.html';
    include 'connect.php';


    // $sql1 ="SELECT name , dob , address , dept , email FROM User WHERE  role = Hod";
    $sql1 = "SELECT * FROM users WHERE role = 'HOD'";
    $hods = $conn->query($sql1);

    $sql2 = "SELECT * FROM users WHERE role = 'TEACHER'";
    $teachers = $conn->query($sql2);

    $sql3 = "SELECT * FROM users WHERE role = 'STUDENT'";
    $students = $conn->query($sql3);

    ?>

    <h4 class="text-center">List of HODs</cite></h4>

    <div class="container media">
        <div class="table-responsive">

            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Dob</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Approved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $counter = 0;
                    foreach ($hods as $row) :
                        ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td><?php echo ($row["fullname"]); ?></td>
                            <td><?php echo ($row["dob"]); ?></td>
                            <td><?php echo ($row["address"]); ?></td>
                            <td><?php echo ($row["gender"]); ?></td>
                            <td><?php echo ($row["department"]); ?></td>
                            <td><?php echo ($row["email"]); ?></td>
                            <td><?php echo ($row["mobile"]); ?></td>
                            <td><?php echo ($row["approved"]); ?></td>

                            <td><button><a href="approve_user.php?id=<?php echo ($row["id"]); ?>">Approve</a></button></td>
                            <td><button><a href="delete.php?id=<?php echo ($row["id"]); ?>">Delete</a></button></td>
                        </tr>

                    <?php endforeach;
                $conn->close(); ?>
                </tbody>
            </table>
        </div>
    </div>
    <h4 class="text-center">List of Teachers</cite></h4>

    <div class="container media">
        <div class="table-responsive">

            <table class="table table-hover table-bordered table-condensed">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Dob</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Approved</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter = 0;
                    foreach ($teachers as $row) : ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td><?php echo ($row["fullname"]); ?></td>
                            <td><?php echo ($row["dob"]); ?></td>
                            <td><?php echo ($row["address"]); ?></td>
                            <td><?php echo ($row["gender"]); ?></td>
                            <td><?php echo ($row["department"]); ?></td>
                            <td><?php echo ($row["email"]); ?></td>
                            <td><?php echo ($row["mobile"]); ?></td>
                            <td><?php echo ($row["approved"]); ?></td>

                            <td><button><a href="approve_user.php?id=<?php echo ($row["id"]); ?>">Approve</a></button></td>
                            <td><button><a href="delete.php?id=<?php echo ($row["id"]); ?>">Delete</a></button></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <h4 class="text-center">List of Students</cite></h4>

    <div class="container media">
        <div class="table-responsive">

            <table class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Dob</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Registration No.</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Approved</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php $counter = 0;
                    foreach ($students as $row) : ?>
                        <tr>
                            <td><?php echo ++$counter; ?></td>
                            <td><?php echo ($row["fullname"]); ?></td>
                            <td><?php echo ($row["dob"]); ?></td>
                            <td><?php echo ($row["address"]); ?></td>
                            <td><?php echo ($row["gender"]); ?></td>
                            <td><?php echo ($row["department"]); ?></td>
                            <td><?php echo ($row["semester"]); ?></td>
                            <td><?php echo ($row["registration_no"]); ?></td>
                            <td><?php echo ($row["email"]); ?></td>
                            <td><?php echo ($row["mobile"]); ?></td>
                            <td><?php echo ($row["approved"]); ?></td>

                            <td><button><a href="delete.php?id=<?php echo ($row["id"]); ?>">Delete</a></button></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    ​

</body>

</html>
​