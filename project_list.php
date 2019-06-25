<!DOCTYPE html>
<html lang="en">

<head>
    <title>projects - Project Approval System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        th,
        td {
            text-align: center;
        }
    </style>
    <link rel="stylesheet" href="assets/css/registrationForm.css">
</head>

<body>

    <?php
    include 'connect.php';


    $sql = "SELECT * FROM projects";
    $projects = $conn->query($sql);

   
    ?>


    <div class="container media">
        <div class="col-md-12">
            <h4 class="text-center">List of projects</cite></h4>
            <div class="table-responsive">
            <br>
            <br>
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Title</th>
                            <th>Discription</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $counter = 0;
                        foreach ($projects as $project) : ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo ($project["title"]); ?></td>
                                <td><?php echo ($project["description"]); ?></td>
                                <td> <a href="<?php echo($project["synopsis"]); ?>" >  Download </a>  </td>
                                <td>  <button type="submit">Approve</button> </td>
                               
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