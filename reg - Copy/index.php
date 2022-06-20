<?php

require ("logincheck.php");
require ("logout.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button {
	border-radius: 20px;
	border: 1px solid #86cbfa;
	background-color: #74b0f5;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

body {
	background: #84d4f3;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}
    </style>
</head>
<body>

welcome <?php echo $_SESSION["username"]?>.
 <h1>what do you want to do today</h1>

 <form  method="POST">
 <button name="logout">logout</button>

 </form>
</body>
</html>