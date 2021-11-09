<?php 
session_start();

include("Header.php"); 

?>

<div id="ShwUserName">
	<p><?php echo $_SESSION['OFFI_FULLNAME'].' ('.$_SESSION['OFFI_CODE'].')'; ?></p>
</div>

<div id="MenuBar">
	<ul id="mainMenuMainbUl">
<!--===========================================================================================-->
	   <li class="mainMenuItem">Clients
	   		<ul class="mainMenuSubUl">
				<li id="cusReg">Register Client</li>
				<li id="vwCus">View Client Details</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	   <li class="mainMenuItem">Loan Schemes
			<ul class="mainMenuSubUl">
				<li id="regItm">Create Loan Scheme</li>
				<li id="vwItm">View Loan Scheme</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	   <li class="mainMenuItem">Loans
			<ul class="mainMenuSubUl">
				<li id="MchnItms">Create Loan</li>
				<li id="Contr">Loans</li>
			</ul>
	   </li>
	   
<!--===========================================================================================-->
	   <li class="mainMenuItem" id="rptLi">Reports
	   		<ul class="mainMenuSubUl">
				<li id="BstCustRpt">Best Customer Report</li>
				<li id="ContrArrRpt">Contract Arrears Report</li>
				<li id="StokListRpt">Stock List Report</li>
				<li id="CntrDly">Contract Daily Report</li>
				<li id="ClosedCntrRpt">Closed Contract Daily Report</li>
				<li id="CntrSumry">Contract Summary Report</li>
				<li id="FstMvngItms">Fast Moving Items Report</li>
				<li id="BlkLstdCusRpt">Black Listed Customer Report</li>
				<li id="dbtrsRpt">Debtors Report (Unpaid Bills)</li>
			</ul>
	   </li>
<!--===========================================================================================-->
	</ul>
	
	<div class="infoContnr" id="arrInfo">
	
		<div class="infoBox">
		    Arrears Loans
		</div>
		
		<div class="infoCount">
		   1
		</div>
		
	</div>
	
	<a href="#" id="LogButton" onClick="SysUnload()">Log Out</a>
</div>



<div id="container">

	
	
</div>
<?php include("Footer.php"); ?>