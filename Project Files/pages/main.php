<?php
//	session_start();
//
//	if(isset($_SESSION['logged'])) $flag=true;
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agrotic Store</title>
	<link rel="shortcut icon" href="../images/icon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body>
    <div class="header">

        <h2>Welcome to Agrotic Store</h2>
    </div>
    <div class="main_bar">

       <ul>
           <li><a href="main.php">Αρχική Σελίδα</a></li>
           <li><a href="contact.html">Επικοινωνία</a></li>
           <li><a href="shopPoints.html">Καταστήματα</a></li>
           <li><a href="news.html">News Feed</a></li>
       </ul>
    </div>
    <div class="left_sidebar">

        <span id="left_sidebarP">Categories</span>
		<ul>
			<li><li><a href="lipasmata.php">Λιπάσματα</a></li></li>
			<ul>
				<li><a href="lipasmata.php">Bιο-Λιπάσματα</a></li>
				<li><a href="lipasmata.php">Οργανικα Λιπάσματα</a></li>
				<li><a href="lipasmata.php">Τύρφες-Χώματα</a></li>
			</ul>
			<li><li><a href="biologikaProionta.php">Βιολογικά Προιόντα</a></li></li>
			<ul>
				<li><a href="lipasmata.php">Bιο-Λιπάσματα</a></li>
				<li><a href="lipasmata.php">Βιολογικοί Σπόροι Λαχανικών</a></li>
				<li><a href="lipasmata.php">Τύρφες-Χώματα</a></li>
			</ul>
			<li><li><a href="lipasmata.php">Απωθητικά Ζωων</a></li></li>
			<ul>
				<li><a href="biologicalDrugs.html">Απωθητικά για Φίδια</a></li>
				<li><a href="lipasmata.php">Απωθητικά για Γάτες/Σκύλους</a></li>
				<li><a href="lipasmata.php">Απωθητικά για Περιστέρια</a></li>
				<li><a href="lipasmata.php">Παγίδες</a></li>
			</ul>
			<li><li><a href="lipasmata.php">Προιόντα Υγειονομικής σημασίας</a></li></li>
			<ul>
				<li><a href="biologicalDrugs.html">Εντομοκτόνα</a></li>
			</ul>
			<li><li><a href="lipasmata.php">Γεωργικά Εργαλεία-Μηχανήματα</a></li></li>
			<ul>
				<li><a href="biologicalDrugs.html">Ανοξείδωτα δοχεία τροφίμων</a></li>
				<li><a href="lipasmata.php">Κλαδευτήρια</a></li>
				<li><a href="lipasmata.php">Πριόνια</a></li>
			</ul>
			<li><li><a href="lipasmata.php">Μηχανήματα κήπου</a></li></li>
			<ul>
				<li><a href="biologicalDrugs.html">Ψαλίδια</a></li>
				<li><a href="biologicalDrugs.html">Χορτοκοπτικά</a></li>
			</ul>
			
		</ul>



    </div>

    <div class="right_sidebar">
		<?php
		include_once("connect.php");


			$form='<p>Login Form</p>'.
			'<form action="" method="post">'.
			'Username:<input type="text" name="username" required>'.
			'<br />'.
			'Password:<input type="password"  name="password" required>'.
			'<br /><br />'.
			'<input type="submit" value="Submit">'.
			'</form>'.

			'<a href="register.html"> <p>Register Here</p> </a>';
		//if(!(isset($_SESSION['logged']))) echo $form;
		if(!($_SERVER['REQUEST_METHOD'] == 'POST'))echo $form;
		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{

				$givenUsername = $_POST['username'];
			if (isset($givenUsername))
			{
				$check_for_user_query = "SELECT * from users where username='$givenUsername'";

				$result = mysqli_query($dbc, $check_for_user_query)
				or die(printf("Error: %s\n", mysqli_error($dbc)));
				while ($row = mysqli_fetch_array($result))
				{
					$user_id    = $row['user_id'];
					$first_name = $row['first_name'];
					$last_name  = $row['last_name'];
					$username   = $row['username'];
					$password   = $row['password'];
				}
				if(isset($first_name))
				{
					echo 'You successfully Logged In <br />'.
							$first_name.'    '.$last_name;
					//$_SESSION['logged']=true;

					if($username=='admin') //Change admin for general use;
					{
						echo
								'<div class="account_panel">' .
									'<form id="admin_account" action="account.php" method="POST">'.
										'<input type="text" name="user_id" value="'.$user_id.'" hidden><br>'.
										'<a href="#" onclick="myFunction(1)">My Account</a>'.
									'</form>'.
									'<form id="addProducts" action="addProducts.php" method="POST">'.
										'<input type="text" name="user_id" value="'.$user_id.'" hidden><br>'.
										'<a href="#" onclick="myFunction(2)">Add Products</a>'.
									'</form>'.
									'<form id="RemoveProducts" action="RemoveProducts.php" method="POST">'.
										'<input type="text" name="user_id" value="'.$user_id.'" hidden><br>'.
										'<a href="#" onclick="myFunction(3)">Remove Products</a>'.
									'</form>'.

									'<script>'.
										'function myFunction(formClicked)'.
										'{'.
											'if(formClicked==1) document.getElementById("admin_account").submit();'.
											'else if(formClicked==2) document.getElementById("addProducts").submit();'.
											'else if(formClicked==3) document.getElementById("RemoveProducts").submit();'.
											'alert("You are about to leave the page");'.
										'}'.
									'</script>'.

									'<p><a href="main.php">Log out</a></p>'.
								'</div>';
					}
					else
					{
						echo
								'<div class="account_panel">' .
									'<form id="account" action="account.php" method="POST">'.
										'<input type="text" name="user_id" value="'.$user_id.'" hidden><br>'.
										'<a href="#" onclick="myFunction(1)">My Account</a>'.
									'</form>'.
									'<form id="wallet" action="wallet.php" method="POST">'.
										'<input type="text" name="user_id" value="'.$user_id.'" hidden><br>'.
										'<a href="#" onclick="myFunction(2)">My Wallet</a>'.
									'</form>'.

									'<script>'.
										'function myFunction(formClicked)'.
										'{'.
											'if(formClicked==1) document.getElementById("account").submit();'.
											'else if(formClicked==2) document.getElementById("wallet").submit();'.
											'alert("You are about to leave the page");'.
										'}'.
									'</script>'.

									'<p><a href="main.php">Log out</a></p>'.
									//'<p><a href="logout.php">Log out</a></p>'.
								'</div>';
					}

				}
				else echo 'No user found that matches given input <br />'.$form;
			}
			else echo 'Please Give Username';
		}

		?>
    </div>



    <div class="main_Content">

        <p>News</p>
        <img src="../images/welcomeImage.jpg" width="800" height="400" alt="Welcome Image">
    </div>

    <div class="footer">

        <p>Copyright 2015</p>
    </div>
</body>
</html>
