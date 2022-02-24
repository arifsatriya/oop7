<?php
session_start();
//return to login if not logged in
if (!isset($_SESSION['user']) || (trim ($_SESSION['user']) == '')){
	$_SESSION['message'] = 'You need to login first';
	header('location:index.php');
}
 
include_once('koneksi.php');
 
//fetch user data
$sql = "SELECT * FROM users WHERE id = '".$_SESSION['user']."'";
$row = $user->details($sql);
 
?>

<html>
<head>
	
	<title>PHP Login using OOP Approach</title>
</head>
<body>
<div class="container">
	<h1>PHP Login using OOP</h1>
	<div class="row">
		<div>
			<h2>Welcome to Homepage </h2>
			<h4>User Info: </h4>
			<p>Nama : <?php echo $row['fname']; ?></p>
			<p>User ID: <?php echo $row['username']; ?></p>
			<p>Password: <?php echo $row['password']; ?></p>
			<p>Database: <?php echo $user->mark(); ?></p>
			<a href="logout.php">Logout</a>
		</div>
	</div>
</div>
</body>
</html>