<html>

<style>
div.background {
  background: url(transactionimg.jpg) ;
  border: 2px solid black;
height:100%;
background-position: center;
  background-repeat: no-repeat;
  background-size:120%  120%;
}

div.transbox {
  margin: 30px;
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.6;
}

div.transbox p {
  margin: 5%;
  font-weight: bold;
  color: #000000;
}
</style>
<body>
<div class="background">
<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=1 width=700 height =00>
<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$db="bank";
	$connect =mysqli_connect($hostname,$username,$password,$db);
	$rs=$connect->query("select * from transaction");
	if($connect->affected_rows>0)
	{
		if($rs->num_rows>0)
		{
		echo "<tr> <td>TRANSACTION ID</td> <td>SENDER</td> <td>RECEIVER</td> <td>AMOUNT</td><td>DATE AND TIME</td></tr>";

		}
		while($row=$rs->fetch_row())
		{
		 echo "<tr> <td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td> <td>$row[4]</td> </tr>";
		}
	}

?>
<tr><td><a href="http://localhost/bank/first.html" style="color: #FFA07A">click here to back</a></td></tr>
</table>
</div>
</body>
</html>