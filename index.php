<?php
	//memulai sesi
	session_start();
 
	//pilih tampilan jika sudah login
	if(isset($_SESSION['user'])){
		header('location:home.php');
	}
	
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login-box">
			<form method="POST" action="proses.php" name="login">
                <input type="text" name="username" placeholder="Username">
            	<input type="password" name="password" placeholder="Password">
            	<input type="submit" name="login" value="Log in">
            </form>
      
			<?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert_info">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php
		    		unset($_SESSION['message']);
		    	}
		    ?>
	</div>
</body>
</html>