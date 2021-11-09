<?php
session_start();
include('config.php');

//header('Location: ../Home.php');
//exit();  
if(!empty($_POST["un"]))
{
		$_SESSION['userName']=$_POST['un'];
		$_SESSION['pwd']=$_POST['pwd'];
		
		//echo $_SESSION['userName'];
		//echo $_SESSION['pwd'];
		
		
		$sql = "SELECT * FROM officer where USER_NAME='".$_POST['un']."' AND PWD='".$_POST['pwd']."'";
		
		$result = mysqli_query($con, $sql);
		
		if (mysqli_num_rows($result) > 0) 
		{
		
			while($row = mysqli_fetch_assoc($result)) 
			{
			    $_SESSION['OFFI_CODE']= $row["OFFI_CODE"];
				$_SESSION['OFFI_FULLNAME']=$row["OFFI_NAME"];
				//header('Location: ../Home.php');
				echo "OK";
			}
		} 
		else 
		{
			die('Error: Invalid "User Name" / "Password" ' . mysqli_error($con));

		}
		
		mysqli_close($con);
}

?>