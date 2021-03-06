<?php
include_once("../connect.php");
$prod_id = $_GET['id'];
$price   = $_GET['price'];
$shipping_form='<br /><br /><br />'.
      '<form action="" method="post">'.
    '<table id="shipping_details_form">'.
        '<tr>'.
            '<td> Full name: </td> '.
            '<td> <input type="text" name="name"> </td> '.
        '</tr> '.
        '<tr> '.
            '<td> Address: </td> '.
            '<td> <input type="text" name="address"> </td> '.
        '</tr> '.
        '<tr> '.
            '<td> City: </td> '.
            '<td> <input type="text" name="city"> </td> '.
        '</tr> '.
        '<tr> '.
            '<td> Postal Code: </td> '.
            '<td> <input type="text" name="postal_code"> </td> '.
        '</tr> '.
        '<tr> '.
            '<td> Shipping Method: </td> '.
            '<td>'.
                  '<select name="method">'.
                      '<option value="Deposit">Deposit</option>'.
                      '<option selected="selected" value="By Cash">By Cash</option>'.
                  '</select>'.
        '</tr> '.
        '<tr> <td> <input type="submit" value="Buy" /> </td></tr> '.
    '</table> '.
    '</form>';

session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Checkout Page</title>
        <link rel="shortcut icon" href="../../images/site_images/icon.png" type="image/png">
        <link type="text/css" rel="stylesheet" href="../../css/buy.css" />
    </head>
    <body>
        <?php
            if(isset($_SESSION['logged']))
            {
                $stock=checkStockFromDatabase($prod_id,$dbc);

                if($stock>0)
                {
                    if(checkFunds($_SESSION['user_id'],$dbc,$price))
                    {
                        buyItem($prod_id,$dbc);

                        echo ' You successfully bought the product <br />'.
                            '<br /> <a href="../main.php">Go to home page</a> ';

                        updateFunds($_SESSION['user_id'],$dbc,$price);

                        $funds_left=showFunds($dbc,$_SESSION['user_id']);
                        echo '<br />Remaining money in your account:'.$funds_left;

                    }
                    else echo 'No available funds'.
                        '<br /> <a href="../main.php">Go to home page</a> ';

                }
                else echo ' This product is no more available for purchase or you have no funds. <br /> '.
                    '<br /> <a href="../main.php">Go to home page</a> ';

            }
            else
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name     = $_POST['name'];
                    $address  = $_POST['address'];
                    $city     = $_POST['city'];
                    $postal   = $_POST['postal_code'];
                    $method   = $_POST['method'];


                    $stock=checkStockFromDatabase($prod_id,$dbc);

                    if($stock>0)
                    {
                        buyItem($prod_id,$dbc);
                        echo 'Order completed with the following shipping details <br />'.
                             'Full Name:      '.$name.'    <br />'.
                             'Address:        '.$address.' <br />'.
                             'City:           '.$city.'    <br />'.
                             'Postal Code :   '.$postal.'  <br />'.
                             'Shipping Method:'.$method.' <br />'.
                             '<br /> <a href="../main.php">Go to home page</a> ';
                    }
                    else
                    {
                        echo 'This product is not available anymore. <br />';
                        echo '<a href="../main.php">Go to Home</a>';
                    }
                }
                else
                {
                    echo '<p id="messageP">Please login to proceed or fill the form with your shipping details</p> ';
                    echo '<a href="../main.php">Go to login </a> ';
                    echo $shipping_form;
                }
            }


        function checkStockFromDatabase($prod_id,$link)
        {
            $query="SELECT stock from products where product_id=$prod_id";
            $result=mysqli_query($link,$query) or die(mysqli_error($link));

            while($row=mysqli_fetch_array($result)) $stock=$row['stock'];

            return $stock;

        }

        function buyItem($prod_id,$link)
        {
            $query = "UPDATE products SET stock=stock-1 where product_id=$prod_id";

            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            return true;
        }

        function checkFunds($user,$link,$price)
        {
            $query="SELECT balance from funds where id=$user";

            $result=mysqli_query($link,$query) or die(mysqli_error($link));

            $row=mysqli_fetch_array($result);

            if ($row['balance']>0&&$row['balance']>=$price) return true;
            else return false;
        }

        function updateFunds($user,$link,$price)
        {
            $query  = "UPDATE  funds  set balance=balance-$price where id=$user";

            $result = mysqli_query($link,$query) or die(mysqli_error($link));

        }
        function showFunds($link,$user)
        {
            $query="SELECT balance from funds where id=$user";
            $result=mysqli_query($link,$query) or die(mysqli_error($link));
            $row=mysqli_fetch_array($result);
            return $row['balance'];
        }
        ?>
    </body>
</html>
