<?php
session_start();
include('config.php');



$sql="UPDATE item_damages SET DMG_CMPLTD_OFFI='".$_SESSION['OFFI_CODE']."' , DMG_CMPLTD_DATE='".$_POST['cmpltdDate']."' , DMG_STS='completed' , DMG_WRKSHP_CMMT='".$_POST['dmgCmpltdCmnt']."'    WHERE DMG_ITM_CODE='".$_POST['itmCode']."'";


$res=mysqli_query($con,$sql);


if (!$res)
  {
  die('Error: ' . mysqli_error($con));
  echo 'Page is broken'; 
  }
else
{
	echo 'Saved Successfully';
}

?>