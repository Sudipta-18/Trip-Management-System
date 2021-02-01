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

$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";

$query = mysqli_query($conn,"SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.fare,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='".$sp."' AND s2.sname='".$dp."' AND t.trainno=c.trainno AND c.sp='".$sp."' AND c.dp='".$dp."' AND c.doj='".$doj."' ");

 echo "<table><thead ><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Train_Class</td><td>Fare</td><td>Seats_Left</td></thead>";
    
    while($row = mysqli_fetch_array($query))
    {
     echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td>".$row[8]."</td><td>".$row[9]."</td></tr>";
    } 
     

echo "</table>
";




//$rowcount=mysqli_num_rows($query);
if(mysqli_num_rows($query) == 0)
{
 echo "No such train <br> ";

}
?>

If you wish to proceed with booking fill in the following details:<br><br>
<form action="resvn.php" method="post">
<div class="row">
<div class="col">
<label for="formGroupExampleInput">Registered Mobile No:</label>
    </div>
    <div class="col">
      <input type="text" name="mno" required class="form-control" placeholder="mobile no">
    </div>
</div>
<div class="row">
<div class="col">
<label >password:</label>
    </div>
    <div class="col">
      <input type="password" name="password" required class="form-control" placeholder="password">
    </div>
</div>
<div class="row">
<div class="col">
<label >Enter train no:</label>
    </div>
    <div class="col">
      <input type="text" name="tno" required class="form-control" placeholder="train no">
    </div>
</div>

<div class="row">
<div class="col">
<label >Enter class:</label>
    </div>
    <div class="col">
      <input type="text" name="class" required class="form-control" placeholder="class">
    </div>
</div>
<div class="row">
<div class="col">
<label >Enter no of seats:</label>
    </div>
    <div class="col">
      <input type="text" name="nos" required class="form-control" placeholder="no of seats">
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>

</form>

<?php

echo " <a href=\"http://localhost/railway/enquiry.php\">More Enquiry</a> <br>";

$conn->close(); 
?>

<br><a href="http://localhost/railway/index.htm">Go to Home Page!!!</a>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
