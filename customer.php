<HTML>
<BODY>
<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=1>
	<h1 align="center" ><i>CUSTOMER DETAILS!!<i></h1>
	<?php
	$con=new mysqli("localhost","root","","bank");
	if($con->connect_error)
	die("connection failed");
	$r=$con->query("select * from customer");
	$rs=$con->query("select * from customer");
	if($rs->num_rows>0)
	{
	     echo "<tr><td>ID</td><td>NAME</td><td>EMAIL</td>
	     <td>PHONE</td><td>BALANCE</td></tr>";
	     while($row=$r->fetch_row())
	       {
	           echo "<tr><td>$row[0]</td><td>$row[1]</td>
	           <td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	      }
	}
	?>
<tr><td><a href="http://localhost/bank/first.html" style="color: #FFA07A">click here to back</a></td></tr>
</table>

</body>
</html>