<?php
session_start();
if(isset($_SESSION['logged'])) $flag=true;
else $flag=false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Agrotic Store</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="javascript/script.js"></script>
    <link rel="shortcut icon" href="../images/site_images/icon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="../css/main.css" />
</head>
<body onload = "startTimer()">
    <div class="header">
		<img src="../images/site_images/background.png" id="im" />
    </div>
    <div class="main_bar">
		<div class="text">
			<ul>
				<li><a href="main.php">Αρχική Σελίδα</a></li>
				<li><a href="contact.html">Επικοινωνία</a></li>
				<li><a href="shopPoints.html">Καταστήματα</a></li>
			</ul>
		</div>
    </div>
    <div class="left_sidebar">

		<div id='cssmenu'>
			<ul>

				<li class='has-sub'><a href='#'>Λιπάσματα</a>
					<ul>
						<li><a href="products_php_files/products.php?category=lipasmata&sub-category=biologika">Bιο-Λιπάσματα</a></li>
						<li><a href="products_php_files/products.php?category=lipasmata&sub-category=organika">Οργανικα Λιπάσματα</a></li>
						<li><a href="products_php_files/products.php?category=lipasmata&sub-category=xomata">Τύρφες-Χώματα</a></li>
					</ul>
				</li>
				<li class='has-sub'><a href='#'>Απωθητικά Ζωων</a>
					<ul>
						<li><a href="products_php_files/products.php?category=apothitika&sub-category=fidia">Απωθητικά για Φίδια</a></li>
						<li><a href="products_php_files/products.php?category=apothitika&sub-category=gates">Απωθητικά για Γάτες/Σκύλους</a></li>
						<li><a href="products_php_files/products.php?category=apothitika&sub-category=poulia">Απωθητικά για Περιστέρια</a></li>
						<li><a href="products_php_files/products.php?category=apothitika&sub-category=pagides">Παγίδες</a></li>
					</ul>
				</li>
				<li class='has-sub'><a href='#'>Προιόντα Υγειονομικής σημασίας</a>
					<ul>
						<li><a href="products_php_files/products.php?category=ygeionomika&sub-category=entomoktona">Εντομοκτόνα</a></li>
					</ul>
				</li>
				<li class='has-sub'><a href='#'>Γεωργικά Εργαλεία-Μηχανήματα</a>
					<ul>
						<li><a href="products_php_files/products.php?category=ergaleia&sub-category=doxeia">Ανοξείδωτα δοχεία τροφίμων</a></li>
						<li><a href="products_php_files/products.php?category=ergaleia&sub-category=kladeftiria">Κλαδευτήρια</a></li>
						<li><a href="products_php_files/products.php?category=ergaleia&sub-category=prionia">Πριόνια</a></li>
					</ul>
				</li>
				<li class='has-sub'><a href='#'>Μηχανήματα κήπου</a>
					<ul>
						<li><a href="products_php_files/products.php?category=khpos&sub-category=psalidia">Ψαλίδια</a></li>
						<li><a href="products_php_files/products.php?category=khpos&sub-category=xartokoptika">Χορτοκοπτικά</a></li>
					</ul>
				</li>
			</ul>
		</div>



    </div>

    <div class="right_sidebar">
		<?php
		include_once("connect.php");

		if($flag) echo 'Welcome Back';

			$form='<p>Login Form</p>'.
			'<form action="" method="post">'.
			'Username:<input type="text" name="username" required>'.
			'<br />'.
			'Password:<input type="password"  name="password" required>'.
			'<br /><br />'.
			'<input type="submit" value="Submit">'.
			'</form>'.
			'<a href="register_login_php_files/register.html" target="popup"> <p>Register Here</p> </a>';

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$givenUsername  =  $_POST['username'];
			$givenPassword  =  $_POST['password'];

			if (isset($givenUsername)&& isset($givenPassword))
			{
				$check_for_user_query = "SELECT * from users where username='$givenUsername' AND password='$givenPassword'";

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
					echo 'You successfully Logged In <br />' .
							$first_name . '    ' . $last_name.'<br />';

					$_SESSION['logged']   = true;
					$_SESSION['user']     = $username;
					$_SESSION['password'] = $givenPassword;
					$_SESSION['user_id']  = $user_id;

				}
			}
		}
		if(!isset($_SESSION['logged'])) echo $form;
		else
		{

			if (($_SESSION['user'] == 'admin') &&($_SESSION['password'] == 'admin'))
			{
				echo
						'<div class="account_panel">' .
							'<form id="addProducts" action="products_php_files/addProducts.php" method="POST">' .
								'<input type="text" name="user_id" value="' . $_SESSION['user_id'] . '" hidden><br>' .
								'<a href="#" onclick="myFunction(2)">Add Products</a>' .
							'</form>' .
							'<form id="RemoveProducts" action="products_php_files/RemoveProducts.php" method="POST">' .
								'<input type="text" name="user_id" value="' . $_SESSION['user_id'] . '" hidden><br>' .
								'<a href="#" onclick="myFunction(3)">Remove Products</a>' .
							'</form>' .

							'<script>' .
								'function myFunction(formClicked)' .
								'{' .
									'if     (formClicked==1) document.getElementById("admin_account").submit();' .
									'else if(formClicked==2) document.getElementById("addProducts").submit();' .
									'else if(formClicked==3) document.getElementById("RemoveProducts").submit();' .
									'alert("You are about to leave the page");' .
								'}' .
							'</script>' .

							'<p><a href="register_login_php_files/logout.php">Log out</a></p>' .
						'</div>';
			}
			else
			{
				echo
						'<div class="account_panel">' .
							'<form id="wallet" action="wallet_php_files/wallet.php" method="POST">' .
								'<input type="text" name="user_id" value="' . $_SESSION['user_id'] . '" hidden><br>' .
								'<a href="#" onclick="myFunction(2)">My Wallet</a>' .
							'</form>' .

							'<script>' .
								'function myFunction(formClicked)' .
								'{' .
									'if     (formClicked==1) document.getElementById("account").submit();' .
									'else if(formClicked==2) document.getElementById("wallet").submit();' .
									'alert("You are about to leave the page");' .
								'}' .
							'</script>' .

							'<p><a href="register_login_php_files/logout.php">Log out</a></p>' .
						'</div>';
			}
		}
		?>

    <div class="main_content">
			<script type = "text/javascript">
					function displayNextImage() {
						x = (x === images.length - 1) ? 0 : x + 1;
						document.getElementById("img").src = images[x];
					}

					function displayPreviousImage() {
						x = (x <= 0) ? images.length - 1 : x - 1;
						document.getElementById("img").src = images[x];
					}

					function startTimer() {
						setInterval(displayNextImage, 3000);
					}

					var images = [], x = -1;
					images[0] = "../images/site_images/shop1.png";
					images[1] = "../images/site_images/shop2.png";
					images[2] = "../images/site_images/shop3.png";
					images[3] = "../images/site_images/shop4.png";
				</script>


			<img id="img" src="../images/site_images/shop5.png"/>
			<div class="buttons">
			<button type="button" onclick="displayPreviousImage()">Previous</button>
			<button type="button" onclick="displayNextImage()">Next</button>
	</div>



    <div class="footer">
        <p> Agrotic Store © 2016</p>
    </div>

</body>
</html>
