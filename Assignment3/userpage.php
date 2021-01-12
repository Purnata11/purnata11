<?php 

include 'insert.php';
  $msg='';
  $license='';
  $newlicense='';

$sqll = "SELECT seat from mechanic where name='Jin'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$jin = $roww['seat'];
//echo $jin;

$sqll = "SELECT seat from mechanic where name='Yoongi'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$yoongi = $roww['seat'];
//echo $yoongi;

$sqll = "SELECT seat from mechanic where name='Hobi'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$hobi= $roww['seat'];
//echo $hobi;

$sqll = "SELECT seat from mechanic where name='Namjoon'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$namjoon = $roww['seat'];
//echo $namjoon;

$sqll = "SELECT seat from mechanic where name='Jimin'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$jimin = $roww['seat'];
//echo $jimin;

$sqll = "SELECT seat from mechanic where name='Taehyung'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$taehyung = $roww['seat'];
//echo $taehyung;

$sqll = "SELECT seat from mechanic where name='Jungkook'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$jk = $roww['seat'];
//echo $jk;

   if(isset($_POST['submit'])){
   	$name= $_POST['name'];
   	$address= $_POST['address'];
   	$phone= $_POST['phone'];
   	$license= $_POST['license'];
   	$engine= $_POST['engine'];
   	$date= $_POST['date'];
   	$mechanic= $_POST['mechanic'];
   	//echo "Submitted";
   	
$sqll = "SELECT seat from mechanic where name='$mechanic'";
$resultt = mysqli_query($connect, $sqll);
$roww = mysqli_fetch_assoc($resultt);
$seatnum = $roww['seat'];
//echo $seatnum;


   }

$search_query= "select * from Appointments where license='$license'";
 $search_result= mysqli_query($connect,$search_query);
 if($search_result){ 
 	//echo "works";
    while($rows=mysqli_fetch_assoc($search_result)){
    	$newlicense=$rows['license'];
    	$newdate=$rows['date'];
    }
 }
 

 	else{echo "error";}	

   if(!empty($name) && !empty($address) && !empty($phone) && !empty($license) && !empty($engine) && !empty($date) && !empty($mechanic)){
       //passed
   	  //check phone number
   	 if(filter_var($phone, FILTER_VALIDATE_INT)===false){
   	 	//fail
   	 	$msg= '<b>Please provide valid phone number</b>';
   	 	
   	 }
   	 else  if(filter_var($engine, FILTER_VALIDATE_INT)===false){
   	 	$msg= '<b>Please provide valid engine number</b>';

   	 }
   	 else{
   	 	if($newlicense==$license){
   	 		//fail
   	 		$msg= '<b>You already have an appointment on '.$newdate.'</b>';
   	 	}
   	 	else{
   	 		
   	 	  if ($seatnum==0) {
   	 	  	# fail
   	 	  	 $msg= '<b>No free slot for '.$mechanic.'</b>';
   	 	  }
   	 	  else{

             if(!$connect){
            die("Connection failed: ". mysqli_connect_error());
        }
        $query = "INSERT INTO Appointments(name,address,phone,license,engine,date,mechanic) VALUES ('$name', '$address', '$phone', '$license', '$engine', '$date', '$mechanic')";

        $run=mysqli_query($connect,$query);

        if($run){
        	echo "SUBMITTED";
        	$qquery = "UPDATE mechanic SET seat=(seat-1) WHERE name='$mechanic'";
        	$rrun=mysqli_query($connect,$qquery);
        }
        else{
        	echo "ERROR OCCURED";
        }
        mysqli_close($connect);
   	 	}

   	 	  }

   	 }

   	
     }

    else{
       //failed
      $msg='<b>Please Fill in all the Fields</b>';
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
<form name="register" method="post" action="userpage.php">
	

	<?php if($msg != ''): ?>
     <div name="alertmsg"><?php echo $msg ?></div>
    <?php endif; ?>

	<div>
	    <label>Name: </label>
        <input type="text" name="name" placeholder="Enter Name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
    </div>
    
    <div>
        <label>Address:</label>
        <input type="text" name="address" placeholder="Enter Address" value="<?php echo isset($_POST['address']) ? $address : ''; ?>">
    </div>

    <div>
        <label>Phone Number: </label>
        <input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo isset($_POST['phone']) ? $phone : ''; ?>">
    </div>

    <div>
        <label>Licence number: </label>
        <input type="text" name="license" placeholder="Enter License Number" value="<?php echo isset($_POST['license']) ? $license : ''; ?>">
    </div>

    <div>
        <label>Engine number: </label>
        <input type="text" name="engine" placeholder="Enter Engine Number" value="<?php echo isset($_POST['engine']) ? $engine : ''; ?>">
    </div>

    <div>
    	<label>Appointment Date: </label>
    	<input type="date" name="date" value="<?php echo isset($_POST['date']) ? $date : ''; ?>">
    </div>

    <div>
        <label>Mechanic: </label>
        <input list="mechanics" type="text" name="mechanic" placeholder="Mechanic" value="<?php echo isset($_POST['mechanic']) ? $mechanic : ''; ?>">
          <datalist id="mechanics">
        	<option value="Jin"><?php echo "free slot: ".$jin ?></option>
            <option value="Yoongi"><?php echo "free slot: ".$yoongi ?></option>
            <option value="Hobi"><?php echo "free slot: ".$hobi ?></option>
            <option value="Namjoon"><?php echo "free slot: ".$namjoon ?></option>
        	<option value="Jimin"><?php echo "free slot: ".$jimin ?></option>
        	<option value="Jungkook"><?php echo "free slot: ".$jk  ?></option>
        	<option value="Taehyung"><?php echo "free slot: ".$taehyung ?></option>
          </datalist>
    </div>
    <!--Apointment Date-->
    <div>
    	<input type="submit" name="submit" value="Submit">
    </div>
</form><br><br><br><br>

   <div><a href="firstpage.php">Back to home page</a></div>

</body>
</html>