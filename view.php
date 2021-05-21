<html>
<head>
<style>
.view{
  border-collapse: collapse;
  width: 100%;
}

th,td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color:red;
  color: white;
}

</style>

</head>

<body style="background-image:linear-gradient(white,powderblue);height:100vh;background-position:center;background-size:cover;">
  <center>  <h1>Customers</h1></center>
  

<?php

$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("bank", $con);

 

$result = mysql_query("SELECT * FROM customer");
echo '<div class="view">';
echo "<center>";

echo "<table border='1'>

<tr>

<th>Id</th>

<th>Name</th>

<th>Email</th>

<th>Balance</th>

</tr>";
while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['id'] . "</td>";

  echo "<td>" . $row['name'] . "</td>";

  echo "<td>" . $row['email'] . "</td>";

  echo "<td>" . $row['balance'] . "</td>";

  echo "</tr>";

  }

echo "</table>";
echo "</center>";
echo '</div>';
mysql_close($con);

?>

</body>

</html>