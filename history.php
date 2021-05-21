<html>
<head>
<style>
.my_class{
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: brown;
  color: white;
}
</style>

</head>

<body style="background-image:linear-gradient(white,powderblue);height:100vh;background-position:center;background-size:cover;">

<?php

$con = mysql_connect("localhost","root","");

if (!$con)

  {

  die('Could not connect: ' . mysql_error());

  }

 

mysql_select_db("bank", $con);

 

$result = mysql_query("SELECT * FROM history");

 
echo "<center>";
echo "<h1>Transaction history</h1>";
echo "<table border='1'>

<tr>

<th>Sender</th>

<th>Receiver</th>

<th>Amount</th>

<th>Date & Time</th>

</tr>";

 

while($row = mysql_fetch_array($result))

  {

  echo "<tr>";

  echo "<td>" . $row['sender'] . "</td>";

  echo "<td>" . $row['receiver'] . "</td>";

  echo "<td>" . $row['amount'] . "</td>";

  echo "<td>" . $row['time'] . "</td>";

  echo "</tr>";

  }

echo "</table>";
echo "</center>";

mysql_close($con);

?>

</body>

</html>