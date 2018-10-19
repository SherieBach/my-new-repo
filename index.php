<?php
/**
 * Created by PhpStorm.
 * User: sherie
 * Date: 2018-10-08
 * Time: 21:19
 */
session_start();

$page = 'index.php';

include 'products.php';




// En enda formulär till hela, ser ingen anledning till att ha flera?
// inkludera produkt-sidan med produkt-arrayn i för att slippa hårdkoda t ex. flera columner med produkter, använda foreach loop.
// echoa ut namn/pris/bild från array i (incl. 'product.php')
// TODO! om tid finns, skapa list items för productcards
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Shitter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oswald|Permanent+Marker" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css" type="text/css"> <!--Ligger i en mapp CSS/...css -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Revolution Makeup</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" deluminate_imagetype="unknown"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
        </ul>
    </div>
</nav>
<div class="jumbotron">
    <h1 class="display-1">Revolution</h1>
    <p class="lead">Face of the future</p>
    <hr class="my-4">
    <p class="lead"></p>
</div>

<!--Form starts here-->

<form action="checkout.php" method="POST" name="form" >
    <fieldset class="container-fluid ">

        <!--Products-->
        <div class="row productForm ">
            <?php
            foreach ($products as $product): ?>
            <div class="col-md-3 col-sm-6 col-xs-12 card mx-auto productBox">
                <img class="card-img-top" src="<?=$product["image"];?>" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><?=$product["name"]?></h5>
                    <p class="card-text"><?=$product["price"]." €"?></p>
                    <div class="form-group">
                        <label for="quantities">Select Items</label>
                        <br>

                        <div class="col-md-3 col-sm-6 col-xs-12 form-group">
                            <input type="number" name="quantities[]" placeholder=" " min="0" max="99" value="0">
                        </div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="row contactForm">
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                           placeholder="email"
                           style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAAXNSR0IArs4c6QAAAfBJREFUWAntVk1OwkAUZkoDKza4Utm61iP0AqyIDXahN2BjwiHYGU+gizap4QDuegWN7lyCbMSlCQjU7yO0TOlAi6GwgJc0fT/fzPfmzet0crmD7HsFBAvQbrcrw+Gw5fu+AfOYvgylJ4TwCoVCs1ardYTruqfj8fgV5OUMSVVT93VdP9dAzpVvm5wJHZFbg2LQ2pEYOlZ/oiDvwNcsFoseY4PBwMCrhaeCJyKWZU37KOJcYdi27QdhcuuBIb073BvTNL8ln4NeeR6NRi/wxZKQcGurQs5oNhqLshzVTMBewW/LMU3TTNlO0ieTiStjYhUIyi6DAp0xbEdgTt+LE0aCKQw24U4llsCs4ZRJrYopB6RwqnpA1YQ5NGFZ1YQ41Z5S8IQQdP5laEBRJcD4Vj5DEsW2gE6s6g3d/YP/g+BDnT7GNi2qCjTwGd6riBzHaaCEd3Js01vwCPIbmWBRx1nwAN/1ov+/drgFWIlfKpVukyYihtgkXNp4mABK+1GtVr+SBhJDbBIubVw+Cd/TDgKO2DPiN3YUo6y/nDCNEIsqTKH1en2tcwA9FKEItyDi3aIh8Gl1sRrVnSDzNFDJT1bAy5xpOYGn5fP5JuL95ZjMIn1ya7j5dPGfv0A5eAnpZUY3n5jXcoec5J67D9q+VuAPM47D3XaSeL4AAAAASUVORK5CYII=&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;"required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.
                    </small>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <label for="contact">Name</label>
                    <input type="text" class="form-control" name="name" id="contact" placeholder="Name" required>
                </div>
                <div class="w-100 d-none d-md-block"></div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <label for="address">Adress</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                    <label for="number">Telephone</label>
                    <input type="number" class="form-control" name="number" id="number" placeholder="0765454554" value=" " required></div>
                <div class=" col text-right checkOutButton "><button type="submit" name="submit" class="btn btn-primary">Check out</button></div>

            </div>
        </div>

    </fieldset>
</form>


<!--<footer class="row"></footer>-->
</body>
</html>


