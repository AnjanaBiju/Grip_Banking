<html>
<body>

<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=1 width=500 height =00>
<h1 align=center>TRANSFER FROM...</h1>
<?php
$hostname="localhost";
$username="root";
$password="";
$db="bank";

$connect =mysqli_connect($hostname,$username,$password,$db);
$op=$_POST['hid'];
$sender=$_POST["t1"];


$r=$connect->query(" select * from customer where CUST_ID = $sender");


if($connect->affected_rows>0)

{
	

	if($r->num_rows>0)
	{

	echo "<tr> <td>CID</td> <td> NAME</td> <td>EMAIL</td><td>PHONE</td><td>BALANCE</td></tr>";
	}
	while($row=$r->fetch_row())
	{
	echo"<tr><td>$row[0]</td> <td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	}
}
else
echo "wrong id";
?>
</table>

<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=1 width=500 height =00>
<h1 align=center>TRANSFER TO...</h1>
<?php
if(isset($_POST['submit'])){
        if(!empty($_POST['receiver'])) {
          $receiver = $_POST['receiver'];        
    } 
      }

$rs=$connect->query("select * from customer where CUST_ID=$receiver");

if($connect->affected_rows>0)

{

	if($rs->num_rows>0)
	{

	echo "<tr> <td>CID</td> <td> NAME</td> <td>EMAIL</td><td>PHONE</td><td>BALANCE</td></tr>";
	}
	while($row=$rs->fetch_row())
	{
	echo"<tr><td>$row[0]</td> <td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
	}
}
else
echo "wrong id";

?>
</table>
<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=0 width=500 height =00>
<form name=frm action=transaction.php method=POST>
<h1 align=center>AMOUNT DETAILS</h1>
<tr>
<td>
Enter the amount to be transfer
</td>
<td>
<input type="text "name="amounts" id="amounts">
</td>

<td>
<input type=hidden value=hid>
<input type="submit" value="TRANSFER" >
</td>
</tr>
<tr><td><a href="http://localhost/bank/first.html" style="color: #FFA07A">click here to back</a></td></tr>


</form>
</table>
<?php
session_start();
$_SESSION['t22']=$sender;
$_SESSION['t23']=$receiver;

?>



</body>
</html>
