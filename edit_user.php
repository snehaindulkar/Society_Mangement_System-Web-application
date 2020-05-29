<?php
require "constants.php";
if(count($_POST)>0) {

	$sql = "UPDATE society_membermaster set MEMBER_FLAT_NO='" . $_POST["flatno"] . "', USERNAME='" . $_POST["username"] . "', PASSWORD='" . $_POST["password"] . "', MEMBER_NAME='" . $_POST["name"] . "',  MEMBER_ADDRESS='" . $_POST["address"] . "',  EMAIL_ID='" . $_POST["emailid"] . "', PARKING_NO='" . $_POST["parkingno"] . "' WHERE MEMBER_ID='".$_GET["id"]."'";
	mysqli_query($link,$sql);
	// $message = "Record Modified Successfully";
}
$id = $_GET["id"];

$select_query = "SELECT * FROM society_membermaster WHERE MEMBER_ID='" . $_GET["id"] . "'";
$result = mysqli_query($link,$select_query);
$row = mysqli_fetch_array($result);

?>
<html>
<head>
<title>Add New User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<form name="frmUser" method="post" action="">
<div style="width:500px;margin: 0 auto;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<div class="container">
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2" style="">Edit User</td>
</tr>
<tr>
<td><label>Flat No: </label></td>
<td>
	
	<input type="text" name="flatno" class="txtField" value="<?php echo $row['MEMBER_FLAT_NO']; ?>">
</td>
</tr>
<tr>
<td><label>Username</label></td>
<td><input type="text" name="username" class="txtField" value="<?php echo $row['USERNAME']; ?>"></td>
</tr>
<tr>
<td><label>Password</label></td>
<td><input type="text" name="password" class="txtField" value="<?php echo $row['PASSWORD']; ?>"></td>
</tr>
<tr>
<td><label>Member Name</label></td>
<td><input type="text" name="name" class="txtField" value="<?php echo $row['MEMBER_NAME']; ?>"></td>
</tr>

<td><label>Address</label></td>
<td><input type="text" name="address" class="txtField" value="<?php echo $row['MEMBER_ADDRESS']; ?>"></td>
</tr>
<tr>
<td><label>Email Id</label></td>
<td><input type="text" name="emailid" class="txtField" value="<?php echo $row['EMAIL_ID']; ?>"></td>
</tr>
<tr>
<td><label>Parking No</label></td>	
<td><input type="text" name="parkingno" class="txtField" value="<?php echo $row['PARKING_NO']; ?>"></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</div>
</form>
</body></html>
