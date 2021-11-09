<div id="HireTabContainer">

	<div class="HireTabBox" id="HireTab1">
			<div class="HireTabTitleBar" id="HireTabBar1" onclick="tab('HireTab1')">
			   <p>Clients</p>
			</div>
			
			<?php
			echo '<div class="vwSrchBox">';
				echo '<p>Details</p>';
				echo '<div class="srchCntner">
				
					  <input type="text" id="srchByClCode" value="" placeholder="By Code" onKeyUp="SrchByClCode(event)" />
					  <input type="text" id="srchByName" value="" placeholder="By Name"/>
					  <input type="text" id="srchByID" value="" placeholder="By NIC/Passport/DRL" onKeyUp="SrchByClNIC(event)" />
					  
					  </div>';
			echo '</div>';
			?>
			
			<div id="HireCustomer">
			   <!--load content from js function at header file-->
			</div>
			
			<div id="HireSlctdClntDtls">
			
				
				<input type="text" id="SelectedCusCode" readonly/>
				
				<div class="HireSlctdBox">
					<label>CustomerName :- </label>
					<div id="HireSlctdCusName" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				<div class="HireSlctdBox">
					<label>NIC/Drivig Licence/Passport :- </label>
					<div id="HireSlctdCusNIC" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				<div class="HireSlctdBox">
					<label>Customer Contacts :- </label>
					<div id="HireSlctdCusCntct" class="HireSrchVal">xxxxxxxxxxxx</div>
				</div>
				
				
			</div>
	</div>
	
	<div class="HireTabBox" id="HireTab2">
			<div class="HireTabTitleBar" id="HireTabBar2" onclick="tab('HireTab2')">
			    <p>Loan Schemes</p>
			</div>
			
			
			<div id="HireItmDtlsCntnr">
				<?php 
				//echo '<div class="vwItmSrchBox">';
				//				echo '<p>Details</p>';
				//				echo '<div class="srchCntner">
				  
				//					  <input type="text" id="srchByName" value="By Itm Name"/>
				//					  <input type="text" id="srchByCatCode" value="Cat Code"/>
				//					  <input type="text" id="srchByItmCode" value="Itm Code"/>
				//  
				//					 </div>';
				//echo '</div>'; 
				?>
				
				<div id="HireItems">
				   <!--load content from js function at header file-->
				</div>
			</div>

			<div id="hireItmCntrolBox">
			
			   
			   
			   
			   
			   <div id="PrntBtnCntner">
				<button id="SaveContr" onclick="SaveContract()" enabled >SAVE LOAN</button>
				<button class="genButtons" onclick="PrintContrReceipt()" style="display:none">Print Receipt</button>
				
			   </div>
			   <!--<div style="overflow:scroll; width:100px; height:300px; color:#FFFFFF; border:1px solid #fff" id="tempDate"></div>-->
				<input type="text" id="ContrNo" value="" readonly />
			   
			   <iframe id="printDump"></iframe>
			</div>
			
	</div>


</div>
