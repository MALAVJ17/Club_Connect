<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
    ?>





<!DOCTYPE html>
	<head>
		<title>New  Committee Form</title>
	</head>
	<link rel = "stylesheet" type = "text/css" href = "style1.css">
	<centre>
	<img src="tlogo.jpg">
	</centre>
	<hr size=2 color=red width="100%"></hr>
	<centre>
		<pre><strong>
		<text size="20" face="VERDANA" color=BLACK>New Committee Registration</text>
		</srrong></pre>
	</centre>
	<hr size=2 color=red width="100%"></hr>
	
	<form1>1.Committee Name:<INPUT TYPE = "TEXT" NAME = "NAME"><BR><br></form>
	<form2>2.Convener Name:<INPUT TYPE = "TEXT" NAME = "NAME"><BR><br></form>
	<form2>3.Email ID:<INPUT TYPE = "TEXT,TEL" NAME = "ID"><BR><br></form>
	<form3>4.Phone Number:<INPUT TYPE = "PHONE" NAME = "PHONE"><BR><BR></form>
	5.Department:<select name="department" id="subject" selected="selected">
    			<option >Select Department</option>
    			<option value="Computer">Computer</option>
    			<option value="IT">IT</option>
    			<option value="AIDS">AIDS</option>
    			<option value="EXTC">EXTC</option>
     </select><BR><BR> 	
	<form6>6.Remarks:<INPUT TYPE = "TEXT" NAME = "NAME"><BR><BR></form>
	</ol>
	<centre>
	<body>
	<button>SUBMIT</button>
	</centre>
	</body>
</html>
}

<?php

else{
    header("Location: Index.php");
}
?>