<?php
/**
 * Created by PhpStorm.
 * User: sherie
 * Date: 2018-10-08
 * Time: 21:19
 */

//skapa checkoutboxen, se om submit funkar.
// inculdera filerna, komma åt kod.
// två array $products och selector[] (tom för att input kan användas som , foreach loopa dem ihop här.
// if'ar alla dagar och välja ut de dagar som ska ha prisändringar.
// Byter ut min if till en function. Får en funktionalitet, anropa på olika ställen och slippa upprepa.
// TODO! if product not chosen, skriv ej ut på checkout sidan.
// TODO! använda session i slutet om jag har tid.



session_start();

$_SESSION['post-data'] = $_POST;



include 'products.php';

date_default_timezone_set('UTC');  // sätta



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Permanent+Marker" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css" type="text/css">
    <title>Shop shitter 2</title>
</head>
<body>
<div class="checkOutcart">

<?php

    echo"<div class='checkOutcart'>";


    if (isset($_POST['submit'])) {

        echo "<h3>Contact Info</h3>";
        echo "Name: " . ($_POST['name'] . "<br />\n");
        echo "Address: " . ($_POST['address'] . "<br />\n");
        echo "Number: " . ($_POST['number'] . "<br />\n");
        echo "Email: " . ($_POST['email'] . "<br />\n");


    }

     echo '</div>';






?>

    <?php



echo"<div class='checkOutcart'>";

    $orderTotal = 0;



    foreach ($products as $index => $product):  // Här tar den ut product arrays index, varje produkt en åt gången.

        $productPrice = $product['price'] * $_POST['quantities'][$index];
        $orderTotal += $productPrice;

        if($_POST['quantities'][$index] == 0){
            echo " ";
        } else {


            echo "<h4>Product:</h4> ";
            echo $product['name'] . " " . $product['price'] . "€ each" . " - " .
                $_POST['quantities'][$index] . " pieces" . " Total price: " . $productPrice . " €" . "<br /> \n <br>";
        }
    endforeach;

    $dayOfweek = date("l");


    if($dayOfweek === "Monday"){
        echo "<h5 style='color: firebrick'>Today is ". $dayOfweek . " sale with 50% OFF!</h5>";
    } else if ($dayOfweek === "Friday") {
        echo "<h5 style='color: firebrick'>Today is ". $dayOfweek . " sale with 20€ OFF!</h5>";
    }



    echo "<br /> \n"."<h4>Total price: </h4>" .sales($dayOfweek, $orderTotal) . " €";
    echo '</div>';?>





<div class="row d-flex mx-auto tex-right">
   <input type="button" name="redirectButton" onclick="window.location='http://localhost:8888/sherie_klappenbach_shopping/'" class="Redirect" value="Continue shopping"/>
    <div class="col-2 purchaseButton "><button type="button" name="submit" class="btn btn-primary">Check out</button></div>
</div>



<?="</div>" ?>


    <?php



    function sales($dayOfweek, $InitialTotalPrice)
    {

        $monday = 0.5;
        $wednesday = 1.10;
        $friday = 20 ;


        if ($dayOfweek === "Monday") {

            return $monday * $InitialTotalPrice;

        } else if ($dayOfweek === "Wednesday") {

            return $wednesday * $InitialTotalPrice;

        } else if ($dayOfweek === "Friday" && $InitialTotalPrice > 200) {

            return $InitialTotalPrice - $friday;

        } else {

            return $InitialTotalPrice;
        }

    }

//print_r($_SESSION);
    ?>


</body>
</html>
