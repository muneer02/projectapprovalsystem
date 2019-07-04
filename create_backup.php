<?php
   $dbname="project_approval_system";
   $dbhost = 'localhost';
   $dbuser = 'admin';
   $dbpass = 'admin123';
   
   $backup_file = $dbname . date("Y-m-d-H-i-s") . '.sql';
   $command = "C:\\xampp\mysql\bin\mysqldump -u$dbuser -p$dbpass $dbname > $backup_file";
   // echo $command;
   system($command);
   $command = "gdrive-windows-x64.exe upload $backup_file";
   // system($command);

      echo "<script>alert(".system($command).");</script>";
   // echo "<script>location.href = 'home.php';</script>";

?>
