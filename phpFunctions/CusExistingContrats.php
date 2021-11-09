<?php
include('config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');


$sql = "SELECT	LOAN_ID FROM `loan_header` WHERE CL_CODE='".$_POST['custCode']."' AND LOAN_STS='A'";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con)); 
} 
else 
{
   while($row = mysqli_fetch_assoc($result)) 
	{
        echo $row["LOAN_ID"].',';
	}
}

mysqli_close($con);



?> 