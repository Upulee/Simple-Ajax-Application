<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body> 

<?php
$q = $_GET['q'];

$con = new mysqli('localhost','root','','my_db');

if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
} 



$sql="SELECT * FROM user WHERE id= '".$q."'";

$result = $con->query($sql);
echo "<br>";
echo "<table>
<tr>
<th>id</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

$content = " "; 

if($result->num_rows>0) {

    while($row = mysqli_fetch_array($result)) {
$id=$row['id'];
$FirstName= $row['FirstName'];
$LastName= $row['LastName'];
$Age=$row['Age'];
$Hometown=$row['Hometown'];
$Job=$row['Job'];
  
$content=<<<DELIMITER
<tr>
<td>{$id}</td>
<td>{$FirstName}</td>
<td>{$LastName}</td>
<td>{$Age}</td>
<td>{$Hometown}</td>
<td>{$Job}</td>
</tr>
DELIMITER;
echo $content;
}

}
else {echo "no results";}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>