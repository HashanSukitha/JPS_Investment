<?php
include('config.php');



$LoanId=$_POST['LoanId'];
$SltmntAmt=$_POST['SltmntAmt'];

$RemToPay=0;
$RemToSettle=0;
$schdulId='';

$sql = "SELECT * FROM loan_schedule WHERE LOAN_ID='".$LoanId."' AND DAY_AMT > PAID_AMT";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) 
{
    $RemToSettle=$SltmntAmt;
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		$RemToPay=$row["DAY_AMT"] - $row["PAID_AMT"];
		$schdulId=$row["SCHEDULE_ID"];
		
		if($RemToSettle!=0)
		{
			if($RemToSettle >= $RemToPay)
			{
			  $sql="UPDATE loan_schedule SET PAID_AMT=(PAID_AMT+".$RemToPay.") WHERE LOAN_ID='".$LoanId."' AND SCHEDULE_ID='".$schdulId."'";
			  $res=mysqli_query($con1, $sql);
				if (!$res)
				{
					die('Error: ' . mysqli_error($con1));
				}
				else
				{
				   $RemToSettle=$RemToSettle-$RemToPay;
				}
			}
			elseif($RemToSettle < $RemToPay)
			{
			  $sql="UPDATE loan_schedule SET PAID_AMT=(PAID_AMT+".$RemToSettle.") WHERE LOAN_ID='".$LoanId."' AND SCHEDULE_ID='".$schdulId."'";
			  $res=mysqli_query($con1, $sql);
				if (!$res)
				{
					die('Error: ' . mysqli_error($con1));
				}
				$RemToSettle=0;
			}
		}
	}
	
} 
echo $RemToSettle;

?>