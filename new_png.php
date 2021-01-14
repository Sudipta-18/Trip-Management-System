<html>
<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >


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

echo "Total fare is Rs.".$fare."/-";

echo "<br><br>Reservation Successful";

$rpnr=$row[0];


echo "<br><br>your pnr is".$rpnr."/-";





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
