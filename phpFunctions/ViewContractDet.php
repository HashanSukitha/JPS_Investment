<?php
session_start();
//$root = realpath($_SERVER["DOCUMENT_ROOT"]);
//include($root.'/phpFunctions/config.php');

include('config.php');
?>

<div class="vwContrSrchBox">
	 	<p>Details</p>
					  
			  <input type="Button" id="ContrGoBack" value=" <<< Back" onclick="Goback()"/>		  
	
</div>



<?php
$x=$_GET['Contr_No'];

echo '<div id="ContrDetCntnr">';
//===========================================================================================================================================
echo '<div id="UpdateDepositBox">
							<div id="dmgFrmClose" onClick="closeFrm(\'UpdateDepositBox\')">X</div>
							<p id="dmgHeader">Day Payment Form</p>
							<table border="1">
								<tr>
									<td class="left">Daily Charge</td>
									<td><input type="text" id="DlyChrg" value="" readonly/></td>
									<input type="hidden" id="LnIDholder" value=""/>
									<input type="hidden" id="LnDateholder" value=""/>
								</tr>
								<tr>
									<td class="left">Arrears Amount</td>
									<td><input type="text" id="ArrAmt" value="" readonly/></td>
								</tr>
								<tr>
									<td class="left">Paying Amount</td>
									<td><input type="text" id="PyingAmt" value=""/></td>
								</tr>
							</table>
							<input type="Button" value="Pay" id="UpdtDpstButtn" onClick="adminSavePay('.$x.')"/>
				</div>';

$sql = "SELECT * FROM loan_header C, customer CC where C.CL_CODE=CC.CL_CODE AND C.LOAN_ID='".$x."'";
		
$result = mysqli_query($con, $sql);

		if (!$result) 
		{
			die('Error: ' . mysqli_error($con));
		} 
		else 
		{					
				while($row = mysqli_fetch_assoc($result)) 
				{
					
					echo '<div id="CntrClintDetBox">';
							
						if($row["LOAN_STS"]=='I')
						{
							 echo '<div id="closedBanner""></div>';
						}
						else
						{
							echo '<div id="closedBanner" style="display:none;"></div>';
						}
							 
						echo '<div id="minimizeCusDet" onClick="minimizeToLeft()"></div>';
						  
						echo '<div class="ContrHeaders">
								<p>Customer Details</p>
							  </div>';
						
						echo '<div id="cntrCusDetHolder">';
								echo'<div id="cntrCusdetBox">';
								
								$imgPath='img_bank/'.$row["CL_CODE"].'.png';
								$imgBoxString='';
								if (file_exists('../img_bank/'.$row["CL_CODE"].'.png'))
								{
									$imgBoxString= '<a class="example-image-link" href="'.$imgPath.'" data-lightbox="example-1" style="float:right">
														<div class="vwRight" style="background:url(img_bank/'.$row["CL_CODE"].'.png) no-repeat scroll 0 0 / 100% auto rgba(0, 0, 0, 0);">   
														</div>
													</a>';
								} 
								else 
								{
									$imgBoxString= '<div class="vwRight">   
													</div>';
								}
								
								echo '<table border="1">
								
										<tr>
											<td width="115px">'.$imgBoxString.'</td>
											<td style="text-align:center;"></td>
										</tr>
										
										<tr>
											<td>Customer Code</td>
											<td>'.$row["CL_CODE"].'</td>
										</tr>
										
										<tr>
											<td>Customer Name</td>
											<td>'.$row["CL_NAME"].'</td>
										</tr>
										
										<tr>
											<td>NIC/Drivig Licence/Passport</td>
											<td>'.$row["CL_NIC"].'</td>
										</tr>
										
										<tr>
											<td>E-mail</td>
											<td>'.$row["CL_EMAIL"].'</td>
										</tr>
										
										<tr>
											<td>Contact Numbers</td>
											<td>
												<table border="1" width="100%">
													<tr><td>Bording</td><td>'.$row["CL_TEL_B"].'</td></tr>
													<tr><td>Permanent</td><td>'.$row["CL_TEL_P"].'</td></tr>
													<tr><td>Work Place</td><td>'.$row["CL_TEL_W"].'</td></tr>
												</table>
											</td>
										</tr>
										
										<tr>
											<td>Addresses</td>
											<td>
												<table border="1" width="100%">
													<tr><td>Bording</td><td>'.$row["CL_ADD_B"].'</td></tr>
													<tr><td>Permanent</td><td>'.$row["CL_ADD_P"].'</td></tr>
													<tr><td>Work Place</td><td>'.$row["CL_ADD_W"].'</td></tr>
												</table>
											</td>
										</tr>
																	
									  </table>';
								echo'</div>';	
							
							
			$contrAmt='';
			$contrDpsitAmt='';
			$contrPnalty='';
						
						echo '</div>';
						
							echo '<div class="ContrHeaders">
								<p>Loan Details</p>
							  </div>';
						  
						echo '<div id="cntrDetHolder">';  
						
							
						
						  echo '<table border="1">
									<tr>
										<td>Loan Number</td>
										<td><div id="cntrNo">'.$row["LOAN_ID"].'</div></td>
									</tr>
									
									<tr>
										<td>Loan Date</td>
										<td>'.$row["LOAN_CREATED"].'</td>
									</tr>
									
									<tr>
										<td>Loan Amount</td>
										<td>Rs.'.$row["LOAN_AMT"].'</td>
									</tr>
															
									<tr>
										<td style="color:#FF0000;font-weight:Bold">Close Loan</td>
										<td> <input type="button" value="CLOSE" id="ClosContrBtn" onClick="CloseContr('.$x.')" /> </td>
									</tr>
								</table>';
														  
						echo '</div>';
						
						
					echo '</div>';
					
					$contrAmt=$row["LOAN_AMT"];		
					
						
				}
		}

//==================================================================================================================================================================

		echo '<div id="LoanDetBox">';
		
			$sql = "SELECT * FROM loan_schedule where LOAN_ID='".$x."'";
			$result = mysqli_query($con, $sql);
			if (!$result) 
			{
				die('Error: ' . mysqli_error($con));
			} 
			else 
			{
				$i=1;
				echo '<table border="1" id="schdlTbl">';
					echo '<tr id="tblHader">
							<td>Day</td>
							<td>Date</td>
							<td>Daily Charg</td>
							<td>Paid Amt</td>
							<td>Arrears Amt</td>
						  </tr>';
				while($row = mysqli_fetch_assoc($result)) 
				{
						$color='';
						$payBtn='';
						
						$arrears=(floatval($row["DAY_AMT"])-floatval($row["PAID_AMT"]));
						
						if($arrears!=0)
						{
							$color="#F90404";
$payBtn='<input type="button" value="pay" class="payBtn" onclick="adminShowPayBox(\''.$row["LOAN_ID"].'\',\''.$row["LOAN_DAY"].'\',\''.$row["DAY_AMT"].'\',\''.$i.'\',\''.$arrears.'\')"/>';
							$CSSclass="blink";
						}
						else
						{
							$color="#06DB58";
							$payBtn='';
							$CSSclass="";
						}
						
					echo '<tr>
							<td>Day '.$i.'</td>
							<td>'.$row["LOAN_DAY"].'</td>
							<td>'.$row["DAY_AMT"].'</td>
							<td style="width:100px;background:'.$color.'">'.$row["PAID_AMT"].$payBtn.'</td>
							<td style="background:'.$color.'" class="'.$CSSclass.'" id="'.$i.'">'.$arrears.'</td>
						  </tr>';
					$i=$i+1;		
				}
				echo '</table>';
			}
		
		
		echo '</div>';
		
		echo '<div id="contrDetControlBox">
				<table>
					<tr>
						<td>Paying Amount (Auto Settle)</td>
						<td><input type="text" id="autoSltAmt" /></td>
						<td><input type="button" id="autoSltBtn" value="Auto Settle" onClick="autoSettlement(\''.$x.'\')"/></td>
					</tr>
				</table>
			  </div>';

echo "</div>";
//=========================================================================================


mysqli_close($con);

?>




