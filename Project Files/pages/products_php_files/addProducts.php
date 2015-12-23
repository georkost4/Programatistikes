<?php
include_once("../Connect.php");

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> Add Products to Site</title>
        <link rel="shortcut icon" href="../../images/icon.png" type="image/png">
        <link type="text/css" rel="stylesheet" href="../../css/manage_products.css" />
    </head>
    <div class="header">
    <p>Welcome</p>
    </div>

    <div class="main_content">

    <h2> Please fill in the form to add a product.</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td> Name</td>
                <td> <input type="text" name="prod_name" required> </td>
            </tr>
            <tr>
                <td> Description </td>
                <td> <input type="text" name="prod_description" required> </td>
            </tr>
            <tr>
                <td> Value </td>
                <td> <input type="number" name="prod_value" required> </td>
            </tr>
            <tr>
                <td> Stock </td>
                <td> <input type="number" name="prod_stock" required> </td>
            </tr>
            <tr>
            <tr>
                <td> Category </td>
                <td> <input type="text" name="prod_category" required> </td>
            </tr>
            <tr>
                <td> Sub-Category </td>
                <td> <input type="text" name="prod_sub_category"> </td>
            </tr>
            <tr>
                <td> Image </td>
                <td> <input type="file" name="prod_image"> </td>
            </tr>
        </table>
        <br />
        <input type="submit" name="submit" value="Submit product">
    </form>
    <?php

    if(isset($_POST['submit']))
    {

        $prod_name         = $_POST['prod_name'];
        $prod_value        = $_POST['prod_value'];
        $prod_description  = $_POST['prod_description'];
        $prod_stock        = $_POST['prod_stock'];
        $prod_image        = $_FILES['prod_image'];
        $prod_category     = $_POST['prod_category'];

        if(isset($_POST['prod_sub_category'])) $prod_sub_category = $_POST['prod_sub_category'];
        else $prod_sub_category=NULL;

        $target_dir="products_uploaded_images/";
        $time=time();
        $target_file=$target_dir.$time.$_FILES['prod_image']['name'];
        $absolute_path='http://localhost/Programmatistikes/Project/Project Files/pages/products_php_files/'.$target_file;
        $check=getimagesize($_FILES['prod_image']['tmp_name']);

        if($check !== false)
        {
            echo "File is an image - " . $check["mime"] . ". <br /> <br />";
            move_uploaded_file($_FILES['prod_image']['tmp_name'],$target_file);

            echo '<p id="success_p">You successfully added the products with the following information.</p>';
            echo '<table id="added_product_table">'.
                '<tr>'.
                    '<td> Name</td>'.
                    '<td> '.$prod_name.' </td>'.
                '</tr>'.
                '<tr>'.
                    '<td> Description </td>'.
                    '<td> '.$prod_description.' </td>'.
                '</tr>'.
                '<tr>'.
                    '<td> Value </td>'.
                    '<td> '.$prod_value.' </td>'.
                '</tr>'.
                '<tr>'.
                    '<td> Stock </td>'.
                    '<td> '.$prod_stock.' </td>'.
                '</tr>'.
                '<tr>'.
                    '<td> Image </td>'.
                    '<td> <img src="'.$target_file.'" width= "100px" height="100px" > </td>'.
                '</tr>'.
            '</table>';



            $query="INSERT INTO products values( 0,'$prod_name','$prod_stock','$prod_value','$prod_category','$prod_sub_category','$absolute_path','$prod_description' )";

            $result=mysqli_query($dbc,$query) or die(mysqli_error($dbc));

        }
        else
        {
            echo '<p id="failure_p">File is not an image. Try again </p>';
        }
    }

    ?>

    <br />
    <p><?php echo '<br /> <a href="../main.php">Go Back</a> <br />';?></p>

    </div>

    <div class="footer">
        <p>All Right's Reserved 2015</p>
    </div>

    </body>
</html>
