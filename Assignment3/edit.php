<?php 

include 'insert.php';
$id=$_REQUEST['id'];
$sql="select * from Appointments where id='$id'";
 $result=mysqli_query($connect,$sql);
 $post= mysqli_fetch_assoc($result);
  $msg='';
  $temp=$post['mechanic'];
  
   if(isset($_POST['submit'])){

   	$name= $_POST['name'];
   	$address= $_POST['address'];
   	$phone= $_POST['phone'];
   	$license= $_POST['license'];
   	$engine= $_POST['engine'];
   	$date= $_POST['date'];
   	$mechanic= $_POST['mechanic'];
    echo $date;
    echo $mechanic;
   	//echo "Submitted";
   	  // if(!$connect){
      //       die("Connection failed: ". mysqli_connect_error());
        //}
        $query = "UPDATE Appointments SET date='$date' , mechanic='$mechanic' WHERE id='$id'";
       $run=mysqli_query($connect,$query); 

       $qquery = "UPDATE mechanic SET seat=(seat-1) WHERE name='$mechanic'";
          $rrun=mysqli_query($connect,$qquery);

       $qqquery = "UPDATE mechanic SET seat=(seat+1) WHERE name='$temp'";
          $rrrun=mysqli_query($connect,$qqquery);

        if($run){
          echo "UPDATED";
          header("Location: /Assignment3/adminpage.php");
          exit;
        }
        else{
          echo "ERROR OCCURED";
        }
        mysqli_close($connect);
   }

 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>User</title>
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
	input[type=text]{
		display: inline-block;
		padding: 12px 20px;
        margin: 8px 0;
        width: 400px;
	}
	input[type=date]{
		display: inline-block;
		padding: 12px 20px;
        margin: 8px 0;
        width: 400px;
	}
	input[type=submit] {
          background-color: black;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
    }

    input[type=submit]:hover {
          background-color: #404040;
    }

     form{
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 8px;
    }

	a{  
		border-radius: 10px;
		background-color: #252525;
		color: white;
		padding: 15px;
		margin: 15px;
		text-decoration:none;
		font-size: 22px;
		
	}
	a:hover{
		background-color: #ddd;
		color: black;
	}
</style>
</head>
<body>
	<h1>Enter the following information</h1><br>
<form name="register" method="post" >
	

	<?php if($msg != ''): ?>
     <div name="alertmsg"><?php echo $msg ?></div>
    <?php endif; ?>

	<div>
	    <label>Name: </label>
        <input type="text" name="name" placeholder="Enter Name" value="<?php echo $post['name'] ?>" readonly>
    </div>
    
    <div>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter Address" value="<?php echo $post['address'] ?>" readonly>
    </div>

    <div>
        <label>Phone Number: </label>
        <input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo $post['phone'] ?>" readonly>
    </div>

    <div>
        <label>Licence number: </label>
        <input type="text" name="license" placeholder="Enter License Number" value="<?php echo $post['license']?>" readonly>
    </div>

    <div>
        <label>Engine number: </label>
        <input type="text" name="engine" placeholder="Enter Engine Number" value="<?php echo $post['engine']?>" readonly>
    </div>

    <div>
    	<label>Appointment Date: </label>
    	<input type="date" name="date" value="<?php echo $post['date'] ?>" required/>
    </div>

    <div>
        <label>Mechanic: </label>
        <input list="mechanics" type="text" name="mechanic" placeholder="Mechanic" value="<?php echo $post['mechanic']?>" required/>
          <datalist id="mechanics">
        	<option value="Jin">
            <option value="Yoongi">
            <option value="Hobi">
            <option value="Namjoon">
        	<option value="Jimin">
        	<option value="Jungkook">
        	<option value="Taehyung">
          </datalist>
    </div>
    <!--Apointment Date-->
    <div>
    	<input type="submit" name="submit" value="Submit">
    </div>
</form><br><br><br><br>

   <div><a  href="firstpage.php">Back to home page</a></div>

</body>
</html>