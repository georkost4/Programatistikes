<?php
include_once("Connect.php");


$user_id=$_POST['user_id'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Add Products to Site</title>
    <link rel="shortcut icon" href="../images/icon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="../css/products.css" />
</head>
<div class="header">
    <p>Welcome</p>
</div>

<div class="main_content">
    <p>Please select which Product to Remove</p>

    <?php
    echo '<table>';
    $query = "SELECT * FROM products";
    $data = mysqli_query($dbc, $query);

    echo '<table>';
    while ($row = mysqli_fetch_array($data)) {
        echo '<tr>' .
            '<td rowspan="3"> <p><img src="' . $row["image_path"].'" width="100px" height="100px"> </p></td>' .
            '<td><p>' . $row["name"] . '</p></td>' .
            '<td>' . $row["value"] . '</td>' .
            '</tr>' .
            '<tr>' .

            '</tr>' .
            '<tr>' .
            '<td><p>' . $row["description"] . '</p></td>' .
            '<td><a href="deleteProd.php?prod_id=' . $row["product_id"] . ' ">Remove</a></td>' .
            '</tr>';
    }
    echo '</table>';
    ?>

</div>


</div>

<div class="footer">
    <p>All Right's Reserved 2015</p>
</div>

</body>
</html>
