<?php
include('phpFunctions\config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');



$sql = "SELECT * FROM schemes";

$result = mysqli_query($con, $sql);

if (!$result) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{

echo '<div class="vwItmSrchBox">';
		echo '<p>Loan Scheme Details</p>';
		//echo '<div class="srchCntner">
			  
		//	  <input type="text" id="srchByName" value="By Itm Name"/>
		//	  <input type="text" id="srchByCatCode" value="By Category Code"/>
		//	  <input type="text" id="srchByCntct" value="By Itm Code"/>
			  
		//	  </div>';
echo '</div>';

    echo '<div id="vwItmContainer">';
			while($row = mysqli_fetch_assoc($result)) 
			{		
			
				echo '<div class="vwRow">';
						echo '<div class="vwLeft">';
						
							  echo '<div class="vwItemCode">';
							        echo '<div class="ItmCatCode">SCHM'.$row["SCHM_ID"].'</div>';
									echo '<div class="itmCodeCntner">'.$row["SCHM_ID"]."</div>";
									echo '<div class="vwItmSts"></div>';
							  echo '</div>';
							  

							  		echo  '<p id="schmVal">'.$row["SCHM_VAL"].'</p>';
									echo  '<p id="schm30Days">'.$row["30DAY"].'</p>';
									echo  '<p id="schm60Days">'.$row["60DAY"].'</p>';
									echo  '<p id="schm90Days">'.$row["90DAY"].'</p>';
									echo  '<p id="schm100Days">'.$row["100DAY"].'</p>';
							  
		                     // $code=$row["SCHM_ID"];
							 //  echo '<div class="editBtnBox"><a href="javascript:editItem(\''.$row["ITM_QTY"].'\',\''.$row["ITM_CODE"].'\',\''.$row["ITM_CAT_CODE"].'\',\''.$row["ITM_NAME"].'\',\''.$row["SIZE"].'\',\''.$row["ITM_DLY_CHG"].'\',\''.$row["ITM_DLY_DPST"].'\',\''.$row["ITM_MNLY_CHG"].'\',\''.$row["ITM_MNLY_DPST"].'\',\''.$row["ITM_VAL"].'\',\''.$row["ITM_TYPE"].'\')" class="EditBtn">Edit</a></div>';
			
						echo '</div>';
						
				echo '</div>';
			}
    echo '</div>';
}

mysqli_close($con);



?> 