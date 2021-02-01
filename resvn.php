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
<link rel="stylesheet" href="CSS/index_style/index_style.css" />
<form action="new_png.php" method="post">

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());
if(mysqli_num_rows($query) == 0)
{
 echo "No such login !!! <br> ";
 echo " <br><a href=\"http://localhost/railway/enquiry_result.php\">Go Back!!!</a> <br>";
 die();
}

$row = mysqli_fetch_array($query);
$temp=$row['id'];
//echo $temp;
//echo $_SESSION["doj"];
$_SESSION["id"] = "$temp";
$_SESSION["tid"] = "$temp";
$tno=$_POST["tno"];
$_SESSION["tno"] = "$tno";
$class=$_POST["class"];
$_SESSION["class"] = "$class";
$nos=$_POST["nos"];
$_SESSION["nos"] = "$nos";
$doj=$_SESSION["doj"];
$sp=$_SESSION["sp"];
$dp=$_SESSION["dp"];



echo "<table>";

for($i=0;$i<$nos;$i++) 
{
echo "<tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td><br> ";
echo "<td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td><br>";
echo "<td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td></tr><br> ";
}

echo "</table>";


//Enter Train No: <input type="text" name="tno" required><br>
//Enter Class: <input type="text" name="class" required><br>

echo "<a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a>";

$conn->close(); 

?>

<br><br><input type="submit" value="Book">
</>
</html>
