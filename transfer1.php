 <?php
	if(!($connection=mysql_connect("localhost","root","")))
	{
		die("cannot connect1");
	}
	if(!(mysql_select_db('bank',$connection)))
	{
		die("cannot connect to database");
	}
	$sender=$_POST['sname'];
	$receiver=$_POST['rname'];
	$bal=$_POST['funds'];
	$q=mysql_query("SELECT balance FROM customer where name='$sender' ");
	$data=mysql_fetch_assoc($q);
	echo "<br>";
	
	if($data['balance']<$bal)
	{
		echo '<script>alert("insufficient funds")</script>';
		#echo '<script type="text/javascript">  window.onload = function(){alert("insufficient funds");}</script>';
		
		  echo '<center><img src="Transaction-Failed.png" /></center>';
	}
	elseif($sender==$receiver)
	{
			echo '<script>alert("sender name and receiver name are same")</script>';
			echo '<center><img src="Transaction-Failed.png" /></center>';
	}
	else{
		
		$sbal=$data['balance']-$bal;
		
		$result1= mysql_query("UPDATE `customer` SET `balance`='$sbal' WHERE name = '$sender'");
		
		$rq=mysql_query("SELECT balance FROM customer where name='$receiver' ");
		$data1=mysql_fetch_assoc($rq);
		
		$rbal=$data1['balance']+$bal;
		$result2= mysql_query("UPDATE `customer` SET `balance`='$rbal' WHERE name = '$receiver'");
		
		date_default_timezone_set('Asia/Kolkata');
		$time=date('d-m-Y H:i');
		$q=mysql_query("INSERT INTO history (sender,receiver,amount,time)VALUES('$sender','$receiver','$bal','$time')");
		echo '<center><img src="Payment-success.jpg" /></center>';

	}
	
mysql_close($connection);
?>