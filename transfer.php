<html>
<head>

</head>
<body style="background-image:linear-gradient(white,powderblue);height:100vh;background-position:center;background-size:cover;">
<form name="transfer" method="POST" action="transfer1.php"><center><h1> Transfer Money</h1><br>
<table>
<tr>
	<td><h3>Sender name:</td>
	<td>
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
  </select></h3></td>
</tr>
<tr>
	<td><h3>Receiver name:</td>
  <td><select name="rname">
    <option disabled selected>-- Select name --</option>
    <?php
       
        $records = mysqli_query($db, "SELECT name From customer");  

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['name'] ."' name='rname'>" .$data['name'] ."</option>"; 
        }	
    ?>  
  </select></h3></td>
<tr>
<td><h3>Amount:</td><td><input type="number" name="funds"/></h3></td>
</tr>
</table>	<br>
<input type="submit" value="transfer"/>
</center><br><br>
</body>
</html>