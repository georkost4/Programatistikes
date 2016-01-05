<?php
include_once("../connect.php");
if(isset($_POST['user_id'])) $user_id=$_POST['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="shortcut icon" href="../../images/site_images/icon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="../../css/wallet.css" />
</head>
<body>

<div class="main_content">
    <div class="addMoney">
        <p>Add Money</p>
        <br /> <br />
        <p>Enter your credit card details.</p>
        <form action="addFunds.php" method="post">
            <table>
                <tr>
                    <td> Card Number: </td>
                    <td> <input type="number"  name="number" required>  </td>
                </tr>
                <tr>
                    <td> CCV: </td>
                    <td> <input type="number"  name="ccv"    required>  </td>
                </tr>
                <tr>
                    <td> Exp. Date: </td>
                    <td> <input type="number" name="date"    required>  </td>
                </tr>
                <tr>
                    <td> Amount: </td>
                    <td> <input type="number" name="amount"    required>  </td>
                </tr>
            </table>
            <input type="submit" value="Add Funds">
            <input type="hidden" name="id" value="<?php echo $user_id ?>">
        </form>
    </div>
    <div class="balance">
        <p>Balance</p>
        <br /> <br /> <br />
        <p>
            Current balance:
            <?php
                if(isset($_POST['user_id'])) $query="SELECT * from funds where id=$user_id";
                else
                {
                    $user_id=$_GET['id'];
                    $query="SELECT * from funds where id=$user_id";
                }
                $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

                $row=mysqli_fetch_array($result);

                echo $row['balance'];
            ?>
        </p>
    </div>
    <a href="../main.php">Go to home </a>
</div>

<div class="footer">
    <p>Agrotic Store © 2016</p>
</div>
</body>
</html>

