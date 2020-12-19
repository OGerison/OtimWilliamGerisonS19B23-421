<?PHP
$host = "localhost";
$user ="root"; 
$password = "";
$database = "feedback";
$connection = new mysqli ($host,$user,$password,$database);
if ($connection -> error)
{print("ERROR");
}
else {
	print ("CONNECTION SUCCESSFUL");
}
if (isset($_POST ['SAVE'])){
	echo "<br>";	
	$names = $_POST['name'];
	$emailed = $_POST['emails'];
	$telephones = $_POST['telephone'];
	$comments = $_POST['comment'];
	
	$sql = "insert into contact_us(Name,Email,Telephone,Comment)values('$names','$emailed','$telephones','$comments')";
	if ($connection -> query($sql)){
		echo"User Data inserted successfully.";
	}
else		{
	echo "Error is here." .$connection ->error;
	}
}

if (isset($_POST ['SAVED'])){
	$sql = "select * from contact_us";
	$myquery = $connection->query($sql);
	$result = $myquery ->fetch_assoc();
	while($result = $myquery->fetch_assoc()){
		echo "<br>";
		print $result['Name']."".$result['Email']."".$result['Telephone']."".$result['Comment'];
		echo"<br>";
	}
}
?>

<!DOCTYPE>
<html>
<head>
    <title>ABOUT</title>
    <link rel="stylesheet" href="otimwilliamgerisoncss.css">
    <meta charset = "utf-8">
</head>
<body>
<div class="header">
	<div class="header-logo">
	<img src="ortis.jpg"height = "50px" width = "50px">
	</div>
	<h1>OTIM WILLIAM GERISON</h1>
</div>
<h2>S19B23/421</h2>
<h2>BSCS 2</h2>
<hr width = "100%">
<h2>COURSE EXPECTATIONS</h2>
<h3>To understand web development on a greater scale and use the knowledge in future projects.</h3>
<h2>LANGUAGES KNOWN.</h2>
<b>
<ol>
	<li>C++</li>
	<li>Java</li>
	<li>HTML & CSS</li>
	<li>PHP</li>
	</ol>
</b>
<h2>HOBBIES</h2>
<b>
<ul>
	<li>Watching and analyzing football.</li>
	<li>Watching Documentaries.</li>
	<li>Travelling.</li>
</ul>
</b>
<b>
<p>Type Your Feedback Down Below.
<a href="https://moodle.ucu.ac.ug/login/index.php">
<img border="0" alt="ortis" src="ortis.jpg" width="200px" height="200px"></a>
</p>
</b>
</div>
<div>
<form action ="otimwilliamgerison.php" method = "POST">
	Name
	<input type="text" name = "name"/>
	<br>
	Email
	<input type="text" name = "emails"/>
	<br>
	Telephone 
	<input type="text" name = "telephone"/>
	<br>
	Comment
	<input type="text" name = "comment"/>
	<br>
	<input type="submit" name = "SAVE"  value = "INSERT" />
	<input type="submit" name = "SAVED"  value = "DISPLAY" />
</form>	
</div>
</body>
</html>
