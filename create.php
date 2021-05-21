<?php
	if(!($connection=mysql_connect("localhost","root","")))
	{
		die("cannot connect1");
	}
	if(!(mysql_select_db('bank',$connection)))
	{
		die("cannot connect to database");
	}
	$id=$_POST['id'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$balance=$_POST['balance'];
	$q="INSERT INTO customer(id,name,email,balance)VALUES('$id', '$name', '$email', '$balance')";
	if(mysql_query($q,$connection))
	{
		echo '<script>alert("customer successfully created"); window.location = "homepage.html";</script>;' ;	
	}
	 else
	{
		echo 'alert("not inserted")' ;
	}
	mysql_close($connection);
?>