<?php 

session_start();

?>

<html>
<title>J.P.S Investment</title>
<head>
<link rel="stylesheet" href="css/logInStyles.css"/>
<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-1.10.2.js"></script>

<script>
var j = jQuery.noConflict();

function SysLoad()
{

//alert("log");
//j("html").load("Home.php");
//window.location.replace("http://stackoverflow.com");

//alert(document.getElementById("Uname").value);

	var uname=document.getElementById("Uname").value;
	var pswd=document.getElementById("pwd").value;
	
	
	if((uname=="")||(uname.length==0))
	{
		alert("Please enter User Name");
	}
	else
	{
		if((pswd=="")||(pswd.length==0))
		{
			alert("Please enter Password");
		}
		else
		{
			j.ajax({
						type: 'post',
						url: 'phpFunctions/SESSIONS.php',
						data: { 
								un:uname,
								pwd:pswd
							   },
						success: function(result)
						{
							
							//alert(result);
							if(result=="OK")
							{
							   window.location.replace("Home.php");
							}
							else
							{
								alert(result);
							}
						},
						error: function(data) 
						{
								alert(data);
						}	
			
				})
		}
	}
}
</script>

<script>
j( document ).ready(function() 
{
getWindowHieght();
});

function getWindowHieght()
{
	var heightWindow=0;
	heightWindow=j(window).height(); 
	
	j("html").css("height",heightWindow);
}
</script>

</head>

<body>
<?php    
//header('Location:Home.php');    
?>

<div id="logBox">
		<div id="logIcon"></div>
	<input type="text" id="Uname" placeholder="User Name" />
	<input type="password" id="pwd" placeholder="Password" />
	<input type="button" id="LoginButton" value="Log In" onClick="SysLoad()"/>
</div>

</body>

</html>