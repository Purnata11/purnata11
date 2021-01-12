<?php
 include 'insert.php';
 $sql="select * from Appointments";
 $result=mysqli_query($connect,$sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin</title>
<meta charset="utf-8">
<style>
	body{
		font-family: Sans-serif;
		text-align: center;	
		background-color: #a0a0a0;
	}
	h1{
		padding: 5px;
		background-color: black;
		color: white;
	}
  table, th, td{
  	margin-left: auto;
  	margin-right: auto;
  	background-color: #ddd;
    text-align: center;
  	border: solid black 1px;
  	border-collapse:collapse;
  	padding: 5px;

  }

 th{
 	background-color: #686868;
 	color: white;
 	padding: 10px
 }
  a.btn{   text-align: center;
		border-radius: 10px;
		background-color: #252525;
		color: white;
		padding: 15px;
		margin: 15px;
		text-decoration:none;
		font-size: 22px;
	}
	a.btn:hover{
		background-color: #ddd;
		color: black;
	}
	a.edi{
		border-radius: 5px;
		text-decoration:none;
		padding: 3px;
		background-color: #252525;
		color: white;
		border: solid black 1px;
	}
</style>
</head>
<body>
	<h1>List of Appointments</h1>
<form>
	<table>
		<tr>
			
			<th>Name</th>
			<th>Adress</th>
			<th>Phone Number</th>
			<th>Lincense Number</th>
			<th>Engine Number</th>
			<th>Date</th>
			<th>Mechanic</th>
			<th>Change</th>
		    
		</tr>
        <?php 
          while($rows=mysqli_fetch_assoc($result)){
         ?>
         <tr>
         	<td><?php echo $rows['name'] ?></td>
         	<td><?php echo $rows['address'] ?></td>
         	<td><?php echo $rows['phone'] ?></td>
         	<td><?php echo $rows['license'] ?></td>
         	<td><?php echo $rows['engine'] ?></td>
         	<td><?php echo $rows['date'] ?></td>
         	<td><?php echo $rows['mechanic'] ?></td>
         	<td><a class="edi" href="edit.php?id=<?php echo $rows['id'];?>">edit</a></td>

         </tr>
        <?php } ?>
	</table>
</form><br><br><br>
  <a class="btn" href="firstpage.php">Back to home page</a><br><br><br><br>
  <!-- <a href="update.php">Update</a> -->
</body>
</html>

<!--Admin Panel
a. Admin can see the list of the appoints
     i. In the list table admin should able to see the client name, phone, Car
    registration number, appointment date, and mechanic name.[DONE]
b. If admin wants he can change the date of appointment and also the assigned
mechanic name with any other available mechanic for any specific client-->