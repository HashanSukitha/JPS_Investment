<?php
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');
include('..\phpFunctions\config.php');

$sql = "SELECT * FROM schemes";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

							  
echo '<table border="0" id="schmHeaders">
			<tr>
				<td><p id="schmNullHed"></p></td>
				<td><p id="schmVal">Amount</p></td>
				<td><p id="schm30Days">30 Days</p></td>
				<td><p id="schm60Days">60 Days</p></td>
				<td><p id="schm90Days">90 Days</p></td>
				<td><p id="schm100Days">100 Days</p></td>
			<tr>
	   <table>';				  




    echo '<div id="vwItmContainer">';
	$checkBoxId=0;
			while($row = mysqli_fetch_assoc($result)) 
			{		
				echo '<div class="vwRow">';
						echo '<div class="vwLeft">';
						
							  echo '<div class="vwItemCode">';
							        echo '<div class="ItmCatCode">SCHM'.$row["SCHM_ID"].'</div>';
									echo '<div class="itmCodeCntner">'.$row["SCHM_ID"]."</div>";
									echo '<div class="vwItmSts">'.$row["SCHM_STS"].'</div>';
							  echo '</div>';
							  

			echo  '<p id="schmVal">'.$row["SCHM_VAL"].'</p>';
echo  '<p id="schm30Days">'.$row["30DAY"].'<input type="checkbox" id="'.$checkBoxId.'" onclick="Selectedscheme(\''.$row["SCHM_VAL"].'\',\'30DAY\',this,\''.$row["30DAY"].'\',\''.$row["SCHM_ID"].'\')"/> </p>';
					$checkBoxId=$checkBoxId+1;
echo  '<p id="schm60Days">'.$row["60DAY"].'<input type="checkbox" id="'.$checkBoxId.'" onclick="Selectedscheme(\''.$row["SCHM_VAL"].'\',\'60DAY\',this,\''.$row["60DAY"].'\',\''.$row["SCHM_ID"].'\')"/> </p>';
					$checkBoxId=$checkBoxId+1;
echo  '<p id="schm90Days">'.$row["90DAY"].'<input type="checkbox" id="'.$checkBoxId.'" onclick="Selectedscheme(\''.$row["SCHM_VAL"].'\',\'90DAY\',this,\''.$row["90DAY"].'\',\''.$row["SCHM_ID"].'\')"/> </p>';
					$checkBoxId=$checkBoxId+1;
echo  '<p id="schm100Days">'.$row["100DAY"].'<input type="checkbox" id="'.$checkBoxId.'" onclick="Selectedscheme(\''.$row["SCHM_VAL"].'\',\'100DAY\',this,\''.$row["100DAY"].'\',\''.$row["SCHM_ID"].'\')"/> </p>';
					$checkBoxId=$checkBoxId+1;
							  

						echo '</div>';
						
				echo '</div>';
			}
    echo '</div>';
}

mysqli_close($con);

?> 