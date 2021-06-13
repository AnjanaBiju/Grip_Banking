<?php
$hostname="localhost";
$username="root";
$password="";
$db="bank";
$connect =mysqli_connect($hostname,$username,$password,$db);
$query = "select * from customer";
$result = mysqli_query($connect, $query);
$row_count=mysqli_num_rows($result);
$result1 = mysqli_query($connect, $query);
$options="";
while($row2=mysqli_fetch_array($result1))
{
$options =$options."<option>$row2[1]</option>"; 
}
?>
<html>
	<head>
		<title>transaction</title>
	</head>
	<body>
		<form name="transfer"  action=money.php method ="POST">
		<table align="center" bgcolor ="1f2838" style="color:white; padding:20px"  border=0 width=500 height =00>
			<h1 align="center" ><i>MONEY TRANSFER !!<i></h1>
		<tr height=70> 
			<td>	
			Sender ID
			</td>
			<td>
			<input type=text name="t1" id=t1 >
			<td>
			<tr><td>
			Receiver		
			</td>
			<td>
			<select name="receiver" id=receiver>
				<option value="" disabled selected>Choose option</option>
				<?php while($row1=mysqli_fetch_array($result)):;?>
				<option value="<?php echo $row1[0]; ?>"><?php echo $row1[1];?></option>
				<?php endwhile;?>
			</select>
			</td>
		</tr><br>
		
		
		<tr>
		<td></td>
		<td>
		<input type="hidden" name=hid>
		</td>
		<td>
		<td><input type=submit value="TRANSFER" name ="submit"onclick="hid.value='submit'" ></td>
		</tr>
		</table>
		</form>



</html>