<?php
include('phpFunctions\config.php');

//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

$sql = "SELECT *
		FROM loan_header";
		
$sql = str_replace("-", " ", $_GET['qry']);

$result = mysqli_query($con,$sql);

if (!$result) 
{
	die('Error11: ' . mysqli_error($con));
} 
else 
{
echo '<div class="vwContrSrchBox">';
	 	echo '<p>Contracts</p>';
		echo '<div class="srchCntner">
			  
			  <input type="text" id="srchByCusId" value="" placeholder="Customer NIC" onkeyup="SrchContrByCusId(event)" />
			  <input type="text" id="srchByContrNo" value="" placeholder="Contract Number" onkeyup="SrchContrByContrNo(event)"/>
			  
			  </div>';
echo '</div>';


echo '<div id="vwContrContainer">';
	
	while($row = mysqli_fetch_assoc($result)) 
	{
		
		echo '<div class="vwRow">';
					
					if($row["LOAN_STS"]=='I')
					{
					 echo '<div id="closedBanner"></div>';
					 }
						echo '<div class="vwLeft">';
						
							  echo '<div class="vwItemCode">';
									echo '<div class="ContrCodeCntner">'.$row["LOAN_ID"]."</div>";
									//echo '<div class="vwItmSts" style="'.$color.'"></div>';
							  echo '</div>';

							  echo '<div class="editBtnBox"><a href="javascript:ViewContDet('.$row["LOAN_ID"].')" class="EditBtn">View</a></div>';

						echo '</div>';
						
						$no=$row["LOAN_ID"].'.pdf';
						if(file_exists ("docs/Contracts/".$no))
						{
							echo '<a href="docs/Contracts/'.$no.'" target="_blank" title="Reprint"><div class="ReprintBtn"></div></a>';
						}
						
				echo '</div>';
	}
echo '</div>';
echo '<script>
		j(document).ready(function() 
		{
					var heightWindow=0;
					heightWindow=(window.innerHeight-10);
					j("#vwContrContainer").css("height",(heightWindow-54)+"px");
		});
	  </script>';
}


mysqli_close($con);
?>