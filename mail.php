two files to configure for ths
1. C:\xampp\sendmail\sendmail.ini
2. C:\xampp\php\php.ini
<html>
<body>

<h2>Send e-mail to someone@example.com:</h2>

<form  action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" >
Subject:<br>
<input type="text" name="subject"><br>
Message:<br>
<input type="text" name="msg"><br>
E-mail:<br>
<input type="text" name="mail"><br><br>

<button type="submit"  name="submit" value="submit">SEND MAIL</button>

</form>

</body>
</html>




<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$sub = $_POST["subject"] ;
$msg = $_POST["msg"];
$rec = $_POST["mail"];
mail($rec,$sub,$msg);
}
?>
