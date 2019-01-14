<html>
<body>

Welcome <?php echo $_POST["fir_name"]; ?><?php echo $_POST["surname"]; ?> to IHC Robbins!

<br>

Company:<?php echo $_POST["company"]; ?>

<br>

<?php
if(isset($_POST['generate']))
{
  $FirstName = $_POST['fir_name'];
  $Surname = $_POST['surname'];
  $Company = $_POST['company'];
 $text = $FirstName . $Surname . " - " . $Company;
 echo "<img alt='testing' src='barcode/barcode.php?codetype=Code39&size=40&text=".$text."&print=true'/>";
}
?>

<br>
<br>
<br>
<br>
<br>

<center><?php

$ini = parse_ini_file('app.ini');

// Login Details
$servername = "localhost";
$username = $ini['db_user'];
$password = $ini['db_password'];
$dbname = $ini['db_name'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $FirstName = $_POST['fir_name'];
 $Surname = $_POST['surname'];


$sql = "INSERT INTO guests (fir_name, surname, company, Barcode)
VALUES ('$FirstName' , '$Surname' , '$Company' , '$text')";

if ($conn->query($sql) === TRUE) {
    echo "Returning to the Home Page in 15 Seconds ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
<?php header( "refresh:15;url=index.php" ); ?></center>

</html>
