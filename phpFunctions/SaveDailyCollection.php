<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('config.php');
//include('../SMS/ItmReturnedSMS.php');

$loanid = $_POST['loanid'];
$LnDtholder = $_POST['LnDtholder'];
$pyingAmt  = $_POST['pyingAmt'];


	 

					
$res7=mysqli_query($con,"UPDATE `loan_schedule` SET `PAID_AMT`=(PAID_AMT+".$pyingAmt.") WHERE LOAN_ID='".$loanid."' and LOAN_DAY='".$LnDtholder."'");
					if (!$res7)
					{
						 die('Error: at Query 7' . mysqli_error($con));
					}
					



//ItemReturnedSMS($CntrNo,$con);



?>