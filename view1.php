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
  background-color: #4CAF50;
  color: white;
}

</style>
</head>
<body style="background-image:linear-gradient(white,powderblue);height:100vh;background-position:center;background-size:cover;">
<form name="transfer" method="POST" action="view1.php"><center>
  <h3>Sender name:
  <select name="sname">
    <option disabled selected>-- Select name --</option>
    <?php
        include "dbConn.php";  
        $records = mysqli_query($db, "SELECT name From customer");  

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."' name='sname'>" .$data['name'] ."</option>"; 
        }	
    ?>  
  </select></h3>
<br>
<input type="submit" value="view"/>
</center><br><br>

<?php mysqli_close($db);   ?>

<?php
	$con = mysql_connect("localhost","root","");
	if (!$con)
	{
  		die('Could not connect: ' . mysql_error());
 	}
	mysql_select_db("bank", $con);
	ini_set('display_errors','Off');

	$sender=$_POST['sname'];
	$result = mysql_query("SELECT * FROM customer where name='$sender' ");
	echo "<center>";
	
	echo '<div class="my_class">';
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
	echo '</div>';
	echo "</center>";
	mysql_close($con);
?>
</body>
</html>