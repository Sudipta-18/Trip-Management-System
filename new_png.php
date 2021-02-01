<html>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    " >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="CSS/index_style/index_styles.css" />



<?php 

session_start();

require "db.php";

$pname=$_POST["pname"];
$page=$_POST["page"];
$pgender=$_POST["pgender"];

$tno=$_SESSION["tno"];
$doj=$_SESSION["doj"];
$sp=$_SESSION["sp"];
$dp=$_SESSION["dp"];
$class=$_SESSION["class"];
$id=$_SESSION["id"];
$nos = $_SESSION["nos"];




//echo "$tno $doj $class";


$result=mysqli_query($conn,"CALL calculate_fares('$tno','$sp','$dp','$doj','$class','$id','$nos')") or die(mysql_error());

$row= mysqli_fetch_array($result);
$fare= $row[1];

echo "<h2>Total fare is Rs.".$fare."/-</h2>";

echo "<br><br><h2>Reservation Successful</h2>";

$rpnr=$row[0];


echo "<br><br><h2>your pnr is".$rpnr."</h2>";





//echo "HI,here's your ticket details";
//print_r($result);




//echo "Enter Passanger Name: <input type='text' name='pname[]' required> ";
//echo "Enter Passanger Age: <input type='text' name='page[]' required>";
//echo "Enter Passanger Gender: <input type='text' name='pgender[]' required> <br> ";


echo "<br><br><a href=\"http://localhost/railway/index.htm\">Go Back!!!</a> <br>";


$conn->close(); 
?>
<a href="booked.php">click to know for further booking</a>

</body>
</html>
