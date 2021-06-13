<html>
<body>
<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=1 width=700 height =00>
<h1 align=center>TRANSACTION DETAILS!!</h1>
<?php
$hostname="localhost";
$username="root";
$password="";
$db="bank";

$connect =mysqli_connect($hostname,$username,$password,$db);
session_start();
$send= $_SESSION['t22'];
$rec= $_SESSION['t23'];
$amount=$_POST["amounts"];

$T_SENDER=$connect->query("select CUST_NAME from customer where CUST_ID=$send");
while($row=$T_SENDER->fetch_assoc()){
$TR_SENDER=$row['CUST_NAME'];
}
$T_RECEIVER=$connect->query("select CUST_NAME from customer where CUST_ID=$rec");
while($row=$T_RECEIVER->fetch_assoc()){
$TR_RECEIVER=$row['CUST_NAME'];

}

$sen_bal=$connect->query("select BALANCE from customer where CUST_ID =$send");

while($row=$sen_bal->fetch_assoc()){

$senders=$row['BALANCE'];
}


$rec_bal=$connect->query("select BALANCE from customer where CUST_ID =$rec");
while($row=$rec_bal->fetch_assoc()){

$receivers=$row['BALANCE'];
}
if($senders>$amount)
{
	$senders=$senders-$amount;
	$receivers=$receivers+$amount;

	mysqli_query($connect,"update customer set BALANCE = $senders where CUST_ID=$send");
	$rs=$connect->query("select * from customer where CUST_ID=$send");

	if($connect->affected_rows>0)

	{

		if($rs->num_rows>0)
		{

		echo "<tr height=50> <td colspan=6>SENDER SIDE UPDATED</tr><tr><td>CUSTOMER ID</td> <td> NAME</td> <td>EMAIL</td><td>PHONE</td><td>BALANCE</td></tr>";
		}
	while($row=$rs->fetch_row())
	{
		echo"<tr><td>$row[0]</td> <td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	}
	}
	mysqli_query($connect,"update customer set BALANCE = $receivers where CUST_ID=$rec");
	$r=$connect->query("select * from customer where CUST_ID=$rec");

	if($connect->affected_rows>0)

	{

		if($r->num_rows>0)
		{

			echo "<tr height=50>  <td colspan=6>RECEIVER SIDE UPDATED</tr><tr ><td>CUSTOMER ID</td> <td> NAME</td> <td>EMAIL</td><td>PHONE</td><td>BALANCE</td></tr>";
		}
		while($row=$r->fetch_row())
		{
			echo"<tr><td>$row[0]</td> <td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr><tr>";
		}
	}

	
	$trans=$connect->query("INSERT INTO transaction (SENDER,RECIEVER,AMOUNT) VALUES ('$TR_SENDER','$TR_RECEIVER',$amount)");

	
		

	
	
	
	
}
else
echo " <tr><td>insufficient balance!! </td> </tr>";
?>
<form>
<tr><td><a href="http://localhost/bank/first.html" style="color: #FFA07A">click here to back</a></td></tr>
</form>
</table>
</body>
</html>