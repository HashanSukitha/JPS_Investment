<?php
session_start();
include('config.php');
include('../SMS/ContractCreatedSMS.php');



$ClintCode = $_POST['CliCode'];
$Lnamt=$_POST['Lnamt'];
$Lndays=$_POST['Lndays'];
$LnChrgPerDay=$_POST['LnChrgPerDay'];
$LnschmID=$_POST['LnschmID'];

//=============================================================================
date_default_timezone_set('Asia/Colombo');
$sql="CALL SAV_LOAN('".$ClintCode."','".$Lnamt."','".$Lndays."','".date("Y-m-d H:i")."','".$LnChrgPerDay."','".$LnschmID."',@LN_ID)";

mysqli_query($con,$sql);
$res=mysqli_query($con, "SELECT @LN_ID");


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  }
else
{
	$row = mysqli_fetch_array($res,MYSQLI_NUM);
	
	$schmLenth=substr($Lndays,0,2);

	for($i=0;$i<$schmLenth;$i++)
	{
		$date = new DateTime('+'.$i.' day');
		//echo $date->format('Y-m-d'). "\n";
		$LnDate=$date->format('Y-m-d');
		
		$res1=mysqli_query($con,"INSERT INTO Loan_schedule(`LOAN_ID`,`LOAN_DAY`,`DAY_AMT`) VALUES('".$row[0]."','".$LnDate."','".$LnChrgPerDay."')");
						if (!$res1)
						{
							 die('Error: at Query 1' . mysqli_error($con));
						}
		
	}
	echo $row[0];
} 



?>