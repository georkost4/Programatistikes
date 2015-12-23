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
        <p>Chosen Category <?php echo $category;?></p>
        <p>Chosen sub-Category <?php if(isset($_GET['sub-category']))echo $sub_category;?></p>

        <?php
            echo '<table>';
            $query = "SELECT * FROM products WHERE category='$category' ORDER BY name DESC";
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
                    '<td><a href="buy.php">Buy</a></td>' .
                    '</tr>';
            }
            echo '</table>';
        ?>

    </div>

    <div class="footer">
        <p>All Right's Reserved 2015</p>
    </div>

</body>
</html>