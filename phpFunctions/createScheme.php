<?php
session_start();
include('config.php');


$loanVal=$_POST['loanVal'];
$lntype1=$_POST['lntype1'];
$lntype2=$_POST['lntype2'];
$lntype3=$_POST['lntype3'];
$lntype4=$_POST['lntype4'];



$res7=mysqli_query($con,"INSERT INTO schemes(SCHM_VAL,30DAY,60DAY,90DAY,100DAY,SCHM_STS) VALUES('".$loanVal."','".$lntype1."','".$lntype2."','".$lntype3."','".$lntype4."','A')");




if (!$res7)
{
	die('Error: at Query 7' . mysqli_error($con));
}
else
{
echo 'ok';
}
?>