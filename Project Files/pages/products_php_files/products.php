<?php
    include_once("../Connect.php");
    $category     = $_GET['category'];
    if(isset($_GET['sub-category'])) {$sub_category = $_GET['sub-category'];}?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="shortcut icon" href="../../images/site_images/icon.png" type="image/png">
    <link type="text/css" rel="stylesheet" href="../../css/products.css" />
</head>
<body>
    <div class="header">
        <p>Welcome</p>
    </div>

    <div class="main_content">
        <p>Chosen Category: <?php echo $category;?></p>
        <p>Chosen sub-Category: <?php if(isset($_GET['sub-category']))echo $sub_category;?></p>

        <?php
            if(isset($sub_category))  $query = "SELECT * FROM products WHERE category='$category' AND sub_category='$sub_category' ORDER BY name DESC";
            else $query = "SELECT * FROM products WHERE category='$category' ORDER BY name DESC";
            $data = mysqli_query($dbc, $query);

            echo '<table>';
            while ($row = mysqli_fetch_array($data)) {
                echo '<tr>' .
                    '<td rowspan="3"> <p><img src="' . $row["image_path"].'" width="100px" height="100px"> </p></td>' .
                    '<td><p>' . $row["name"] . '</p></td>' .
                    '<td>' . $row["value"] . '€</td>' .
                    '</tr>' .
                    '<tr>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><p>' . $row["description"] . '</p></td>' .
                    '<td><a href="buy.php?id=' . $row["product_id"].'&price=' . $row["value"].'">Buy</a></td>' .
                    '</tr>';
            }
            echo '</table>';
        ?>
    <a href="../main.php">Go to home </a>
    </div>

    <div class="footer">
        <p>Agrotic Store © 2016</p>
    </div>

</body>
</html>