<?php 
session_start();
include('../config.php');
//require('u/fpdf.php');
require('WriteHTML.php');


$udxarr    = json_decode(str_replace('\\', '', $_POST['newOrder']));
$rowCount  = $_POST['rows'];
$grandTot = $_POST['Gtot'];  
$itmTot = $_POST['tot']; 
$totPnlty = $_POST['totPnlty']; 
$cntrNo = $_POST['cntrNo'];
$dpsit = $_POST['dpsit'];
$isFinl = $_POST['isFinl'];
						
//======================================================================

$sql10 = "SELECT CD_CODE FROM code_sys WHERE CD_NAME='Receipt'";
$result10 = mysqli_query($con, $sql10);		
if (!$result10) 
{
	die('Error: ' . mysqli_error($con));
} 
else 
{
	while($row10 = mysqli_fetch_assoc($result10)) 
	{
		$RcptNo=$row10["CD_CODE"];
		
	}
	mysqli_query($con,"update code_sys SET CD_CODE='".($RcptNo+1)."' WHERE CD_NAME='Receipt'");
}


//======================================================================

$pdf=new PDF_HTML();
$pdf->Open();
$pdf->AddPage();
$pdf->SetFont('Arial');
date_default_timezone_set('Asia/Colombo');

$pdf->WriteHTML('<HR><p ALIGN="left"><B><I>PS Ekamuth Enterprices</I></B><BR>No.50, Hill St, Dehiwala, <BR>Tel :- 011 2 710266 / 011 4 579517</p><BR>
					<P ALIGN="right">Receipt No :- '.$RcptNo.'</P><BR>
					<P ALIGN="right">'.date("Y-m-d h:i").'</P><P ALIGN="left">Officer Code :- '.$_SESSION['OFFI_CODE'].'</P><BR><P ALIGN="left">Contract No :- '.$cntrNo.'</P><BR><P ALIGN="center"><B>ITEM RETURNED RECEIPT</B></P>
				<HR>');
				
$pdf->SetFont('Arial','',6);	
$pdf->Cell(10,5,'Itm Code','LTB',0,'C',0);	
$pdf->Cell(70,5,'Desc','LTB',0,'C',0);
$pdf->Cell(15,5,'From','LTB',0,'C',0);
$pdf->Cell(15,5,'To','LTB',0,'C',0);	
$pdf->Cell(20,5,'Returned','LTB',0,'C',0);
$pdf->Cell(10,5,'Retn Qty','LTB',0,'C',0);
$pdf->Cell(10,5,'Day Rntl','LTB',0,'C',0);
$pdf->Cell(10,5,'Days','LTB',0,'C',0);
$pdf->Cell(10,5,'Amount','LTB',0,'C',0);
$pdf->Cell(10,5,'Pnlty Amt','LTB',0,'C',0);
$pdf->Cell(10,5,'Total Amt','LRTB',0,'C',0);			
$pdf->WriteHTML('<BR>');
		for($i=0;$i<$rowCount;$i++)
		  {
		   $strng='';
		        //============================================
				for($j=0;$j<=10;$j++)
				{
					
					 $strng=$strng.$udxarr[$i][$j]." ";
					$ItmCode=$udxarr[$i][0];
					$ItmName=$udxarr[$i][1];
					$Hfrom=$udxarr[$i][2];
					$Hto=$udxarr[$i][3];
					$NofDays=$udxarr[$i][4];
					$DlyChrg=$udxarr[$i][5];
					$ItmTot=$udxarr[$i][6];
					$Pnlty=$udxarr[$i][7];
					$CntrNo=$udxarr[$i][8];
					$RtnedDate=$udxarr[$i][9];
					$RtnQty=$udxarr[$i][10];					
				}
				//==========================================================================
				$date1 = new DateTime($Hfrom);
				$date2 = new DateTime(date("Y-m-d"));
				
				$Ddiff=date_diff($date1,$date2);
				$Ddiff=(($Ddiff->format("%a")));
				
				if(date('H:i', time())>'09:00')
			 	{
					$Ddiff=$Ddiff+1 ;
			 	}
				//==========================================================================
				//$pdf->SetFont('Arial','',10);
				$pdf->Cell(10,5,$ItmCode,'LTB',0,'L',0);	
				$pdf->Cell(70,5,$ItmName,'LTB',0,'L',0);
				//$pdf->SetFont('Arial','',9);
				$pdf->Cell(15,5,$Hfrom,'LTB',0,'C',0);
				$pdf->Cell(15,5,$Hto,'LTB',0,'C',0);	
				//$pdf->SetFont('Arial','',6);
				$pdf->Cell(20,5,date("Y-m-d H:i"),'LTB',0,'L',0);
				$pdf->Cell(10,5,$RtnQty,'LTB',0,'R',0);
				$pdf->Cell(10,5,($RtnQty*$DlyChrg),'LTB',0,'C',0);
				$pdf->Cell(10,5,$Ddiff,'LTB',0,'C',0);
				//$pdf->SetFont('Arial','',8);
				$pdf->Cell(10,5,$ItmTot,'LTB',0,'R',0);
				$pdf->Cell(10,5,$Pnlty,'LTB',0,'R',0);
				$pdf->Cell(10,5,($ItmTot+$Pnlty),'LRTB',0,'R',0);	
				$pdf->WriteHTML('<BR>');
				//echo $ItmCode." ".$ItmName." ".$Hfrom." ".$Hto." ".$NofDays." ".$DlyChrg." ".$ItmTot." ".$Pnlty." ".$CntrNo." ".$RtnedDate." ".'<br>';
		   } 	
		   //============Itm total============================
		   $pdf->Cell(160,5,'','',0,'L',0);		
		   //$pdf->Cell(20,5,'Item Total','LRTB',0,'L',0);
		   $pdf->Cell(10,5,$itmTot,'LB',0,'R',0);
		   $pdf->Cell(10,5,$totPnlty,'',0,'R',0);
		   $pdf->Cell(10,5,' ','R',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   $pdf->SetFont('Arial','',8);	
		   //============pnlty total============================
		   //$pdf->Cell(150,5,'','',0,'L',0);		
		  // $pdf->Cell(20,5,'Penalty Total','LRTB',0,'L',0);
		   //$pdf->Cell(20,5,$totPnlty,'LRTB',0,'R',0);
		   //$pdf->WriteHTML('<BR>');
		   //============grand total============================
		   //$pdf->SetFont('Arial','',10);	
		   
		    $val=$dpsit-$grandTot;
					if($dpsit>$grandTot)
				   {
						$sign='-';
				   }
				   else
				   {
						$sign='+';
				   }
		   if($isFinl=='yes')
		   {
				   $pdf->Cell(150,5,'','',0,'L',0);	
				   $pdf->Cell(20,5,'Deposit Rs.','',0,'L',0);
				   $pdf->Cell(20,5,$dpsit,'LRTB',0,'R',0);
				   $pdf->WriteHTML('<BR>');
		   }
		   
		   $pdf->Cell(150,5,'','',0,'L',0);		
		   $pdf->Cell(20,5,'Total Rs.','',0,'L',0);
		   $pdf->Cell(20,5,'('.$grandTot.')','LRTB',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   
		   $pdf->Cell(150,5,'','',0,'L',0);	
		   $pdf->Cell(20,5,' ','',0,'R',0);
		   $pdf->Cell(20,5,$sign.$val,'LRTB',0,'R',0);
		   $pdf->WriteHTML('<BR>');
		   
		   $pdf->Cell(150,0.5,'','',0,'L',0);	
		   $pdf->Cell(20,0.5,' ','',0,'R',0);
		   $pdf->Cell(20,0.5,' ','LRTB',0,'R',0);
			
$pdf->WriteHTML('<BR><BR><HR><p ALIGN="center"><B>Thank You Come Again</B></p><HR>');				
				


$filename="../../docs/ItemReturnReceipts/".$RcptNo.".pdf";
$pdf->Output($filename,'F');
echo $RcptNo;
?>



