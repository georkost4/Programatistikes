<?php
include_once("../connect.php");
$prod_id=$_GET['id'];
$shipping_form=
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
                    buyItem($prod_id,$dbc);

                    echo ' You successfully bought the product <br />';
                }
                else echo ' This product is no more available for purchase <br /> ';

            }
            else
            {
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $name     = $_POST['name'];
                    $address  = $_POST['address'];
                    $city     = $_POST['city'];
                    $postal   = $_POST['postal_code'];


                    $stock=checkStockFromDatabase($prod_id,$dbc);

                    if($stock>0)
                    {
                        buyItem($prod_id,$dbc);
                        echo 'Order completed with the following shipping details <br />'.
                             'Full Name:     '.$name.'    <br />'.
                             'Address:       '.$address.' <br />'.
                             'City:          '.$city.'    <br />'.
                             'Postal Code :  '.$postal.'  <br />';
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
            echo 'stock = '.$stock.'<br />';

            return $stock;

        }

        function buyItem($prod_id,$link)
        {
            $query = "UPDATE products SET stock=stock-1 where product_id=$prod_id";

            $result = mysqli_query($link, $query) or die(mysqli_error($link));

            return true;
        }

        ?>
    </body>
</html>
