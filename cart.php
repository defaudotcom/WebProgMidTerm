<?php

session_start();

require_once ("php/createdb.php");
require_once ("php/pet.php");

$database = new createdb("animaldb", "pettable");

if (isset($_POST['remove'])){
    if (isset($_POST['remove']) && isset($_SESSION['cart'])){
        $remove_id = $_POST['remove'];
        foreach ($_SESSION['cart'] as $key => $value){
            if($value["id"] == $remove_id){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed!!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
            }
        }
    }
}


?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Adoption</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css">
    </head>

    <body id="homecart">
        <?php
            require_once ('php/header.php');
        ?>

        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-7">
                    <div class="adopt-cart">
                        <h6>My Adoption</h6>
                        <hr>

                        <?php
                        $petid = 0;
                        $total = 0;
                            if (isset($_SESSION['cart'])){
                                $id = array_column($_SESSION['cart'], 'id');

                                $result = $database->getData();
                                while ($row = mysqli_fetch_assoc($result)){
                                    foreach ($id as $petid){
                                        if ($row['id'] == $petid){
                                            cart($row['petimg'], $row['petname'],$row['adoptprice'], $row['id']);
                                            $total = $total + (int)$row['adoptprice'];
                                        }
                                    }
                                }
                            }else{
                                echo "<h5>Cart is Empty</h5>";
                            }

                        ?>

                    </div>
                </div>
                <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                    <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<h6>Price ($count items)</h6>";
                                } else {
                                    echo "<h6>Price (0 items)</h6>";
                                }
                                ?>
                                <h6>Delivery Charges</h6>
                                <hr>
                                <h6>Paperwork</h6>
                                <h6>Amount Payable</h6>
                            </div>
                            <div class="col-md-6">
                                <h6>$<?php echo $total; ?></h6>
                                <h6 class="text-success">FREE</h6>
                                <hr>
                                <h6>$15</h6>
                                <h6>$<?php
                                    $total += 15; // Add the $15 for paperwork to the total
                                    echo $total;
                                    ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>