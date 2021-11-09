// JavaScript Document By Hashan Wickramasinghe


function validateItem()
{
	var loanVal=$("input#LOANVAL" ).val();
	var lntype1 = $("input#30_DAYS" ).val();
	var lntype2 = $("input#60_DAYS").val();
	var lntype3 = $("input#90_DAYS" ).val();
	var lntype4 = $("input#100_DAYS").val();
	

	
	if (loanVal == null ||  loanVal == "")
	{
		
		alert("Enter 'Loan Value'");
	}
	else
	{
		if(lntype1 == null ||  lntype1 == "")
		{
			alert("Enter '30 DAYS' ");
		}
		else
		{
				if(lntype2 == null ||  lntype2 == "")
				{
						
					alert("Enter '60 DAYS'");
				}
				else
				{
					if(lntype3 == null ||  lntype3 == "")
					{
							
						alert("Enter '90 DAYS'");
					}
					else
					{
						
						if(lntype4 == null ||  lntype4 == "")
						{
							alert("Enter '100 DAYS'");
						}
						else
						{
							if (confirm('Do you want to Continue?'))
							{
							SaveItem();
							}
						}

						
					}
				}
		}
	}
}

function SaveItem()
{
	
	var loanVal=$("input#LOANVAL" ).val();
	var lntype1 = $("input#30_DAYS" ).val();
	var lntype2 = $("input#60_DAYS").val();
	var lntype3 = $("input#90_DAYS" ).val();
	var lntype4 = $("input#100_DAYS").val();
	
	
	
	
	
	
			var dataString ='loanVal='+loanVal+'&lntype1='+lntype1+'&lntype2='+lntype2+'&lntype3='+lntype3+'&lntype4='+lntype4;
			
			
			
			
			
				 $.ajax({
						type: "POST",
						url: "phpFunctions/createScheme.php", 
						data: dataString,
						cache: false,
						success: function(result)
								{
									if(result=='ok')
									{
									
										$("#ItmControls").append('<div class="cretMsg">Details Saved Successfuly</div>');
										$("input#LOANVAL" ).val('');
										$("input#30_DAYS" ).val('');
										$("input#60_DAYS").val('');
										$("input#90_DAYS" ).val('');
										$("input#100_DAYS").val('');
									}
										
								},
            			error: function(data) 
								{
                					$("#ItmControls").append(result);
            					}
						});
}


	
